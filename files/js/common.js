/* readyEvent
------------------------------------------------------------------------*/
document.addEventListener("DOMContentLoaded", function (e) {
  // smoothScroll ---------------------------//
  var speed = 1000,
    easing = "swing",
    pcPosition = -0,
    tabPosition = -0,
    spPosition = -0;

  $("a")
    .not(".noscroll")
    .on("click", function () {
      var href = $(this).attr("href"),
        case1 = href.charAt(0) == "#",
        case2 = location.href.split("#")[0] == href.split("#")[0];
      if (case1 || case2) {
        if (case2) href = "#" + href.split("#")[1];

        $target = $(href);

        if ($target.length) {
          $html
            .add($body)
            .not(":animated")
            .animate(
              {
                scrollTop: String(
                  $target.offset().top +
                    (munika.pc
                      ? pcPosition
                      : munika.tab
                      ? tabPosition
                      : spPosition)
                ),
              },
              speed,
              easing
            );

          return false;
        }
      }
    });

// アコーディオン
	//-----------------------------------------------------//
	$('.js-accordion').on('click', function () {
		var has_sp_only = $(this).is('.sp_only');			//sp_onlyクラスを持つか
		var has_tabsp_only = $(this).is('.tab_sp_only');	//tab-sp_onlyクラスを持つか
		var $this = $(this);
		var $next = $this.next();
		var toggle_speed = $(this).attr('data-toggle-speed') == undefined ? 300 : $(this).attr('data-toggle-speed');
		var target_anchor = $(this).attr('data-target-anchor') == undefined ? false : $(this).attr('data-target-anchor');

		if(has_sp_only || has_tabsp_only) {
			var sp_accordion_infoSwiperOn = has_sp_only && abi.sp;
			var tabsp_accordion_infoSwiperOn = has_tabsp_only && !abi.pc;
			if(sp_accordion_infoSwiperOn || tabsp_accordion_infoSwiperOn) {
				if (!$next.is(':animated')) {
					$next.slideToggle(toggle_speed).prev().toggleClass('is-active');
					if(target_anchor == 'true') {
						$('.box_menu').not(':animated').animate({ scrollTop: String($target.offset().top) }, 600, easing);
						return false;
					}
				}
			}
		} else {
			if (!$next.is(':animated')) {
				$next.slideToggle(toggle_speed).prev().toggleClass('is-active');
				if(target_anchor == 'true') {
					$('.box_menu').not(':animated').animate({ scrollTop: String($target.offset().top) }, 600, easing);
					return false;
				}
			}
		}
	});
  /* ハンバーガーメニュー -----------------------------------------------------*/
  $(".openbtn").click(function () {
    //ボタンがクリックされたら
    $(this).toggleClass("btn_active"); //ボタン自身に activeクラスを付与し
    $(".gnav").toggleClass("panelactive"); //ナビゲーションにpanelactiveクラスを付与
  });

  $(".gnav a").click(function () {
    //ナビゲーションのリンクがクリックされたら
    $(".openbtn").removeClass("btn_active"); //ボタンの activeクラスを除去し
    $(".gnav").removeClass("panelactive"); //ナビゲーションのpanelactiveクラスも除去
  });

  /* スクロールヒント -----------------------------------------------------*/
  new ScrollHint(".js-scrollable", {
    i18n: {
      scrollable: "スクロールできます",
    }
  });

  // auto height
  function matchHeight($o, m) {
    $o.css("height", "auto");
    var foo_length = $o.length;
    for (var i = 0; i < Math.ceil(foo_length / m); i++) {
      var maxHeight = 0;
      for (var j = 0; j < m; j++) {
        if ($o.eq(i * m + j).height() > maxHeight) {
          maxHeight = $o.eq(i * m + j).height();
        }
      }
      for (var k = 0; k < m; k++) {
        $o.eq(i * m + k).height(maxHeight);
      }
    }
  }

  /**
   *
   * matchHeightS
   * @param $o { jQueryObjects } - 高さを合わせるターゲット
   * @param $o { m } - 各クエリでの割合　1 で高さを auto 指定
   *
   */
  function matchHeightS($o, m) {
    var _w = Math.floor((100 / m) * 10) / 10;
    var _parent = $o.parent();
    if (m > 1) {
      $o.css("height", "auto");
      if ($o.css("float") != "none") {
        $o.css("width", String(_w) + "%");
      } else if (_parent.css("display") == "flex") {
        $o.css("width", String(_w) + "%");
      }
      var foo_length = $o.length;
      for (var i = 0; i < Math.ceil(foo_length / m); i++) {
        var maxHeight = 0;
        for (var j = 0; j < m; j++) {
          if ($o.eq(i * m + j).height() > maxHeight) {
            maxHeight = $o.eq(i * m + j).height();
          }
        }
        for (var k = 0; k < m; k++) {
          $o.eq(i * m + k).height(maxHeight);
        }
      }
    } else {
      $o.css("height", "auto");
      if ($o.css("float") != "none") {
        $o.css("width", String(_w) + "%");
      } else if (_parent.css("display") == "flex") {
        $o.css("width", String(_w) + "%");
      }
    }
  }
});

