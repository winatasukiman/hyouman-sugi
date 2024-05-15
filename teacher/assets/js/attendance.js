//search student
$('#student_search').keyup(function(){
	// Search text
	var text = $(this).val().toLowerCase();

	// Hide all content class element
	$('.div_student').hide();

	// Search 
	$('.div_student').each(function(){
		if($(this).text().toLowerCase().indexOf(""+text+"") != -1 ){
		 $(this).closest('.div_student').show();
		}
	});
});
function mission(index){
	// $('.active').removeClass('active');
	// var element = document.getElementById("mission"+index);
	// element.classList.add("active");
	document.getElementById("div_mission").style.display = 'block';
	document.getElementById("div_overall_view").style.display = 'none';
	class_mission.forEach(function(class_mission){
		if(class_mission['mission_id'] == index){
			document.getElementById("div_mission"+index).style.display = 'block';
		}else{
			document.getElementById("div_mission"+class_mission['mission_id']).style.display = 'none';
		}
	});
}
mission(class_mission_first_row['mission_id']);
$("#overall_view").click(function() {
	$('.active').removeClass('active');
	var element = document.getElementById("overall_view");
	element.classList.add("active");
	document.getElementById("div_mission").style.display = 'none';
	document.getElementById("div_overall_view").style.display = 'block';
});
function handleClick(index,cb) {
  // display("Clicked, new value = " + cb.checked);
  // display("Clicked, CMPID = " + index);
	document.getElementById("loading-overlay").style.display = 'block';
	$.ajax({
		type: 'post',
		url: base_url+'classes/update_attendance',
		data: {
			class_mission_participants_id: index,
			checked: cb.checked
		},
		success: function(data) {
			document.getElementById("loading-overlay").style.display = 'none';
		}
	});
}
// function display(msg) {
  // var p = document.createElement('p');
  // p.innerHTML = msg;
  // document.body.appendChild(p);
// }
function add_link(index) {
	document.getElementById("loading-overlay").style.display = 'block';
	var countCML = 0;
	var linkname = [];
	var linkvideo = [];
	$.ajax({
        type: 'post',
        url: base_url+'classes/get_count_class_mission_link_by_class_mission_id',
        data: {
            class_mission_id: index
        },
        success: function(data) {
			countCML = data;
			for(var i=0;i < countCML;i++){
				linkname.push($('#name'+index+i).val());
				linkvideo.push($('#link'+index+i).val());
			}
			console.log(linkname);
			console.log(linkvideo);
			$.ajax({
				type: 'post',
				url: base_url+'classes/update_class_mission_link',
				data: {
					class_mission_id: index,
					linkname: linkname,
					linkvideo: linkvideo
				},
				success: function(data) {
					$.ajax({
						type: 'post',
						url: base_url+'classes/insert_class_mission_link',
						data: {
							class_mission_id: index
						},
						success: function(data) {
							document.getElementById("loading-overlay").style.display = 'none';
							$( "#div_class_mission_link"+index ).load(window.location.href + " #div_class_mission_link"+index );
						}
					});
				}
			});
        }
    });
	
}
