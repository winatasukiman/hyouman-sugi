$("#buy_class").click(function() {
	document.getElementById("loading-overlay-modal").style.display = 'block';
	$.ajax({
        type: 'post',
        url: base_url+'classes/buy_class',
        data: {
            class_id: $('#class_id').val()
        },
        success: function(data) {
			window.location.href = base_url+'classes/';
			console.log(data);
			alert(data);
			document.getElementById("loading-overlay-modal").style.display = 'none';
			// $('#modal_buy_class').modal('hide');
			// if(data == "sukses"){
				// alert("Success Update Goal Checklist");
			// }else{
				// alert("Something wrong");
			// }
        }
    });
});