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
// IF CHANGE SUBJECT, GET GRADE FROM SUBJECT CHOOSEN
$("#subject").change(function() {
	var subject_id = $('#subject option:selected').val();
	$.ajax({
        type: 'post',
        url: base_url+'subject/get_teacher_specialty_by_subject_id',
        data: {
            subject_id: subject_id,
        },
        success: function(data) {
			document.getElementById("grade_before").style.display ="none";
			document.getElementById("grade_after").style.display ="block";
            $('#grade_dropdown').html(data);
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
		"grade": {
			required: true
		},
		"subject": {
			required: true
		},
		"term": {
			required: true
		},
		"class_name": {
			required: true
		}
	},
	messages: {
		"thumbnail": {
			required: "Please upload an image",
			extension: "Please upload image in these format only (jpg, jpeg, png)"
		},
		"grade": {
			required: "Please choose grade"
		},
		"subject": {
			required: "Please choose subject"
		},
		"term": {
			required: "Please choose term"
		},
		"class_name": {
			required: "Please fill"
		}
	},
	errorPlacement: function(error, element) {
		//Custom position: first name
		if (element.attr("name") == "thumbnail") {
			$("#error_thumbnail").text(error[0].innerHTML);
		}
		else if (element.attr("name") == "grade" ) {
			$("#error_grade").text(error[0].innerHTML);
		}
		else if (element.attr("name") == "subject" ) {
			$("#error_subject").text(error[0].innerHTML);
		}
		else if (element.attr("name") == "term" ) {
			$("#error_term").text(error[0].innerHTML);
		}
		else if (element.attr("name") == "class_name" ) {
			$("#error_class_name").text(error[0].innerHTML);
		}
	},
	success: function(element) {
		if (element.attr("name") == "thumbnail") {
			$(element).closest('.control-group').find('#error_thumbnail').addClass('valid');
		} 
		else if (element.attr("name") == "grade" ) {
			$(element).closest('.control-group').find('#error_grade').addClass('valid');
		}
		else if (element.attr("name") == "subject" ) {
			$(element).closest('.control-group').find('#error_subject').addClass('valid');
		}
		else if (element.attr("name") == "term" ) {
			$(element).closest('.control-group').find('#error_term').addClass('valid');
		}
		else if (element.attr("name") == "class_name" ) {
			$(element).closest('.control-group').find('#error_class_name').addClass('valid');
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