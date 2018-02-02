<?php
require_once('autoload.php');
if (isset($_POST['tri']) && isset($_POST['values']))
{
	$tri = NULL;
	if (!preg_match("/^[-]*[0-9,.;]+$/", $_POST['values']))
	{
		$tri = new tri($_POST['values'], $_POST['tri']);
		$tri->setError("Mauvais format du jeu de données");
	}
	else
	{
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
			else if (preg_match("/^QuickSort$/", $_POST['tri']))
			{
			$tri = new triQuickSort($_POST['values'], $_POST['tri']);
			}
	}
	if (!$tri->getError())
	{
		$tri->triTableau();
		$tri->saveTri();
	}
	$res = array();
	array_push($res, $tri->getTabTri());
	array_push($res, $tri->getTimeExec());
	array_push($res, $tri->getTabNb());
	array_push($res, $tri->getNbelem());
	array_push($res, $tri->getName());

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
		<?php require_once("menu.php"); ?>
		<div class="col s12 center">
			<div class="row">
				<h3 class="center">Executer un algorithme</h3>
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
						<select name="tri" required>
							<option value="" disabled selected></option>
							<option value="TriSelection">Tri par sélection</option>
							<option value="TriInsertion">Tri par insertion</option>
							<option value="TriBulle">Tri à bulle</option>
							<option value="QuickSort">Tri rapide</option>
						</select>
						<label>Choix de l'algorithme</label>
					</div>
			</div>
			<div class="row">
				<div class="input-field col s6 offset-s3">
					<textarea name="values" class="materialize-textarea" required>
						<?php
							if (isset($tri) && $tri->getError())
							{
								echo substr(implode(", ", $tri->getTabNb()), 0, -2);
							}
							else
							{
								echo "45,45,41,51,1,51,51,44,8,449,979,643,12,345,644,6889,979,2513,54,645,64,4,6,4,46,4,4,64,6,1,3,,135,4,3,,413,54,13,,5,1,3,54,35,4,134,13,5,4,,68,4,6,4,,6,21,3,,1,31,1,51,54,5,65,4,54,6,4,64544,6,1,1,32,1,561,654,64,6,415,,4,4,4,46,8,,78,64,681,6516,4,5,45,1,6,54,54,,46,46,54894,6,7,7,9,4,844,466,456556,6315,5,45,64,6464615,1849";
							}
							?>
						</textarea>
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
		var tab = <?php echo json_encode($res, JSON_PRETTY_PRINT); ?>;
		var container = document.createElement('div');
		container.className = "col s10 center";
		container.id = "div1";
		document.body.appendChild(container);
		var text = '<h4>Type : ' + tab[4] +'</h4>';
		text += '<p>Temps d\'éxecution  : '   +tab[1]+' 	 us</p>';
		text += '<p>Nombre d\'élement   : '  +tab[3]+          '</p>';
		text += '<p>Element avant le tri  : '+tab[2]+         '</p>';
		text += '<p>Element apres le tri  : '+tab[0]+	  '</p>';
		container.innerHTML += text;
		</script>
	</body>
</html>
