<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>AlgoStat</title>
<link rel="stylesheet" href="styles/materialize.min.css">
<script src="js/Highcharts/code/highcharts.js"></script>
<script src="js/Highcharts/code/modules/exporting.js"></script>
</head>
<body>
  <?php require_once("menu.php"); ?>
<div class="col s12 center">
<h3>Bienvenue sur le site du projet AlgoStat !</h3>
<p>
Pour faire des tests sur les différents algorithmes proposés, rendez vous sur <a href="benchmark.php">cette page.</a>
</p>
</div>
<script>

var container = document.createElement('div');
container.className = "col s6 left";
var container2 = document.createElement('div');
container2.className = "col s6 right";
var container3 = document.createElement('div');
container3.className = "col s6 left";
var container4 = document.createElement('div');
container4.className = "col s6 right";

document.body.appendChild(container);
document.body.appendChild(container2);
document.body.appendChild(container3);
document.body.appendChild(container4);

var tab = [];
for (var n = 0; n < 1000; n++)
{
  var carre = n * n;
  tab.push(carre);
}
var lo = [];
for (var x = 0; x < 1000; x++)
{
  var log = x * Math.log(x);
  lo.push(log);
}
window.chart = new Highcharts.Chart({
    chart: {
        renderTo: container
    },
	title: {
	text: 'Tri a bulle theorique'
	},

    xAxis: {
        tickInterval: 1
    },
    yAxis: {
	type: 'logarithmic',
	minorTicjInterval: 0.1
    },
    tooltip: {
	headerFormat: '<b>{series.name}</b><br />',
	pointFormat: 'x = {point.x}, y = {point.y}'
    },
    series: [{
        data: tab,
	pointStart: 1
    }]
});
window.chart = new Highcharts.Chart({
    chart: {
        renderTo: container2
    },
	title: {
	text: 'Tri par insertion theorique'
	},

    xAxis: {
        tickInterval: 1
    },
    yAxis: {
	type: 'logarithmic',
	minorTicjInterval: 0.1
    },
    tooltip: {
	headerFormat: '<b>{series.name}</b><br />',
	pointFormat: 'x = {point.x}, y = {point.y}'
    },
    series: [{
        data: tab,
	pointStart: 1
    }]
});
window.chart = new Highcharts.Chart({
    chart: {
        renderTo: container3
    },
	title: {
	text: 'Tri par selection theorique'
	},

    xAxis: {
        tickInterval: 1
    },
    yAxis: {
	type: 'logarithmic',
	minorTicjInterval: 0.1
    },
    tooltip: {
	headerFormat: '<b>{series.name}</b><br />',
	pointFormat: 'x = {point.x}, y = {point.y}'
    },
    series: [{
        data: tab,
	pointStart: 1
    }]
});
window.chart = new Highcharts.Chart({
    chart: {
        renderTo: container4
    },
	title: {
	text: 'Tri rapide'
	},

    xAxis: {
        tickInterval: 1
    },
    yAxis: {
	type: 'logarithmic',
	minorTicjInterval: 0.1
    },
    tooltip: {
	headerFormat: '<b>{series.name}</b><br />',
	pointFormat: 'x = {point.x}, y = {point.y}'
    },
    series: [{
        data: lo,
	pointStart: 1
    }]
});




</script>
</div><script type="text/javascript" src="js/materialize.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
</body>
</html>
