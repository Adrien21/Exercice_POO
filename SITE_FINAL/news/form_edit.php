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
		
		
		if(isset($_GET["news"])):
		
	
				
		$maNews = $maCo->query('SELECT titre, texte FROM news WHERE id='.$_GET["news"]);
				
	?>
			

	<form id="editnew" method="POST" action="update_news.php">
		<input hidden name="selectednews" value=<?php echo $_GET["news"] ?>>
		<label for="newtitre">Nouveau titre : </label><input type="text" name="newtitre" value="<?php
			echo $maNews[0]->titre;
		?>" required></br></br>
		<label for="newtexte">Nouveau texte : </label><textarea form="editnew" name="newtexte"><?php
			echo $maNews[0]->texte;
		?></textarea></br></br>
		<input type="submit" value="Modifier" id="valider">
	</form>
		
	<?php
		endif;
		
	?>
</body>


</html>
