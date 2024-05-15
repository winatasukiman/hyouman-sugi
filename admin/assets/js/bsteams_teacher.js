$('#student_search').keyup(function(){
	// Search text
	var text = $(this).val().toLowerCase();

	// Hide all content class element
	$('.participant').hide();

	// Search 
	$('.participant').each(function(){
		if($(this).text().toLowerCase().indexOf(""+text+"") != -1 ){
		 $(this).closest('.participant').show();
		}
	});
});
$(".sidenav > .sn-item").click(function() {
	$(".sidenav > .sn-item").removeClass("active");
	$(this).addClass("active");
});
$("body").delegate("#strength_capture_from_student", "click", function(e) {
	document.getElementById("div_strength_capture_from_student").style.display = 'block';
	document.getElementById("div_bsteams_from_student").style.display = 'none';
});
$("body").delegate("#bsteams_from_student", "click", function(e) {
	document.getElementById("div_bsteams_from_student").style.display = 'block';
	document.getElementById("div_strength_capture_from_student").style.display = 'none';
});
function participant(index){
	$('.active2').removeClass('active2');
	var element = document.getElementById("participant"+index);
	element.classList.add("active2");
	class_strength_capture.forEach(function(class_strength_capture){
		if(class_strength_capture['class_strength_capture_student_id'] == index){
			document.getElementById("strength_capture"+index).style.display = 'block';
			document.getElementById("bsteams"+index).style.display = 'block';
			document.getElementById("progress_report_content"+index).style.display = 'block';
		}else{
			document.getElementById("strength_capture"+class_strength_capture['class_strength_capture_student_id']).style.display = 'none';
			document.getElementById("bsteams"+class_strength_capture['class_strength_capture_student_id']).style.display = 'none';
			document.getElementById("progress_report_content"+class_strength_capture['class_strength_capture_student_id']).style.display = 'none';
		}
	});
}
participant(class_strength_capture_first_row['class_strength_capture_student_id']);