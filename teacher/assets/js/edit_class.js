//Untuk mission 1 - 8
var i = 1;
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
		"term": {
			required: true
		},
		"academy_year": {
			required: true
		},
		"school_name": {
			required: true
		},
		"teacher_name": {
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
		"term": {
			required: "Please choose term"
		},
		"academy_year": {
			required: "Please choose academy year"
		},
		"school_name": {
			required: "Please fill"
		},
		"teacher_name": {
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
		else if (element.attr("name") == "term" ) {
			$("#error_term").text(error[0].innerHTML);
		}
		else if (element.attr("name") == "academy_year" ) {
			$("#error_academy_year").text(error[0].innerHTML);
		}
		else if (element.attr("name") == "school_name" ) {
			$("#error_school_name").text(error[0].innerHTML);
		}
		else if (element.attr("name") == "teacher_name" ) {
			$("#error_teacher_name").text(error[0].innerHTML);
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
		else if (element.attr("name") == "term" ) {
			$(element).closest('.control-group').find('#error_term').addClass('valid');
		}
		else if (element.attr("name") == "academy_year" ) {
			$(element).closest('.control-group').find('#error_academy_year').addClass('valid');
		}
		else if (element.attr("name") == "school_name" ) {
			$(element).closest('.control-group').find('#error_school_name').addClass('valid');
		}
		else if (element.attr("name") == "teacher_name" ) {
			$(element).closest('.control-group').find('#error_teacher_name').addClass('valid');
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
$('.hide').delay(3000).fadeOut(300);
$('a.dropdown-toggle').on('click', function(e) {
	if (!$(this).next().hasClass('show')) {
		$(this).parents('.dropdown-menu').first().find('.show').removeClass('show');
	}
	var $subMenu = $(this).next('.dropdown-menu');
	$subMenu.toggleClass('show');


	$(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
		$('.dropdown-submenu .show').removeClass('show');
	});


	return false;
});
function setSubjectLevel(id){
	teacher_specialty.forEach(function(ts){
		if(ts['grade_subject_id'] == id){
			document.getElementById("subject_level").innerHTML = ts['subject_parent_name'] +'-' + ts['grade_name'] + '-' + ts['subject_name'];
			document.getElementById("subject_level").style.padding = "8px";
			document.getElementById("grade_subject").value = id;
		}
	});
}
setSubjectLevel(grade_subject_id);