var today = new Date();
var date = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();
var time = today.getHours() + ':' + today.getMinutes();
var datetime = date + ' ' + time;
$('#date').datetimepicker({
	format: "dd MM yyyy - hh:ii",
	showMeridian: 0,
	autoclose: true,
	todayBtn: true,
	keyboardNavigation: true,
	minuteStep: 5,
	//startDate: datetime,
	orientation: "top"
	//endDate: datetime
});
$("#form_add_strength").validate({
	onfocusout: false,
	rules: {
		"reference[]": { //file
			required: true,
			extension: "jpg|jpeg|png",
			filesize: 104857600 // in bytes (100 MB)
		},
		"activity_title": {
			required: true
		},
		"date": {
			required: true
		},
		"general_description": {
			required: true
		}
	},
	messages: {
		"reference[]": {
			required: "Please upload an image",
			extension: "Please upload image in these format only (jpg, jpeg, png)"
		},
		"activity_title": {
			required: "Please insert activity title"
		},
		"date": {
			required: "Please choose date"
		},
		"general_description": {
			required: "Please insert general description"
		}
	},
	errorPlacement: function(error, element) {
		//Custom position: first name
		if (element.attr("name") == "reference[]") {
			$("#error_reference").text(error[0].innerHTML);
		}else if (element.attr("name") == "activity_title") {
			$("#error_activity_title").text(error[0].innerHTML);
		}else if (element.attr("name") == "date") {
			$("#error_date").text(error[0].innerHTML);
		}else if (element.attr("name") == "general_description") {
			$("#error_general_description").text(error[0].innerHTML);
		}
	},
	success: function(element) {
		if (element.attr("name") == "reference[]") {
			$(element).closest('.control-group').find('#error_reference').addClass('valid');
		} else if (element.attr("name") == "activity_title") {
			$(element).closest('.control-group').find('#error_activity_title').addClass('valid');
		} else if (element.attr("name") == "date") {
			$(element).closest('.control-group').find('#error_date').addClass('valid');
		} else if (element.attr("name") == "general_description") {
			$(element).closest('.control-group').find('#error_general_description').addClass('valid');
		} 
	},
	submitHandler: function(form) {
		// if valid
		$(form).ajaxSubmit();
	}
});
$.validator.addMethod('filesize', function(value, element, param) {
                return this.optional(element) || (Math.round(element.files[0].size / 1024) <= param);
            },
            "Please upload image with maximum size 104857600 b");

$(function() {
    // Multiple images preview in browser
    var imagesPreview = function(input, placeToInsertImagePreview) {
		//$( ".gallery" ).load(window.location.href + " .gallery" );
		//alert(input.files.length);
        if (input.files) {
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
				
                var reader = new FileReader();

                reader.onload = function(event) {
					
                    $($.parseHTML('<img class="img-fluid">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

    };

    $('#reference').on('change', function() {
		document.getElementById("gallery").innerHTML = "";
        imagesPreview(this, 'div.gallery');
    });
});