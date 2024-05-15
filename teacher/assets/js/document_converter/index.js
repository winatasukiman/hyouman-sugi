// custom alert
function CustomAlert(){
	var url2 = "";
	this.alert = function(message,title,url){
	  url2 = url;
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
	  //location.reload();
	  if(url2 != null){
		//window.location.href = url;
		window.open(url2);
	  }
	  location.reload();
	}
}
let customAlert = new CustomAlert();
//Converter
// $('#doc_conv').click(function(){ 
// 	document.getElementById("doc_conv").style.cssText = 'background-color:#FFFFFF !important';
// });
$('#doc_conv').change(function(){
	//alert("a");
    var value = $(this).val();
	document.getElementById("prota").style.display = 'none';
	document.getElementById("promes").style.display = 'none';
	document.getElementById("syllabus").style.display = 'none';
	document.getElementById("learning_guide").style.display = 'none';
	document.getElementById(value).style.display = 'block';
	// document.getElementById("doc_conv").style.cssText = 'background-color:#D8E0E7 !important';
});
$( document ).ready(function() {
    $("#form_convert_prota").validate({
		rules: {
			"academy_year_prota": {
				required: true
			},
			"grade_subject_prota": {
				required: true
			}
		},
		messages: {
			"academy_year_prota": {
				required: "Please choose"
			},
			"grade_subject_prota": {
				required: "Please choose"
			}
		},
		errorPlacement: function(error, element) {
			//Custom position: first name
			if (element.attr("name") == "academy_year_prota") {
				$("#error_academy_year_prota").text(error[0].innerHTML);
			}
			else if (element.attr("name") == "grade_subject_prota" ) {
				$("#error_grade_subject_prota").text(error[0].innerHTML);
			}
		},
		success: function(element) {
			if (element.attr("name") == "academy_year_prota") {
				$(element).closest('.control-group').find('#error_academy_year_prota').addClass('valid');
			} 
			else if (element.attr("name") == "grade_subject_prota" ) {
				$(element).closest('.control-group').find('#error_grade_subject_prota').addClass('valid');
			}
		},
		submitHandler: function(form,e) {
			e.preventDefault();
			document.getElementById("loading-overlay").style.display = 'block';
			$.ajax({
				type: 'post',
				url: base_url+'download_pdf/check_prota',
				data: {
					academy_year_prota: $('#academy_year_prota').val(),
					grade_subject_prota: $('#grade_subject_prota').val(),
				},
				success: function(data) {
					//alert(data);
					document.getElementById("loading-overlay").style.display = 'none';
					if(data == "not null"){
						// if valid
						$(form).submit();
					}else{
						alert("Data not found");
					}
				}
			});
			
		}
	});
	$("#form_convert_promes").validate({
		rules: {
			"academy_year_promes": {
				required: true
			},
			"grade_subject_promes": {
				required: true
			},
			"semester_promes": {
				required: true
			}
		},
		messages: {
			"academy_year_promes": {
				required: "Please choose"
			},
			"grade_subject_promes": {
				required: "Please choose"
			},
			"semester_promes": {
				required: "Please choose"
			}
		},
		errorPlacement: function(error, element) {
			//Custom position: first name
			if (element.attr("name") == "academy_year_promes") {
				$("#error_academy_year_promes").text(error[0].innerHTML);
			}
			else if (element.attr("name") == "grade_subject_promes" ) {
				$("#error_grade_subject_promes").text(error[0].innerHTML);
			}
			else if (element.attr("name") == "semester_promes" ) {
				$("#error_semester_promes").text(error[0].innerHTML);
			}
		},
		success: function(element) {
			if (element.attr("name") == "academy_year_promes") {
				$(element).closest('.control-group').find('#error_academy_year_promes').addClass('valid');
			} 
			else if (element.attr("name") == "grade_subject_promes" ) {
				$(element).closest('.control-group').find('#error_grade_subject_promes').addClass('valid');
			}
			else if (element.attr("name") == "semester_promes" ) {
				$(element).closest('.control-group').find('#error_semester_promes').addClass('valid');
			}
		},
		submitHandler: function(form) {
			document.getElementById("loading-overlay").style.display = 'block';
			// if valid
			$(form).submit();
		}
	});
	$("#form_convert_syllabus").validate({
		rules: {
			"academy_year_syllabus": {
				required: true
			},
			"grade_subject_syllabus": {
				required: true
			},
			"semester_syllabus": {
				required: true
			}
		},
		messages: {
			"academy_year_syllabus": {
				required: "Please choose"
			},
			"grade_subject_syllabus": {
				required: "Please choose"
			},
			"semester_syllabus": {
				required: "Please choose"
			}
		},
		errorPlacement: function(error, element) {
			//Custom position: first name
			if (element.attr("name") == "academy_year_syllabus") {
				$("#error_academy_year_syllabus").text(error[0].innerHTML);
			}
			else if (element.attr("name") == "grade_subject_syllabus" ) {
				$("#error_grade_subject_syllabus").text(error[0].innerHTML);
			}
			else if (element.attr("name") == "semester_syllabus" ) {
				$("#error_semester_syllabus").text(error[0].innerHTML);
			}
		},
		success: function(element) {
			if (element.attr("name") == "academy_year_syllabus") {
				$(element).closest('.control-group').find('#error_academy_year_syllabus').addClass('valid');
			} 
			else if (element.attr("name") == "grade_subject_syllabus" ) {
				$(element).closest('.control-group').find('#error_grade_subject_syllabus').addClass('valid');
			}
			else if (element.attr("name") == "semester_syllabus" ) {
				$(element).closest('.control-group').find('#error_semester_syllabus').addClass('valid');
			}
		},
		submitHandler: function(form) {
			document.getElementById("loading-overlay").style.display = 'block';
			// if valid
			$(form).submit();
		}
	});
	$("#form_convert_learning_guide").validate({
		rules: {
			"academy_year_learning_guide": {
				required: true
			},
			"grade_learning_guide": {
				required: true
			},
			"week_learning_guide": {
				required: true
			},
			"term_learning_guide": {
				required: true
			}
		},
		messages: {
			"academy_year_learning_guide": {
				required: "Please choose"
			},
			"grade_learning_guide": {
				required: "Please choose"
			},
			"week_learning_guide": {
				required: "Please choose"
			},
			"term_learning_guide": {
				required: "Please choose"
			}
		},
		errorPlacement: function(error, element) {
			//Custom position: first name
			if (element.attr("name") == "academy_year_learning_guide") {
				$("#error_academy_year_learning_guide").text(error[0].innerHTML);
			}
			else if (element.attr("name") == "grade_learning_guide" ) {
				$("#error_grade_learning_guide").text(error[0].innerHTML);
			}
			else if (element.attr("name") == "week_learning_guide" ) {
				$("#error_week_learning_guide").text(error[0].innerHTML);
			}
			else if (element.attr("name") == "term_learning_guide" ) {
				$("#error_term_learning_guide").text(error[0].innerHTML);
			}
		},
		success: function(element) {
			if (element.attr("name") == "academy_year_learning_guide") {
				$(element).closest('.control-group').find('#error_academy_year_learning_guide').addClass('valid');
			} 
			else if (element.attr("name") == "grade_learning_guide" ) {
				$(element).closest('.control-group').find('#error_grade_learning_guide').addClass('valid');
			}
			else if (element.attr("name") == "week_learning_guide" ) {
				$(element).closest('.control-group').find('#error_week_learning_guide').addClass('valid');
			}
			else if (element.attr("name") == "term_learning_guide" ) {
				$(element).closest('.control-group').find('#error_term_learning_guide').addClass('valid');
			}
		},
		submitHandler: function(form) {
			document.getElementById("loading-overlay").style.display = 'block';
			// if valid
			$(form).submit();
		}
	});
	$("#convert_prota").click(function() {
		document.getElementById("loading-overlay").style.display = 'block';
		var valid = 1;
		var academy_year_prota = $('#academy_year_prota').val();
		var grade_subject_prota = $('#grade_subject_prota').val();
		if(academy_year_prota == null){
			valid = 0;
			$("#error_academy_year_prota").text("Mandatory Field");
		}else{
			$("#error_academy_year_prota").text("");
		}
		if(grade_subject_prota == null){
			valid = 0;
			$("#error_grade_subject_prota").text("Mandatory Field");
		}else{
			$("#error_grade_subject_prota").text("");
		}
		if(valid == 0){
			document.getElementById("loading-overlay").style.display = 'none';
			return;
		}
		if(valid == 1){
			$.ajax({
				type: 'post',
				url: base_url+'download_pdf/check_class_available',
				data: {
					academy_year: academy_year_prota,
					grade_subject: grade_subject_prota,
				},
				success: function(data) {
					//alert(data);
					document.getElementById("loading-overlay").style.display = 'none';
					if(data == "not null"){
						url = base_url+'download_pdf/prota/'+academy_year_prota+"/" +grade_subject_prota;
                        customAlert.alert('Please wait a moment as we process the data you are looking for.',"Data found!",url);
					}else{
						//alert("Data not found");
                        customAlert.alert("Sorry we couldn't find the data you're looking for.","Data not found!",null);
					}
				}
			});
		}
	});
	$("#convert_promes").click(function() {
		document.getElementById("loading-overlay").style.display = 'block';
		var valid = 1;
		var academy_year_promes = $('#academy_year_promes').val();
		var grade_subject_promes = $('#grade_subject_promes').val();
		var semester_promes = $('#semester_promes').val();
		if(academy_year_promes == null){
			valid = 0;
			$("#error_academy_year_promes").text("Mandatory Field");
		}else{
			$("#error_academy_year_promes").text("");
		}
		if(grade_subject_promes == null){
			valid = 0;
			$("#error_grade_subject_promes").text("Mandatory Field");
		}else{
			$("#error_grade_subject_promes").text("");
		}
		if(semester_promes == null){
			valid = 0;
			$("#error_semester_promes").text("Mandatory Field");
		}else{
			$("#error_semester_promes").text("");
		}
		if(valid == 0){
			document.getElementById("loading-overlay").style.display = 'none';
			return;
		}
		if(valid == 1){
			$.ajax({
				type: 'post',
				url: base_url+'download_pdf/check_class_available',
				data: {
					academy_year: academy_year_promes,
					grade_subject: grade_subject_promes,
					semester: semester_promes,
				},
				success: function(data) {
					//alert(data);
					document.getElementById("loading-overlay").style.display = 'none';
					if(data == "not null"){
						url = base_url+'download_pdf/promes/'+academy_year_promes+"/"+grade_subject_promes+"/"+semester_promes;
                        customAlert.alert('Please wait a moment as we process the data you are looking for.',"Data found!",url);
					}else{
						//alert("Data not found");
                        customAlert.alert("Sorry we couldn't find the data you're looking for.","Data not found!",null);
					}
				}
			});
		}
	});
	$("#convert_syllabus").click(function() {
		document.getElementById("loading-overlay").style.display = 'block';
		var valid = 1;
		var academy_year_syllabus = $('#academy_year_syllabus').val();
		var grade_subject_syllabus = $('#grade_subject_syllabus').val();
		var semester_syllabus = $('#semester_syllabus').val();
		if(academy_year_syllabus == null){
			valid = 0;
			$("#error_academy_year_syllabus").text("Mandatory Field");
		}else{
			$("#error_academy_year_syllabus").text("");
		}
		if(grade_subject_syllabus == null){
			valid = 0;
			$("#error_grade_subject_syllabus").text("Mandatory Field");
		}else{
			$("#error_grade_subject_syllabus").text("");
		}
		if(semester_syllabus == null){
			valid = 0;
			$("#error_semester_syllabus").text("Mandatory Field");
		}else{
			$("#error_semester_syllabus").text("");
		}
		if(valid == 0){
			document.getElementById("loading-overlay").style.display = 'none';
			return;
		}
		if(valid == 1){
			$.ajax({
				type: 'post',
				url: base_url+'download_pdf/check_class_available',
				data: {
					academy_year: academy_year_syllabus,
					grade_subject: grade_subject_syllabus,
					semester: semester_syllabus,
				},
				success: function(data) {
					//alert(data);
					document.getElementById("loading-overlay").style.display = 'none';
					if(data == "not null"){
						url = base_url+'download_pdf/syllabus/'+academy_year_syllabus+"/"+grade_subject_syllabus+"/"+semester_syllabus;
                        customAlert.alert('Please wait a moment as we process the data you are looking for.',"Data found!",url);
					}else{
						//alert("Data not found");
                        customAlert.alert("Sorry we couldn't find the data you're looking for.","Data not found!",null);
					}
				}
			});
		}
	});
	$("#convert_learning_guide").click(function() {
		document.getElementById("loading-overlay").style.display = 'block';
		var valid = 1;
		var academy_year_learning_guide = $('#academy_year_learning_guide').val();
		var grade_learning_guide = $('#grade_learning_guide').val();
		var week_learning_guide = $('#week_learning_guide').val();
		var term_learning_guide = $('#term_learning_guide').val();
		if(academy_year_learning_guide == null){
			valid = 0;
			$("#error_academy_year_learning_guide").text("Mandatory Field");
		}else{
			$("#error_academy_year_learning_guide").text("");
		}
		if(grade_learning_guide == null){
			valid = 0;
			$("#error_grade_learning_guide").text("Mandatory Field");
		}else{
			$("#error_grade_learning_guide").text("");
		}
		if(week_learning_guide == null){
			valid = 0;
			$("#error_week_learning_guide").text("Mandatory Field");
		}else{
			$("#error_week_learning_guide").text("");
		}
		if(term_learning_guide == null){
			valid = 0;
			$("#error_term_learning_guide").text("Mandatory Field");
		}else{
			$("#error_term_learning_guide").text("");
		}
		if(valid == 0){
			document.getElementById("loading-overlay").style.display = 'none';
			return;
		}
		if(valid == 1){
			$.ajax({
				type: 'post',
				url: base_url+'download_pdf/check_class_available_for_learning_guide',
				data: {
					academy_year: academy_year_learning_guide,
					grade: grade_learning_guide,
					term: term_learning_guide,
				},
				success: function(data) {
					//alert(data);
					document.getElementById("loading-overlay").style.display = 'none';
					if(data == "not null"){
						url = base_url+'download_pdf/learning_guide/'+academy_year_learning_guide+"/"+grade_learning_guide+"/"+term_learning_guide+"/"+week_learning_guide;
                        customAlert.alert('Please wait a moment as we process the data you are looking for.',"Data found!",url);
					}else{
						//alert("Data not found");
                        customAlert.alert("Sorry we couldn't find the data you're looking for.","Data not found!",null);
					}
				}
			});
		}
	});
});
function setSubjectLevel(id,name){
	teacher_specialty.forEach(function(ts){
		if(ts['grade_subject_id'] == id){
			document.getElementById("subject_level_"+name).innerHTML = ts['subject_parent_name'] +'-' + ts['grade_name'] + '-' + ts['subject_name'];
            document.getElementById("subject_level_"+name).style.padding = "8px";
			document.getElementById("grade_subject_"+name).value = id;
		}
	});
}
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