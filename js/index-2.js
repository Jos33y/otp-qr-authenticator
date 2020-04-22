$(window).on("hashchange", function(){
	if(location.hash.slice(1)=="qrcode"){
		$(".card").addClass("extend");
		$("#otpcode").removeClass("selected");
		$("#qrcode").addClass("selected");
	} else {
		$(".card").removeClass("extend");
		$("#otpcode").addClass("selected");
		$("#qrcode").removeClass("selected");
	}
});
$(window).trigger("hashchange");