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
		
		$lien = $db->query("SELECT lien.id FROM lien WHERE lien.idTest = ".$_POST["jeu"])[0]->id;
		//$user = $db->query("SELECT user.id FROM user WHERE user.pseudo = 'admin'")[0]->id;
		$titre = $_POST['crea_titre'];
		$texte = $_POST['crea_texte'];
		$note = $_POST['crea_note'];
		$user = $_POST['user'];
		$date = date("Y-m-d H:i:s");

		$nouvtest = new test(NULL, $titre, $date, $texte, $note, $user);
		$requete = "INSERT INTO `test` (`titre`, `texte`, `note`, `date`, idUser) VALUES ('".$nouvtest->titre."', '".$nouvtest->texte."', ".$nouvtest->note.", '".$nouvtest->date."', " .$nouvtest->pseudo .")";
		$db->query($requete);
		echo 'Le test "'.$nouvtest->titre.'" a bien été créé.</br></br>';
	?>

	<a href="../test.php">Retour à la page des Tests </a>
	<br><br>
	<a href="../index.php">Retour à l'Accueil</a><br><br>
</body>
</html>