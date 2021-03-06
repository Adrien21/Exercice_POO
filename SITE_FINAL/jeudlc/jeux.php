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

$requete = 'SELECT * from jeudlc';
$dbrequete = $db->query($requete);

//--affichage objet
//var_dump ($dbrequete);
foreach($dbrequete as $row) {
	$jeu = new jeudlc($row->id, $row->nom, $row->editeur, $row->dev, $row->dateSortie, $row->prix, $row->pegi, $row->description, $row->idJeuParent);
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
//--mise a jour objet
$requete = "UPDATE `jeudlc` SET `nom` = 'jeu1-1' WHERE `jeudlc`.`id` = 1";

//$requete = "INSERT INTO `jeudlc` (`id`, `nom`, `editeur`, `dev`, `dateSortie`, `prix`, `pegi`, `description`, `idJeuParent`) VALUES (NULL, 'jeu97', 'edit1', 'dev2', '2018-04-20', '55.99', '12', 'blablablbala', '4')";
$newJeu = new jeudlc(NULL, 'jeu97', 'edit1', 'dev2', '2018-04-20', '55.99', '12', 'blablablbala', '4');
$requete = "INSERT INTO `jeudlc` (`nom`, `editeur`, `dev`, `dateSortie`, `prix`, `pegi`, `description`, `idJeuParent`) VALUES ('".$newJeu->nom."', '".$newJeu->editeur."', '".$newJeu->dev."', '".$newJeu->dateSortie."', '".$newJeu->prix."', '".$newJeu->pegi."', '".$newJeu->description."', ".$newJeu->idJeuParent.")";

//$dbrequete = $db->query($requete);

//nouvel objet jeu pour comparer si modification => clone d'objet
$jeu = clone $newJeu;

if($jeu == $newJeu): echo "identique<br />";
else: echo "different<br />";
endif;
echo $newJeu->id."<br />";
echo $newJeu->nom."<br />";
echo $newJeu->editeur."<br />";
echo $newJeu->dev."<br />";
echo $newJeu->dateSortie."<br />";
echo $newJeu->prix." euros<br />";
echo $newJeu->pegi."<br />";
echo $newJeu->description."<br />";
echo $newJeu->idJeuParent."<br />";
echo "<hr /><br />";
// //modification du prix du jeu
echo "--- modification du prix du jeu ---<br /><br />";
$newJeu->setPrix(35)
	   ->setPegi(10);

echo $newJeu->id."<br />";
echo $newJeu->nom."<br />";
echo $newJeu->editeur."<br />";
echo $newJeu->dev."<br />";
echo $newJeu->dateSortie."<br />";
echo $newJeu->prix." euros<br />";
echo $jeu->prix." euros<br />";
echo $newJeu->pegi."<br />";
echo $newJeu->description."<br />";
echo $newJeu->idJeuParent."<br />";
echo "<hr /><br />";

if($jeu == $newJeu): echo "identique<br />";
else: echo "different<br />";
endif;

//destruction de l'objet bddConnect
$db = null;
?>
    
</body>
</html>