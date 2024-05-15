function view_detail_goal_checklist() {
	$('.div_goal_checklist').slideToggle("medium");
	document.getElementById("view_less").style.display = 'block';
	document.getElementById("view_details").style.display = 'none';
}
function view_less_goal_checklist() {
	$('.div_goal_checklist').slideToggle("medium");
	document.getElementById("view_less").style.display = 'none';
	document.getElementById("view_details").style.display = 'block';
}
function view_detail_mission(index) {
	$('.div_mission_detail'+index).slideToggle("medium");
	document.getElementById("view_less"+index).style.display = 'block';
	document.getElementById("view_details"+index).style.display = 'none';
}
function view_less_mission(index) {
	$('.div_mission_detail'+index).slideToggle("medium");
	document.getElementById("view_less"+index).style.display = 'none';
	document.getElementById("view_details"+index).style.display = 'block';
}
function mission(index){
	document.getElementById("div_mission").style.display = 'none';
	document.getElementById("div_task").style.display = 'block';
	document.getElementById("div_input_review").style.display = 'none';
	document.getElementById("div_strength_capture_bsteams_from_teacher").style.display = 'none';
	class_mission.forEach(function(class_mission){
		if(class_mission['class_mission_id'] == index){
			document.getElementById("mission"+index).style.display = 'block';
		}else{
			document.getElementById("mission"+class_mission['class_mission_id']).style.display = 'none';
		}
	});
}
var rating = 0;
function submit_task(class_id,class_mission_id,class_mission_participants_id){
	document.getElementById("loading-overlay").style.display = 'block';
	if($('#task'+class_mission_id).val() == ""){
		document.getElementById("loading-overlay").style.display = 'none';
		alert("Task cannot be empty");
	}else if(rating == 0){
		document.getElementById("loading-overlay").style.display = 'none';
		alert("Rating cannot be empty");
	}else{
		$.ajax({
			type: 'post',
			url: base_url+'classes/update_class_mission_participants_task',
			data: {
				task: $('#task'+class_mission_id).val(),
				class_id: class_id,
				class_mission_id: class_mission_id,
				class_mission_participants_id: class_mission_participants_id,
				rating: rating
			},
			success: function(data) {
				//console.log(data);
				alert(data);
				document.getElementById("loading-overlay").style.display = 'none';
				location.reload();
			}
		});
	}
}
$(function() {
    $("div.star-rating > s").on("click", function(e) {
    
    // remove all active classes first, needed if user clicks multiple times
    $(this).closest('div').find('.active').removeClass('active');

    $(e.target).parentsUntil("div").addClass('active'); // all elements up from the clicked one excluding self
    $(e.target).addClass('active');  // the element user has clicked on

        var numStars = $(e.target).parentsUntil("div").length+1;
        $('.show-result').text(numStars + (numStars == 1 ? " star" : " stars!"));
		rating = numStars;
    });
});
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
$(".sidenav > .sn-item").click(function() {
	$(".sidenav > .sn-item").removeClass("active");
	$(this).addClass("active");
});
$("body").delegate("#strength_capture", "click", function(e) {
	document.getElementById("div_strength_capture").style.display = 'block';
	document.getElementById("div_progress_report").style.display = 'none';
	document.getElementById("div_bsteams").style.display = 'none';
});
$("body").delegate("#bsteams", "click", function(e) {
	document.getElementById("div_bsteams").style.display = 'block';
	document.getElementById("div_progress_report").style.display = 'none';
	document.getElementById("div_strength_capture").style.display = 'none';
});
$("body").delegate("#progress_report", "click", function(e) {
	document.getElementById("div_progress_report").style.display = 'block';
	document.getElementById("div_strength_capture").style.display = 'none';
	document.getElementById("div_bsteams").style.display = 'none';
});
$("body").delegate("#input_review", "click", function(e) {
	document.getElementById("div_input_review").style.display = 'block';
	document.getElementById("div_mission").style.display = 'none';
	document.getElementById("div_task").style.display = 'none';
	document.getElementById("div_strength_capture_bsteams_from_teacher").style.display = 'none';
});
$("body").delegate("#strength_capture_from_teacher", "click", function(e) {
	document.getElementById("div_strength_capture_bsteams_from_teacher").style.display = 'block';
	document.getElementById("div_input_review").style.display = 'none';
	document.getElementById("div_mission").style.display = 'none';
	document.getElementById("div_task").style.display = 'none';
});
$("body").delegate("#strength_capture_from_teacher", "click", function(e) {
	document.getElementById("div_strength_capture_from_teacher").style.display = 'block';
	document.getElementById("div_bsteams_from_teacher").style.display = 'none';
});
$("body").delegate("#bsteams_from_teacher", "click", function(e) {
	document.getElementById("div_bsteams_from_teacher").style.display = 'block';
	document.getElementById("div_strength_capture_from_teacher").style.display = 'none';
});
function submit_bsteams(class_id){
	document.getElementById("loading-overlay").style.display = 'block';
	$.ajax({
        type: 'post',
        url: base_url+'classes/insert_bsteams',
        data: {
            class_id: class_id,
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
function submit_strength(class_id){
	document.getElementById("loading-overlay").style.display = 'block';
	$.ajax({
        type: 'post',
        url: base_url+'classes/insert_strength',
        data: {
            class_id: class_id,
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
$( document ).ready(function() {
    $(".list-group").each(function ( index ) {
        cur_id = this.id.split("_");
        class_mission_participants_id = cur_id[cur_id.length - 1];
        $.ajax({
            type: 'post',
            url: base_url+'classes/get_class_mission_files',
            data: {
                class_mission_participants_id: class_mission_participants_id,
            },
            success: function(data) {
                data = JSON.parse(data);
                let html_data = "";
                id = class_mission_participants_id;
                for (let index = 0; index < data.length; ++index) {
                    let task_file = data[index];
                    html_data += '<li class="list-group-item" id="file_task_'+task_file['class_mission_participants_detail_id']+'"><a class="link-secondary" href="'+base_url+task_file['task_content']+'" download>'+task_file['file_name']+'</a></li>';
                    id = task_file['class_mission_participants_id'];
                }
                $('#task_file_list_'+id).html(html_data);
            }
        });
    });
});


$('#modal_upload_file_task').on('show.bs.modal', function (e) {
    var button = e.relatedTarget;
    if (button != null)
    {
        button_id = button.id.split("_");
        $('#class_mission_participants_id').val(button_id[button_id.length - 1]);
    }
})
const graphic = [];
bank_of_competencies.forEach(function(bank_of_competencies){
	graphic.push({
		"x"  :bank_of_competencies['name'],
		"y" : bank_of_competencies['total']
	});
});
var chart = new ej.charts.Chart({
	title: "Bank of Competencies",
	tooltip: {enable: true},
    //Initializing Primary X Axis
    primaryXAxis: {
        valueType: "Category",
        labelPlacement: "OnTicks",
        interval: 1,
    },
    //Initializing Primary Y Axis
    primaryYAxis: {
        minimum: 0,
        maximum: 10,
        interval: 2,
        edgeLabelPlacement: "Shift",
        labelFormat: ""
    },
    //Initializing Chart Series
    series: [
        {
            type: "Radar",
			drawType: 'Area',
			//fill: '#00f0ff',
            dataSource: graphic,
            xName: "x",
            width: 2,
            yName: "y",
            name: "Bank of Competencies",
			marker: {
				 visible: true,
		   }
        }
    ],
});
chart.appendTo("#container");
function view_detail_graph_overall_boc(index) {
	$('.graph_overall_boc').slideToggle("medium");
	document.getElementById("view_less_graph_overall_boc").style.display = 'block';
	document.getElementById("view_details_graph_overall_boc").style.display = 'none';
}
function view_less_graph_overall_boc(index) {
	$('.graph_overall_boc').slideToggle("medium");
	document.getElementById("view_less_graph_overall_boc").style.display = 'none';
	document.getElementById("view_details_graph_overall_boc").style.display = 'block';
}