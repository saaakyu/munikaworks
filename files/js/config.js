/* Settings
------------------------------------------------------------------------*/

// jQueryObjects
var $doc = $(document),
	$w = $(window),
	$html = $('html'),
	$body,
	$page,
	$changeImg

// commonSettings
var munika = {
	bp_tab: 1199,
	bp_sp: 767,
	pc: '',
	tab: '',
	sp: '',
	pcView: '',
	tabView: '',
	spView: '',
	finish: '',
	deviceWidth: '',
	deviceHeight: '',
	sT: '',
	ie9: ($html.hasClass('ie9')) ? true : false,
	ie8: ($html.hasClass('ie8')) ? true : false,
	ie10: ($html.hasClass('ie10')) ? true : false,
	ie11: ($html.hasClass('ie11')) ? true : false,
	edge: ($html.hasClass('edge')) ? true : false,
	ua_mouse: ($html.hasClass('mouse')) ? true : false,
	ua_touch: ($html.hasClass('touch')) ? true : false,
	ua_phone: ($html.hasClass('phone')) ? true : false
}


/* Functions & Plugins
------------------------------------------------------------------------*/

// rwdFunctions
var rwdFunctions = {
	// checkValue
	checkValue: function () {
		munika.deviceWidth = (munika.ie8) ? $w.width() : window.innerWidth,
			munika.deviceHeight = $w.height(),
			munika.pc = (munika.ie8 || munika.deviceWidth > munika.bp_tab) ? true : false,
			munika.tab = (!munika.ie8 && munika.deviceWidth <= munika.bp_tab && munika.deviceWidth > munika.bp_sp) ? true : false,
			munika.sp = (!munika.ie8 && munika.deviceWidth <= munika.bp_sp) ? true : false;
	},
	// fooLoad
	fooLoad: function ($o) {
		$o.each(function () { $(this).attr('src', $(this).data('img')); });
	},
	// loadImg
	loadImg: function () {
		munika.finish = (munika.pcView && munika.tabView && munika.spView) ? true : false;
		if (!munika.ie8 && !munika.finish) {
			if (munika.pc || munika.tab) {
				if (!munika.pcView || !munika.tabView) {
					rwdFunctions.fooLoad($('img.load_pc-tab'));
				}
				if (munika.pc && !munika.pcView) {
					rwdFunctions.fooLoad($('img.load_pc'));
					munika.pcView = true;
				}
				if (munika.tab && !munika.tabView) {
					rwdFunctions.fooLoad($('img.load_tab-sp'));
					munika.tabView = true;
				}
			} else if (!munika.spView) {
				rwdFunctions.fooLoad($('img.load_sp,img.load_tab-sp'));
				munika.spView = true;
			}
		} else if (!munika.pcView) {
			munika.pcView = true;
		}
	},
	// changeImg
	changeImg: function () {
		if (!munika.ie8) {
			for (var i = 0; i <= $changeImg.length - 1; i++) {
				if ($changeImg.eq(i).is('.custom')) {

					if (munika.deviceWidth > $changeImg.eq(i).data('custom')) $changeImg.eq(i).attr('src', $changeImg.eq(i).data('img'));
					else $changeImg.eq(i).attr('src', $changeImg.eq(i).data('img').replace('-before', '-after'));

				} else if (!$changeImg.eq(i).is('.tab,.all')) {

					if (!munika.sp) $changeImg.eq(i).attr('src', $changeImg.eq(i).data('img'));
					else $changeImg.eq(i).attr('src', $changeImg.eq(i).data('img').replace('-pc', '-sp'));

				} else if ($changeImg.eq(i).is('.tab')) {

					if (munika.pc) $changeImg.eq(i).attr('src', $changeImg.eq(i).data('img'));
					else $changeImg.eq(i).attr('src', $changeImg.eq(i).data('img').replace('-pc', '-tab'));

				} else if ($changeImg.eq(i).is('.all')) {

					if (munika.pc) $changeImg.eq(i).attr('src', $changeImg.eq(i).data('img'));
					else if (munika.tab) $changeImg.eq(i).attr('src', $changeImg.eq(i).data('img').replace('-pc', '-tab'));
					else if (munika.sp) $changeImg.eq(i).attr('src', $changeImg.eq(i).data('img').replace('-pc', '-sp'));

				}
			}
		}
	},
	// adjustFsz
	adjustFsz: function () {
		if (munika.sp) {
			if (munika.deviceHeight > munika.deviceWidth) {
				p = munika.deviceWidth / 3.2;
				$page.css('fontSize', p + '%');
			} else {
				$page.css('fontSize', '');
			}
		}
	},
	// settingRwd
	settingRwd: function () {
		rwdFunctions.checkValue();
		rwdFunctions.changeImg();
		rwdFunctions.loadImg();
		rwdFunctions.adjustFsz();
	}
}

