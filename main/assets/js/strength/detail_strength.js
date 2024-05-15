$("body").delegate("#strength_capture", "click", function(e) {
	document.getElementById("div_strength_capture").style.display = 'block';
	document.getElementById("div_bsteams").style.display = 'none';
	document.getElementById("div_summary").style.display = 'none';
});
$("body").delegate("#bsteams", "click", function(e) {
	document.getElementById("div_strength_capture").style.display = 'none';
	document.getElementById("div_bsteams").style.display = 'block';
	document.getElementById("div_summary").style.display = 'none';
});
$("body").delegate("#summary", "click", function(e) {
	document.getElementById("div_strength_capture").style.display = 'none';
	document.getElementById("div_bsteams").style.display = 'none';
	document.getElementById("div_summary").style.display = 'block';
});
$(".sidenav > .sn-item").click(function() {
	$(".sidenav > .sn-item").removeClass("active");
	$(this).addClass("active");
});
function view_detail(i) {
	$('#div_content'+i).slideToggle("medium");
	document.getElementById("view_less"+i).style.display = 'block';
	document.getElementById("view_detail"+i).style.display = 'none';
}
function view_less(i) {
	$('#div_content'+i).slideToggle("medium");
	document.getElementById("view_less"+i).style.display = 'none';
	document.getElementById("view_detail"+i).style.display = 'block';
}
function open_capture_activites(strength_student_detail_id,strength_capture_id,strength_student_id) {
	$('#strength_student_detail_id').val(strength_student_detail_id);
	$('#strength_student_id').val(strength_student_id);
	$.ajax({
        type: 'post',
        url: base_url+'strength/get_servicing_item',
        data: {
            strength_capture_id: strength_capture_id,
        },
        success: function(data) {
            $('#servicing_item').html(data);
        }
    });
	$('#modal_capture_activities').modal('show');
}
$("#form_add_strength_student_detail").validate({
	onfocusout: false,
	rules: {
		"reference[]": { //file
			//required: true,
			extension: "jpg|jpeg|png",
			filesize: 104857600 // in bytes (100 MB)
		},
		"servicing_item": {
			required: true
		},
		"servicing_item_description": {
			required: true
		},
		"link_file": {
			required: true,
			linvalidator: true
		},
		"observation_result": {
			required: true
		}
	},
	messages: {
		"reference[]": {
			//required: "Please upload an image",
			extension: "Please upload image in these format only (jpg, jpeg, png)"
		},
		"servicing_item": {
			required: "Please choose servicing item"
		},
		"servicing_item_description": {
			required: "Please insert servicing item description"
		},
		"link_file": {
			required: "Please insert link file"
		},
		"observation_result": {
			required: "Please choose observation result"
		}
	},
	errorPlacement: function(error, element) {
		//Custom position: first name
		if (element.attr("name") == "reference[]") {
			$("#error_reference").text(error[0].innerHTML);
		}else if (element.attr("name") == "servicing_item") {
			$("#error_servicing_item").text(error[0].innerHTML);
		}else if (element.attr("name") == "servicing_item_description") {
			$("#error_servicing_item_description").text(error[0].innerHTML);
		}else if (element.attr("name") == "link_file") {
			$("#error_link_file").text(error[0].innerHTML);
		}else if (element.attr("name") == "observation_result") {
			$("#error_observation_result").text(error[0].innerHTML);
		}
	},
	success: function(element) {
		if (element.attr("name") == "reference[]") {
			$(element).closest('.control-group').find('#error_reference').addClass('valid');
		} else if (element.attr("name") == "servicing_item") {
			$(element).closest('.control-group').find('#error_servicing_item').addClass('valid');
		} else if (element.attr("name") == "servicing_item_description") {
			$(element).closest('.control-group').find('#error_servicing_item_description').addClass('valid');
		} else if (element.attr("name") == "link_file") {
			$(element).closest('.control-group').find('#error_link_file').addClass('valid');
		} else if (element.attr("name") == "observation_result") {
			$(element).closest('.control-group').find('#error_observation_result').addClass('valid');
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
 jQuery.validator.addMethod("linvalidator", function(value, element) {
		
                var pattern = new RegExp('^(https?:\\/\\/)?'+ // protocol
					'((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|'+ // domain name
					'((\\d{1,3}\\.){3}\\d{1,3}))'+ // OR ip (v4) address
					'(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*'+ // port and path
					'(\\?[;&a-z\\d%_.~+=-]*)?'+ // query string
					'(\\#[-a-z\\d_]*)?$','i'); // fragment locator
				  return !!pattern.test(value);
            },
            "Please insert valid link");

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
// Hide FlashData message
$('.hide').delay(3000).fadeOut(300);
// const label_arr = [];
// const data_arr = [];
// student_strength_detail.forEach(function(student_strength_detail){
	// if (student_strength_detail['observation_result_id'] != null){
		// // graphic.push({ 
			// // "y" : student_strength_detail['observation_result_id'],
			// // "name"  : student_strength_detail['strength_student_detail_name']
		// // });
		// var input = student_strength_detail['strength_student_detail_name'];
		// var fields = input.split('(');
		// label_arr.push(student_strength_detail['strength_capture_inisial']+" - "+fields[0]);
		// data_arr.push(student_strength_detail['observation_result_id']);
	// }
// });
// console.log(label_arr);
// console.log(data_arr);
// var ctx = document.getElementById('myChart');
// var myChart = new Chart(ctx, {
    // type: 'bar',
    // data: {
        // labels: label_arr,
        // datasets: [{
            // data: data_arr,
            // backgroundColor: [
                // 'rgba(255, 99, 132, 0.2)',
                // 'rgba(54, 162, 235, 0.2)',
                // 'rgba(255, 206, 86, 0.2)',
                // 'rgba(75, 192, 192, 0.2)',
                // 'rgba(153, 102, 255, 0.2)',
                // 'rgba(255, 159, 64, 0.2)'
            // ],
            // borderColor: [
                // 'rgba(255, 99, 132, 1)',
                // 'rgba(54, 162, 235, 1)',
                // 'rgba(255, 206, 86, 1)',
                // 'rgba(75, 192, 192, 1)',
                // 'rgba(153, 102, 255, 1)',
                // 'rgba(255, 159, 64, 1)'
            // ],
            // borderWidth: 1
        // }]
    // },
    // options: {
        // scales: {
            // y: {
                // beginAtZero: true
            // }
        // }
    // }
// });
// radar.js
const graphic = [];
strength_capture_detail.forEach(function(strength_capture_detail){
	var input = strength_capture_detail['strength_capture_detail_name'];
	var fields = input.split('(');
	graphic.push({
		"x" : strength_capture_detail['strength_capture_inisial']+" - "+fields[0],
		"y" : strength_capture_detail['total']
	});
});
var chart = new ej.charts.Chart({
	title: "STRENGTH Capture Student",
	tooltip: {enable: true},
    //Initializing Primary X Axis
    primaryXAxis: {
        valueType: "Category",
        labelPlacement: "OnTicks",
        interval: 1,
    },
    //Initializing Primary Y Axis
    primaryYAxis: {
        minimum: 0,
        maximum: 4,
        interval: 1,
        edgeLabelPlacement: "Shift",
        labelFormat: ""
    },
    //Initializing Chart Series
    series: [
        {
            type: "Radar",
			drawType: 'Area',
			//fill: '#00f0ff',
            dataSource: graphic,
            xName: "x",
            width: 2,
            yName: "y",
            name: "STRENGTH",
			marker: {
				 visible: true,
		   }
        }
    ],
});
chart.appendTo("#container");