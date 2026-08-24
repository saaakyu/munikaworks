/**
 * CCResizer — app.js
 * ブラウザ完結型ツール: CanvasAPIで画像をリサイズし、PNGとして出力
 */

'use strict';

/* ── 定数 ── */
const GRID_SIZE     = 24;
const MAX_FILE_SIZE = 5 * 1024 * 1024;  // 5MB
const MAX_DIMENSION = 4000;             // 4000px
const MAX_FILES     = 50;               // 累積アップロード上限

/* ── 標準比率リスト（縦横独立モード用） ── */
const STANDARD_RATIOS = [
  [1,1],[2,1],[1,2],[3,2],[2,3],[4,3],[3,4],
  [16,9],[9,16],[3,1],[1,3],[4,1],[1,4]
];

/* ── 状態 ── */
let currentMode   = '1:1';

/* ── モード補足文 ── */
const MODE_DESCRIPTIONS = {
  '1:1':  '長辺を基準に正方形へ変換します。<strong>短辺には透明余白を追加</strong>します。',
  'free': '<strong>1:1 / 2:1 / 3:2 / 4:3 / 16:9</strong> などの汎用比率になるように<strong>透明余白を自動追加</strong>します。',
};
let isProcessing  = false;
let resultItems   = [];   // { filename, origW, origH, scaledW, scaledH, outW, outH, wasScaled, ratioLabel, blob, blobUrl } | { filename, error }
let originalFiles = [];   // File[]（モード変更時の再処理用）

/* ── DOM参照 ── */
const modeButtons           = document.querySelectorAll('.mode-btn');
const modeDesc              = document.getElementById('modeDesc');
const dropzone              = document.getElementById('dropzone');
const fileInput             = document.getElementById('fileInput');
const resultsSection        = document.getElementById('resultsSection');
const resultsCount          = document.getElementById('results-heading');
const resultsActions        = document.getElementById('resultsActions');
const resultsEmpty          = document.getElementById('resultsEmpty');
const imageGrid             = document.getElementById('imageGrid');
const zipDownloadBtn        = document.getElementById('zipDownloadBtn');
const clearBtn              = document.getElementById('clearBtn');
const processingIndicator   = document.getElementById('processingIndicator');
const errorBanner           = document.getElementById('errorBanner');
const errorBannerText       = document.getElementById('errorBannerText');
const errorBannerClose      = document.getElementById('errorBannerClose');
const errorBannerClearNow   = document.getElementById('errorBannerClearNow');

/* ================================================================
   エラーバナー
================================================================ */

let errorTimer = null;

/**
 * エラーバナーを表示する
 * @param {string} msg
 * @param {boolean} isLimit - true のとき自動消去なし＋クリアボタン表示
 */
function showError(msg, isLimit = false) {
  errorBannerText.textContent = msg;
  errorBanner.hidden = false;
  errorBannerClearNow.hidden = !isLimit;

  if (errorTimer) clearTimeout(errorTimer);
  errorTimer = null;

  if (!isLimit) {
    errorTimer = setTimeout(hideError, 6000);
  }
}

function showLimitError(msg) {
  showError(msg, true);
}

function hideError() {
  errorBanner.hidden = true;
  errorTimer = null;
}

errorBannerClose.addEventListener('click', hideError);
errorBannerClearNow.addEventListener('click', () => {
  clearAll();
  hideError();
});

/* ================================================================
   比率モード計算
================================================================ */

/**
 * @param {number} w
 * @param {number} h
 * @param {string} mode '1:1' | 'free'
 * @returns {{ outW: number, outH: number, ratioLabel: string|null } | null}
 */
function calcOutputSize(w, h, mode) {
  if (w < GRID_SIZE || h < GRID_SIZE) return null;

  switch (mode) {
    case '1:1': {
      const side = Math.floor(Math.max(w, h) / GRID_SIZE) * GRID_SIZE;
      return { outW: side, outH: side, ratioLabel: null };
    }
    case 'free': {
      // 標準比率リストから余白が最小になるものを選択
      let best       = null;
      let bestWaste  = Infinity;
      let bestGrids  = Infinity;

      for (const [rx, ry] of STANDARD_RATIOS) {
        let n;
        if (rx === ry) {
          // 1:1のときはfloor（1:1モードと同じ挙動・短辺に余白を足す）
          n = Math.floor(Math.max(w, h) / (rx * GRID_SIZE));
        } else {
          // それ以外はceil（出力 >= 入力を保証）
          n = Math.max(
            Math.ceil(w / (rx * GRID_SIZE)),
            Math.ceil(h / (ry * GRID_SIZE))
          );
          // 出力が入力を下回る候補は除外（縮小禁止）
          if (n * rx * GRID_SIZE < w || n * ry * GRID_SIZE < h) continue;
        }
        if (n <= 0) continue;

        const outW  = n * rx * GRID_SIZE;
        const outH  = n * ry * GRID_SIZE;

        // 4000px超の候補は除外
        if (outW > MAX_DIMENSION || outH > MAX_DIMENSION) continue;

        const waste = outW * outH - w * h;
        const grids = (outW / GRID_SIZE) * (outH / GRID_SIZE);

        if (waste < bestWaste || (waste === bestWaste && grids < bestGrids)) {
          bestWaste  = waste;
          bestGrids  = grids;
          best = { outW, outH, ratioLabel: `${rx}:${ry}` };
        }
      }
      return best;
    }
    default:
      return null;
  }
}

