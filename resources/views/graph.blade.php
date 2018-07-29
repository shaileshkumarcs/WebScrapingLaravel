
<!doctype html>
<html>

<head>
	<title>Bar Chart</title>
	<script src="{{ asset('js/Chart.bundle.js' ) }}"></script>
	<script src="{{ asset('js/utils.js') }}"></script>
	<style>
	canvas {
		-moz-user-select: none;
		-webkit-user-select: none;
		-ms-user-select: none;
	}
	</style>
</head>

<body>
	<div id="container" style="width: 75%;">
		<canvas id="canvas"></canvas>
	</div>
	<script>
		var MONTHS = ['c','php','python','java','javascript'];
		var color = Chart.helpers.color;
		var barChartData = {
			labels: ['c','php','python','java','javascript'],
			datasets: [{
				label: 'Search In Last Week',
				backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
				borderColor: window.chartColors.red,
				borderWidth: 1,
				data: [
					<?php echo $count_c; ?>,
					<?php echo $count_php; ?>,
					<?php echo $count_python; ?>,
					<?php echo $count_java; ?>,
					<?php echo $count_javascript; ?>,
				]
			}]

		};

		window.onload = function() {
			var ctx = document.getElementById('canvas').getContext('2d');
			window.myBar = new Chart(ctx, {
				type: 'bar',
				data: barChartData,
				options: {
					responsive: true,
					legend: {
						position: 'top',
					},
					title: {
						display: true,
						text: 'Chart.js Bar Chart'
					},
					yAxes: [{
				       ticks: {
				           min: 0,
				           max: 100,
				           callback: function(value) {
				               return value + "%"
				           }
				       },
				       scaleLabel: {
				           display: true,
				           labelString: "Percentage"
				       }
				   }]
				}
			});

		};

		
	</script>
</body>

</html>
