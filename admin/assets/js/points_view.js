$('#points_history_datatable_admin').DataTable();
$("body").delegate("#edit_uth", "click", function(ev) {
	
	var uth_id = [];
	$.each($("input[name='uth_id']:checked"), function(){
		uth_id.push($(this).val());
	});
	var jsonString = JSON.stringify(uth_id);
	//alert(jsonString);
	$.ajax({
		type: 'post',
		url: base_url+'/points/edit_user_token_history/',
		data: {
			user_token_history_id:jsonString
		},
		success: function(data) {
			alert("sukses");
			location.reload();
		}
	});
});