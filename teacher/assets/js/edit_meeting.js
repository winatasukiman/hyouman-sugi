class_mission.forEach(function(class_mission){
	CKEDITOR.replace('editor1_'+class_mission['class_mission_id'], {
		filebrowserUploadUrl: '',
		filebrowserUploadMethod: 'form'
	});
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
var i = 1;
var arr_i = [];
var today = new Date();
var date = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();
var time = today.getHours() + ':' + today.getMinutes();
var datetime = date + ' ' + time;
$('.dt_picker').datetimepicker({
	format: "dd MM yyyy - hh:ii",
	showMeridian: 0,
	autoclose: true,
	todayBtn: true,
	keyboardNavigation: true,
	minuteStep: 5,
	orientation:"top"
	// startDate: datetime
	//endDate: "17 01 2021 - 00:00"
});
$("#class_introduction").click(function() {
	$('.active').removeClass('active');
	var element = document.getElementById("class_introduction");
	element.classList.add("active");
	document.getElementById("div_class_introduction").style.display = 'block';
	// document.getElementById("div_goal_checklist").style.display = 'none';
	document.getElementById("div_mission").style.display = 'none';
	document.getElementById("div_class_setting").style.display = 'none';
});
function save_mission(index){
	document.getElementById("loading-overlay").style.display = 'block';
	var countCML = 0;
	var linkname = [];
	var linkvideo = [];
	var countCMLA = 0;
	var title = []; // opening Lesson activity
	var desc = [];// main Lesson activity
	var desc_2 = [];// close Lesson activity
	var countCMLO = 0;
	var content = [];
	var contentcc = [];
	var countCMR = 0;
	var linkname_res = [];
	var linkvideo_res = [];
	var boc_editor = CKEDITOR.instances['editor1_'+index].getData();
	$.ajax({
        type: 'post',
        url: base_url+'classes/get_count_class_mission_link_by_class_mission_id',
        data: {
            class_mission_id: index
        },
        success: function(data) {
			countCML = data;
			for(var i=0;i < countCML;i++){
				linkname.push($('#name'+index+i).val());
				linkvideo.push($('#link'+index+i).val());
			}
			$.ajax({
				type: 'post',
				url: base_url+'classes/get_count_class_mission_lesson_activities_by_class_mission_id',
				data: {
					class_mission_id: index
				},
				success: function(data) {
					countCMLA = data;
					for(var i=0;i < countCMLA;i++){
						title.push($('#title'+index+i).val());
						desc.push($('#desc'+index+i).val());
						desc_2.push($('#desc_2'+index+i).val());
					}
					// console.log(linkname);
					// console.log(linkvideo);
					// console.log(title);
					// console.log(desc);
					$.ajax({
						type: 'post',
						url: base_url+'classes/get_count_class_mission_learning_objectives_by_class_mission_id',
						data: {
							class_mission_id: index
						},
						success: function(data) {
							countCMLO = data;
							for(var i=0;i < countCMLO;i++){
								content.push($('#content'+index+i).val());
							}
							// console.log(linkname);
							// console.log(linkvideo);
							// console.log(title);
							// console.log(desc);
							$.ajax({
								type: 'post',
								url: base_url+'classes/get_count_class_mission_res_by_class_mission_id',
								data: {
									class_mission_id: index
								},
								success: function(data) {
									countCMR = data;
									for(var i=0;i < countCMR;i++){
										linkname_res.push($('#name_res'+index+i).val());
										linkvideo_res.push($('#link_res'+index+i).val());
									}	
									$.ajax({
										type: 'post',
										url: base_url+'classes/get_count_class_mission_core_concept_by_class_mission_id',
										data: {
											class_mission_id: index
										},
										success: function(data) {
											countCMCC = data;
											for(var i=0;i < countCMCC;i++){
												contentcc.push($('#contentcc'+index+i).val());
											}	
											$.ajax({
												type: 'post',
												url: base_url+'classes/update_class_mission',
												data: {
													class_mission_id: index,
													mission_title: $('#mission_title'+index).val(),
													mission_subtitle: $('#mission_subtitle'+index).val(),
													sub_topic: $('#sub_topic'+index).val(),
													week: $('#week'+index).val(),
													mission_description: $('#mission_description'+index).val(),
													task_description: $('#task_description'+index).val(),
													profil_pembelajaran_pancasila: $('#profil_pembelajaran_pancasila'+index).val(),
													core_skill: $('#core_skill'+index).val(),
													class_activity: $('#class_activity'+index).val(),
													linkname: linkname,
													linkvideo: linkvideo,
													linkname_res: linkname_res,
													linkvideo_res: linkvideo_res,
													title: title,
													desc: desc,
													desc_2: desc_2,
													content: content,
													contentcc: contentcc,
													publish_datetime: $('#publish_datetime'+index).val(),
													deadline_datetime: $('#task_deadline'+index).val(),
													google_meet_password: $('#google_meet_password'+index).val(),
													google_meet_link: $('#google_meet_link'+index).val(),
													face_to_face: $('#face_to_face'+index).val(),
													meeting_location: $('#location'+index).val(),
													resource: $('#resource'+index).val(),
													time_allocation_a: $('#time_allocation_a'+index).val(),
													time_allocation_b: $('#time_allocation_b'+index).val(),
													boc_editor: boc_editor,
													//phase: $('#phase'+index).val(),
													target_peserta_didik: $('#target_peserta_didik'+index).val(),
													jumlah_peserta_didik: $('#jumlah_peserta_didik'+index).val(),
													metode_pembelajaran: $('#metode_pembelajaran'+index).val(),
													kata_kunci: $('#kata_kunci'+index).val(),
													keterampilan: $('#keterampilan'+index).val(),
													pertanyaan_esensial: $('#pertanyaan_esensial'+index).val(),
													refleksi_guru: $('#refleksi_guru'+index).val(),
													pencapaian_tujuan_pembelajaran: $('#ptp'+index).val(),
													daftar_pustaka: $('#daftar_pustaka'+index).val()
												},
												success: function(data) {
													data = JSON.parse(data.replace(/'/g, '"'));
													//alert(data.message);
													document.getElementById("loading-overlay").style.display = 'none';
													url = base_url+"meeting/details/"+index;
													customAlert.alert('Meeting has been successfully updated.',"Successfully Updated!",url);
												}
											});
										}
									});	
								}
							});	
						}
					});
				}
			});
        }
    });
}
function add_link(index) {
	document.getElementById("loading-overlay").style.display = 'block';
	var countCML = 0;
	var linkname = [];
	var linkvideo = [];
	$.ajax({
        type: 'post',
        url: base_url+'classes/get_count_class_mission_link_by_class_mission_id',
        data: {
            class_mission_id: index
        },
        success: function(data) {
			countCML = data;
			//console.log(countCML);
			for(var i=0;i < countCML;i++){
				linkname.push($('#name'+index+i).val());
				linkvideo.push($('#link'+index+i).val());
			}
			//console.log(linkname);
			//console.log(linkvideo);
			$.ajax({
				type: 'post',
				url: base_url+'classes/update_class_mission_link',
				data: {
					class_mission_id: index,
					linkname: linkname,
					linkvideo: linkvideo
				},
				success: function(data) {
					$.ajax({
						type: 'post',
						url: base_url+'classes/insert_class_mission_link',
						data: {
							class_mission_id: index
						},
						success: function(data) {
							document.getElementById("loading-overlay").style.display = 'none';
							$( "#div_class_mission_link"+index ).load(window.location.href + " #div_class_mission_link"+index );
						}
					});
				}
			});
        }
    });
}
function delete_class_mission_link(id,index,idxArr) {
	document.getElementById("loading-overlay").style.display = 'block';
	var countCML = 0;
	var linkname = [];
	var linkvideo = [];
	$.ajax({
        type: 'post',
        url: base_url+'classes/get_count_class_mission_link_by_class_mission_id',
        data: {
            class_mission_id: index
        },
        success: function(data) {
			countCML = data;
			//console.log(countCML);
			for(var i=0;i < countCML;i++){
				if(idxArr != i){
					linkname.push($('#name'+index+i).val());
					linkvideo.push($('#link'+index+i).val());
				}
			}
			//console.log(linkname);
			//console.log(linkvideo);
			$.ajax({
				type: 'post',
				url: base_url+'meeting/delete_class_mission_link',
				data: {
					class_mission_link_id: id
				},
				success: function(data) {
					$.ajax({
						type: 'post',
						url: base_url+'classes/update_class_mission_link',
						data: {
							class_mission_id: index,
							linkname: linkname,
							linkvideo: linkvideo
						},
						success: function(data) {
							document.getElementById("loading-overlay").style.display = 'none';
							$( "#div_class_mission_link"+index ).load(window.location.href + " #div_class_mission_link"+index );
						}
					});
				}
			});
        }
    });
	
}
function add_res(index) {
	document.getElementById("loading-overlay").style.display = 'block';
	var countCML = 0;
	var linkname = [];
	var linkvideo = [];
	$.ajax({
        type: 'post',
        url: base_url+'classes/get_count_class_mission_res_by_class_mission_id',
        data: {
            class_mission_id: index
        },
        success: function(data) {
			countCML = data;
			//console.log(countCML);
			for(var i=0;i < countCML;i++){
				linkname.push($('#name_res'+index+i).val());
				linkvideo.push($('#link_res'+index+i).val());
			}
			//console.log(linkname);
			//console.log(linkvideo);
			$.ajax({
				type: 'post',
				url: base_url+'classes/update_class_mission_resource',
				data: {
					class_mission_id: index,
					linkname: linkname,
					linkvideo: linkvideo
				},
				success: function(data) {
					$.ajax({
						type: 'post',
						url: base_url+'classes/insert_class_mission_resource',
						data: {
							class_mission_id: index
						},
						success: function(data) {
							document.getElementById("loading-overlay").style.display = 'none';
							$( "#div_class_mission_res"+index ).load(window.location.href + " #div_class_mission_res"+index );
						}
					});
				}
			});
        }
    });
}
function delete_class_mission_res(id,index,idxArr) {
	document.getElementById("loading-overlay").style.display = 'block';
	var countCML = 0;
	var linkname = [];
	var linkvideo = [];
	$.ajax({
        type: 'post',
        url: base_url+'classes/get_count_class_mission_res_by_class_mission_id',
        data: {
            class_mission_id: index
        },
        success: function(data) {
			countCML = data;
			//console.log(countCML);
			for(var i=0;i < countCML;i++){
				if(idxArr!= i){
					linkname.push($('#name_res'+index+i).val());
					linkvideo.push($('#link_res'+index+i).val());
				}
			}
			$.ajax({
				type: 'post',
				url: base_url+'meeting/delete_class_mission_res',
				data: {
					class_mission_resource_id: id
				},
				success: function(data) {
					//console.log(linkname);
					//console.log(linkvideo);
					$.ajax({
						type: 'post',
						url: base_url+'classes/update_class_mission_resource',
						data: {
							class_mission_id: index,
							linkname: linkname,
							linkvideo: linkvideo
						},
						success: function(data) {
							document.getElementById("loading-overlay").style.display = 'none';
							$( "#div_class_mission_res"+index ).load(window.location.href + " #div_class_mission_res"+index );
						}
					});
				}
			});
        }
    });
}
function add_class_mission_lesson_activity(index) {
	document.getElementById("loading-overlay").style.display = 'block';
	var countCMLA = 0;
	var title = [];
	var desc = [];
	var desc_2 = [];
	$.ajax({
        type: 'post',
        url: base_url+'classes/get_count_class_mission_lesson_activities_by_class_mission_id',
        data: {
            class_mission_id: index
        },
        success: function(data) {
			countCMLA = data;
			//console.log(countCMLA);
			for(var i=0;i < countCMLA;i++){
				title.push($('#title'+index+i).val());
				desc.push($('#desc'+index+i).val());
				desc_2.push($('#desc_2'+index+i).val());
			}
			//console.log(title);
			//console.log(desc);
			$.ajax({
				type: 'post',
				url: base_url+'classes/update_class_mission_lesson_activities',
				data: {
					class_mission_id: index,
					title: title,
					desc: desc,
					desc_2:desc_2
				},
				success: function(data) {
					$.ajax({
						type: 'post',
						url: base_url+'classes/insert_class_mission_lesson_activities',
						data: {
							class_mission_id: index
						},
						success: function(data) {
							document.getElementById("loading-overlay").style.display = 'none';
							$( "#div_class_mission_lesson_activities"+index ).load(window.location.href + " #div_class_mission_lesson_activities"+index );
						}
					});
				}
			});
        }
    });
	
}
function delete_class_mission_lesson_activity(id,index,idxArr) {
	document.getElementById("loading-overlay").style.display = 'block';
	var countCMLA = 0;
	var title = [];
	var desc = [];
	var desc_2 = [];
	$.ajax({
        type: 'post',
        url: base_url+'classes/get_count_class_mission_lesson_activities_by_class_mission_id',
        data: {
            class_mission_id: index
        },
        success: function(data) {
			countCMLA = data;
			//console.log(countCMLA);
			for(var i=0;i < countCMLA;i++){
				if(idxArr != i){
					title.push($('#title'+index+i).val());
					desc.push($('#desc'+index+i).val());
					desc_2.push($('#desc_2'+index+i).val());
				}
			}
			//console.log(title);
			//console.log(desc);
			$.ajax({
				type: 'post',
				url: base_url+'meeting/delete_class_mission_lesson_activity',
				data: {
					class_mission_lesson_activities_id: id
				},
				success: function(data) {
					$.ajax({
						type: 'post',
						url: base_url+'classes/update_class_mission_lesson_activities',
						data: {
							class_mission_id: index,
							title: title,
							desc: desc,
							desc_2:desc_2
						},
						success: function(data) {
							document.getElementById("loading-overlay").style.display = 'none';
							$( "#div_class_mission_lesson_activities"+index ).load(window.location.href + " #div_class_mission_lesson_activities"+index );
						}
					});
				}
			});
			
        }
    });
}
function add_class_mission_learning_objectives(index) {
	document.getElementById("loading-overlay").style.display = 'block';
	var countCMLO = 0;
	var content = [];
	$.ajax({
        type: 'post',
        url: base_url+'classes/get_count_class_mission_learning_objectives_by_class_mission_id',
        data: {
            class_mission_id: index
        },
        success: function(data) {
			countCMLO = data;
			//console.log(countCMLA);
			for(var i=0;i < countCMLO;i++){
				content.push($('#content'+index+i).val());
			}
			//console.log(title);
			//console.log(desc);
			$.ajax({
				type: 'post',
				url: base_url+'classes/update_class_mission_learning_objectives_manual',
				data: {
					class_mission_id: index,
					content: content
				},
				success: function(data) {
					$.ajax({
						type: 'post',
						url: base_url+'classes/insert_class_mission_learning_objectives',
						data: {
							class_mission_id: index
						},
						success: function(data) {
							document.getElementById("loading-overlay").style.display = 'none';
							$( "#div_class_mission_learning_objectives"+index ).load(window.location.href + " #div_class_mission_learning_objectives"+index );
						}
					});
				}
			});
        }
    });
	
}
function delete_class_mission_learning_objectives(id,index,idxArr) {
	document.getElementById("loading-overlay").style.display = 'block';
	var countCMLO = 0;
	var content = [];
	$.ajax({
        type: 'post',
        url: base_url+'classes/get_count_class_mission_learning_objectives_by_class_mission_id',
        data: {
            class_mission_id: index
        },
        success: function(data) {
			countCMLO = data;
			//console.log(countCMLA);
			for(var i=0;i < countCMLO;i++){
				if(idxArr != i){
					content.push($('#content'+index+i).val());
				}
			}
			//console.log(title);
			//console.log(desc);
			$.ajax({
				type: 'post',
				url: base_url+'meeting/delete_class_mission_learning_objectives',
				data: {
					class_mission_learning_objectives_id: id
				},
				success: function(data) {
					$.ajax({
						type: 'post',
						url: base_url+'classes/update_class_mission_learning_objectives_manual',
						data: {
							class_mission_id: index,
							content: content
						},
						success: function(data) {
							document.getElementById("loading-overlay").style.display = 'none';
							$( "#div_class_mission_learning_objectives"+index ).load(window.location.href + " #div_class_mission_learning_objectives"+index );
						}
					});
				}
			});
			
        }
    });
}
function add_class_mission_core_concept(index) {
	document.getElementById("loading-overlay").style.display = 'block';
	var countCMLO = 0;
	var content = [];
	$.ajax({
        type: 'post',
        url: base_url+'classes/get_count_class_mission_core_concept_by_class_mission_id',
        data: {
            class_mission_id: index
        },
        success: function(data) {
			countCMCC = data;
			//console.log(countCMLA);
			for(var i=0;i < countCMCC;i++){
				content.push($('#contentcc'+index+i).val());
			}
			//console.log(title);
			//console.log(desc);
			$.ajax({
				type: 'post',
				url: base_url+'classes/update_class_mission_core_concept',
				data: {
					class_mission_id: index,
					content: content
				},
				success: function(data) {
					$.ajax({
						type: 'post',
						url: base_url+'classes/insert_class_mission_core_concept',
						data: {
							class_mission_id: index
						},
						success: function(data) {
							document.getElementById("loading-overlay").style.display = 'none';
							$( "#div_class_mission_core_concept"+index ).load(window.location.href + " #div_class_mission_core_concept"+index );
						}
					});
				}
			});
        }
    });
	
}
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
			console.log(data);
			alert("Mission copied!");
			window.location.href = base_url+"classes/details/"+class_id+"/0/"+data;
        }
    });
}
function check_cmsi($cmid,$siid){
	var val = 0;
	if ($('#checkbox_cmsi'+$cmid+$siid).is(":checked")){ val = 1; }
	document.getElementById("loading-overlay").style.display = 'block';
	$.ajax({
        type: 'post',
        url: base_url+'classes/replace_class_mission_sdg_indicator',
        data: {
            class_mission_id: $cmid,
            sdg_indicator_id: $siid,
            is_true: val
        },
        success: function(data) {
			document.getElementById("loading-overlay").style.display = 'none';
        }
    });
}
function check_cmboc($cmid,$bocdid){
	var val = 0;
	if ($('#checkbox_cmboc'+$cmid+$bocdid).is(":checked")){ val = 1; }
	document.getElementById("loading-overlay").style.display = 'block';
	$.ajax({
        type: 'post',
        url: base_url+'classes/replace_class_mission_bank_of_competencies',
        data: {
            class_mission_id: $cmid,
            bank_of_competencies_detail_id: $bocdid,
            is_true: val
        },
        success: function(data) {
			document.getElementById("loading-overlay").style.display = 'none';
        }
    });
}
function check_cmlo($cmid,$loid){
	var val = 0;
	if ($('#checkbox_cmlo'+$cmid+$loid).is(":checked")){ val = 1; }
	document.getElementById("loading-overlay").style.display = 'block';
	$.ajax({
        type: 'post',
        url: base_url+'classes/replace_class_mission_learning_objectives',
        data: {
            class_mission_id: $cmid,
            learning_objectives_id: $loid,
            is_true: val
        },
        success: function(data) {
			document.getElementById("loading-overlay").style.display = 'none';
        }
    });
}
function f2f(index) {
	if($('#face_to_face'+index).val() == 1){
		document.getElementById("location_f2f_"+index).style.display = 'block';
		document.getElementById("meet_link"+index).style.display = 'none';
	}else{
		document.getElementById("location_f2f_"+index).style.display = 'none';
		document.getElementById("meet_link"+index).style.display = 'block';
	}
}
function view_detail_n(name,index) {
	$('#div_'+name+index).slideToggle("medium");
	document.getElementById("view_less_"+name+index).style.display = 'block';
	document.getElementById("view_details_"+name+index).style.display = 'none';
}
function view_less_n(name,index) {
	$('#div_'+name+index).slideToggle("medium");
	document.getElementById("view_less_"+name+index).style.display = 'none';
	document.getElementById("view_details_"+name+index).style.display = 'block';
}
function view_detail_modal(name,subject_id,index) {
	$('#div_'+name+'_'+subject_id+'_'+index).slideToggle("medium");
	document.getElementById("view_less_"+name+'_'+subject_id+'_'+index).style.display = 'block';
	document.getElementById("view_details_"+name+'_'+subject_id+'_'+index).style.display = 'none';
}
function view_less_modal(name,subject_id,index) {
	$('#div_'+name+'_'+subject_id+'_'+index).slideToggle("medium");
	document.getElementById("view_less_"+name+'_'+subject_id+'_'+index).style.display = 'none';
	document.getElementById("view_details_"+name+'_'+subject_id+'_'+index).style.display = 'block';
}
function toggle_competencies_cambridge(cmid,ccid) {
	$.ajax({
		type: 'post',
		url: base_url+'meeting/save_competencies_cambridge',
		data: {
			cmid: cmid,
			ccid: ccid,
		},
		success: function(data) {
		}
	});
}
function toggle_competencies_merdeka(cmid,ccmid) {
	$.ajax({
		type: 'post',
		url: base_url+'meeting/save_competencies_merdeka',
		data: {
			cmid: cmid,
			ccmid: ccmid,
		},
		success: function(data) {
		}
	});
}
function toggle_competencies_k13(cmid,ckid) {
	$.ajax({
		type: 'post',
		url: base_url+'meeting/save_competencies_k13',
		data: {
			cmid: cmid,
			ckid: ckid,
		},
		success: function(data) {
		}
	});
}
function openModalCompetenciesCambridge(selectObject) {
	var value = selectObject.value;  
	var text = $('#competenciesCambridge').find(":selected").text()
	$('#competenciesCambridge option:first').text(text);
	$('#competenciesCambridge').prop('selectedIndex',0);
	$('#modal_competencies_cambridge'+value).modal('show');
}
function openModalCompetenciesK13(selectObject) {
	var value = selectObject.value;  
	var text = $('#competenciesK13').find(":selected").text()
	$('#competenciesK13 option:first').text(text);
	$('#competenciesK13').prop('selectedIndex',0);
	$('#modal_competencies_k13'+value).modal('show');
}
function openModalCompetenciesMerdeka(selectObject) {
	var value = selectObject.value;  
	var text = $('#competenciesMerdeka').find(":selected").text()
	$('#competenciesMerdeka option:first').text(text);
	$('#competenciesMerdeka').prop('selectedIndex',0);
	$('#modal_competencies_merdeka'+value).modal('show');
}

$(document).ready(function() {
    $(".js-example-placeholder-multiple").select2({
		placeholder: "Select"
	});
	$(".modal_competencies_k13").on("hide.bs.modal", function(){
		// your function after closing modal goes here
		$( "#comp_result" ).load(window.location.href + " #comp_result" );
	});
	$(".modal_competencies_merdeka").on("hide.bs.modal", function(){
		// your function after closing modal goes here
		$( "#comp_result" ).load(window.location.href + " #comp_result" );
	});
	$(".modal_competencies_cambridge").on("hide.bs.modal", function(){
		// your function after closing modal goes here
		$( "#comp_result" ).load(window.location.href + " #comp_result" );
	});
});
$('.hide').delay(3000).fadeOut(300);