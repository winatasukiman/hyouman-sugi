$("body").delegate("#profile", "click", function(e) {
	document.getElementById("div_profile").style.display = 'block';
	document.getElementById("div_report").style.display = 'none';
	
});
$("body").delegate("#report", "click", function(e) {
	document.getElementById("div_report").style.display = 'block';
	document.getElementById("div_profile").style.display = 'none';
});
//sidenav profile,report, dll
$(".sidenav > .sn-item").click(function() {
	$(".sidenav > .sn-item").removeClass("active");
	$(this).addClass("active");
});
$('.hide').delay(3000).fadeOut(300);