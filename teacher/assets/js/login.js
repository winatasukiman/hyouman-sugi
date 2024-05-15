$('.toggle-password').on('click', function() {
	$(this).toggleClass('fa-eye fa-eye-slash');
	let input = $($(this).attr('toggle'));

	if (input.attr('type') == 'password') {
		input.attr('type', 'text');
	} else {
		input.attr('type', 'password');
	}
});
$("#form_login").validate({
	onfocusout: false,
	rules: {
		"email": {
			required: true,
			email: true
		},
		"password": {
			required: true,
			digits: true,
			minlength: 6,
			maxlength: 6
		}
	},
	messages: {
		"email": {
			required: "Please enter email."
		},
		"password": {
			required: "Please enter password.",
			digits: "Please type number only.",
			minlength: "Minimum 6-digit number.",
			maxlength: "Maximum 6-digit number."
		}
	},
	errorPlacement: function(error, element) {
		if (element.attr("name") == "email" ) {
			$("#error_email").text(error[0].innerHTML);
		}
		else if (element.attr("name") == "password" ) {
			$("#error_password").text(error[0].innerHTML);
		}
	},
	success: function(element) {
		if (element.attr("name") == "email" ) {
			$(element).closest('.control-group').find('#error_email').addClass('valid');
		}
		else if (element.attr("name") == "password" ) {
			$(element).closest('.control-group').find('#error_password').addClass('valid');
		}
	},
	submitHandler: function (form) {
		$(form).ajaxSubmit();
	}
});