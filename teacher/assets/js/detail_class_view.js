// const graphic = [];
// bank_of_competencies.forEach(function(bank_of_competencies){
// 	if(bank_of_competencies['is_used'] != 0){
// 		graphic.push({
// 			"x"  :bank_of_competencies['name'],
// 			"y" : bank_of_competencies['total']
// 		});
// 	}
// });
// var chart = new ej.charts.Chart({
// 	title: "Bank of Competencies",
// 	tooltip: {enable: true},
//     //Initializing Primary X Axis
//     primaryXAxis: {
//         valueType: "Category",
//         labelPlacement: "OnTicks",
//         interval: 1,
//     },
//     //Initializing Primary Y Axis
//     primaryYAxis: {
//         minimum: 0,
//         maximum: 20,
//         interval: 2,
//         edgeLabelPlacement: "Shift",
//         labelFormat: ""
//     },
//     //Initializing Chart Series
//     series: [
//         {
//             type: "Radar",
// 			drawType: 'Area',
// 			//fill: '#00f0ff',
//             dataSource: graphic,
//             xName: "x",
//             width: 2,
//             yName: "y",
//             name: "Bank of Competencies",
// 			marker: {
// 				 visible: true,
// 		   }
//         }
//     ],
// });
// chart.appendTo("#container");
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
// end of custom alert
function copy_mission(class_id,mission_id) {
	//console.log(mission_id);
	document.getElementById("loading-overlay").style.display = 'block';
	$.ajax({
        type: 'post',
        url: base_url+'classes/copy_meeting',
        data: {
			class_id: class_id,
            mission_id: mission_id,
        },
        success: function(data) {
			//console.log(data);
			url = base_url+"meeting/details/"+data;
			customAlert.alert('Meeting has been successfully copied.',"Successfully Copied!",url);
        }
    });
}
function delete_mission(index){
	document.getElementById("class_mission_id").value = index;
	$('#modal_delete_meeting').modal('toggle')
}
$("#delete_meeting").click(function() {
	document.getElementById("loading-overlay-modal-delete-meeting").style.display = 'block';
	$.ajax({
        type: 'post',
        url: base_url+'classes/delete_class_mission',
        data: {
            class_mission_id: $('#class_mission_id').val()
        },
        success: function(data) {
			document.getElementById("loading-overlay").style.display = 'none';
			url = base_url+"classes/details/"+data+"/1";
			customAlert.alert('Meeting has been successfully deleted.',"Successfully Deleted!",url);
        }
    });
});
$("#start_class").click(function() {
	document.getElementById("loading-overlay-modal-start").style.display = 'block';
	$.ajax({
        type: 'post',
        url: base_url+'classes/update_status_class',
        data: {
            class_id: $('#class_id').val(),
            status_class_id: 1
        },
        success: function(data) {
			document.getElementById("loading-overlay-modal-start").style.display = 'none';
			if(data == "sukses"){
				$('#modal_start_class').modal('hide');
				location.reload();
				alert("Start class success");
			}else if(data == "failed"){
				alert("Please fill up mission detail");
				$('#modal_start_class').modal('hide');
			}
        }
    });
});
$("#finish_class").click(function() {
	document.getElementById("loading-overlay-modal-finish").style.display = 'block';
	$.ajax({
        type: 'post',
        url: base_url+'classes/update_status_class',
        data: {
            class_id: $('#class_id').val(),
            status_class_id: 2
        },
        success: function(data) {
			document.getElementById("loading-overlay-modal-finish").style.display = 'none';
			if(data == "sukses"){
				$('#modal_start_class').modal('hide');
				location.reload();
				alert("Start class success");
			}else if(data == "failed"){
				alert("Please fill up mission detail");
				$('#modal_start_class').modal('hide');
			}
        }
    });
});
$("#cancel_class").click(function() {
	document.getElementById("loading-overlay-modal-cancel").style.display = 'block';
	var class_id = $('#class_id').val();
	$.ajax({
        type: 'post',
        url: base_url+'classes/delete_class/'+class_id,
        data: {
            // class_id: $('#class_id').val(),
            // status_class_id: 3
        },
        success: function(data) {
			// document.getElementById("loading-overlay-modal-cancel").style.display = 'none';
			// if(data == "sukses"){
			// 	$('#modal_start_class').modal('hide');
			// 	location.reload();
			// 	alert("Class Cancel");
			// }else if(data == "failed"){
			// 	alert("Please fill up mission detail");
			// }
			url = base_url+"classes/";
			customAlert.alert('Class has been successfully deleted.',"Successfully Deleted!",url);
        }
    });
});
$("#copy_class").click(function() {
	//alert($('#academy_year_from_modal_copy').val());
	document.getElementById("loading-overlay-modal-copy").style.display = 'block';
	$.ajax({
        type: 'post',
        url: base_url+'classes/copy_class',
        data: {
            class_id: $('#class_id').val(),
            academy_year: $('#academy_year_from_modal_copy').val(),
        },
        success: function(data) {
			url = base_url+"classes/details/"+data+"/1";
			customAlert.alert('Class has been successfully copied.',"Successfully Copied!",url);
			// classes/details/121727949354/1
        }
    });
});
// customAlert.alert('Class has been successfully copied.',"Successfully Copied!");
$('.hide').delay(3000).fadeOut(300);