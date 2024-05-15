$("body").delegate("#register", "click", function(e) {
	//document.getElementById("loading-overlay").style.display = 'block';
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
$("#form_register").validate({
	onfocusout: false,
	rules: {
		"full_name": {
			required: true,
			minlength: 9,
			maxlength: 30
		},
		"email": {
			required: true,
			email: true
		},
		"phone_number": {
			required: true,
			digits: true
		},
		"password": {
			required: true,
			digits: true,
			minlength: 6,
			maxlength: 6
		},
		"confirm_password": {
			equalTo: "#password"
		}
	},
	messages: {
		"full_name": {
			required: "Please enter Full Name",
			minlength: "Minimal 9 Char",
			maxlengthlength: "Maximal 12 Char"
		},
		"email": {
			required: "Please enter Email",
			minlength: "Minimal 9 Char",
			maxlengthlength: "Maximal 12 Char"
		},
		"phone_number": {
			required: "Please enter phone number",
			digits: "Please type numbers only"
		},
		"password": {
			required: "Please enter password",
			digits: "Please type numbers only",
			minlength: "Minimum 6-digits number",
			maxlength: "Maximum 6-digits number"
		},
		"confirm_password": {
			equalTo: "Please re-type to confirm password"
		}
	},
	errorPlacement: function(error, element) {
		//Custom position: first name
		if (element.attr("name") == "full_name" ) {
			$("#error_full_name").text(error[0].innerHTML);
		}
		else if (element.attr("name") == "email" ) {
			$("#error_email").text(error[0].innerHTML);
		}
		else if (element.attr("name") == "phone_number" ) {
			$("#error_phone_number").text(error[0].innerHTML);
		}
		else if (element.attr("name") == "password" ) {
			$("#error_password").text(error[0].innerHTML);
		}
		else if (element.attr("name") == "confirm_password" ) {
			$("#error_confirm_password").text(error[0].innerHTML);
		}
	},
	success: function(element) {

		if (element.attr("name") == "full_name" ) {
			$(element).closest('.control-group').find('#error_full_name').addClass('valid');
		}
		else if (element.attr("name") == "email" ) {
			$(element).closest('.control-group').find('#error_email').addClass('valid');
		}
		else if (element.attr("name") == "phone_number" ) {
			$(element).closest('.control-group').find('#error_phone_number').addClass('valid');
		}
		else if (element.attr("name") == "password" ) {
			$(element).closest('.control-group').find('#error_password').addClass('valid');
		}
		else if (element.attr("name") == "confirm_password" ) {
			$(element).closest('.control-group').find('#error_confirm_password').addClass('valid');
		}
	},
	submitHandler: function (form) {
		$(form).ajaxSubmit();
	}
});