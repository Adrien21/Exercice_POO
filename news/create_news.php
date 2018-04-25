<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Création d'une news</title>
</head>
<body>
	<?php
		require_once("class_newsAvis.php");

		//connexion a la bdd
		require_once("../include/bdd_connect.php");
		$maCo = new bddConnect($sql_db, $sql_user, $sql_pass, $sql_server, $sql_type);
		
		$lien = $maCo->query("SELECT lien.id FROM lien WHERE lien.idJeuDlc = ".$_POST["jeu"])[0]->id;
		//$user = $maCo->query("SELECT user.id FROM user WHERE user.pseudo = 'admin'")[0]->id;
		
		
		$maCo->query("INSERT INTO `news` (`titre`, `texte`, `idUser`, `idLien`, `date`) VALUES ('".$_POST['crea_titre']."', '".$_POST['crea_texte']."', ".intval($_POST['user']).", ".intval($lien).", '".date("Y-m-d H:i:s")."')");
		echo 'La news "'.$_POST['crea_titre'].'" a bien été créée.';
	?>
</body>
</html>
