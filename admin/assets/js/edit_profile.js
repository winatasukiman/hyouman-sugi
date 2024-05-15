$('#date_of_birth').datetimepicker({ //
	format: "dd MM yyyy",
	startView: 'decade',
	minView: 'month',
	maxView: 'decade',
	autoclose: true,
	todayBtn: true,
	todayHighlight: false,
	keyboardNavigation: true,
	endDate: '-1d'
	// startDate: '+1d' //Start date: start from tommorow
});
$('.toggle-password').on('click', function() {
	$(this).toggleClass('fa-eye fa-eye-slash');
	let input = $($(this).attr('toggle'));

	if (input.attr('type') == 'password') {
		input.attr('type', 'text');
	} else {
		input.attr('type', 'password');
	}
});
// preview image setelah upload user photo
function readURL_photouser(input) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();
		reader.onload = function(e) {
			$('#user_preview_image').attr('src', e.target.result);
		}
		reader.readAsDataURL(input.files[0]);
		// console.log(input.files[0]);
		// console.log(input.files[0]['name']);
	}
}
$("#user_input_image").change(function() {
	readURL_photouser(this);
	// alert(Math.round(this.files[0].size/1024));
});

$("#form_user").validate({
	onfocusout: false,
	rules: {
		"user_input_image": { //file
			//required: true,
			extension: "jpg|jpeg|png",
			//filesize: 2000
		},
		"full_name": {
			required: true,
			minlength: 9,
			maxlength: 30
		},
		"email": {
			required: true,
			email: true
		},
		"date_of_birth": {
			//required: true
		},
		"short_profile": {
			//required: true,
			maxlength: 40
		},
		"user_gender": {
			//required: true
		},
		"phone_number": {
			required: true,
			digits: true
		},
		"institution": {
			//required: true
		},
		"address": {
			//required: true
		},
		"rt": {
			//required: true,
			digits: true
		},
		"rw": {
			//required: true,
			digits: true
		},
		"postcode": {
			//required: true,
			digits: true
		},
		"city": {
			//required: true
		},
		"district": {
			//required: true
		},
		"province": {
			//required: true
		}
	},
	messages: {
		"user_input_image": {
			required: "Please upload an image",
			extension: "Please upload image in these format only (jpg, jpeg, png)"
		},
		"full_name": {
			required: "Please enter Full Name",
			minlength: "Minimal 9 Char",
			maxlengthlength: "Maximal 12 Char"
		},
		"email": {
			required: "Please enter Email",
			minlength: "Minimal 9 Char",
			maxlength: "Maximal 12 Char"
		},
		"phone_number": {
			required: "Please enter phone number",
			digits: "Please type numbers only"
		},
		"date_of_birth": {
			required: "Please choose date of birth"
		},
		"short_profile": {
			required: "Please enter short profile",
			maxlength: "Maximal 40 Characters"
		},
		"user_gender": {
			required: "Please choose gender"
		},
		"institution": {
			required: "Please choose institution"
		},
		"address": {
			required: "Please enter address"
		},
		"rt": {
			required: "Please enter RT",
			digits: "Please type number only"
		},
		"rw": {
			required: "Please enter RW",
			digits: "Please type number only"
		},
		"postcode": {
			required: "Please enter postcode",
			digits: "Please type number only"
		},
		"city": {
			required: "Please enter city"
		},
		"district": {
			required: "Please enter district"
		},
		"province": {
			required: "Please enter province"
		}
	},
	errorPlacement: function(error, element) {
		//Custom position: first name
		if (element.attr("name") == "user_input_image") {
			$("#error_user_image").text(error[0].innerHTML);
		}
		else if (element.attr("name") == "full_name" ) {
			$("#error_full_name").text(error[0].innerHTML);
		}
		else if (element.attr("name") == "email" ) {
			$("#error_email").text(error[0].innerHTML);
		}
		else if (element.attr("name") == "phone_number" ) {
			$("#error_phone_number").text(error[0].innerHTML);
		}
		else if (element.attr("name") == "user_gender" ) {
			$("#error_user_gender").text(error[0].innerHTML);
		}
		else if (element.attr("name") == "institution" ) {
			$("#error_institution").text(error[0].innerHTML);
		}
		else if (element.attr("name") == "date_of_birth" ) {
			$("#error_date_of_birth").text(error[0].innerHTML);
		}
		else if (element.attr("name") == "short_profile" ) {
			$("#error_short_profile").text(error[0].innerHTML);
		}
		else if (element.attr("name") == "address" ) {
			$("#error_address").text(error[0].innerHTML);
		}
		else if (element.attr("name") == "rt" ) {
			$("#error_rt").text(error[0].innerHTML);
		}
		else if (element.attr("name") == "rw" ) {
			$("#error_rw").text(error[0].innerHTML);
		}
		else if (element.attr("name") == "postcode" ) {
			$("#error_postcode").text(error[0].innerHTML);
		}
		else if (element.attr("name") == "city" ) {
			$("#error_city").text(error[0].innerHTML);
		}
		else if (element.attr("name") == "district" ) {
			$("#error_district").text(error[0].innerHTML);
		}
		else if (element.attr("name") == "province" ) {
			$("#error_province").text(error[0].innerHTML);
		}
	},
	success: function(element) {
		if (element.attr("name") == "user_input_image") {
			$(element).closest('.control-group').find('#error_user_image').addClass('valid');
		} 
		else if (element.attr("name") == "full_name" ) {
			$(element).closest('.control-group').find('#error_full_name').addClass('valid');
		}
		else if (element.attr("name") == "email" ) {
			$(element).closest('.control-group').find('#error_email').addClass('valid');
		}
		else if (element.attr("name") == "phone_number" ) {
			$(element).closest('.control-group').find('#error_phone_number').addClass('valid');
		}
		else if (element.attr("name") == "user_gender" ) {
			$(element).closest('.control-group').find('#error_user_gender').addClass('valid');
		}
		else if (element.attr("name") == "institution" ) {
			$(element).closest('.control-group').find('#error_institution').addClass('valid');
		}
		else if (element.attr("name") == "date_of_birth" ) {
			$(element).closest('.control-group').find('#error_date_of_birth').addClass('valid');
		}
		else if (element.attr("name") == "short_profile" ) {
			$(element).closest('.control-group').find('#error_short_profile').addClass('valid');
		}
		else if (element.attr("name") == "address" ) {
			$(element).closest('.control-group').find('#error_address').addClass('valid');
		}
		else if (element.attr("name") == "rt" ) {
			$(element).closest('.control-group').find('#error_rt').addClass('valid');
		}
		else if (element.attr("name") == "rw" ) {
			$(element).closest('.control-group').find('#error_rw').addClass('valid');
		}
		else if (element.attr("name") == "postcode" ) {
			$(element).closest('.control-group').find('#error_postcode').addClass('valid');
		}
		else if (element.attr("name") == "city" ) {
			$(element).closest('.control-group').find('#error_city').addClass('valid');
		}
		else if (element.attr("name") == "district" ) {
			$(element).closest('.control-group').find('#error_district').addClass('valid');
		}
		else if (element.attr("name") == "province" ) {
			$(element).closest('.control-group').find('#error_province').addClass('valid');
		}
	},
	submitHandler: function(form) {
		// if valid
		$(form).ajaxSubmit();
	}
});
$("#save_change_password").click(function() {
	var pwd = $('#user_change_password').val();
	var conf_pwd = $('#confirm_password').val();
	if(pwd == ""){
		$("#error_user_password").text("Please fill in");
	}else if(pwd != conf_pwd){
		$("#error_confirm_password").text("Doesn't match");
	}else{
		$.ajax({
			type: 'post',
			url: base_url+'user/add_user_password/',
			data: {
				user_change_password: pwd
			},
			error: function(error) {
				console.log(error);
			},
			success: function(data) {
				$("#error_user_password").text("");
				$("#error_confirm_password").text("");
				alert("Change Password Success");
				$('#modal_edit_password').modal('hide');
			} 
		});
	}
});