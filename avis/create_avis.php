<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Création d'une news</title>
</head>
<body>
	<?php
		require_once("../news/class_newsAvis.php");

		//connexion a la bdd
		require_once("../include/bdd_connect.php");
		$maCo = new bddConnect($sql_db, $sql_user, $sql_pass, $sql_server, $sql_type);
		
		$lien = $maCo->query("SELECT lien.id FROM lien WHERE lien.idJeuDlc = ".$_POST["jeu"])[0]->id;
		
		
		
		$maCo->query("INSERT INTO `avis` (`note`, `texte`, `idUser`, `idLien`, `date`) VALUES ('".$_POST['crea_note']."', '".$_POST['crea_texte']."', ".intval($_POST['user']).", ".intval($lien).", '".date("Y-m-d H:i:s")."')");
		echo "La note de ".$_POST['crea_note']."/20 a bien été donnée au jeu.";
	?>
</body>
</html>
