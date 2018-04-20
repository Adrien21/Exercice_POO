<?php

//connexion a la bdd
require_once("../include/bdd_id.php");
require_once("../include/bdd_connect.php");
$db = new bddConnect($mysql_db, $mysql_user, $mysql_pass, $mysql_server);

//appel objet jeu
require_once("class_console.php");


//envoi la requete a l'objet connexion
$data = $db->query('SELECT * from console') ;
//affiche le resultat
var_dump ($data);

//parcours les objets du resultat et en affiche chaque elements
foreach($data as $row){
	echo $row->id."<br />";
	echo $row->nom."<br />";
	echo $row->constructeur."<br />";
	echo $row->prix."<br />";
	echo $row->dateSortie."<br />";
	echo "<br />";
};



?>
