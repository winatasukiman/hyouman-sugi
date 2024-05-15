//search student
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
function participant(index){
	$('.active').removeClass('active');
	var element = document.getElementById("participant"+index);
	element.classList.add("active");
	document.getElementById("div_cmp").style.display = 'block';
	class_mission_participants.forEach(function(class_mission_participants){
		if(class_mission_participants['class_mission_participants_id'] == index){
			document.getElementById("cmp"+index).style.display = 'block';
		}else{
			document.getElementById("cmp"+class_mission_participants['class_mission_participants_id']).style.display = 'none';
		}
	});
}
participant(class_mission_participants_first_row['class_mission_participants_id']);
function submit_task_review(class_mission_participants_id) {
	document.getElementById("loading-overlay").style.display = 'block';
	$.ajax({
		type: 'post',
		url: base_url+'classes/update_task_review',
		data: {
			class_mission_participants_id: class_mission_participants_id,
			task_review: $('#task_review'+class_mission_participants_id).val()
		},
		success: function(data) {
			document.getElementById("loading-overlay").style.display = 'none';
			alert(data);
			$( "#cmp"+class_mission_participants_id ).load(window.location.href + " #cmp"+class_mission_participants_id );
		}
	});
}
