var grade_subject_id = [];
get_grade_subject_by_user_id();
//GET GRADE SUBJECT THAT TEACHER HAVE
function get_grade_subject_by_user_id(){
	$.ajax({
        type: 'post',
        url: base_url+'subject/get_grade_subject_by_user_id',
        data: {
			user_id : 0
        },
        success: function(data) {
			// console.log(JSON.parse(data));
			var data2 = JSON.parse(data);
			//array for save to DB
			for (i = 0; i<data2.length; i++) {
				grade_subject_id.push(data2[i].grade_subject_id);
			}
			//Get subject grade name 
			$.ajax({
				type: 'post',
				url: base_url+'subject/get_grade_subject_by_id',
				data: {
					grade_subject_id : grade_subject_id
				},
				success: function(data) {
					$('#subject-list').html(data);
				}
			});
			console.log(grade_subject_id);
        }
    });
}
// IF CHANGE SUBJECT PARENT
$("#subject_parent").change(function() {
	var subject_parent_id = $('#subject_parent option:selected').val();
	$.ajax({
        type: 'post',
        url: base_url+'subject/get_grade_subject',
        data: {
            subject_parent_id: subject_parent_id,
        },
        success: function(data) {
			document.getElementById("grade_subject_before").style.display ="none";
			document.getElementById("grade_subject_after").style.display ="block";
            $('#grade_subject_dropdown').html(data);
        }
    });
});
// ADD GRADE SUBJECT TO ARRAY
$("#add_subject").click(function() {
	var grade_subject_id_from_dropdown = $('#grade_subject option:selected').val();
	//array for save to DB
	grade_subject_id.push(grade_subject_id_from_dropdown);
	duplicates = grade_subject_id.reduce(function(acc, el, i, arr) {
		  if (arr.indexOf(el) !== i && acc.indexOf(el) < 0) acc.push(el); return acc;
		}, []);
	if(duplicates.length != 0){
		grade_subject_id.pop();
		alert("Grade and subject already choose");
	}else{
		//Get subject grade name 
		$.ajax({
			type: 'post',
			url: base_url+'subject/get_grade_subject_by_id',
			data: {
				grade_subject_id : grade_subject_id
			},
			success: function(data) {
				$('#subject-list').html(data);
			}
		});
	}
	console.log(grade_subject_id);
});
// DELETE GRADE SUBJECT FROM ARRAY
function deleteArray(index){
	grade_subject_id.splice(index,1);
	console.log(grade_subject_id);
	$.ajax({
        type: 'post',
        url: base_url+'subject/get_grade_subject_by_id',
        data: {
            grade_subject_id : grade_subject_id
        },
        success: function(data) {
			//document.getElementById("subject-list").html(data);
			$('#subject-list').html(data);
        }
    });
}
// SAVE GRADE SUBJECT TO DATABASE 
$("#save_changes").click(function() {
	document.getElementById("loading-overlay").style.display = 'block';
	if(grade_subject_id.length == 0){
		alert("Choose Grade and subject first");
	}else{
		duplicates = grade_subject_id.reduce(function(acc, el, i, arr) {
		  if (arr.indexOf(el) !== i && acc.indexOf(el) < 0) acc.push(el); return acc;
		}, []);
		if(duplicates.length != 0){
			alert("Grade and subject already choose");
			document.getElementById("loading-overlay").style.display = 'none';
		}else{
			$.ajax({
				type: 'post',
				url: base_url+'subject/insert_grade_subject/',
				data: {
					grade_subject_id: grade_subject_id
				},
				error: function(error) {
					console.log(error);
				},
				success: function(data) {
					document.getElementById("loading-overlay").style.display = 'none';
					data = JSON.parse(data.replace(/'/g, '"'));
					alert(data.message);
					window.location.href = base_url+'user/';
				} 
			});
		}
	}
});
