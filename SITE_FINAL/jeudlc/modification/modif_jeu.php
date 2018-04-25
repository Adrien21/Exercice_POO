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
        
        if(($jeuparent == "") || ($jeuparent == " ")) {
            $jeuparent = "NULL";
        }
        

		$jeumodif = new jeuDlc($id, $nom, $editeur, $dev, $date, $prix, $pegi, $description, $jeuparent);
		//var_dump("<pre>", $jeumodif, "</pre>");
		$requete = "UPDATE `jeudlc` 
                    SET nom = '".addslashes($jeumodif->nom)."' , 
                        editeur = '".addslashes($jeumodif->editeur)."' , 
                        dev = '".addslashes($jeumodif->dev)."' , 
                        dateSortie = '".$jeumodif->dateSortie."' ,  
                        prix = '".$jeumodif->prix."' ,  
                        pegi = '".$jeumodif->pegi."' ,
                        description = '".addslashes($jeumodif->description)."' , 
                        idJeuParent = ".$jeumodif->idJeuParent."
                    WHERE id= '".$jeumodif->id."'" ;
		$db->query($requete);
		//var_dump("<pre>", $requete, "</pre>");
	?>
    
    <!-- ------------ AFFICHAGE DE LA MODIFICATION ----------------- -->
    
    <section>
        <h2> Le jeu <?php echo $nom; ?> a été modifié. </h2>
        <ul>
            <li>Le nouveau nom est : <?php echo $nom; ?> </li>
            <li>Le nouveau editeur est : <?php echo $editeur; ?> </li>
            <li>Le nouveau développeur est : <?php echo $dev; ?> </li>
            <li>La nouvelle date de sortie : <?php echo $date; ?> </li>
            <li>Le nouveau prix : <?php echo $prix; ?> </li>
            <li>La nouvelle norme pegi est : <?php echo $pegi; ?> </li>
            <li>La nouvelle description est : <?php echo $description; ?>  </li>
            <li> <?php if ($jeuparent == 'NULL') {
                            echo "Le jeu n'a pas de DLC";
                        }
                        else {
                            echo "Le DLC du jeu à l'id ".$jeuparent;
                        }
                        ?>
            </li>
            
        
        </ul>
    </section>
    
</body>
</html>