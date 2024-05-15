$("body").delegate("#my_class", "click", function(e) {
	document.getElementById("div_my_class").style.display = 'block';
	document.getElementById("div_task").style.display = 'none';
	document.getElementById("div_all_class").style.display = 'none';
	document.getElementById("search_class").style.display = 'block';
	document.getElementById("div_strength").style.display = 'none';
	document.getElementById("add_strength").style.display = 'none';
});
$("body").delegate("#task", "click", function(e) {
	document.getElementById("div_task").style.display = 'block';
	document.getElementById("div_my_class").style.display = 'none';
	//document.getElementById("div_all_class").style.display = 'none';
	document.getElementById("search_class").style.display = 'block';
	document.getElementById("div_strength").style.display = 'none';
	document.getElementById("add_strength").style.display = 'none';
});
$("body").delegate("#all_class", "click", function(e) {
	document.getElementById("div_all_class").style.display = 'block';
	document.getElementById("div_task").style.display = 'none';
	document.getElementById("div_my_class").style.display = 'none';
	document.getElementById("search_class").style.display = 'block';
	document.getElementById("search_class").style.display = 'block';
	document.getElementById("div_strength").style.display = 'none';
	document.getElementById("add_strength").style.display = 'none';
});
$("body").delegate("#strength", "click", function(e) {
	//document.getElementById("div_all_class").style.display = 'block';
	document.getElementById("div_task").style.display = 'none';
	document.getElementById("div_my_class").style.display = 'none';
	document.getElementById("search_class").style.display = 'block';
	document.getElementById("search_class").style.display = 'none';
	document.getElementById("div_strength").style.display = 'block';
	document.getElementById("add_strength").style.display = 'block';
});
// $("body").delegate("#all_class", "click", function(e) {
	// document.getElementById("div_all_class").style.display = 'block';
	// document.getElementById("div_task").style.display = 'none';
	// document.getElementById("div_my_class").style.display = 'none';
	// document.getElementById("search_class").style.display = 'none';
	// document.getElementById("div_strength").style.display = 'none';
	// document.getElementById("add_strength").style.display = 'none';
// });
//sidenav profile,report, dll
$(".sidenav > .sn-item").click(function() {
	$(".sidenav > .sn-item").removeClass("active");
	$(this).addClass("active");
});
//search class
$('#class_search').keyup(function(){
	// Search text
	var text = $(this).val().toLowerCase();

	// Hide all content class element
	$('.class_content').hide();

	// Search 
	$('.class_content').each(function(){
		if($(this).text().toLowerCase().indexOf(""+text+"") != -1 ){
		 $(this).closest('.class_content').show();
		}
	});
});
// Hide FlashData message
		$('.hide').delay(3000).fadeOut(300);