/* ================================================================
   Canvas処理
================================================================ */

/**
 * File → PNG Blob に変換する
 * @param {File} file
 * @param {string} mode
 */
function processImage(file, mode) {
  return new Promise((resolve, reject) => {

    // ① ファイルサイズチェック
    if (file.size > MAX_FILE_SIZE) {
      reject(new Error(
        `ファイルサイズが大きすぎます（${(file.size / 1024 / 1024).toFixed(1)} MB）。上限は 5 MB です`
      ));
      return;
    }

    const loadUrl = URL.createObjectURL(file);
    const img     = new Image();
    img.crossOrigin = 'anonymous';

    img.onload = () => {
      URL.revokeObjectURL(loadUrl);

      const origW = img.naturalWidth;
      const origH = img.naturalHeight;

      // ② 4000px超の自動プレスケール
      let wasScaled = false;
      let scaledW   = origW;
      let scaledH   = origH;

      if (origW > MAX_DIMENSION || origH > MAX_DIMENSION) {
        wasScaled = true;
        const ratio = MAX_DIMENSION / Math.max(origW, origH);
        scaledW = Math.round(origW * ratio);
        scaledH = Math.round(origH * ratio);
      }

      // ③ 出力サイズ計算
      const sizes = calcOutputSize(scaledW, scaledH, mode);
      if (!sizes) {
        reject(new Error('画像が小さすぎます（24px × 24px 以上が必要です）'));
        return;
      }

      const { outW, outH, ratioLabel } = sizes;

      // ④ Canvas作成・透明化
      const canvas = document.createElement('canvas');
      canvas.width  = outW;
      canvas.height = outH;
      const ctx = canvas.getContext('2d');
      ctx.clearRect(0, 0, outW, outH);

      // ⑤ containフィット描画（切り取り禁止・拡大禁止・中央揃え）
      const scale = Math.min(outW / scaledW, outH / scaledH, 1.0);
      const drawW = Math.round(scaledW * scale);
      const drawH = Math.round(scaledH * scale);
      const dstX  = Math.floor((outW - drawW) / 2);
      const dstY  = Math.floor((outH - drawH) / 2);

      ctx.drawImage(img, 0, 0, origW, origH, dstX, dstY, drawW, drawH);

      canvas.toBlob((blob) => {
        if (!blob) {
          reject(new Error('PNG Blob の生成に失敗しました'));
          return;
        }
        resolve({ filename: file.name, origW, origH, scaledW, scaledH, outW, outH, wasScaled, ratioLabel, blob });
      }, 'image/png');
    };

    img.onerror = () => {
      URL.revokeObjectURL(loadUrl);
      reject(new Error('画像の読み込みに失敗しました'));
    };

    img.src = loadUrl;
  });
}

/* ================================================================
   UI更新
================================================================ */

function updateDropzoneState() {
  const locked = resultItems.length >= MAX_FILES;
  const busy   = isProcessing;
  const disable = locked || busy;

  dropzone.classList.toggle('is-disabled', disable);
  dropzone.setAttribute('aria-busy', String(busy));
  fileInput.disabled = disable;

  if (locked) {
    dropzone.setAttribute('aria-disabled', 'true');
    dropzone.setAttribute('title', `上限 ${MAX_FILES} 枚に達しました。クリアしてから再度お試しください。`);
  } else {
    dropzone.removeAttribute('aria-disabled');
    dropzone.removeAttribute('title');
  }
}

function setProcessing(flag) {
  isProcessing = flag;
  processingIndicator.hidden = !flag;
  modeButtons.forEach(b => { b.disabled = flag; });
  if (zipDownloadBtn) zipDownloadBtn.disabled = flag;
  updateDropzoneState();
}

