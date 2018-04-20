<?php
	//connexion a la bdd
	require_once("../../include/bdd_id.php");
	require_once("../../include/bdd_connect.php");
	$db = new bddConnect($mysql_db, $mysql_user, $mysql_pass, $mysql_server);
	$requete = $db->query("SELECT nom, id FROM jeudlc");

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