<?php

//connexion a la bdd
require_once("../include/bdd_connect.php");
$db = new bddConnect($sql_db, $sql_user, $sql_pass, $sql_server, $sql_type);

//appel objet jeu
require_once("class_console.php");


//envoi la requete a l'objet connexion
$data = $db->query('SELECT * from console') ;
//affiche le resultat
//var_dump ($data);

//parcours les objets du resultat et en affiche chaque elements
foreach($data as $row){
	$allConsole[] = new console($row->id, $row->nom, $row->constructeur, $row->prix, $row->dateSortie);
}

foreach($allConsole as $console){
	echo '<fieldset>';
	$console->display();
	echo '</fieldset>';
};
?>
