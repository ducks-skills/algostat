<?php
require_once('autoload.php');
if (isset($_POST['tri']))
{
	$res = tri::getTableJsonData($_POST['tri']);
	$title = (string)$res[0]['title_chart'];
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>AlgoStat</title>
		<link rel="stylesheet" href="styles/materialize.min.css">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<script src="js/Highcharts/code/highcharts.js"></script>
		<script src="js/Highcharts/code/modules/exporting.js"></script>

	</head>
	<body>
		<nav class="cyan">
		  <div class="nav-wrapper">
		    <a href="index.php" class="brand-logo center">AlgoStat</a>
		    <ul id="nav" class="right hide-on-med-and-down">
		      <li><a href="benchmark.php">Benchmarks</a></li>
		      <li><a href="analyse.php">Analyse</a></li>
		    </ul>
		  </div>
		</nav>

		<div class="col s12 center">
			<div class="row">
				<h3 class="center">Choisir un algorithme</h3>
			</div>
			<?php if (isset($tri) && $tri->getError()) { echo "
				<div class='row'>\n
					<div class='col s2 m2'></div>\n
        	<div class='col s8 m8'>\n
          	<div class='card  red darken-2'>\n
            	<div class='card-content white-text'>\n
	              <span class='card-title'>Erreur :</span>\n
	              <p>".$tri->getError()."\n
								</p>\n
	            </div>\n
            	<div class='card-action red darken-1'>\n
              	<a class='white-text' href='benchmark.php'>Enlever cette bulle</a>\n
            	</div>\n
          	</div>\n
        	</div>\n
				<div class='col s2 m2'></div>\n
      </div>\n"; }?>
			<form class="col s12" action="" method="POST">
			<div class="row">
					<div class="input-field col s6 offset-s3">
						<select name="tri" class="browser-default" required>
							<option value="TriSelection">Tri par sélection</option>
							<option value="TriInsertion">Tri par insertion</option>
							<option value="TriBulle">Tri à bulle</option>
							<option value="QuickSort">Tri rapide</option>
						</select>
						<label>Choix de l'algorithme</label>
					</div>
			</div>
			<div class="row">
				<button type="submit" name="send" class="btn waves-effect waves-light">
					Lancer
					<i class="material-icons right">send</i>
				</button>
			</div>
			</form>
		</div>
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/materialize.min.js"></script>
		<script type="text/javascript">
		$(document).ready(function() {
			$('select').material_select();
		});
		</script>
		<script type="text/javascript">
		var tab = <?php echo json_encode($res, JSON_PRETTY_PRINT);?>;
		var title_chart = '<?php echo $title; ?>';
		if (title_chart == '')
		{
			title_chart = NULL;
		}
		var data = [];
		var size = [];
		for (var arrayS in tab)
		{
			data.push(parseFloat(tab[arrayS]["execution_time"]));
			if (tab[arrayS]["size"] == null){
			tab[arrayS]["size"] = 0;
			}
			size.push(parseFloat(tab[arrayS]["size"]));
		}
		var container = document.createElement('div');
		container.className = "col s10 center";
		document.body.appendChild(container);
		window.chart = new Highcharts.Chart({
    		chart: {
        		renderTo: container
    		},
				title: {
					text: title_chart
				},

    		xAxis: {
			title: {
				text: 'Nombre d\'entrée'
			},
			categories: size
    		},
    		yAxis: {
			type: 'logarithmic',
			title: {
				text: 'Temps D\'excution'
			},
			data: data
    		},
    		series: [{
        		data: data,
			color: '#2ecc71',
			pointStart: 0
    		}],
		plotOptions: {
			line: {
				dataLabels: {
					enabled: true
				}
			}
		}
});

		</script>
	</body>
</html>
