$("#overall_attendance_view").click(function() {
	$('.active').removeClass('active');
	var element = document.getElementById("overall_attendance_view");
	element.classList.add("active");
	document.getElementById("div_overall_attendance_view").style.display = 'block';
    document.getElementById("div_overall_task_view").style.display = 'none';
	document.getElementById("div_boc").style.display = 'none';
});
$("#overall_task_view").click(function() {
	$('.active').removeClass('active');
	var element = document.getElementById("overall_task_view");
	element.classList.add("active");
	document.getElementById("div_overall_attendance_view").style.display = 'none';
    document.getElementById("div_overall_task_view").style.display = 'block';
    document.getElementById("div_boc").style.display = 'none';
});
$("#boc").click(function() {
	$('.active').removeClass('active');
	var element = document.getElementById("boc");
	element.classList.add("active");
	document.getElementById("div_overall_attendance_view").style.display = 'none';
    document.getElementById("div_overall_task_view").style.display = 'none';
	document.getElementById("div_boc").style.display = 'block';
});
participants.forEach(function(participants){
	const graphic = [];
	for (let i = 0; i < participants['bank_of_competencies_detail'].length; i++) {
		 graphic.push({
			"x"  :participants['bank_of_competencies_detail'][i]['no'],
			"y" : participants['bank_of_competencies_detail'][i]['total'+participants['user_id']]
		});
	}
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
	chart.appendTo("#container"+participants['user_id']);
});