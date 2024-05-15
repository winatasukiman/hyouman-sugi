$("body").delegate("#payment", "click", function(e) {
	document.getElementById("div_payment").style.display = 'block';
	document.getElementById("div_nisn").style.display = 'none';
	
});
$("body").delegate("#nisn", "click", function(e) {
	document.getElementById("div_payment").style.display = 'none';
	document.getElementById("div_nisn").style.display = 'block';
});
//sidenav profile,report, dll
$(".sidenav > .sn-item").click(function() {
	$(".sidenav > .sn-item").removeClass("active");
	$(this).addClass("active");
});