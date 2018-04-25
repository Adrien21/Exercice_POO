<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Création d'une news</title>
</head>
<body>
	<?php
		

		//connexion a la bdd
		require_once("../include/bdd_connect.php");
		$maCo = new bddConnect($sql_db, $sql_user, $sql_pass, $sql_server, $sql_type);
		
		
		
		$maCo->query('UPDATE news SET titre="'.addslashes(htmlspecialchars($_POST['newtitre'])).'", texte="'.addslashes(htmlspecialchars($_POST['newtexte'])).'", date="'.date("Y-m-d H:i:s").'" WHERE id='.intval($_POST['selectednews'].''));
		echo 'La news "'.$_POST['newtitre'].'" a bien été modifiée.';
	?>
</body>
</html>
