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
		require_once("../../include/bdd_connect.php");
		$db = new bddConnect($sql_db, $sql_user, $sql_pass, $sql_server, $sql_type);
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
		// var_dump("<pre>", $nouvjeu, "</pre>");
		$requete = "INSERT INTO jeudlc (nom, editeur, dev, dateSortie, prix, pegi, description, idJeuParent) VALUES ('".addslashes($nouvjeu->nom)."', '".$nouvjeu->editeur."', '".$nouvjeu->dev."', '".$nouvjeu->dateSortie."', '".$nouvjeu->prix."', '".$nouvjeu->pegi."', '".addslashes($nouvjeu->description)."', ".$nouvjeu->idJeuParent.")";
		$db->query($requete);
		
		//recup de l'id jeu
		$requete = 'SELECT id FROM jeudlc WHERE nom="'.$nouvjeu->nom.'" and editeur="'.$nouvjeu->editeur.'" and dev="'.$nouvjeu->dev.'"';
		$select = $db->query($requete);
				
		foreach ($_POST['crea_console'] as $maConsole){
			$requete = 'INSERT INTO lien (idJeuDlc, idConsole) VALUES ('.$select[0]->id.', '.$maConsole.')';
			$db->query($requete);
		};
	
		echo "<h1>Succès !</h1> Vous allez être redirigé dans 3 secondes.";
		header("refresh:3;url=../../jeudlc.php");
	?>
</body>
</html>