// superResize
$.fn.superResize = function (options) {
	var defaults = {
		loadAction: true,
		resizeAfter: function () { }
	};
	var setting = $.extend(defaults, options);

	if (setting.loadAction)
		if (document.readyState === 'interactive' || document.readyState === 'complete') {
			setting.resizeAfter();
		}

	var timer = false,
		w = munika.deviceWidth;

	this.resize(function () {
		if (timer !== false) clearTimeout(timer);
		timer = setTimeout(function () {
			if (w != munika.deviceWidth) {
				setting.resizeAfter();
				w = munika.deviceWidth;
			}
		}, 300);
	});
	return (this);
};

// firstLoad
$.fn.firstLoad = function (options) {
	var defaults = {
		pc: function () { },
		pc_tab: function () { },
		tab: function () { },
		tab_sp: function () { },
		sp: function () { }
	};
	var setting = $.extend(defaults, options);

	var first = [];

	this.superResize({
		resizeAfter: function () {
			setTimeout(function () {
				if (first[0] != true && munika.pcView) {
					setting.pc();
					first[0] = true;
				}
				if (first[1] != true && munika.pcView || first[1] != true && munika.tabView) {
					setting.pc_tab();
					first[1] = true;
				}
				if (first[2] != true && munika.tabView) {
					setting.tab();
					first[2] = true;
				}
				if (first[3] != true && munika.tabView || first[3] != true && munika.spView) {
					setting.tab_sp();
					first[3] = true;
				}
				if (first[4] != true && munika.spView) {
					setting.sp();
					first[4] = true;
				}
			}, 200);
		}
	});

	return (this);
};

//hasAttr
$.fn.hasAttr = function (name) {
	var attr = this.attr(name);
	if (typeof attr !== 'undefined' && attr !== false)
		return true;
	else
		return false;
}

/* readyEvent
------------------------------------------------------------------------*/
document.addEventListener("DOMContentLoaded", function (e) {
	
	// Settings ------------------------------//
	$body = $('body'),
		$page = $('#munika_page'),
		$changeImg = $('img.change_img');

	rwdFunctions.settingRwd();

	// ie8Img ---------------------------------//
	if (munika.ie8) rwdFunctions.fooLoad($('img.change_img,img.load_pc,img.load_pc-tab'));

	// telCancel ------------------------------//
	if (!munika.ua_phone) $('a[href^="tel:"]').wrapInner('<span class="tel"></span>').children('span').unwrap();

	// touching -------------------------------//
	if (munika.ua_touch) {
		$page.find('*').on({
			'touchstart': function () {
				$(this).addClass('touchstart').removeClass('touchend');
			},
			'touchend': function () {
				$(this).addClass('touchend').removeClass('touchstart');
			}
		});
	}
	// load & resize & scroll -----------------//
	$w.on({
		'load': function () {
			$w.trigger('resize').trigger('scroll');
		},
		'resize': function () {
			rwdFunctions.checkValue();
		},
		'scroll': function () {
			munika.sT = $w.scrollTop();
		}
	}).superResize({
		loadAction: false,
		resizeAfter: function () {
			rwdFunctions.settingRwd();
		}
	})
});