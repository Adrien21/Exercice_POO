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

$newJeu = new jeudlc(NULL, 'jeu98', 'edit1', 'dev1', '2018-04-20', '15', '12', 'blablabla', '2');
//$requete = "INSERT INTO `jeudlc` (`nom`, `editeur`, `dev`, `dateSortie`, `prix`, `pegi`, `description`, `idJeuParent`) VALUES ('jeu98', 'edit1', 'dev1', '2018-04-20', '15', '12', 'blablabla', '2')";
//$requete = "UPDATE `jeudlc` SET `nom` = 'jeu1' WHERE `jeudlc`.`id` = 1";
$requete = 'SELECT * from jeudlc';
$dbrequete = $db->query($requete) ;

//destruction de l'objet requete
$db = null;

//var_dump ($dbrequete);
foreach($dbrequete as $row) {
	$jeu = new jeudlc($row->id, $row->nom, $row->editeur, $row->dev, $row->dateSortie, $row->prix, $row->pegi, $row->description, $row->idJeuParent);//--PDO::FETCH_OBJ
	//$jeu = new jeudlc($row["id"], $row["nom"], $row["editeur"], $row["dev"], $row["dateSortie"], $row["prix"], $row["pegi"], $row["description"]);//--PDO::FETCH_ASSOC
	echo $jeu->id."<br />";
	echo $jeu->nom."<br />";
	echo $jeu->editeur."<br />";
	echo $jeu->dev."<br />";
	echo $jeu->dateSortie."<br />";
	echo $jeu->prix." euros<br />";
	echo $jeu->pegi."<br />";
	echo $jeu->description."<br />";
	echo $jeu->idJeuParent."<br />";
	echo "<hr /><br />";
}

//var_dump ($jeu);

// //modification du prix du dernier jeu
echo "--- modification du prix du jeu ---<br /><br />";
$jeu->setPrix(35)
	->setPegi(10);
	echo $jeu->id."<br />";
	echo $jeu->nom."<br />";
	echo $jeu->editeur."<br />";
	echo $jeu->dev."<br />";
	echo $jeu->dateSortie."<br />";
	echo $jeu->prix." euros<br />";
	echo $jeu->pegi."<br />";
	echo $jeu->description."<br />";
	echo "<hr /><br />";
?>
    
</body>
</html>