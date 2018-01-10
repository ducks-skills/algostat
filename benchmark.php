<?php
require_once('autoload.php');
if (isset($_POST['tri']) && isset($_POST['values']))
{
	$tri = NULL;

	if (preg_match("/^TriInsertion$/", $_POST['tri']))
	{
		$tri = new triInsertion($_POST['values'], $_POST['tri']);
	}
	else if (preg_match("/^TriSelection$/", $_POST['tri']))
	{
		$tri = new triSelection($_POST['values'], $_POST['tri']);
	}
	else if (preg_match("/^TriBulle$/", $_POST['tri']))
	{
		$tri = new triBulle($_POST['values'], $_POST['tri']);
	}
	$tri->triTableau();
	var_dump($tri);
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>AlgoStat</title>
		<link rel="stylesheet" href="styles/materialize.min.css">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	</head>
	<body>
		<nav class="cyan">
			<div class="nav-wrapper">
				<a href="#" class="brand-logo">AlgoStat</a>
				<ul id="nav" class="right hide-on-med-and-down">
					<li><a href="benchmark.php">Benchmarks</a></li>
				</ul>
			</div>
		</nav>
		<div class="col s12 center">
			<div class="row">
				<h3 class="center">Statistiques sur un algorithme</h3>
			</div>
			<form class="col s12" action="" method="POST">
			<div class="row">
					<div class="input-field col s6 offset-s3">
						<select name="tri" required>
							<option value="" disabled selected></option>
							<option value="TriSelection">Tri par sélection</option>
							<option value="TriInsertion">Tri par insertion</option>
							<option value="TriBulle">Tri à bulle</option>
						</select>
						<label>Choix de l'algorithme</label>
					</div>
			</div>
			<div class="row">
				<div class="input-field col s6 offset-s3">
					<textarea name="values" class="materialize-textarea" required></textarea>
					<label>Valeurs à trier</label>
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
		<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
		<script type="text/javascript">
		$(document).ready(function() { $('select').material_select(); });
		</script>
	</body>
</html>
