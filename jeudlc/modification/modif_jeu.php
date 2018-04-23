<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title> Modif d'une fiche jeu</title>
</head>
<body>
	<?php
		require_once("../class_jeux.php");

		//connexion a la bdd
		
		require_once("../../include/bdd_connect.php");
		$db = new bddConnect($sql_db, $sql_user, $sql_pass, $sql_server, $sql_type);

		// Déclaration des variables
        $id = $_POST['id'];
		$nom = $_POST['modif_nom'];
		$editeur = $_POST['modif_editeur'];
		$dev = $_POST['modif_dev'];
		$date = $_POST['modif_date'];
		$prix = $_POST['modif_prix'];
		$pegi = $_POST['modif_pegi'];
		$description = $_POST['modif_description'];
		$jeuparent = $_POST['jeuparent'];

		$jeumodif = new jeuDlc($id, $nom, $editeur, $dev, $date, $prix, $pegi, $description, $jeuparent);
		//var_dump("<pre>", $jeumodif, "</pre>");
		$requete = "UPDATE `jeudlc` 
                    SET nom = '".$jeumodif->nom."' , 
                        editeur = '".$jeumodif->editeur."' , 
                        dev = '".$jeumodif->dev."' , 
                        dateSortie = '".$jeumodif->dateSortie."' ,  
                        prix = '".$jeumodif->prix."' ,  
                        pegi = '".$jeumodif->pegi."' ,
                        description = '".$jeumodif->description."' , 
                        idJeuParent = '".$jeumodif->idJeuParent."'
                    WHERE id= '".$jeumodif->id."'" ;
		$db->query($requete);
		//var_dump("<pre>", $requete, "</pre>");
	?>
</body>
</html>