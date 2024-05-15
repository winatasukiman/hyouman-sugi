//Untuk mission 1 - 8
var i = 1;
var arr_i = [];
function add_mission() {
	document.getElementById("loading-overlay").style.display = 'block';
	class_mission.forEach(function(class_mission){
		arr_i.push(class_mission['mission_id']);
	});
	console.log(arr_i.length);
	var last_index = parseInt(arr_i[arr_i.length - 1]);
	$.ajax({
		type: 'post',
		url: base_url+'classes/insert_class_mission_id',
		data: {
			class_id: $('#class_id').val(),
			mission_id: last_index+1
		},
		success: function(data) {
			//console.log(data);
			document.getElementById("loading-overlay").style.display = 'none';
			location.reload();
		}
	});
	arr_i = [];
}
function removeRow(input,index) {
	removeArrbyVal(arr_i,index);
	document.getElementById('mission').removeChild(input.parentNode);
	console.log(arr_i);
}
function removeArrbyVal(arr) {
    var what, a = arguments, L = a.length, ax;
    while (L > 1 && arr.length) {
        what = a[--L];
        while ((ax= arr.indexOf(what)) !== -1) {
            arr.splice(ax, 1);
        }
    }
    return arr;
}
var today = new Date();
var date = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();
var time = today.getHours() + ':' + today.getMinutes();
var datetime = date + ' ' + time;
$('#schedule').datetimepicker({
	format: "dd MM yyyy - hh:ii",
	showMeridian: 0,
	autoclose: true,
	todayBtn: true,
	keyboardNavigation: true,
	minuteStep: 5,
	startDate: datetime,
	orientation: "top"
	//endDate: "17 01 2021 - 00:00"
});
$('.publish_datetime_dt').datetimepicker({
	format: "dd MM yyyy - hh:ii",
	showMeridian: 0,
	autoclose: true,
	todayBtn: true,
	keyboardNavigation: true,
	minuteStep: 5,
	startDate: datetime
	//endDate: "17 01 2021 - 00:00"
});
$('.task_deadline_dt').datetimepicker({
	format: "dd MM yyyy - hh:ii",
	showMeridian: 0,
	autoclose: true,
	todayBtn: true,
	keyboardNavigation: true,
	minuteStep: 5,
	startDate: datetime
	//endDate: "17 01 2021 - 00:00"
});
$("#class_introduction").click(function() {
	$('.active').removeClass('active');
	var element = document.getElementById("class_introduction");
	element.classList.add("active");
	document.getElementById("div_class_introduction").style.display = 'block';
	document.getElementById("div_goal_checklist").style.display = 'none';
	document.getElementById("div_mission").style.display = 'none';
	document.getElementById("div_class_setting").style.display = 'none';
});
$("#goal_checklist").click(function() {
	$('.active').removeClass('active');
	var element = document.getElementById("goal_checklist");
	element.classList.add("active");
	document.getElementById("div_goal_checklist").style.display = 'block';
	document.getElementById("div_class_introduction").style.display = 'none';
	document.getElementById("div_mission").style.display = 'none';
	document.getElementById("div_class_setting").style.display = 'none';
});
$("#class_setting").click(function() {
	$('.active').removeClass('active');
	var element = document.getElementById("class_setting");
	element.classList.add("active");
	document.getElementById("div_goal_checklist").style.display = 'none';
	document.getElementById("div_class_introduction").style.display = 'none';
	document.getElementById("div_mission").style.display = 'none';
	document.getElementById("div_class_setting").style.display = 'block';
});
function mission(index){
	$('.active').removeClass('active');
	var element = document.getElementById("mission"+index);
	element.classList.add("active");
	document.getElementById("div_goal_checklist").style.display = 'none';
	document.getElementById("div_class_introduction").style.display = 'none';
	document.getElementById("div_mission").style.display = 'block';
	document.getElementById("div_class_setting").style.display = 'none';
	class_mission.forEach(function(class_mission){
		if(class_mission['mission_id'] == index){
			document.getElementById("div_mission"+index).style.display = 'block';
		}else{
			document.getElementById("div_mission"+class_mission['mission_id']).style.display = 'none';
		}
	});
}
function delete_mission(index){
	document.getElementById("loading-overlay").style.display = 'block';
	$.ajax({
        type: 'post',
        url: base_url+'classes/delete_class_mission',
        data: {
            class_mission_id: index
        },
        success: function(data) {
			document.getElementById("loading-overlay").style.display = 'none';
			location.reload();
        }
    });
}
function start_mission(index){
	document.getElementById("loading-overlay").style.display = 'block';
	$.ajax({
        type: 'post',
        url: base_url+'classes/insert_status_mission',
        data: {
            class_mission_id: index,
            status_mission_id: 1
        },
        success: function(data) {
			document.getElementById("loading-overlay").style.display = 'none';
			location.reload();
        }
    });
}
function finish_mission(index){
	document.getElementById("loading-overlay").style.display = 'block';
	$.ajax({
        type: 'post',
        url: base_url+'classes/insert_status_mission',
        data: {
            class_mission_id: index,
            status_mission_id: 2
        },
        success: function(data) {
			document.getElementById("loading-overlay").style.display = 'none';
			location.reload();
        }
    });
}
function save_mission(index){
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
				url: base_url+'classes/update_class_mission',
				data: {
					class_mission_id: index,
					mission_title: $('#mission_title'+index).val(),
					mission_subtitle: $('#mission_subtitle'+index).val(),
					mission_description: $('#mission_description'+index).val(),
					task_description: $('#task_description'+index).val(),
					project_style: $('#project_style'+index).val(),
					project_user: $('#project_user'+index).val(),
					project_member: $('#project_member'+index).val(),
					linkname: linkname,
					linkvideo: linkvideo,
					publish_datetime: $('#publish_datetime'+index).val(),
					deadline_datetime: $('#task_deadline'+index).val()
				},
				success: function(data) {
					alert(data);
					document.getElementById("loading-overlay").style.display = 'none';
				}
			});
        }
    });
	
	
}
$("#save_changes_goal_checklist").click(function() {
	var checkboxes = document.getElementsByName('government_checklist_id[]');
	var valsGCI = []
	for (var i=0, n=checkboxes.length;i<n;i++) 
	{
		if (checkboxes[i].checked) 
		{
			valsGCI.push(checkboxes[i].value);
		}
	}
	var checkboxes = document.getElementsByName('sdg_indicator_id[]');
	var valsSII = []
	for (var i=0, n=checkboxes.length;i<n;i++) 
	{
		if (checkboxes[i].checked) 
		{
			valsSII.push(checkboxes[i].value);
		}
	}
	console.log(valsGCI);
	console.log(valsSII);
	document.getElementById("loading-overlay").style.display = 'block';
	$.ajax({
        type: 'post',
        url: base_url+'classes/update_class_goal_checklist',
        data: {
            class_id: $('#class_id').val(),
            gci: valsGCI,
            sii: valsSII
        },
        success: function(data) {
			document.getElementById("loading-overlay").style.display = 'none';
			if(data == "sukses"){
				alert("Success Update Goal Checklist");
			}else{
				alert("Something wrong");
			}
        }
    });
});
$("#save_changes").click(function() {
	document.getElementById("loading-overlay").style.display = 'block';
	$.ajax({
        type: 'post',
        url: base_url+'classes/update_class',
        data: {
            class_id: $('#class_id').val(),
            class_description: $('#description').val(),
            mission_subtitle: $('#google_meet_link').val(),
            google_meet_password: $('#google_meet_password').val(),
            google_meet_link: $('#google_meet_link').val(),
            schedule: $('#schedule').val()
        },
        success: function(data) {
			document.getElementById("loading-overlay").style.display = 'none';
        }
    });
});
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
$("#start_class").click(function() {
	document.getElementById("loading-overlay").style.display = 'block';
	$.ajax({
        type: 'post',
        url: base_url+'classes/start_class',
        data: {
            class_id: $('#class_id').val(),
            status_class_id: 1
        },
        success: function(data) {
			document.getElementById("loading-overlay").style.display = 'none';
			if(data == "sukses"){
				$('#modal_start_class').modal('hide');
				location.reload();
				alert("Start class success");
			}else if(data == "failed"){
				alert("Please fill up mission detail");
			}
        }
    });
});
$("#finish_class").click(function() {
	document.getElementById("loading-overlay").style.display = 'block';
	$.ajax({
        type: 'post',
        url: base_url+'classes/start_class',
        data: {
            class_id: $('#class_id').val(),
            status_class_id: 2
        },
        success: function(data) {
			document.getElementById("loading-overlay").style.display = 'none';
			if(data == "sukses"){
				$('#modal_start_class').modal('hide');
				location.reload();
				alert("Start class success");
			}else if(data == "failed"){
				alert("Please fill up mission detail");
			}
        }
    });
});