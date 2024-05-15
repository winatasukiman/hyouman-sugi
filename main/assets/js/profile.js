$("body").delegate("#profile", "click", function(e) {
	document.getElementById("div_profile").style.display = 'block';
	document.getElementById("div_report").style.display = 'none';
	document.getElementById("div_wallet").style.display = 'none';
	
});
$("body").delegate("#report", "click", function(e) {
	document.getElementById("div_report").style.display = 'block';
	document.getElementById("div_profile").style.display = 'none';
	document.getElementById("div_wallet").style.display = 'none';
});
$("body").delegate("#wallet", "click", function(e) {
	document.getElementById("div_report").style.display = 'none';
	document.getElementById("div_profile").style.display = 'none';
	document.getElementById("div_wallet").style.display = 'block';
});
//sidenav profile,report, dll
$(".sidenav > .sn-item").click(function() {
	$(".sidenav > .sn-item").removeClass("active");
	$(this).addClass("active");
});
$("body").delegate("#copypy", "click", function(e) {
	//alert("hello");
	$("#copypy").attr("disabled", true);
	//get the invitation url to copy to clipboard
	$.ajax({
		type: 'post',
		url: base_url+'user/invitation_url/',
		data: {
		},
		success: function(data) {
			var data = JSON.parse(data);
			console.log(data);
			document.getElementById("myInput").value = data["url"];
			var copyText = document.getElementById("myInput");
			  copyText.select();
			  copyText.setSelectionRange(0, 99999)
			  document.execCommand("copy");
			  //alert("Copied the text: " + copyText.value);
			  setTimeout(function() {
				 $("#copypy"). attr("disabled", false)
			}, 5000);
		}
	});
});
function view_detail_summary(i) {
	$('#summary'+i).slideToggle("medium");
	$('#summary2'+i).slideToggle("medium");
	$('#summary3'+i).slideToggle("medium");
	document.getElementById("view_less_summary"+i).style.display = 'block';
	document.getElementById("view_detail_summary"+i).style.display = 'none';
}
function view_less_detail_summary(i) {
	$('#summary'+i).slideToggle("medium");
	$('#summary2'+i).slideToggle("medium");
	$('#summary3'+i).slideToggle("medium");
	document.getElementById("view_detail_summary"+i).style.display = 'block';
	document.getElementById("view_less_summary"+i).style.display = 'none';
}
function view_detail_history(i) {
	$('#history'+i).slideToggle("medium");
	document.getElementById("view_less_history"+i).style.display = 'block';
	document.getElementById("view_detail_history"+i).style.display = 'none';
}
function view_less_history(i) {
	$('#history'+i).slideToggle("medium");
	document.getElementById("view_detail_history"+i).style.display = 'block';
	document.getElementById("view_less_history"+i).style.display = 'none';
}
$('.hide').delay(3000).fadeOut(300);
// Data Table
$('#user_points_history').DataTable();

var i;
for (i = 0; i < children.length; i++) {
  $('#user_points_history'+i).DataTable();
}
//search class
$('#children_search').keyup(function(){
	// Search text
	var text = $(this).val().toLowerCase();

	// Hide all content class element
	$('.children_hist_content').hide();

	// Search 
	$('.children_hist_content').each(function(){
		if($(this).text().toLowerCase().indexOf(""+text+"") != -1 ){
		 $(this).closest('.children_hist_content').show();
		}
	});
});
