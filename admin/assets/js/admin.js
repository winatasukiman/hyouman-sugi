$("body").delegate("#payment", "click", function(e) {
	document.getElementById("div_payment").style.display = 'block';
	document.getElementById("div_nisn").style.display = 'none';
	document.getElementById("div_add_students").style.display = 'none';
});
$("body").delegate("#nisn", "click", function(e) {
	document.getElementById("div_payment").style.display = 'none';
	document.getElementById("div_nisn").style.display = 'block';
	document.getElementById("div_add_students").style.display = 'none';
});
$("body").delegate("#add_students", "click", function(e) {
	document.getElementById("div_payment").style.display = 'none';
	document.getElementById("div_add_students").style.display = 'block';
	document.getElementById("div_nisn").style.display = 'none';
});
//sidenav profile,report, dll
$(".sidenav > .sn-item").click(function() {
	$(".sidenav > .sn-item").removeClass("active");
	$(this).addClass("active");
});
// Data Table
$('#user_table').DataTable();
$('#user_payment').DataTable();
$('#user_payment_2').DataTable();

$("body").delegate("#show_modal_update_nisn", "click", function(ev) {
	var id = $(this).parents("tr").attr("id");
	$('#user_id').val(id);
	$('#modal_update_nisn').modal('show');
});
$("#form_update_nisn").validate({
	onfocusout: false,
	rules: {
		"nisn_numb": {
			required: true,
			digits:true
		}
	},
	messages: {
		"nisn_numb": {
			required: "Please fill this column",
			digits: "Number only"
		}
	},
	errorPlacement: function(error, element) {
		//Custom position: first name
		if (element.attr("name") == "nisn_numb") {
			$("#error_nisn").text(error[0].innerHTML);
		} 
	},
	success: function(element) {

		if (element.attr("name") == "nisn_numb") {
			$(element).closest('.control-group').find('#error_nisn').addClass('valid');
		}
	},
	submitHandler: function(form) {

		// // if valid
		var user_id = $("#user_id").val();
		var nisn = $("#nisn_numb").val();
		$.ajax({
			type: 'post',
			url: base_url+'/admin/update_nisn/',
			data: {
				nisn:nisn,
				user_id:user_id
			},
			success: function(data) {
				
				var data = JSON.parse(data);
				var output = "";
				output += "<div class='col-md-11 col-11'>";
						output += "<table id='user_table' class='table table-bordered table-responsive-md'>";
							output += "<thead>";
								output += "<tr>";
									output += "<th class='text15 text_bold'>User ID</th>";
									output += "<th class='text15 text_bold'>Full Name</th>";
									output += "<th class='text15 text_bold'>NISN</th>";
									output += "<th class='text15 text_bold'>Update NISN</th>";
								output += "</tr>";
							output += "</thead>";
							output += "<tbody>";
				for (i = 0; i<data.length; i++) {
					if(data[i].status_payment == 1){
								output += "<tr id="+data[i].user_id+">";
									output += "<td class='text15 text_light'>"+data[i].user_id+"</td>";
									output += "<td class='text15 text_light'>"+data[i].full_name+"</td>";
									output += "<td class='text15 text_light'>"+data[i].nisn+"</td>";
									output += "<td class='text15 text_light'><a class='btn update_nisn' id='show_modal_update_nisn'>Update NISN</a></td>";
								output += "</tr>";
					}
				}
							output += "</tbody>";
					output += "</table>";
				output += "</div>";
				$('#div_user_table').html(output);
				$('#user_table').DataTable();
				$('#modal_update_nisn').modal('hide');
			}
		});
	}
});
$('#payment_date_time_1').datetimepicker({
	format: "dd MM yyyy - hh:ii",
	showMeridian: 0,
	autoclose: true,
	todayBtn: true,
	keyboardNavigation: true,
	minuteStep: 5
});
$('#payment_date_time_2').datetimepicker({
	format: "dd MM yyyy - hh:ii",
	showMeridian: 0,	
	autoclose: true,
	todayBtn: true,
	keyboardNavigation: true,
	minuteStep: 5
});
$('#payment_date_time_multiple_1').datetimepicker({
	format: "dd MM yyyy - hh:ii",
	showMeridian: 0,
	autoclose: true,
	todayBtn: true,
	keyboardNavigation: true,
	minuteStep: 5
});
$('#payment_date_time_multiple_2').datetimepicker({
	format: "dd MM yyyy - hh:ii",
	showMeridian: 0,	
	autoclose: true,
	todayBtn: true,
	keyboardNavigation: true,
	minuteStep: 5
});
$("body").delegate("#show_modal_update_payment_1", "click", function(ev) {
	var id = $(this).parents("tr").attr("id");
	$('#user_payment_id_1').val(id);
	$('#modal_update_payment_1').modal('show');
});
$("body").delegate("#show_modal_update_payment_2", "click", function(ev) {
	var id = $(this).parents("tr").attr("id");
	$('#user_payment_id_2').val(id);
	$('#modal_update_payment_2').modal('show');
});

