<?php
	//connexion a la bdd
	
	require_once("../../include/bdd_connect.php");
	$db = new bddConnect($sql_db, $sql_user, $sql_pass, $sql_server, $sql_type);
	$requete = $db->query("SELECT nom, id FROM jeudlc WHERE idJeuParent IS NULL");

	$i = 0;
	$nomjeux = [];
	$idjeux = [];
	foreach ($requete as $row) {
		array_push($nomjeux, ($row->nom));
		array_push($idjeux, ($row->id));
		echo "<option value='" .$idjeux[$i] ."'>" .$nomjeux[$i] ."</option>";
		$i++;
	}
?>