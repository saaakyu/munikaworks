<!-- jquery-3.4.1　-->
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

<script>
// config.js
var $body,$page,$changeImg,$doc=$(document),$w=$(window),$html=$("html"),munika={bp_tab:1199,bp_sp:767,pc:"",tab:"",sp:"",pcView:"",tabView:"",spView:"",finish:"",deviceWidth:"",deviceHeight:"",sT:"",ie9:!!$html.hasClass("ie9"),ie8:!!$html.hasClass("ie8"),ie10:!!$html.hasClass("ie10"),ie11:!!$html.hasClass("ie11"),edge:!!$html.hasClass("edge"),ua_mouse:!!$html.hasClass("mouse"),ua_touch:!!$html.hasClass("touch"),ua_phone:!!$html.hasClass("phone")},rwdFunctions={checkValue:function(){munika.deviceWidth=munika.ie8?$w.width():window.innerWidth,munika.deviceHeight=$w.height(),munika.pc=!!(munika.ie8||munika.deviceWidth>munika.bp_tab),munika.tab=!munika.ie8&&munika.deviceWidth<=munika.bp_tab&&munika.deviceWidth>munika.bp_sp,munika.sp=!munika.ie8&&munika.deviceWidth<=munika.bp_sp},fooLoad:function(i){i.each(function(){$(this).attr("src",$(this).data("img"))})},loadImg:function(){munika.finish=!!(munika.pcView&&munika.tabView&&munika.spView),munika.ie8||munika.finish?munika.pcView||(munika.pcView=!0):munika.pc||munika.tab?(munika.pcView&&munika.tabView||rwdFunctions.fooLoad($("img.load_pc-tab")),munika.pc&&!munika.pcView&&(rwdFunctions.fooLoad($("img.load_pc")),munika.pcView=!0),munika.tab&&!munika.tabView&&(rwdFunctions.fooLoad($("img.load_tab-sp")),munika.tabView=!0)):munika.spView||(rwdFunctions.fooLoad($("img.load_sp,img.load_tab-sp")),munika.spView=!0)},changeImg:function(){if(!munika.ie8)for(var i=0;i<=$changeImg.length-1;i++)$changeImg.eq(i).is(".custom")?munika.deviceWidth>$changeImg.eq(i).data("custom")?$changeImg.eq(i).attr("src",$changeImg.eq(i).data("img")):$changeImg.eq(i).attr("src",$changeImg.eq(i).data("img").replace("-before","-after")):$changeImg.eq(i).is(".tab,.all")?$changeImg.eq(i).is(".tab")?munika.pc?$changeImg.eq(i).attr("src",$changeImg.eq(i).data("img")):$changeImg.eq(i).attr("src",$changeImg.eq(i).data("img").replace("-pc","-tab")):$changeImg.eq(i).is(".all")&&(munika.pc?$changeImg.eq(i).attr("src",$changeImg.eq(i).data("img")):munika.tab?$changeImg.eq(i).attr("src",$changeImg.eq(i).data("img").replace("-pc","-tab")):munika.sp&&$changeImg.eq(i).attr("src",$changeImg.eq(i).data("img").replace("-pc","-sp"))):munika.sp?$changeImg.eq(i).attr("src",$changeImg.eq(i).data("img").replace("-pc","-sp")):$changeImg.eq(i).attr("src",$changeImg.eq(i).data("img"))},adjustFsz:function(){munika.sp&&(munika.deviceHeight>munika.deviceWidth?(p=munika.deviceWidth/3.2,$page.css("fontSize",p+"%")):$page.css("fontSize",""))},settingRwd:function(){rwdFunctions.checkValue(),rwdFunctions.changeImg(),rwdFunctions.loadImg(),rwdFunctions.adjustFsz()}};$.fn.superResize=function(i){var a=$.extend({loadAction:!0,resizeAfter:function(){}},i);a.loadAction&&("interactive"!==document.readyState&&"complete"!==document.readyState||a.resizeAfter());var e=!1,t=munika.deviceWidth;return this.resize(function(){!1!==e&&clearTimeout(e),e=setTimeout(function(){t!=munika.deviceWidth&&(a.resizeAfter(),t=munika.deviceWidth)},300)}),this},$.fn.firstLoad=function(i){var a=$.extend({pc:function(){},pc_tab:function(){},tab:function(){},tab_sp:function(){},sp:function(){}},i),e=[];return this.superResize({resizeAfter:function(){setTimeout(function(){1!=e[0]&&munika.pcView&&(a.pc(),e[0]=!0),(1!=e[1]&&munika.pcView||1!=e[1]&&munika.tabView)&&(a.pc_tab(),e[1]=!0),1!=e[2]&&munika.tabView&&(a.tab(),e[2]=!0),(1!=e[3]&&munika.tabView||1!=e[3]&&munika.spView)&&(a.tab_sp(),e[3]=!0),1!=e[4]&&munika.spView&&(a.sp(),e[4]=!0)},200)}}),this},$.fn.hasAttr=function(i){var a=this.attr(i);return void 0!==a&&!1!==a},document.addEventListener("DOMContentLoaded",function(i){$body=$("body"),$page=$("#munika_page"),$changeImg=$("img.change_img"),rwdFunctions.settingRwd(),munika.ie8&&rwdFunctions.fooLoad($("img.change_img,img.load_pc,img.load_pc-tab")),munika.ua_phone||$('a[href^="tel:"]').wrapInner('<span class="tel"></span>').children("span").unwrap(),munika.ua_touch&&$page.find("*").on({touchstart:function(){$(this).addClass("touchstart").removeClass("touchend")},touchend:function(){$(this).addClass("touchend").removeClass("touchstart")}}),$w.on({load:function(){$w.trigger("resize").trigger("scroll")},resize:function(){rwdFunctions.checkValue()},scroll:function(){munika.sT=$w.scrollTop()}}).superResize({loadAction:!1,resizeAfter:function(){rwdFunctions.settingRwd()}})});
</script>
<script src="<?php echo echo_version(LOCATION_FILE.'js/common.min.js',LOCATION_FILE_DIR);?>"></script>