function view_detail_goal_checklist() {
	$('.div_goal_checklist').slideToggle("medium");
	document.getElementById("view_less").style.display = 'block';
	document.getElementById("view_details").style.display = 'none';
}
function view_less_goal_checklist() {
	$('.div_goal_checklist').slideToggle("medium");
	document.getElementById("view_less").style.display = 'none';
	document.getElementById("view_details").style.display = 'block';
}
function view_detail_mission(index) {
	$('.div_mission_detail'+index).slideToggle("medium");
	document.getElementById("view_less"+index).style.display = 'block';
	document.getElementById("view_details"+index).style.display = 'none';
}
function view_less_mission(index) {
	$('.div_mission_detail'+index).slideToggle("medium");
	document.getElementById("view_less"+index).style.display = 'none';
	document.getElementById("view_details"+index).style.display = 'block';
}
// function view_summary(i) {
	// $('#summary'+i).slideToggle("medium");
	// $('#summary2'+i).slideToggle("medium");
// }