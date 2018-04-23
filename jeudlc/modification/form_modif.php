<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>Modification BDD avec formulaire</title>
	</head>
	<body>
        <?php 
            // connection à la BDD    
            
	        require_once("../../include/bdd_connect.php");
            require_once("../class_jeux.php");
	        $db = new bddConnect($sql_db, $sql_user, $sql_pass, $sql_server, $sql_type);
            // recuperation de l'id du jeu à modifier
            $choixjeu= $_POST['jeuamodif'];
            $requete = $db->query("SELECT * FROM jeudlc WHERE id= '".$choixjeu."'");
        
            
            
            foreach ($requete as $col) {
                $jeuchoisi = new jeuDlc($col->id, $col->nom, $col->editeur, $col->dev, $col->dateSortie, $col->prix, $col->pegi, $col->description, $col->idJeuParent) ;
            }
            
            $requete2 = $db->query("SELECT `nom` FROM jeudlc WHERE id= '".$jeuchoisi->idJeuParent."'");
            
            
            $nomdlc="";
        
            foreach($requete2 as $value) {
              $nomdlc .= $value->nom;  
                  
            }
            $idDlc="";
            $idDlc= $col->id;
            
        ?>
        
		<form method="post" action="modif_jeu.php" enctype="multipart/form-data">
			<!-- Créer, modifier fiche jeux (OBJ jeux) -->
			<label for="modif_nom">Nom : </label><input type="text" name="modif_nom" value="<?php echo $jeuchoisi->nom; ?>" required></br></br>
			<label for="modif_editeur">Editeur : </label><input type="text" name="modif_editeur" value=" <?php echo $jeuchoisi->editeur; ?>" required></br></br>
			<label for="modif_dev">Développeur : </label><input type="text" name="modif_dev" value="<?php echo $jeuchoisi->dev; ?>" required></br></br>
			<label for="modif_date">Date de sortie: </label><input type="date" name="modif_date" value="<?php echo $jeuchoisi->dateSortie; ?>" required></br></br>
			<label for="modif_prix">Prix : </label><input type="number" name="modif_prix" value="<?php echo $jeuchoisi->prix ; ?>" required></br></br>
			<label for="modif_pegi">PEGI : </label><select name="modif_pegi">
				<option value="3">3</option>
				<option value="7">7</option>
				<option value="12">12</option>
				<option value="16">16</option>
				<option value="18">18</option>
			</select></br></br>
			<label for="modif_description">Description : </label><input type="text" name="modif_description" value="<?php echo $jeuchoisi->description; ?>" required></br></br>
			<label for="jeuparent">Si c'est un DLC, préciser le jeu parent : </label><select name="jeuparent">
				 <option selected value="<?php echo $idDlc; ?>"><?php 
                     if ($nomdlc != NULL ) {
                        echo $nomdlc ; 
                     }
                     else if ($jeuchoisi->nom == $nomdlc) {
                        echo "Aucun";
                     }
                     
                     else {
                        echo "Aucun";
                     } 
                     ?>
                </option>
				<?php
				require_once("liste_jeux.php");
				?>
			</select>
            <input name="id"  style=" visibility: hidden" value="<?php echo $col->id; ?>"> <br>
			<input type="submit" name="Modifier" value="Modifier">

		</form>
	</body>
</html>