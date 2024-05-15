// Untuk mission 1 - 8
// var i = 0;
// function addRow() {
	// i = i+1;
	// $('#content').append('<div id='+i+'><input type="text" id="mission'+i+'" value="'+i+'"><input type="text" name="desc" onclick="removeRow(this)"></div>');
// }
// function removeRow(input) {
	// document.getElementById('content').removeChild(input.parentNode);
// }
// var mission_val = [];
// $("#save_changes").click(function() {
	// for(var j=0;j <= i;j++){
		// var value = $('#mission'+j).val();
		// if( value != null ){
			// mission_val.push(value);
		// }
	// }
	// console.log(mission_val);
	// mission_val = [];
// });
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
// IF CHANGE SUBJECT PARENT
$("#subject_parent").change(function() {
	var subject_parent_id = $('#subject_parent option:selected').val();
	$.ajax({
        type: 'post',
        url: base_url+'subject/get_grade_subject',
        data: {
            subject_parent_id: subject_parent_id,
        },
        success: function(data) {
			document.getElementById("grade_subject_before").style.display ="none";
			document.getElementById("grade_subject_after").style.display ="block";
            $('#grade_subject_dropdown').html(data);
        }
    });
});

$("#form_add_class").validate({
	onfocusout: false,
	rules: {
		"thumbnail": { //file
			required: true,
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
		"curicullum": {
			required: true
		},
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
		"curicullum": {
			required: "Please choose curicullum"
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
		else if (element.attr("name") == "curicullum" ) {
			$("#error_curicullum").text(error[0].innerHTML);
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
		else if (element.attr("name") == "curicullum" ) {
			$(element).closest('.control-group').find('#error_curicullum').addClass('valid');
		}
	},
	submitHandler: function(form) {
		// if valid
		$(form).ajaxSubmit();
	}
});
// SAVE GRADE SUBJECT TO DATABASE 
// $("#save_changes").click(function() {
	// document.getElementById("loading-overlay").style.display = 'block';
	// setTimeout(function() {
		// document.getElementById("loading-overlay").style.display = 'none';
	// }, 10000);
	// if(grade_subject_id.length == 0){
		// alert("Choose Grade and subject first");
	// }else{
		// duplicates = grade_subject_id.reduce(function(acc, el, i, arr) {
		  // if (arr.indexOf(el) !== i && acc.indexOf(el) < 0) acc.push(el); return acc;
		// }, []);
		// if(duplicates.length != 0){
			// alert("Grade and subject already choose");
		// }else{
			// $.ajax({
				// type: 'post',
				// url: base_url+'subject/insert_grade_subject/',
				// data: {
					// grade_subject_id: grade_subject_id
				// },
				// error: function(error) {
					// console.log(error);
				// },
				// success: function(data) {
					// data = JSON.parse(data.replace(/'/g, '"'));
					// alert(data.message);
					// window.location.href = base_url+'user/';
				// } 
			// });
		// }
	// }
// });
//$('.file-upload').file_upload();
$(' a.dropdown-toggle').on('click', function(e) {
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
	console.log(id);
	teacher_specialty.forEach(function(ts){
		if(ts['grade_subject_id'] == id){
			document.getElementById("subject_level").innerHTML = ts['subject_parent_name'] +'-' + ts['grade_name'] + '-' + ts['subject_name'];
			document.getElementById("subject_level").style.padding = "8px";
			document.getElementById("grade_subject").value = id;
		}
	});
	
}
