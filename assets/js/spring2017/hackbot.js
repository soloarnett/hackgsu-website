var windowWidth = parent.document.body.clientWidth;

function resize(){
	makeMobile();
	windowWidth = parent.document.body.clientWidth;
	if (windowWidth < 830) {
		$("*:not(.isMobile)").addClass("isMobile");
	}
	// console.log('working');
}




$(document).ready(function(){
	// onLoad();
	window.onresize = resize;
	resize();
	// makeMobile();
});