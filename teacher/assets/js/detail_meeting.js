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
            customAlert.alert('Meeting has been successfully deleted.',"Successfully Copied!",url);
        }
    });
});