function updateResultsUI() {
  const successCount = resultItems.filter(r => !r.error).length;
  const hasItems     = resultItems.length > 0;

  if (hasItems) {
    resultsCount.innerHTML =
      `<span aria-hidden="true">✅</span> <span class="count-num">${successCount}</span> 件の画像を変換済み`;
    resultsEmpty.hidden   = true;
    resultsActions.hidden = false;
  } else {
    resultsCount.innerHTML = '';
    resultsEmpty.hidden   = false;
    resultsActions.hidden = true;
  }
}

/* ================================================================
   カードレンダリング
================================================================ */

/** GCD（ユークリッドの互除法）*/
function gcd(a, b) { return b === 0 ? a : gcd(b, a % b); }

function escapeHtml(str) {
  return String(str)
    .replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;')
    .replace(/"/g, '&quot;').replace(/'/g, '&#039;');
}

function renderCard(item, index) {
  const { filename, origW, origH, scaledW, scaledH, outW, outH, blobUrl, error, wasScaled, ratioLabel } = item;

  const el = document.createElement('div');
  el.className = 'image-card' + (error ? ' is-error' : '');
  el.setAttribute('role', 'listitem');
  el.dataset.index = index;

  if (error) {
    el.innerHTML = `
      <div class="card-preview" aria-label="変換エラー">
        <div>
          <div class="error-icon" aria-hidden="true">⚠️</div>
          <p>${escapeHtml(filename)}</p>
          <p style="margin-top:.3rem;font-size:.72rem">${escapeHtml(error)}</p>
        </div>
      </div>`;
  } else {
    const gridX    = outW / GRID_SIZE;
    const gridY    = outH / GRID_SIZE;
    const safeName = escapeHtml(filename);

    const scaledBadge = wasScaled
      ? `<span class="card-badge" aria-label="4000px超のため自動縮小">🔻 4000px縮小済</span>`
      : '';

    const scaledLine = wasScaled
      ? `<p class="card-size-info">
           <span style="font-size:.65rem;opacity:.8">縮小後:</span>
           ${scaledW}×${scaledH}
         </p>`
      : '';

    const ratioLine = (currentMode === 'free' && ratioLabel)
      ? `<p class="card-ratio-hint" aria-label="CCFOLIAでの配置比率">
           📐 <strong>${ratioLabel}</strong> に丸め済み
         </p>`
      : '';

    el.innerHTML = `
      <div class="card-preview">
        <img src="${blobUrl}" alt="${safeName}" loading="lazy">
        ${scaledBadge}
      </div>
      <div class="card-body">
        <p class="card-filename" title="${safeName}">${safeName}</p>
        <p class="card-size-info">
          <span>${origW}×${origH}</span>
          <span class="card-size-arrow">→</span>
          <span>${outW}×${outH}</span>
        </p>
        ${scaledLine}
        <p class="card-grid-count">📦 ${gridX} × ${gridY} マス</p>
        ${ratioLine}
      </div>
      <div class="card-footer">
        <button class="btn btn-ghost btn-sm card-download-btn"
          type="button" aria-label="${safeName}をダウンロード" data-index="${index}">
          ⬇️ ダウンロード
        </button>
      </div>`;
  }

  imageGrid.appendChild(el);
}

function renderAllCards() {
  imageGrid.innerHTML = '';
  resultItems.forEach((item, i) => renderCard(item, i));
}

/* ================================================================
   メイン処理
================================================================ */

async function handleFiles(files) {
  const allFiles = [...files];

  // ① PNG/JPEG以外を弾く
  const invalidFiles = allFiles.filter(f => f.type !== 'image/png' && f.type !== 'image/jpeg');
  if (invalidFiles.length > 0) {
    const names = invalidFiles.slice(0, 3).map(f => f.name).join('、');
    const more  = invalidFiles.length > 3 ? ` 他${invalidFiles.length - 3}件` : '';
    showError(`対応していないファイル形式です（PNG・JPEGのみ対応）: ${names}${more}`);
  }

  const imgFiles = allFiles.filter(f => f.type === 'image/png' || f.type === 'image/jpeg');
  if (imgFiles.length === 0) return;

  // ② 累積枚数上限チェック
  const remaining = MAX_FILES - resultItems.length;

  if (remaining <= 0) {
    showLimitError(
      `変換済み画像が上限（${MAX_FILES} 枚）に達しています。「🗑️ 今すぐクリア」でリセットしてから再度お試しください。`
    );
    return;
  }

  if (imgFiles.length > remaining) {
    showLimitError(
      `あと ${remaining} 枚しか追加できません（累積上限 ${MAX_FILES} 枚）。最初の ${remaining} 枚のみ処理します。クリアすることで再度 ${MAX_FILES} 枚まで追加できます。`
    );
  }

  const targetFiles = imgFiles.slice(0, remaining);

  setProcessing(true);

  try {
    const results = await Promise.allSettled(
      targetFiles.map(f => processImage(f, currentMode))
    );

    results.forEach((result, i) => {
      if (result.status === 'fulfilled') {
        const { filename, origW, origH, scaledW, scaledH, outW, outH, wasScaled, ratioLabel, blob } = result.value;
        const blobUrl = URL.createObjectURL(blob);
        resultItems.push({ filename, origW, origH, scaledW, scaledH, outW, outH, wasScaled, ratioLabel, blob, blobUrl });
      } else {
        const filename = targetFiles[i].name;
        const error    = result.reason?.message ?? '不明なエラー';
        console.warn(`[CCResizer] ${filename}: ${error}`);
        resultItems.push({ filename, error });
      }
    });

    originalFiles = [...originalFiles, ...targetFiles];
    renderAllCards();
    updateResultsUI();
    updateDropzoneState();

    // 上限に達したら通知
    if (resultItems.length >= MAX_FILES) {
      showLimitError(
        `上限（${MAX_FILES} 枚）に達しました。これ以上追加するには「🗑️ 今すぐクリア」でリセットしてください。`
      );
    }

  } catch (err) {
    console.error('[CCResizer] 処理エラー:', err);
  } finally {
    setProcessing(false);
  }
}

async function reprocessAll() {
  if (originalFiles.length === 0) return;

  revokeAllBlobUrls();
  resultItems = [];
  imageGrid.innerHTML = '';
  setProcessing(true);

  try {
    const results = await Promise.allSettled(
      originalFiles.map(f => processImage(f, currentMode))
    );

    results.forEach((result, i) => {
      if (result.status === 'fulfilled') {
        const { filename, origW, origH, scaledW, scaledH, outW, outH, wasScaled, ratioLabel, blob } = result.value;
        const blobUrl = URL.createObjectURL(blob);
        resultItems.push({ filename, origW, origH, scaledW, scaledH, outW, outH, wasScaled, ratioLabel, blob, blobUrl });
      } else {
        const filename = originalFiles[i].name;
        const error    = result.reason?.message ?? '不明なエラー';
        console.warn(`[CCResizer] ${filename}: ${error}`);
        resultItems.push({ filename, error });
      }
    });

    renderAllCards();
    updateResultsUI();
    updateDropzoneState();

  } catch (err) {
    console.error('[CCResizer] 再処理エラー:', err);
  } finally {
    setProcessing(false);
  }
}

/* ================================================================
   メモリ管理
================================================================ */

function revokeAllBlobUrls() {
  resultItems.forEach(item => {
    if (item.blobUrl) { URL.revokeObjectURL(item.blobUrl); item.blobUrl = null; }
  });
}

function clearAll() {
  revokeAllBlobUrls();
  resultItems   = [];
  originalFiles = [];
  imageGrid.innerHTML = '';
  fileInput.value = '';
  updateResultsUI();
  updateDropzoneState();
}

/* ================================================================
   ダウンロード
================================================================ */

function downloadItem(index) {
  const item = resultItems[index];
  if (!item || item.error || !item.blobUrl) return;
  const a      = document.createElement('a');
  a.href       = item.blobUrl;
  a.download   = item.filename.replace(/\.(jpe?g)$/i, '.png');
  document.body.appendChild(a);
  a.click();
  document.body.removeChild(a);
}

async function downloadZip() {
  const successItems = resultItems.filter(r => !r.error && r.blob);
  if (successItems.length === 0) return;

  zipDownloadBtn.disabled = true;
  const originalLabel = zipDownloadBtn.innerHTML;
  zipDownloadBtn.innerHTML = `<span class="spinner" style="width:14px;height:14px;border-width:2px" aria-hidden="true"></span> ZIP生成中...`;

  try {
    const zip        = new JSZip();
    const count      = successItems.length;
    const folderName = `ccresizer_${count}件のPNG`;
    const folder     = zip.folder(folderName);

    successItems.forEach(item => {
      const outName = item.filename.replace(/\.(jpe?g)$/i, '.png');
      folder.file(outName, item.blob, { binary: true });
    });

    const zipBlob = await zip.generateAsync({
      type: 'blob',
      compression: 'DEFLATE',
      compressionOptions: { level: 6 },
    });

    const url  = URL.createObjectURL(zipBlob);
    const a    = document.createElement('a');
    a.href     = url;
    a.download = `${folderName}.zip`;
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
    setTimeout(() => URL.revokeObjectURL(url), 1000);

  } catch (err) {
    console.error('[CCResizer] ZIP生成エラー:', err);
    showError('ZIP生成中にエラーが発生しました: ' + err.message);
  } finally {
    zipDownloadBtn.disabled = false;
    zipDownloadBtn.innerHTML = originalLabel;
  }
}

/* ================================================================
   イベントリスナー
================================================================ */

function updateModeDesc() {
  if (modeDesc) modeDesc.innerHTML = MODE_DESCRIPTIONS[currentMode] ?? '';
}

// 初期表示
updateModeDesc();

// 比率モード切替
modeButtons.forEach(btn => {
  btn.addEventListener('click', () => {
    const newMode = btn.dataset.mode;
    if (newMode === currentMode || isProcessing) return;
    currentMode = newMode;
    modeButtons.forEach(b => { b.classList.remove('active'); b.setAttribute('aria-pressed', 'false'); });
    btn.classList.add('active');
    btn.setAttribute('aria-pressed', 'true');
    updateModeDesc();
    if (originalFiles.length > 0) reprocessAll();
  });
});

// ドロップゾーン
dropzone.addEventListener('click', () => {
  if (!isProcessing && resultItems.length < MAX_FILES) fileInput.click();
});
dropzone.addEventListener('keydown', e => {
  if ((e.key === 'Enter' || e.key === ' ') && !isProcessing && resultItems.length < MAX_FILES) {
    e.preventDefault();
    fileInput.click();
  }
});

fileInput.addEventListener('change', e => {
  if (e.target.files?.length) { handleFiles(e.target.files); e.target.value = ''; }
});

dropzone.addEventListener('dragover', e => {
  e.preventDefault();
  if (!isProcessing && resultItems.length < MAX_FILES) dropzone.classList.add('is-dragover');
});
dropzone.addEventListener('dragleave', e => {
  if (!dropzone.contains(e.relatedTarget)) dropzone.classList.remove('is-dragover');
});
dropzone.addEventListener('drop', e => {
  e.preventDefault();
  dropzone.classList.remove('is-dragover');
  if (!isProcessing && e.dataTransfer?.files?.length) handleFiles(e.dataTransfer.files);
});

// 個別DL（イベント委譲）
imageGrid.addEventListener('click', e => {
  const btn = e.target.closest('.card-download-btn');
  if (btn) downloadItem(parseInt(btn.dataset.index, 10));
});

zipDownloadBtn.addEventListener('click', () => { if (!zipDownloadBtn.disabled) downloadZip(); });
clearBtn.addEventListener('click', clearAll);
window.addEventListener('beforeunload', revokeAllBlobUrls);

// URLコピーボタン
const shareCopyBtn  = document.getElementById('shareCopyBtn');
const shareCopyIcon = document.getElementById('shareCopyIcon');
const SHARE_URL     = 'https://munika-works.com/tools/ccresizer/';
const ICON_COPY = `<path d="M16 1H4c-1.1 0-2 .9-2 2v14h2V3h12V1zm3 4H8c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h11c1.1 0 2-.9 2-2V7c0-1.1-.9-2-2-2zm0 16H8V7h11v14z"/>`;
const ICON_CHECK = `<path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z"/>`;

let copyTimer = null;
if (shareCopyBtn) {
  shareCopyBtn.addEventListener('click', async () => {
    try {
      await navigator.clipboard.writeText(SHARE_URL);
    } catch {
      // fallback
      const ta = document.createElement('textarea');
      ta.value = SHARE_URL;
      ta.style.cssText = 'position:fixed;opacity:0';
      document.body.appendChild(ta);
      ta.select();
      document.execCommand('copy');
      document.body.removeChild(ta);
    }
    shareCopyBtn.classList.add('is-copied');
    shareCopyBtn.setAttribute('aria-label', 'コピーしました！');
    shareCopyIcon.innerHTML = ICON_CHECK;
    if (copyTimer) clearTimeout(copyTimer);
    copyTimer = setTimeout(() => {
      shareCopyBtn.classList.remove('is-copied');
      shareCopyBtn.setAttribute('aria-label', 'URLをコピー');
      shareCopyIcon.innerHTML = ICON_COPY;
      copyTimer = null;
    }, 2000);
  });
}
