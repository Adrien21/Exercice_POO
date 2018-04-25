<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Création d'un test</title>
</head>
<body>
	<?php
		require_once("class_test.php");

		//connexion a la bdd
		require_once("../include/bdd_connect.php");
		$db = new bddConnect($sql_db, $sql_user, $sql_pass, $sql_server, $sql_type);
		// Déclaration des variables
		$titre = $_POST["crea_titre"];
		$texte = $_POST["crea_texte"];
		$note = $_POST["crea_note"];
	?>
</body>
</html>
