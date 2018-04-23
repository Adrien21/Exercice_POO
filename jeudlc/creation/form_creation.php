<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>Modification BDD avec formulaire</title>
	</head>
	<body>
		<form method="post" action="creation_jeu.php" enctype="multipart/form-data">
			<!-- Créer, modifier fiche jeux (OBJ jeux) -->
			<label for="crea_nom">Nom : </label><input type="text" name="crea_nom" required></br></br>
			<label for="crea_editeur">Editeur : </label><input type="text" name="crea_editeur" required></br></br>
			<label for="crea_dev">Développeur : </label><input type="text" name="crea_dev" required></br></br>
			<label for="crea_date">Date de sortie: </label><input type="date" name="crea_date" required></br></br>
			<label for="crea_prix">Prix : </label><input type="number" name="crea_prix" required></br></br>
			<label for="crea_pegi">PEGI : </label><select name="crea_pegi">
				<option value="3">3</option>
				<option value="7">7</option>
				<option value="12">12</option>
				<option value="16">16</option>
				<option value="18">18</option>
			</select></br></br>
			<label for="crea_description">Description : </label><input type="text" name="crea_description" required></br></br>
			<label for="jeuparent">Si c'est un DLC, préciser le jeu parent : </label><select name="jeuparent">
				<option value="NULL">Aucun</option>
				<?php
				require_once("liste_jeux.php");
				?>
			</select>
			<input type="submit" name="Créer" value="Créer">
		</form>
	</body>
</html>