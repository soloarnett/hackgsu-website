function isAndroid(){
	return /Android/i.test(navigator.userAgent);
}

function isApple(){
	return /iPhone|iPad|iPod/i.test(navigator.userAgent);
}

function makeMobile(){
	if (isAndroid() || isApple()) {
		$("*:not(.isMobile)").addClass("isMobile");
	}else{
		$("*.isMobile").removeClass("isMobile");
	}
}





$(document).ready(function(){
	makeMobile();
	window.onresize = makeMobile;
});