$('#student_search').keyup(function(){
	// Search text
	var text = $(this).val().toLowerCase();

	// Hide all content class element
	$('.participant').hide();

	// Search 
	$('.participant').each(function(){
		if($(this).text().toLowerCase().indexOf(""+text+"") != -1 ){
		 $(this).closest('.participant').show();
		}
	});
});
$(".sidenav > .sn-item").click(function() {
	$(".sidenav > .sn-item").removeClass("active");
	$(this).addClass("active");
});
$("body").delegate("#strength_capture_from_student", "click", function(e) {
	document.getElementById("div_strength_capture_from_student").style.display = 'block';
	document.getElementById("div_progress_report").style.display = 'none';
	document.getElementById("div_bsteams_from_student").style.display = 'none';
});
$("body").delegate("#bsteams_from_student", "click", function(e) {
	document.getElementById("div_bsteams_from_student").style.display = 'block';
	document.getElementById("div_progress_report").style.display = 'none';
	document.getElementById("div_strength_capture_from_student").style.display = 'none';
});
$("body").delegate("#progress_report", "click", function(e) {
	document.getElementById("div_progress_report").style.display = 'block';
	document.getElementById("div_strength_capture_from_student").style.display = 'none';
	document.getElementById("div_bsteams_from_student").style.display = 'none';
});
function participant(index){
	$('.active2').removeClass('active2');
	var element = document.getElementById("participant"+index);
	element.classList.add("active2");
	class_strength_capture_teacher.forEach(function(class_strength_capture_teacher){
		if(class_strength_capture_teacher['class_strength_capture_teacher_id'] == index){
			document.getElementById("strength_capture"+index).style.display = 'block';
			document.getElementById("bsteams"+index).style.display = 'block';
			document.getElementById("progress_report_content"+index).style.display = 'block';
		}else{
			document.getElementById("strength_capture"+class_strength_capture_teacher['class_strength_capture_teacher_id']).style.display = 'none';
			document.getElementById("bsteams"+class_strength_capture_teacher['class_strength_capture_teacher_id']).style.display = 'none';
			document.getElementById("progress_report_content"+class_strength_capture_teacher['class_strength_capture_teacher_id']).style.display = 'none';
		}
	});
}
participant(class_strength_capture_teacher_first_row['class_strength_capture_teacher_id']);
function submit_progress_report(index){
	document.getElementById("loading-overlay").style.display = 'block';
	$.ajax({
        type: 'post',
        url: base_url+'classes/update_progress_report',
        data: {
            class_strength_capture_teacher_id: index,
			progress_report: $('#progress_report'+index).val()
        },
        success: function(data) {
			document.getElementById("loading-overlay").style.display = 'none';
			$( "#progress_report_content"+index ).load(window.location.href + " #progress_report_content"+index );
        }
    });
}
var rating_b = 0,rating_s1 = 0,rating_t = 0,rating_e = 0, rating_a = 0,rating_m = 0,rating_s2 = 0,s_strength_rating = 0,t1_strength_rating = 0,r_strength_rating = 0,e_strength_rating = 0,n_strength_rating = 0,g_strength_rating = 0,t2_strength_rating = 0,h_strength_rating = 0;
$(function() {
    $("div.star-rating-b > s").on("click", function(e) {
    
    // remove all active classes first, needed if user clicks multiple times
    $(this).closest('div').find('.active').removeClass('active');

    $(e.target).parentsUntil("div").addClass('active'); // all elements up from the clicked one excluding self
    $(e.target).addClass('active');  // the element user has clicked on

        rating_b = $(e.target).parentsUntil("div").length+1;
       // $('.show-result').text(numStars + (numStars == 1 ? " star" : " stars!"));
    });
});
$(function() {
    $("div.star-rating-s1 > s").on("click", function(e) {
    
    // remove all active classes first, needed if user clicks multiple times
    $(this).closest('div').find('.active').removeClass('active');

    $(e.target).parentsUntil("div").addClass('active'); // all elements up from the clicked one excluding self
    $(e.target).addClass('active');  // the element user has clicked on

        rating_s1 = $(e.target).parentsUntil("div").length+1;
        //$('.show-result').text(numStars + (numStars == 1 ? " star" : " stars!"));
    });
});
$(function() {
    $("div.star-rating-t > s").on("click", function(e) {
    
    // remove all active classes first, needed if user clicks multiple times
    $(this).closest('div').find('.active').removeClass('active');

    $(e.target).parentsUntil("div").addClass('active'); // all elements up from the clicked one excluding self
    $(e.target).addClass('active');  // the element user has clicked on

        rating_t = $(e.target).parentsUntil("div").length+1;
       // $('.show-result').text(numStars + (numStars == 1 ? " star" : " stars!"));
    });
});
$(function() {
    $("div.star-rating-e > s").on("click", function(e) {
    
    // remove all active classes first, needed if user clicks multiple times
    $(this).closest('div').find('.active').removeClass('active');

    $(e.target).parentsUntil("div").addClass('active'); // all elements up from the clicked one excluding self
    $(e.target).addClass('active');  // the element user has clicked on

        rating_e = $(e.target).parentsUntil("div").length+1;
        //$('.show-result').text(numStars + (numStars == 1 ? " star" : " stars!"));
    });
});
$(function() {
    $("div.star-rating-a > s").on("click", function(e) {
    
    // remove all active classes first, needed if user clicks multiple times
    $(this).closest('div').find('.active').removeClass('active');

    $(e.target).parentsUntil("div").addClass('active'); // all elements up from the clicked one excluding self
    $(e.target).addClass('active');  // the element user has clicked on

        rating_a = $(e.target).parentsUntil("div").length+1;
        //$('.show-result').text(numStars + (numStars == 1 ? " star" : " stars!"));
    });
});
$(function() {
    $("div.star-rating-m > s").on("click", function(e) {
    
    // remove all active classes first, needed if user clicks multiple times
    $(this).closest('div').find('.active').removeClass('active');

    $(e.target).parentsUntil("div").addClass('active'); // all elements up from the clicked one excluding self
    $(e.target).addClass('active');  // the element user has clicked on

        rating_m = $(e.target).parentsUntil("div").length+1;
       // $('.show-result').text(numStars + (numStars == 1 ? " star" : " stars!"));
    });
});
$(function() {
    $("div.star-rating-s2 > s").on("click", function(e) {
    
    // remove all active classes first, needed if user clicks multiple times
    $(this).closest('div').find('.active').removeClass('active');

    $(e.target).parentsUntil("div").addClass('active'); // all elements up from the clicked one excluding self
    $(e.target).addClass('active');  // the element user has clicked on

        rating_s2 = $(e.target).parentsUntil("div").length+1;
        //$('.show-result').text(numStars + (numStars == 1 ? " star" : " stars!"));
    });
});
$(function() {
    $("div.star-rating-s-strength > s").on("click", function(e) {
    
    // remove all active classes first, needed if user clicks multiple times
    $(this).closest('div').find('.active').removeClass('active');

    $(e.target).parentsUntil("div").addClass('active'); // all elements up from the clicked one excluding self
    $(e.target).addClass('active');  // the element user has clicked on

        s_strength_rating = $(e.target).parentsUntil("div").length+1;
        //$('.show-result').text(numStars + (numStars == 1 ? " star" : " stars!"));
    });
});
$(function() {
    $("div.star-rating-t1-strength > s").on("click", function(e) {
    
    // remove all active classes first, needed if user clicks multiple times
    $(this).closest('div').find('.active').removeClass('active');

    $(e.target).parentsUntil("div").addClass('active'); // all elements up from the clicked one excluding self
    $(e.target).addClass('active');  // the element user has clicked on

        t1_strength_rating = $(e.target).parentsUntil("div").length+1;
        //$('.show-result').text(numStars + (numStars == 1 ? " star" : " stars!"));
    });
});
$(function() {
    $("div.star-rating-r-strength > s").on("click", function(e) {
    
    // remove all active classes first, needed if user clicks multiple times
    $(this).closest('div').find('.active').removeClass('active');

    $(e.target).parentsUntil("div").addClass('active'); // all elements up from the clicked one excluding self
    $(e.target).addClass('active');  // the element user has clicked on

        r_strength_rating = $(e.target).parentsUntil("div").length+1;
        //$('.show-result').text(numStars + (numStars == 1 ? " star" : " stars!"));
    });
});
$(function() {
    $("div.star-rating-e-strength > s").on("click", function(e) {
    
    // remove all active classes first, needed if user clicks multiple times
    $(this).closest('div').find('.active').removeClass('active');

    $(e.target).parentsUntil("div").addClass('active'); // all elements up from the clicked one excluding self
    $(e.target).addClass('active');  // the element user has clicked on

        e_strength_rating = $(e.target).parentsUntil("div").length+1;
        //$('.show-result').text(numStars + (numStars == 1 ? " star" : " stars!"));
    });
});
$(function() {
    $("div.star-rating-n-strength > s").on("click", function(e) {
    
    // remove all active classes first, needed if user clicks multiple times
    $(this).closest('div').find('.active').removeClass('active');

    $(e.target).parentsUntil("div").addClass('active'); // all elements up from the clicked one excluding self
    $(e.target).addClass('active');  // the element user has clicked on

        n_strength_rating = $(e.target).parentsUntil("div").length+1;
        //$('.show-result').text(numStars + (numStars == 1 ? " star" : " stars!"));
    });
});
$(function() {
    $("div.star-rating-g-strength > s").on("click", function(e) {
    
    // remove all active classes first, needed if user clicks multiple times
    $(this).closest('div').find('.active').removeClass('active');

    $(e.target).parentsUntil("div").addClass('active'); // all elements up from the clicked one excluding self
    $(e.target).addClass('active');  // the element user has clicked on

        g_strength_rating = $(e.target).parentsUntil("div").length+1;
        //$('.show-result').text(numStars + (numStars == 1 ? " star" : " stars!"));
    });
});
$(function() {
    $("div.star-rating-t2-strength > s").on("click", function(e) {
    
    // remove all active classes first, needed if user clicks multiple times
    $(this).closest('div').find('.active').removeClass('active');

    $(e.target).parentsUntil("div").addClass('active'); // all elements up from the clicked one excluding self
    $(e.target).addClass('active');  // the element user has clicked on

        t2_strength_rating = $(e.target).parentsUntil("div").length+1;
        //$('.show-result').text(numStars + (numStars == 1 ? " star" : " stars!"));
    });
});
$(function() {
    $("div.star-rating-h-strength > s").on("click", function(e) {
    
    // remove all active classes first, needed if user clicks multiple times
    $(this).closest('div').find('.active').removeClass('active');

    $(e.target).parentsUntil("div").addClass('active'); // all elements up from the clicked one excluding self
    $(e.target).addClass('active');  // the element user has clicked on

        h_strength_rating = $(e.target).parentsUntil("div").length+1;
        //$('.show-result').text(numStars + (numStars == 1 ? " star" : " stars!"));
    });
});
function submit_bsteams(class_id,user_id){
	document.getElementById("loading-overlay").style.display = 'block';
	$.ajax({
        type: 'post',
        url: base_url+'classes/insert_bsteams',
        data: {
            class_id: class_id,
			user_id: user_id,
			reflection_b: $('#reflection_b').val(),
			rating_b: rating_b,
			reflection_s1: $('#reflection_s1').val(),
			rating_s1: rating_s1,
			reflection_t: $('#reflection_t').val(),
			rating_t: rating_t,
			reflection_e: $('#reflection_e').val(),
			rating_e: rating_e,
			reflection_a: $('#reflection_a').val(),
			rating_a: rating_a,
			reflection_m: $('#reflection_m').val(),
			rating_m: rating_m,
			reflection_s2: $('#reflection_s2').val(),
			rating_s2: rating_s2
        },
        success: function(data) {
			// console.log(data);
			// alert(data);
			document.getElementById("loading-overlay").style.display = 'none';
			location.reload();
        }
    });
}
function submit_strength(class_id,user_id){
	document.getElementById("loading-overlay").style.display = 'block';
	$.ajax({
        type: 'post',
        url: base_url+'classes/insert_strength',
        data: {
            class_id: class_id,
            user_id: user_id,
			s_strength: $('#s_strength').val(),
			s_strength_rating: s_strength_rating,
			t1_strength: $('#t1_strength').val(),
			t1_strength_rating: t1_strength_rating,
			r_strength: $('#r_strength').val(),
			r_strength_rating: r_strength_rating,
			e_strength: $('#e_strength').val(),
			e_strength_rating: e_strength_rating,
			n_strength: $('#n_strength').val(),
			n_strength_rating: n_strength_rating,
			g_strength: $('#g_strength').val(),
			g_strength_rating: g_strength_rating,
			t2_strength: $('#t2_strength').val(),
			t2_strength_rating: t2_strength_rating,
			h_strength: $('#h_strength').val(),
			h_strength_rating: h_strength_rating
        },
        success: function(data) {
			 // console.log(data);
			// alert(data);
			document.getElementById("loading-overlay").style.display = 'none';
			location.reload();
        }
    });
}