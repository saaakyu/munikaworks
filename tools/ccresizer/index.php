<?php
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: DENY');
header('Referrer-Policy: strict-origin-when-cross-origin');
header('Content-Type: text/html; charset=UTF-8');
?>

<!DOCTYPE html>
<html lang="ja" prefix="og: https://ogp.me/ns#">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CCResizer — CCFOLIA素材を24pxグリッドに自動リサイズ</title>
  <meta name="description" content="PNG・JPEGをドロップするだけでCCFOLIA（ココフォリア）用PNG・JPEG素材を24pxグリッドに自動変換します。画像はサーバーに送信されず、すべてブラウザ内で処理されます。">
  <meta name="keywords" content="CCFOLIA,ココフォリア,CCResizer,素材リサイズ,24pxグリッド,TRPG,オンラインセッション,画像変換,PNG,透過">
  <meta name="author" content="CCResizer">
  <meta name="robots" content="index, follow">
  <meta property="og:type" content="website">
  <meta property="og:title" content="CCResizer — CCFOLIA素材を24pxグリッドに自動リサイズ">
  <meta property="og:description" content="PNG・JPEGをドロップするだけ。CCFOLIA（ココフォリア）の24pxグリッドに合わせて自動変換。透過PNG出力・ZIP一括DL対応。">
  <meta property="og:url" content="https://example.com/tools/ccresizer/">
  <meta property="og:locale" content="ja_JP">
  <meta property="og:site_name" content="CCResizer">
  <meta name="twitter:card" content="summary">
  <meta name="twitter:title" content="CCResizer — CCFOLIA素材リサイズツール">
  <meta name="twitter:description" content="PNG・JPEGをドロップするだけで24pxグリッドに自動変換。ブラウザ完結・無料。">
  <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "WebApplication",
      "name": "CCResizer",
      "description": "CCFOLIA用素材画像を24pxグリッドに合わせてリサイズするブラウザ完結型ツール",
      "applicationCategory": "UtilitiesApplication",
      "operatingSystem": "Any",
      "offers": {
        "@type": "Offer",
        "price": "0",
        "priceCurrency": "JPY"
      },
      "inLanguage": "ja"
    }
  </script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&family=Zen+Maru+Gothic:wght@300..900&display=swap" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js" defer></script>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="app-wrapper">

    <!-- HEADER -->
    <header class="app-header" role="banner">
      <div class="header-brand">
        <span class="header-logo" aria-hidden="true">🎲</span>
        <div>
          <h1 class="header-title">CCResizer</h1>
          <p class="header-subtitle">CCFOLIA素材を24pxグリッドに自動変換</p>
        </div>
      </div>

      <!-- SNSシェアボタン -->
      <div class="share-buttons" role="group" aria-label="SNSでシェア">
        <span class="share-label">シェア</span>
        <a class="share-btn share-btn--x"
           href="https://twitter.com/intent/tweet?text=CCFOLIA%E3%81%AE%E9%83%A8%E5%B1%8B%E7%B4%A0%E6%9D%90%E3%82%9224px%3D1%E3%83%9E%E3%82%B9%E3%81%AB%E8%87%AA%E5%8B%95%E5%A4%89%E6%8F%9B%EF%BC%81%E7%84%A1%E6%96%99%E3%83%96%E3%83%A9%E3%82%A6%E3%82%B6%E3%83%84%E3%83%BC%E3%83%AB%20%23CCResizer&url=https%3A%2F%2Fmunika-works.com%2Ftools%2Fccresizer%2F"
           target="_blank" rel="noopener noreferrer" aria-label="Xでシェア" title="Xでシェア">
          <svg class="share-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.744l7.73-8.835L1.254 2.25H8.08l4.261 5.635L18.244 2.25zm-1.161 17.52h1.833L7.084 4.126H5.117L17.083 19.77z"/></svg>
        </a>
        <a class="share-btn share-btn--bsky"
           href="https://bsky.app/intent/compose?text=CCFOLIA%E3%81%AE%E9%83%A8%E5%B1%8B%E7%B4%A0%E6%9D%90%E3%82%9224px%3D1%E3%83%9E%E3%82%B9%E3%81%AB%E8%87%AA%E5%8B%95%E5%A4%89%E6%8F%9B%EF%BC%81%E7%84%A1%E6%96%99%E3%83%96%E3%83%A9%E3%82%A6%E3%82%B6%E3%83%84%E3%83%BC%E3%83%AB%20%23CCResizer%20https%3A%2F%2Fmunika-works.com%2Ftools%2Fccresizer%2F"
           target="_blank" rel="noopener noreferrer" aria-label="Blueskyでシェア" title="Blueskyでシェア">
          <svg class="share-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M12 10.8c-1.087-2.114-4.046-6.053-6.798-7.995C2.566.944 1.561 1.266.902 1.565.139 1.908 0 3.08 0 3.768c0 .69.378 5.65.624 6.479.815 2.736 3.713 3.66 6.383 3.364.136-.02.275-.039.415-.056-.138.022-.276.04-.415.056-3.912.58-7.387 2.005-2.83 7.078 5.013 5.19 6.87-1.113 7.823-4.308.953 3.195 2.05 9.271 7.733 4.308 4.267-4.308 1.172-6.498-2.74-7.078a8.741 8.741 0 0 1-.415-.056c.14.017.279.036.415.056 2.67.297 5.568-.628 6.383-3.364.246-.828.624-5.79.624-6.478 0-.69-.139-1.861-.902-2.206-.659-.298-1.664-.62-4.3 1.24C16.046 4.748 13.087 8.687 12 10.8Z"/></svg>
        </a>
        <a class="share-btn share-btn--fb"
           href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fmunika-works.com%2Ftools%2Fccresizer%2F"
           target="_blank" rel="noopener noreferrer" aria-label="Facebookでシェア" title="Facebookでシェア">
          <svg class="share-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
        </a>
        <a class="share-btn share-btn--line"
           href="https://social-plugins.line.me/lineit/share?url=https%3A%2F%2Fmunika-works.com%2Ftools%2Fccresizer%2F&text=CCFOLIA%E3%81%AE%E9%83%A8%E5%B1%8B%E7%B4%A0%E6%9D%90%E3%82%9224px%3D1%E3%83%9E%E3%82%B9%E3%81%AB%E8%87%AA%E5%8B%95%E5%A4%89%E6%8F%9B%EF%BC%81%E7%84%A1%E6%96%99%E3%83%96%E3%83%A9%E3%82%A6%E3%82%B6%E3%83%84%E3%83%BC%E3%83%AB%20%23CCResizer"
           target="_blank" rel="noopener noreferrer" aria-label="LINEでシェア" title="LINEでシェア">
          <svg class="share-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M19.365 9.863c.349 0 .63.285.63.631 0 .345-.281.63-.63.63H17.61v1.125h1.755c.349 0 .63.283.63.63 0 .344-.281.629-.63.629h-2.386c-.345 0-.627-.285-.627-.629V8.108c0-.345.282-.63.63-.63h2.386c.346 0 .627.285.627.63 0 .349-.281.63-.63.63H17.61v1.125h1.755zm-3.855 3.016c0 .27-.174.51-.432.596-.064.021-.133.031-.199.031-.211 0-.391-.09-.51-.25l-2.443-3.317v2.94c0 .344-.279.629-.631.629-.346 0-.626-.285-.626-.629V8.108c0-.27.173-.51.43-.595.06-.023.136-.033.194-.033.195 0 .375.104.495.254l2.462 3.33V8.108c0-.345.282-.63.63-.63.345 0 .63.285.63.63v4.771zm-5.741 0c0 .344-.282.629-.631.629-.345 0-.627-.285-.627-.629V8.108c0-.345.282-.63.63-.63.346 0 .628.285.628.63v4.771zm-2.466.629H4.917c-.345 0-.63-.285-.63-.629V8.108c0-.345.285-.63.63-.63.348 0 .63.285.63.63v4.141h1.756c.348 0 .629.283.629.63 0 .344-.281.629-.629.629M24 10.314C24 4.943 18.615.572 12 .572S0 4.943 0 10.314c0 4.811 4.27 8.842 10.035 9.608.391.082.923.258 1.058.59.12.301.079.766.038 1.08l-.164 1.02c-.045.301-.24 1.186 1.049.645 1.291-.539 6.916-4.078 9.436-6.975C23.176 14.393 24 12.458 24 10.314"/></svg>
        </a>
        <button class="share-btn share-btn--copy" id="shareCopyBtn" type="button" aria-label="URLをコピー" title="URLをコピー">
          <svg class="share-icon" id="shareCopyIcon" viewBox="0 0 24 24" aria-hidden="true"><path d="M16 1H4c-1.1 0-2 .9-2 2v14h2V3h12V1zm3 4H8c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h11c1.1 0 2-.9 2-2V7c0-1.1-.9-2-2-2zm0 16H8V7h11v14z"/></svg>
        </button>
      </div>

    </header>

    <main class="app-main" role="main">

      <!-- ① ツール紹介（常時表示） -->
      <section class="intro-section" aria-labelledby="intro-heading">
        <div class="intro-inner">

          <div>
            <h2 id="intro-heading" class="intro-title">
              <span aria-hidden="true">📦</span> このツールについて
            </h2>
            <p class="intro-body">
              CCResizer（ココリサイザー）は、TRPGオンラインセッションツール<strong>CCFOLIA</strong>用の素材画像をゲーム内グリッド（24px&nbsp;=&nbsp;1マス）に合わせたサイズへブラウザ上で自動変換するツールです。<br>
              アップロードした画像はサーバーへ送信されず、<strong>すべてお使いのブラウザ内で処理</strong>されます。
            </p>
          </div>
        </div>
      </section>

      <!-- ② エラーバナー（JS制御） -->
      <div class="error-banner" id="errorBanner" role="alert" aria-live="assertive" hidden>
        <span class="error-banner-icon" aria-hidden="true">⚠️</span>
        <span class="error-banner-text" id="errorBannerText"></span>
        <button class="error-banner-clear-now" id="errorBannerClearNow" type="button" hidden>🗑️ 今すぐクリア</button>
        <button class="error-banner-close" id="errorBannerClose" type="button" aria-label="エラーを閉じる">✕</button>
      </div>

      <!-- ③ 設定セクション -->
      <section class="settings-section" aria-labelledby="settings-heading">
        <h2 id="settings-heading" class="section-title">
          <span aria-hidden="true">⚙️</span> 変換設定
        </h2>
        <div class="wrap-mode-selector">

          <div class="mode-selector" role="group" aria-label="比率モード選択">
            <div class="mode-buttons" id="modeButtons">
              <button class="mode-btn active" data-mode="1:1" aria-pressed="true" type="button"
                title="長辺に合わせて正方形に変換">
                <span class="mode-btn-emoji" aria-hidden="true">⬛</span>
                1:1 <span class="mode-btn-desc">正方形</span>
              </button>
              <button class="mode-btn" data-mode="free" aria-pressed="false" type="button"
                title="標準比率リストから余白が最小になる汎用比率に自動変換">
                <span class="mode-btn-emoji" aria-hidden="true">📏</span>
                汎用比率
              </button>
            </div>
          </div>
          <p class="mode-desc" id="modeDesc" aria-live="polite"></p>

          <div class="dropzone" id="dropzone" role="button" tabindex="0"
            aria-label="PNG・JPEGファイルをドラッグ＆ドロップ、またはクリックして選択"
            aria-describedby="dropzone-hint">
            <input type="file" id="fileInput" accept=".png,.jpg,.jpeg,image/png,image/jpeg"
              multiple class="file-input" aria-hidden="true" tabindex="-1">
            <div class="dropzone-content">
              <span class="dropzone-icon" aria-hidden="true">🖼️</span>
              <p class="dropzone-text">
                PNG・JPEGをドラッグ&amp;ドロップ
                <span class="dropzone-subtext">またはクリックして選択</span>
              </p>
              <p id="dropzone-hint" class="dropzone-hint">
                📁 PNG・JPEG対応　🔢 一度に50枚まで　⚖️ 上限5MB/枚　↔️ 4000px超は自動縮小
              </p>
            </div>
          </div>
        </div>
      </section>

      <!-- ④ 処理中インジケーター -->
      <div class="processing-indicator" id="processingIndicator" role="status" aria-live="polite" hidden>
        <span class="spinner" aria-hidden="true"></span>
        <span>変換中... 🔄</span>
      </div>

      <!-- ⑤ 変換結果セクション（常時表示） -->
      <section class="results-section" id="resultsSection" aria-labelledby="results-heading" aria-live="polite">
        <div class="results-header" id="resultsHeader">
          <h2 id="results-heading" class="results-count"></h2>
          <div class="results-actions" id="resultsActions" hidden>
            <button class="btn btn-primary" id="zipDownloadBtn" type="button" aria-label="全画像をZIPでダウンロード">
              <span aria-hidden="true">📦</span> ZIP一括ダウンロード
            </button>
            <button class="btn btn-ghost" id="clearBtn" type="button" aria-label="変換結果をすべてクリア">
              <span aria-hidden="true">🗑️</span> クリア
            </button>
          </div>
        </div>

        <!-- 空状態 -->
        <div class="results-empty" id="resultsEmpty">
          <p class="results-empty-icon" aria-hidden="true">🎨</p>
          <p class="results-empty-title">変換した画像がここに表示されます</p>
          <p class="results-empty-body">上のエリアからファイルを追加してください</p>
        </div>

        <!-- 画像グリッド -->
        <div class="image-grid" id="imageGrid" role="list" aria-label="変換済み画像一覧"></div>
      </section>

      <!-- ⑥ ガイドカード（ページ下部・常時表示） -->
      <aside class="guide-section" aria-labelledby="guide-heading">
        <h2 id="guide-heading" class="section-title">
          <span aria-hidden="true">📖</span> 使い方・仕様
        </h2>
        <p class="guide-body">アップロードした画像は<strong>すべてブラウザ内で処理</strong>されるため、誰かに見られたり使用される心配はありません。</p>

        <div class="guide-cards" role="list">
          <div class="guide-card guide-card--format" role="listitem">
            <span class="guide-card-icon" aria-hidden="true">🖼️</span>
            <div>
              <p class="guide-card-title">対応フォーマット</p>
              <p class="guide-card-body">
                PNG・JPEG（JPG）を受け付けます。<br>
                <strong>出力はすべて透過PNG</strong>で保存されます。JPEGでも背景が透明な余白付きPNGに変換されます。
              </p>
            </div>
          </div>

          <div class="guide-card guide-card--grid" role="listitem">
            <span class="guide-card-icon" aria-hidden="true">📐</span>
            <div>
              <p class="guide-card-title">グリッド変換のしくみ</p>
              <p class="guide-card-body">
                画像の縦・横を<strong>24pxの倍数</strong>に揃えます。<br>サイズ不足分は透明余白で中央揃えします。
              </p>
            </div>
          </div>

          <div class="guide-card guide-card--mode" role="listitem">
            <span class="guide-card-icon" aria-hidden="true">⚙️</span>
            <div>
              <p class="guide-card-title">比率モードの選び方</p>
              <p class="guide-card-body">
                <strong>⬛ 1:1（正方形）</strong> 長辺に合わせて正方形にします。<br>
                <strong>📏 汎用比率</strong> 画像に合わせて 1:1 / 2:1 / 1:2 / 3:2 / 2:3 / 4:3 / 3:4 / 16:9 / 9:16 / 3:1 / 1:3 / 4:1 / 1:4 のいずれかの比率に自動スナップします。24pxのグリッドに合わせているため、CCFOLIA上での操作時も縦横比がずれません。
              </p>
            </div>
          </div>

          <div class="guide-card guide-card--limit" role="listitem">
            <span class="guide-card-icon" aria-hidden="true">⚠️</span>
            <div>
              <p class="guide-card-title">制限事項</p>
              <p class="guide-card-body">
                📁 対応形式：<strong>PNG・JPEG のみ</strong><br>
                🔢 アップロード上限：<strong>50枚まで</strong><br>
                ⚖️ ファイルサイズ上限：<strong>5MB / 枚</strong><br>
                ↔️ 画像サイズ上限：<strong>4000px</strong>（超過は自動縮小）<br>
                📏 最小サイズ：<strong>24px × 24px</strong> 以上が必要
              </p>
            </div>
          </div>
        </div>
      </aside>

      <!--広告-->
      <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5572139182578733"
        crossorigin="anonymous"></script>
      <ins class="adsbygoogle"
        style="display:block; text-align:center;"
        data-ad-layout="in-article"
        data-ad-format="fluid"
        data-ad-client="ca-pub-5572139182578733"
        data-ad-slot="8100654438"></ins>
      <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
      </script>
    </main>
    <!--広告ここまで-->

    <!-- FOOTER -->
    <footer class="app-footer" role="contentinfo">
      <p>🎲 CCResizer &mdash; CCFOLIA素材リサイズツール</p>
      <a class="copyright" href="../../../">© munika-works.com</a>
    </footer>

  </div>
  <script src="app.js"></script>
</body>

</html>