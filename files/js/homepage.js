
/* Settings 
------------------------------------------------------------------------*/




/* Functions
------------------------------------------------------------------------*/




/* readyEvent 
------------------------------------------------------------------------*/
document.addEventListener("DOMContentLoaded", function (e) {	
	/* load & resize & scroll & firstLoad
	------------------------------------------------------------------------*/
	$w.on({
		// load
		'load': function () {
		},
		//scroll	
		'scroll': function () {
		}
	}).superResize({
		//resize
		loadAction: false,
		resizeAfter: function () {
		}
	}).firstLoad({
		//firstLoad
		pc_tab: function () {
		},
		sp: function () {
		}
	});
});