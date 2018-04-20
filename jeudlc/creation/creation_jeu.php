<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Création d'une fiche jeu</title>
</head>
<body>
	<?php
		require_once("../class_jeux.php");

		//connexion a la bdd
		require_once("../../include/bdd_id.php");
		require_once("../../include/bdd_connect.php");
		$db = new bddConnect($mysql_db, $mysql_user, $mysql_pass, $mysql_server);

		// Déclaration des variables
		$nom = $_POST['crea_nom'];
		$editeur = $_POST['crea_editeur'];
		$dev = $_POST['crea_dev'];
		$date = $_POST['crea_date'];
		$prix = $_POST['crea_prix'];
		$pegi = $_POST['crea_pegi'];
		$description = $_POST['crea_description'];
		$jeuparent = $_POST['jeuparent'];

		$nouvjeu = new jeuDlc(NULL, $nom, $editeur, $dev, $date, $prix, $pegi, $description, $jeuparent);
		var_dump("<pre>", $nouvjeu, "</pre>");
		$requete = "INSERT INTO `jeudlc` (`nom`, `editeur`, `dev`, `dateSortie`, `prix`, `pegi`, `description`, `idJeuParent`) VALUES ('".$nouvjeu->nom."', '".$nouvjeu->editeur."', '".$nouvjeu->dev."', '".$nouvjeu->dateSortie."', '".$nouvjeu->prix."', '".$nouvjeu->pegi."', '".$nouvjeu->description."', ".$nouvjeu->idJeuParent.")";
		$db->query($requete);
		var_dump("<pre>", $requete, "</pre>");
	?>
</body>
</html>
