$('#date_of_birth').datetimepicker({ //
	format: "dd-M-yyyy",
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
// custom alert
function CustomAlert(){
	this.alert = function(message,title,url){
	  document.body.innerHTML = document.body.innerHTML + '<div id="dialox"><div id="dialogoverlay"></div><div id="dialogbox" class="slit-in-vertical d-flex justify-content-center align-items-center"><div><div id="dialogboxhead"></div><div id="dialogboxbody"></div><div id="dialogboxfoot"></div></div></div></div>';
  
	  let dialogoverlay = document.getElementById('dialogoverlay');
	  let dialox = document.getElementById('dialox');
	  
	  let winH = window.innerHeight;
	  dialogoverlay.style.height = winH+"px";
	  dialox.style.display = "block";
	  
	  document.getElementById('dialogboxhead').style.display = 'block';
  
	  if(typeof title === 'undefined') {
		document.getElementById('dialogboxhead').style.display = 'none';
	  } else {
		document.getElementById('dialogboxhead').innerHTML = '<i class="fa fa-exclamation-circle" aria-hidden="true"></i> '+ title;
	  }
	  document.getElementById('dialogboxbody').innerHTML = message;
	  document.getElementById('dialogboxfoot').innerHTML = '<button onclick="customAlert.ok()">OK</button>';
	}
	
	this.ok = function(){
	  dialox.style.display = "none";
	  if(url != null){
		window.location.href = url;
	  }
	}
}
let customAlert = new CustomAlert();
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
			extension: "jpg|jpeg|png"
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
			maxlength: 140
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
		}
	},
	messages: {
		"user_input_image": {
			required: "Please upload an image",
			extension: "Please upload image in these format only (jpg, jpeg, png)"
		},
		"full_name": {
			required: "Please enter full name",
			minlength: "Minimum of 9 characters",
			maxlengthlength: "Maximum of 12 characters"
		},
		"email": {
			required: "Please enter email",
			minlength: "Minimum of 9 characters",
			maxlength: "Maximum of 12 characters"
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
			maxlength: "Maximum of 140 characters"
		},
		"user_gender": {
			required: "Please choose gender"
		},
		"institution": {
			required: "Please choose institution"
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
		$("#error_confirm_password").text("Please re-type confirm password.");
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
				$('#modal_edit_password').modal('hide');
				$("#error_user_password").text("");
				$("#error_confirm_password").text("");
				alert("Password has been successfully updated.");
				$('#modal_edit_password').modal('hide');
			} 
		});
	}
});
$('.hide').delay(3000).fadeOut(300);