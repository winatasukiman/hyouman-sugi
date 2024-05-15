$("#overall_attendance_view").click(function() {
	$('.active').removeClass('active');
	var element = document.getElementById("overall_attendance_view");
	element.classList.add("active");
	document.getElementById("div_overall_attendance_view").style.display = 'block';
    document.getElementById("div_overall_task_view").style.display = 'none';
});
$("#overall_task_view").click(function() {
	$('.active').removeClass('active');
	var element = document.getElementById("overall_task_view");
	element.classList.add("active");
	document.getElementById("div_overall_attendance_view").style.display = 'none';
    document.getElementById("div_overall_task_view").style.display = 'block';
});