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
		
		//echo var_dump($_POST);
		//echo var_dump(intval($_POST["selectednews"]))
		
		$maCo->query('UPDATE news SET titre="'.$_POST['newtitre'].'", texte="'.$_POST['newtexte'].'" WHERE id='.intval($_POST['selectednews'].''));
		echo 'La news "'.$_POST['newtitre'].'" a bien été modifiée.';
	?>
</body>
</html>
