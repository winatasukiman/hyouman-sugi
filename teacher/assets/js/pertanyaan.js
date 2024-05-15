//search item store
$('#search').keyup(function(){
	// Search text
	var text = $(this).val().toLowerCase();

	// Hide all content class element
	$('.content').hide();

	// Search 
	$('.content').each(function(){

		if($(this).text().toLowerCase().indexOf(""+text+"") != -1 ){
		 $(this).closest('.content').show();
		}
	});
});