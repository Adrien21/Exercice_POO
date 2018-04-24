<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>Création BDD avec formulaire</title>
	</head>
	<body>
		<form method="post" action="create_news.php" enctype="multipart/form-data" id="formnews">
			<!-- Créer nouvelle news -->
			<h1>Nouvelle news</h1>
			<label for="crea_titre">Titre : </label><input type="text" name="crea_titre" required></br></br>
			<label for="crea_texte">Texte : </label><textarea form="formnews" name="crea_texte" required></textarea></br></br>
			<label for="jeu">Liée au jeu : </label><select name="jeu">
				<?php
					include_once("../include/bdd_connect.php");
					$db = new bddConnect($sql_db, $sql_user, $sql_pass, $sql_server, $sql_type);
					$requete = $db->query("SELECT nom, id FROM jeudlc ORDER BY nom");
					$i = 0;
					$nomjeux = [];
					$idjeux = [];
					foreach ($requete as $row) {
						array_push($nomjeux, ($row->nom));
						array_push($idjeux, ($row->id));
						echo "<option value='" .$idjeux[$i] ."'>" .$nomjeux[$i] ."</option>";
						$i++;
					}
				?>
			</select>
			<input type="submit" name="Créer" value="Créer">
		</form>
	</body>
</html>
