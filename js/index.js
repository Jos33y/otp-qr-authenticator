$(window).on("hashchange", function(){
	if(location.hash.slice(1)=="register"){
		$(".card").addClass("extend");
		$("#login").removeClass("selected");
		$("#register").addClass("selected");
	} else {
		$(".card").removeClass("extend");
		$("#login").addClass("selected");
		$("#register").removeClass("selected");
	}
});
$(window).trigger("hashchange");

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

