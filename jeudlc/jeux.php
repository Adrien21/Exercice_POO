<!DOCTYPE html>
<html>

<head>
    <title> Objet Jeux / DLC </title>  
    <meta charset="utf-8"> 
</head>
<body>
<?php
//connexion a la bdd
require_once("../include/bdd_id.php");
require_once("../include/bdd_connect.php");
$db = new bddConnect($mysql_db, $mysql_user, $mysql_pass, $mysql_server);

//appel objet jeu
require_once("class_jeux.php");

$dbrequete = $db->query('SELECT * from jeudlc');
var_dump ($dbrequete);
	foreach($dbrequete as $row) {
        $jeu = new jeudlc($row->id, $row->nom, $row->editeur, $row->dev, $row->dateSortie, $row->prix, $row->pegi, $row->description);
        echo $jeu->id."<br />";
        echo $jeu->nom."<br />";
        echo $jeu->editeur."<br />";
        echo $jeu->dev."<br />";
        echo $jeu->dateSortie."<br />";
        echo $jeu->prix." euros<br />";
        echo $jeu->pegi."<br />";
        echo $jeu->description."<br />";
        echo "<br />";
    }
	
var_dump ($jeu);

//destruction de maclasse
$db = null;

// //modification du prix du jeu
// echo "--- modification du prix du jeu ---<br /><br />";
// $ps1->setPrix(35);
// echo $ps1->getId()."<br />";
// echo $ps1->getNom()."<br />";
// echo $ps1->getConstructeur()."<br />";
// echo $ps1->getPrix()." euros<br />";
// echo $ps1->getDatesortie()."<br />";

?>
    
</body>
</html>