$("#form_update_payment_1").validate({
	onfocusout: false,
	rules: {
		"payment_date_time_1": {
			required: true
		}
	},
	messages: {
		"payment_date_time_1": {
			required: "Please fill this column"
		}
	},
	errorPlacement: function(error, element) {
		//Custom position: first name
		if (element.attr("name") == "payment_date_time_1") {
			$("#error_payment_date_time_1").text(error[0].innerHTML);
		} 
	},
	success: function(element) {

		if (element.attr("name") == "payment_date_time_1") {
			$(element).closest('.control-group').find('#error_payment_date_time_1').addClass('valid');
		}
	},
	submitHandler: function(form) {

		// // if valid
		var user_payment_id_1 = $("#user_payment_id_1").val();
		var payment_date_time_1 = $("#payment_date_time_1").val();
		$.ajax({
			type: 'post',
			url: base_url+'/admin/update_user_payment_1/',
			data: {
				user_payment_id_1:user_payment_id_1,
				payment_date_time_1:payment_date_time_1
			},
			success: function(data) {
				location.reload();
			}
		});
	}
});
$("#form_update_payment_2").validate({
	onfocusout: false,
	rules: {
		"payment_date_time_2": {
			required: true
		}
	},
	messages: {
		"payment_date_time_2": {
			required: "Please fill this column"
		}
	},
	errorPlacement: function(error, element) {
		//Custom position: first name
		if (element.attr("name") == "payment_date_time_2") {
			$("#error_payment_date_time_2").text(error[0].innerHTML);
		} 
	},
	success: function(element) {

		if (element.attr("name") == "payment_date_time_2") {
			$(element).closest('.control-group').find('#error_payment_date_time_2').addClass('valid');
		}
	},
	submitHandler: function(form) {

		// // if valid
		var user_payment_id_2 = $("#user_payment_id_2").val();
		var payment_date_time_2 = $("#payment_date_time_2").val();
		$.ajax({
			type: 'post',
			url: base_url+'/admin/update_user_payment_2/',
			data: {
				user_payment_id_2:user_payment_id_2,
				payment_date_time_2:payment_date_time_2
			},
			success: function(data) {
				if(data == "false"){
					alert("Admin check cannot be same");
				}else if(data == "true"){
					location.reload();
				}
			}
		});
	}
});
$("#form_update_payment_multiple_1").validate({
	onfocusout: false,
	rules: {
		"payment_date_time_multiple_1": {
			required: true
		}
	},
	messages: {
		"payment_date_time_multiple_1": {
			required: "Please fill this column"
		}
	},
	errorPlacement: function(error, element) {
		//Custom position: first name
		if (element.attr("name") == "payment_date_time_multiple_1") {
			$("#error_payment_date_time_multiple_1").text(error[0].innerHTML);
		} 
	},
	success: function(element) {

		if (element.attr("name") == "payment_date_time_multiple_1") {
			$(element).closest('.control-group').find('#error_payment_date_time_multiple_1').addClass('valid');
		}
	},
	submitHandler: function(form) {
		var user_payment_id = [];
		$.each($("input[name='chk_user_payment_id_1']:checked"), function(){
			user_payment_id.push($(this).val());
		});
		var jsonString = JSON.stringify(user_payment_id);
		
		// // if valid
		var payment_date_time_multiple_1 = $("#payment_date_time_multiple_1").val();
		$.ajax({
			type: 'post',
			url: base_url+'/admin/update_user_payment_multiple_1/',
			data: {
				user_payment_id_1:jsonString,
				payment_date_time_multiple_1:payment_date_time_multiple_1
			},
			success: function(data) {
				location.reload();
			}
		});
	}
});
$("#form_update_payment_multiple_2").validate({
	onfocusout: false,
	rules: {
		"payment_date_time_multiple_2": {
			required: true
		}
	},
	messages: {
		"payment_date_time_multiple_2": {
			required: "Please fill this column"
		}
	},
	errorPlacement: function(error, element) {
		//Custom position: first name
		if (element.attr("name") == "payment_date_time_multiple_2") {
			$("#error_payment_date_time_multiple_2").text(error[0].innerHTML);
		} 
	},
	success: function(element) {

		if (element.attr("name") == "payment_date_time_multiple_2") {
			$(element).closest('.control-group').find('#error_payment_date_time_multiple_2').addClass('valid');
		}
	},
	submitHandler: function(form) {
		var user_payment_id = [];
		$.each($("input[name='chk_user_payment_id_2']:checked"), function(){
			user_payment_id.push($(this).val());
		});
		var jsonString = JSON.stringify(user_payment_id);
		// // if valid
		var payment_date_time_multiple_2 = $("#payment_date_time_multiple_2").val();
		$.ajax({
			type: 'post',
			url: base_url+'/admin/update_user_payment_multiple_2/',
			data: {
				user_payment_id_2:jsonString,
				payment_date_time_multiple_2:payment_date_time_multiple_2
			},
			success: function(data) {
				if(data == "false"){
					alert("Admin check cannot be same");
				}else{
					location.reload();
				}
			}
		});
	}
});

$("#form_update_payment_multiple_2").validate({
	onfocusout: false,
	rules: {
		"payment_date_time_multiple_2": {
			required: true
		}
	},
	messages: {
		"payment_date_time_multiple_2": {
			required: "Please fill this column"
		}
	},
	errorPlacement: function(error, element) {
		//Custom position: first name
		if (element.attr("name") == "payment_date_time_multiple_2") {
			$("#error_payment_date_time_multiple_2").text(error[0].innerHTML);
		} 
	},
	success: function(element) {

		if (element.attr("name") == "payment_date_time_multiple_2") {
			$(element).closest('.control-group').find('#error_payment_date_time_multiple_2').addClass('valid');
		}
	},
	submitHandler: function(form) {
		var user_payment_id = [];
		$.each($("input[name='chk_user_payment_id_2']:checked"), function(){
			user_payment_id.push($(this).val());
		});
		var jsonString = JSON.stringify(user_payment_id);
		// // if valid
		var payment_date_time_multiple_2 = $("#payment_date_time_multiple_2").val();
		$.ajax({
			type: 'post',
			url: base_url+'/admin/update_user_payment_multiple_2/',
			data: {
				user_payment_id_2:jsonString,
				payment_date_time_multiple_2:payment_date_time_multiple_2
			},
			success: function(data) {
				if(data == "false"){
					alert("Admin check cannot be same");
				}else{
					location.reload();
				}
			}
		});
	}
});