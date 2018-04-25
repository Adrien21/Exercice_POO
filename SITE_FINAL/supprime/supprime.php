<?php
if(isset($_POST['confirm'])):
	$requete = "DELETE FROM ".$_POST['table']." where id='".$_POST['id']."'";

	//echo $requete;
	//connexion a la bdd
	require_once("../include/bdd_connect.php");
	$db = new bddConnect($sql_db, $sql_user, $sql_pass, $sql_server, $sql_type);

	$suppr = $db->query($requete);
	//var_dump($suppr);
	echo $_POST['nom']." a bien été supprimé";
	echo "<br><a href='".$_POST['page_origine']."'>Retour</a>";
else:
	echo "Veuillez cocher la case avant de supprimer !";
	echo "<br><a href='javascript:history.go(-1)'>Retour</a>";
endif;
?>