<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>Choix du jeu à modifier</title>
	</head>
	<body>
		<fieldset>
        <form method="post" action="form_modif.php" enctype="multipart/form-data">
            <label for="jeuamodif">Choisissez le jeu à modifier : </label>
            <select name="jeuamodif">
				<option value="NULL">Aucun</option>
				<?php
				require_once("liste_jeux2.php");
				?>
			</select>
            <input type="submit" name="Selectionner" value="Sélectionner">
        </form>
        </fieldset>
        <br><br>
	</body>
</html>