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
			document.getElementById("cmp"+class_mission_participants['class_mission_participants_id']).style.display = 'block';
			//alert("cmp"+class_mission_participants['class_mission_participants_id']);
		}else{
			document.getElementById("cmp"+class_mission_participants['class_mission_participants_id']).style.display = 'none';
		}
	});
}
participant(class_mission_participants_first_row['class_mission_participants_id']);
function submit_task_review(class_mission_participants_id) {
	document.getElementById("loading-overlay").style.display = 'block';
	if($('#task_review'+class_mission_participants_id).val() == ""){
		document.getElementById("loading-overlay").style.display = 'none';
		alert("Review can't be empty");
	}else{
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
}
function view_detail_boc(index) {
	$('#div_boc'+index).slideToggle("medium");
	document.getElementById("view_less_boc"+index).style.display = 'block';
	document.getElementById("view_details_boc"+index).style.display = 'none';
}
function view_less_boc(index) {
	$('#div_boc'+index).slideToggle("medium");
	document.getElementById("view_less_boc"+index).style.display = 'none';
	document.getElementById("view_details_boc"+index).style.display = 'block';
}
function check_cmpboc($cmpid,$bocdid){
	var val = 0;
	if ($('#checkbox_cmpboc'+$cmpid+$bocdid).is(":checked")){ val = 1; }
	document.getElementById("loading-overlay").style.display = 'block';
	$.ajax({
        type: 'post',
        url: base_url+'classes/replace_class_mission_participants_bank_of_competencies',
        data: {
            class_mission_participants_id: $cmpid,
            bank_of_competencies_detail_id: $bocdid,
            is_true: val
        },
        success: function(data) {
			document.getElementById("loading-overlay").style.display = 'none';
        }
    });
}