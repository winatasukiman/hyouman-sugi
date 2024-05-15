class_mission.forEach(function(class_mission){
	CKEDITOR.replace('editor1_'+class_mission['class_mission_id'], {
		filebrowserUploadUrl: '',
		filebrowserUploadMethod: 'form'
	});
});

//Untuk mission 1 - 8
var i = 1;
var arr_i = [];
function add_mission(class_id) {
	document.getElementById("loading-overlay").style.display = 'block';
	class_mission.forEach(function(class_mission){
		arr_i.push(class_mission['mission_id']);
		CKEDITOR.replace('editor1_'+class_mission['class_mission_id'], {
			filebrowserUploadUrl: '',
			filebrowserUploadMethod: 'form'
		});
	});
	console.log(arr_i.length);
	var last_index = parseInt(arr_i[arr_i.length - 1]);
	var mission_id = last_index+1 ;
	$.ajax({
		type: 'post',
		url: base_url+'classes/insert_class_mission_id',
		data: {
			class_id: class_id,
			mission_id: mission_id
		},
		success: function(data) {
			//console.log(data);
			document.getElementById("loading-overlay").style.display = 'none';
			window.location.href = base_url+"classes/details/"+class_id+"/0/"+mission_id;
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
$('.dt_picker').datetimepicker({
	format: "dd MM yyyy - hh:ii",
	showMeridian: 0,
	autoclose: true,
	todayBtn: true,
	keyboardNavigation: true,
	minuteStep: 5,
	orientation:"top"
	// startDate: datetime
	//endDate: "17 01 2021 - 00:00"
});
$("#class_introduction").click(function() {
	$('.active').removeClass('active');
	var element = document.getElementById("class_introduction");
	element.classList.add("active");
	document.getElementById("div_class_introduction").style.display = 'block';
	// document.getElementById("div_goal_checklist").style.display = 'none';
	document.getElementById("div_mission").style.display = 'none';
	document.getElementById("div_class_setting").style.display = 'none';
});
// $("#goal_checklist").click(function() {
	// $('.active').removeClass('active');
	// var element = document.getElementById("goal_checklist");
	// element.classList.add("active");
	// document.getElementById("div_goal_checklist").style.display = 'block';
	// document.getElementById("div_class_introduction").style.display = 'none';
	// document.getElementById("div_mission").style.display = 'none';
	// document.getElementById("div_class_setting").style.display = 'none';
// });
$("#class_setting").click(function() {
	$('.active').removeClass('active');
	var element = document.getElementById("class_setting");
	element.classList.add("active");
	// document.getElementById("div_goal_checklist").style.display = 'none';
	document.getElementById("div_class_introduction").style.display = 'none';
	document.getElementById("div_mission").style.display = 'none';
	document.getElementById("div_class_setting").style.display = 'block';
});
function mission(index){
	$('.active').removeClass('active');
	var element = document.getElementById("mission"+index);
	element.classList.add("active");
	// document.getElementById("div_goal_checklist").style.display = 'none';
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
if(mission_id != 0){
	mission(mission_id);
}
function delete_mission(class_id,index){
	document.getElementById("loading-overlay").style.display = 'block';
	$.ajax({
        type: 'post',
        url: base_url+'classes/delete_class_mission',
        data: {
			class_id: class_id,
            class_mission_id: index
        },
        success: function(data) {
			document.getElementById("loading-overlay").style.display = 'none';
			window.location.href = base_url+"classes/details/"+class_id+"/0/"+data;
        }
    });
}
function start_mission(index){
	document.getElementById("loading-overlay").style.display = 'block';
	$.ajax({
        type: 'post',
        url: base_url+'classes/insert_status_mission',
        data: {
			class_id: $('#class_id').val(),
            class_mission_id: index,
            status_mission_id: 1
        },
        success: function(data) {
			console.log(data);
			document.getElementById("loading-overlay").style.display = 'none';
			if(data == "sukses"){
				location.reload();
				alert("Start class success");
			}else if(data == "failed"){
				alert("Please fill up mission detail");
			}else{
				alert(data);
			}
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
			alert("Finish class success");
			document.getElementById("loading-overlay").style.display = 'none';
			location.reload();
        }
    });
}
function save_mission(class_id,index){
	document.getElementById("loading-overlay").style.display = 'block';
	var countCML = 0;
	var linkname = [];
	var linkvideo = [];
	var countCMLA = 0;
	var title = []; // opening Lesson activity
	var desc = [];// main Lesson activity
	var desc_2 = [];// close Lesson activity
	var countCMLO = 0;
	var content = [];
	var countCMR = 0;
	var linkname_res = [];
	var linkvideo_res = [];
	var boc_editor = CKEDITOR.instances['editor1_'+index].getData();
	// var f2f = 0;
	// if ($('#face_to_face'+index).is(":checked")){ f2f = 1; }
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
			$.ajax({
				type: 'post',
				url: base_url+'classes/get_count_class_mission_lesson_activities_by_class_mission_id',
				data: {
					class_mission_id: index
				},
				success: function(data) {
					countCMLA = data;
					for(var i=0;i < countCMLA;i++){
						title.push($('#title'+index+i).val());
						desc.push($('#desc'+index+i).val());
						desc_2.push($('#desc_2'+index+i).val());
					}
					// console.log(linkname);
					// console.log(linkvideo);
					// console.log(title);
					// console.log(desc);
					$.ajax({
						type: 'post',
						url: base_url+'classes/get_count_class_mission_learning_objectives_by_class_mission_id',
						data: {
							class_mission_id: index
						},
						success: function(data) {
							countCMLO = data;
							for(var i=0;i < countCMLO;i++){
								content.push($('#content'+index+i).val());
							}
							// console.log(linkname);
							// console.log(linkvideo);
							// console.log(title);
							// console.log(desc);
							$.ajax({
								type: 'post',
								url: base_url+'classes/get_count_class_mission_res_by_class_mission_id',
								data: {
									class_mission_id: index
								},
								success: function(data) {
									countCMR = data;
									for(var i=0;i < countCMR;i++){
										linkname_res.push($('#name_res'+index+i).val());
										linkvideo_res.push($('#link_res'+index+i).val());
									}	
									$.ajax({
										type: 'post',
										url: base_url+'classes/update_class_mission',
										data: {
											class_mission_id: index,
											mission_title: $('#mission_title'+index).val(),
											mission_subtitle: $('#mission_subtitle'+index).val(),
											sub_topic: $('#sub_topic'+index).val(),
											week: $('#week'+index).val(),
											mission_description: $('#mission_description'+index).val(),
											task_description: $('#task_description'+index).val(),
											profil_pembelajaran_pancasila: $('#profil_pembelajaran_pancasila'+index).val(),
											core_skill: $('#core_skill'+index).val(),
											class_activity: $('#class_activity'+index).val(),
											linkname: linkname,
											linkvideo: linkvideo,
											linkname_res: linkname_res,
											linkvideo_res: linkvideo_res,
											title: title,
											desc: desc,
											desc_2: desc_2,
											content: content,
											publish_datetime: $('#publish_datetime'+index).val(),
											deadline_datetime: $('#task_deadline'+index).val(),
											google_meet_password: $('#google_meet_password'+index).val(),
											google_meet_link: $('#google_meet_link'+index).val(),
											face_to_face: $('#face_to_face'+index).val(),
											meeting_location: $('#location'+index).val(),
											resource: $('#resource'+index).val(),
											time_allocation_a: $('#time_allocation_a'+index).val(),
											time_allocation_b: $('#time_allocation_b'+index).val(),
											boc_editor: boc_editor
										},
										success: function(data) {
											data = JSON.parse(data.replace(/'/g, '"'));
											alert(data.message);
											document.getElementById("loading-overlay").style.display = 'none';
											window.location.href = base_url+"classes/details/"+class_id+"/0/"+data.mission_id;
										}
									});
								}
							});	
						}
					});
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
				alert("Update Goal Checklist Success");
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
			project_style: $('#project_style').val(),
			project_user: $('#project_user').val(),
			project_member: $('#project_member').val(),
			meeting_period: $('#meeting_period').val(),
            virtual_world: $('#virtual_world').val(),
            class_start_time: $('#class_start_time').val(),
            class_finish_time: $('#class_finish_time').val(),
			semester: $('#semester').val(),
			curicullum: $('#curicullum').val(),
            term: $('#term').val(),
            academy_year: $('#academy_year').val(),
			grade_subject: $('#grade_subject').val(),
			school_name: $('#school_name').val(),
			thumbnail: $('#thumbnail').val()
        },
        success: function(data) {
			alert(data);
			document.getElementById("loading-overlay").style.display = 'none';
			location.reload();
			
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
			//console.log(countCML);
			for(var i=0;i < countCML;i++){
				linkname.push($('#name'+index+i).val());
				linkvideo.push($('#link'+index+i).val());
			}
			//console.log(linkname);
			//console.log(linkvideo);
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
function add_res(index) {
	document.getElementById("loading-overlay").style.display = 'block';
	var countCML = 0;
	var linkname = [];
	var linkvideo = [];
	$.ajax({
        type: 'post',
        url: base_url+'classes/get_count_class_mission_res_by_class_mission_id',
        data: {
            class_mission_id: index
        },
        success: function(data) {
			countCML = data;
			//console.log(countCML);
			for(var i=0;i < countCML;i++){
				linkname.push($('#name_res'+index+i).val());
				linkvideo.push($('#link_res'+index+i).val());
			}
			//console.log(linkname);
			//console.log(linkvideo);
			$.ajax({
				type: 'post',
				url: base_url+'classes/update_class_mission_resource',
				data: {
					class_mission_id: index,
					linkname: linkname,
					linkvideo: linkvideo
				},
				success: function(data) {
					$.ajax({
						type: 'post',
						url: base_url+'classes/insert_class_mission_resource',
						data: {
							class_mission_id: index
						},
						success: function(data) {
							document.getElementById("loading-overlay").style.display = 'none';
							$( "#div_class_mission_res"+index ).load(window.location.href + " #div_class_mission_res"+index );
						}
					});
				}
			});
        }
    });
}
function add_class_mission_lesson_activity(index) {
	document.getElementById("loading-overlay").style.display = 'block';
	var countCMLA = 0;
	var title = [];
	var desc = [];
	var desc_2 = [];
	$.ajax({
        type: 'post',
        url: base_url+'classes/get_count_class_mission_lesson_activities_by_class_mission_id',
        data: {
            class_mission_id: index
        },
        success: function(data) {
			countCMLA = data;
			//console.log(countCMLA);
			for(var i=0;i < countCMLA;i++){
				title.push($('#title'+index+i).val());
				desc.push($('#desc'+index+i).val());
				desc_2.push($('#desc_2'+index+i).val());
			}
			//console.log(title);
			//console.log(desc);
			$.ajax({
				type: 'post',
				url: base_url+'classes/update_class_mission_lesson_activities',
				data: {
					class_mission_id: index,
					title: title,
					desc: desc,
					desc_2:desc_2
				},
				success: function(data) {
					$.ajax({
						type: 'post',
						url: base_url+'classes/insert_class_mission_lesson_activities',
						data: {
							class_mission_id: index
						},
						success: function(data) {
							document.getElementById("loading-overlay").style.display = 'none';
							$( "#div_class_mission_lesson_activities"+index ).load(window.location.href + " #div_class_mission_lesson_activities"+index );
						}
					});
				}
			});
        }
    });
	
}
function add_class_mission_learning_objectives(index) {
	document.getElementById("loading-overlay").style.display = 'block';
	var countCMLO = 0;
	var content = [];
	$.ajax({
        type: 'post',
        url: base_url+'classes/get_count_class_mission_learning_objectives_by_class_mission_id',
        data: {
            class_mission_id: index
        },
        success: function(data) {
			countCMLO = data;
			//console.log(countCMLA);
			for(var i=0;i < countCMLO;i++){
				content.push($('#content'+index+i).val());
			}
			//console.log(title);
			//console.log(desc);
			$.ajax({
				type: 'post',
				url: base_url+'classes/update_class_mission_learning_objectives_manual',
				data: {
					class_mission_id: index,
					content: content
				},
				success: function(data) {
					$.ajax({
						type: 'post',
						url: base_url+'classes/insert_class_mission_learning_objectives',
						data: {
							class_mission_id: index
						},
						success: function(data) {
							document.getElementById("loading-overlay").style.display = 'none';
							$( "#div_class_mission_learning_objectives"+index ).load(window.location.href + " #div_class_mission_learning_objectives"+index );
						}
					});
				}
			});
        }
    });
	
}
$("#start_class").click(function() {
	document.getElementById("loading-overlay-modal-start").style.display = 'block';
	$.ajax({
        type: 'post',
        url: base_url+'classes/update_status_class',
        data: {
            class_id: $('#class_id').val(),
            status_class_id: 1
        },
        success: function(data) {
			document.getElementById("loading-overlay-modal-start").style.display = 'none';
			if(data == "sukses"){
				$('#modal_start_class').modal('hide');
				location.reload();
				alert("Start class success");
			}else if(data == "failed"){
				alert("Please fill up mission detail");
				$('#modal_start_class').modal('hide');
			}
        }
    });
});
$("#finish_class").click(function() {
	document.getElementById("loading-overlay-modal-finish").style.display = 'block';
	$.ajax({
        type: 'post',
        url: base_url+'classes/update_status_class',
        data: {
            class_id: $('#class_id').val(),
            status_class_id: 2
        },
        success: function(data) {
			document.getElementById("loading-overlay-modal-finish").style.display = 'none';
			if(data == "sukses"){
				$('#modal_start_class').modal('hide');
				location.reload();
				alert("Start class success");
			}else if(data == "failed"){
				alert("Please fill up mission detail");
				$('#modal_start_class').modal('hide');
			}
        }
    });
});
$("#cancel_class").click(function() {
	document.getElementById("loading-overlay-modal-cancel").style.display = 'block';
	var class_id = $('#class_id').val();
	$.ajax({
        type: 'post',
        url: base_url+'classes/delete_class/'+class_id,
        data: {
            // class_id: $('#class_id').val(),
            // status_class_id: 3
        },
        success: function(data) {
			// document.getElementById("loading-overlay-modal-cancel").style.display = 'none';
			// if(data == "sukses"){
			// 	$('#modal_start_class').modal('hide');
			// 	location.reload();
			// 	alert("Class Cancel");
			// }else if(data == "failed"){
			// 	alert("Please fill up mission detail");
			// }
			window.location.href = base_url+"classes/";
        }
    });
});
$("#copy_class").click(function() {
	//alert($('#academy_year_from_modal_copy').val());
	document.getElementById("loading-overlay-modal-copy").style.display = 'block';
	$.ajax({
        type: 'post',
        url: base_url+'classes/copy_class',
        data: {
            class_id: $('#class_id').val(),
            academy_year: $('#academy_year_from_modal_copy').val(),
        },
        success: function(data) {
			alert("Changes are saved!");
			window.location.href = base_url+"classes";
        }
    });
});
function copy_mission(class_id,mission_id) {
	//console.log(mission_id);
	document.getElementById("loading-overlay").style.display = 'block';
	$.ajax({
        type: 'post',
        url: base_url+'classes/copy_meeting',
        data: {
			class_id: class_id,
            mission_id: mission_id,
        },
        success: function(data) {
			console.log(data);
			alert("Mission copied!");
			window.location.href = base_url+"classes/details/"+class_id+"/0/"+data;
        }
    });
}
// preview image setelah upload user photo
function readURL_photouser(input) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();
		reader.onload = function(e) {
			$('#thumbnail_preview_image').attr('src', e.target.result);
		}
		reader.readAsDataURL(input.files[0]);
		// console.log(input.files[0]);
		// console.log(input.files[0]['name']);
	}
}
$("#thumbnail").change(function() {
	readURL_photouser(this);
	// alert(Math.round(this.files[0].size/1024));
});
$("#form_class_setting").validate({
	onfocusout: false,
	rules: {
		"thumbnail": { //file
			required: true,
			extension: "jpg|jpeg|png",
			//filesize: 2000
		}
	},
	messages: {
		"thumbnail": {
			required: "Please upload an image",
			extension: "Please upload image in these format only (jpg, jpeg, png)"
		}
	},
	errorPlacement: function(error, element) {
		//Custom position: first name
		if (element.attr("name") == "thumbnail") {
			$("#error_thumbnail").text(error[0].innerHTML);
		}
	},
	success: function(element) {
		if (element.attr("name") == "thumbnail") {
			$(element).closest('.control-group').find('#error_thumbnail').addClass('valid');
		} 
	},
	submitHandler: function(form) {
		// if valid
		$(form).ajaxSubmit();
	}
});
$("#form_edit_class").validate({
	onfocusout: false,
	rules: {
		"thumbnail": { //file
			extension: "jpg|jpeg|png",
			//filesize: 2000
		},
		"grade_subject": {
			required: true
		},
		"semester": {
			required: true
		},
		"term": {
			required: true
		},
		"academy_year": {
			required: true
		},
		"school_name": {
			required: true
		},
		"curicullum": {
			required: true
		},
		"meeting_period": {
			required: true
		}
	},
	messages: {
		"thumbnail": {
			required: "Please upload an image",
			extension: "Please upload image in these format only (jpg, jpeg, png)"
		},
		"grade_subject": {
			required: "Please choose"
		},
		"semester": {
			required: "Please choose semester"
		},
		"term": {
			required: "Please choose term"
		},
		"academy_year": {
			required: "Please choose academy year"
		},
		"school_name": {
			required: "Please fill"
		},
		"curicullum": {
			required: "Please choose curicullum"
		},
		"meeting_period": {
			required: "Please choose meeting period"
		}
	},
	errorPlacement: function(error, element) {
		//Custom position: first name
		if (element.attr("name") == "thumbnail") {
			$("#error_thumbnail").text(error[0].innerHTML);
		}
		else if (element.attr("name") == "grade_subject" ) {
			$("#error_grade_subject").text(error[0].innerHTML);
		}
		else if (element.attr("name") == "semester" ) {
			$("#error_semester").text(error[0].innerHTML);
		}
		else if (element.attr("name") == "term" ) {
			$("#error_term").text(error[0].innerHTML);
		}
		else if (element.attr("name") == "academy_year" ) {
			$("#error_academy_year").text(error[0].innerHTML);
		}
		else if (element.attr("name") == "school_name" ) {
			$("#error_school_name").text(error[0].innerHTML);
		}
		else if (element.attr("name") == "curicullum" ) {
			$("#error_curicullum").text(error[0].innerHTML);
		}
		else if (element.attr("name") == "meeting_period" ) {
			$("#error_meeting_period").text(error[0].innerHTML);
		}
	},
	success: function(element) {
		if (element.attr("name") == "thumbnail") {
			$(element).closest('.control-group').find('#error_thumbnail').addClass('valid');
		} 
		else if (element.attr("name") == "grade_subject" ) {
			$(element).closest('.control-group').find('#error_grade_subject').addClass('valid');
		}
		else if (element.attr("name") == "semester" ) {
			$(element).closest('.control-group').find('#error_semester').addClass('valid');
		}
		else if (element.attr("name") == "term" ) {
			$(element).closest('.control-group').find('#error_term').addClass('valid');
		}
		else if (element.attr("name") == "academy_year" ) {
			$(element).closest('.control-group').find('#error_academy_year').addClass('valid');
		}
		else if (element.attr("name") == "school_name" ) {
			$(element).closest('.control-group').find('#error_school_name').addClass('valid');
		}
		else if (element.attr("name") == "curicullum" ) {
			$(element).closest('.control-group').find('#error_curicullum').addClass('valid');
		}
		else if (element.attr("name") == "meeting_period" ) {
			$(element).closest('.control-group').find('#error_meeting_period').addClass('valid');
		}
	},
	submitHandler: function(form) {
		// if valid
		$(form).ajaxSubmit();
	}
});
$("#edit_thumbnail").click(function() {
	document.getElementById("loading-overlay").style.display = 'block';
	$.ajax({
        type: 'post',
        url: base_url+'classes/update_class_thumbnail',
        data: {
            class_id: $('#class_id').val(),
            thumbnail: $('#thumbnail').val()
        },
        success: function(data) {
			document.getElementById("loading-overlay").style.display = 'none';
			console.log($('#thumbnail').val());
        }
    });
});
function check_cmsi($cmid,$siid){
	var val = 0;
	if ($('#checkbox_cmsi'+$cmid+$siid).is(":checked")){ val = 1; }
	document.getElementById("loading-overlay").style.display = 'block';
	$.ajax({
        type: 'post',
        url: base_url+'classes/replace_class_mission_sdg_indicator',
        data: {
            class_mission_id: $cmid,
            sdg_indicator_id: $siid,
            is_true: val
        },
        success: function(data) {
			document.getElementById("loading-overlay").style.display = 'none';
        }
    });
}
function check_cmboc($cmid,$bocdid){
	var val = 0;
	if ($('#checkbox_cmboc'+$cmid+$bocdid).is(":checked")){ val = 1; }
	document.getElementById("loading-overlay").style.display = 'block';
	$.ajax({
        type: 'post',
        url: base_url+'classes/replace_class_mission_bank_of_competencies',
        data: {
            class_mission_id: $cmid,
            bank_of_competencies_detail_id: $bocdid,
            is_true: val
        },
        success: function(data) {
			document.getElementById("loading-overlay").style.display = 'none';
        }
    });
}
function check_cmlo($cmid,$loid){
	var val = 0;
	if ($('#checkbox_cmlo'+$cmid+$loid).is(":checked")){ val = 1; }
	document.getElementById("loading-overlay").style.display = 'block';
	$.ajax({
        type: 'post',
        url: base_url+'classes/replace_class_mission_learning_objectives',
        data: {
            class_mission_id: $cmid,
            learning_objectives_id: $loid,
            is_true: val
        },
        success: function(data) {
			document.getElementById("loading-overlay").style.display = 'none';
        }
    });
}
function view_detail_si(index) {
	$('#div_sdg_indicator'+index).slideToggle("medium");
	document.getElementById("view_less_si"+index).style.display = 'block';
	document.getElementById("view_details_si"+index).style.display = 'none';
}
function view_less_si(index) {
	$('#div_sdg_indicator'+index).slideToggle("medium");
	document.getElementById("view_less_si"+index).style.display = 'none';
	document.getElementById("view_details_si"+index).style.display = 'block';
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
function view_detail_lo(index) {
	$('#div_lo'+index).slideToggle("medium");
	document.getElementById("view_less_lo"+index).style.display = 'block';
	document.getElementById("view_details_lo"+index).style.display = 'none';
}
function view_less_lo(index) {
	$('#div_lo'+index).slideToggle("medium");
	document.getElementById("view_less_lo"+index).style.display = 'none';
	document.getElementById("view_details_lo"+index).style.display = 'block';
}
function f2f(index) {
	if($('#face_to_face'+index).val() == 1){
		document.getElementById("location_f2f_"+index).style.display = 'block';
		document.getElementById("meet_link"+index).style.display = 'none';
	}else{
		document.getElementById("location_f2f_"+index).style.display = 'none';
		document.getElementById("meet_link"+index).style.display = 'block';
	}
	//document.getElementById("location"+index).style.display = 'block';
}
function view_detail_la(index) {
	$('#div_la'+index).slideToggle("medium");
	document.getElementById("view_less_la"+index).style.display = 'block';
	document.getElementById("view_details_la"+index).style.display = 'none';
}
function view_less_la(index) {
	$('#div_la'+index).slideToggle("medium");
	document.getElementById("view_less_la"+index).style.display = 'none';
	document.getElementById("view_details_la"+index).style.display = 'block';
}
function view_detail_assessment(index) {
	$('#div_assessment'+index).slideToggle("medium");
	document.getElementById("view_less_assessment"+index).style.display = 'block';
	document.getElementById("view_details_assessment"+index).style.display = 'none';
}
function view_less_assessment(index) {
	$('#div_assessment'+index).slideToggle("medium");
	document.getElementById("view_less_assessment"+index).style.display = 'none';
	document.getElementById("view_details_assessment"+index).style.display = 'block';
}
function view_detail_resources(index) {
	$('#div_resources'+index).slideToggle("medium");
	document.getElementById("view_less_resources"+index).style.display = 'block';
	document.getElementById("view_details_resources"+index).style.display = 'none';
}
function view_less_resources(index) {
	$('#div_resources'+index).slideToggle("medium");
	document.getElementById("view_less_resources"+index).style.display = 'none';
	document.getElementById("view_details_resources"+index).style.display = 'block';
}
function view_detail_se(index) {
	$('#div_se'+index).slideToggle("medium");
	document.getElementById("view_less_se"+index).style.display = 'block';
	document.getElementById("view_details_se"+index).style.display = 'none';
}
function view_less_se(index) {
	$('#div_se'+index).slideToggle("medium");
	document.getElementById("view_less_se"+index).style.display = 'none';
	document.getElementById("view_details_se"+index).style.display = 'block';
}
function view_detail_ta(index) {
	$('#div_ta'+index).slideToggle("medium");
	document.getElementById("view_less_ta"+index).style.display = 'block';
	document.getElementById("view_details_ta"+index).style.display = 'none';
}
function view_less_ta(index) {
	$('#div_ta'+index).slideToggle("medium");
	document.getElementById("view_less_ta"+index).style.display = 'none';
	document.getElementById("view_details_ta"+index).style.display = 'block';
}
function view_detail_pps(index) {
	$('#div_pps'+index).slideToggle("medium");
	document.getElementById("view_less_pps"+index).style.display = 'block';
	document.getElementById("view_details_pps"+index).style.display = 'none';
}
function view_less_pps(index) {
	$('#div_pps'+index).slideToggle("medium");
	document.getElementById("view_less_pps"+index).style.display = 'none';
	document.getElementById("view_details_pps"+index).style.display = 'block';
}
$(document).ready(function() {
    $(".js-example-placeholder-multiple").select2({
		placeholder: "Select"
	});
	
});