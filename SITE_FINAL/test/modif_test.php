<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title> Modif d'une fiche jeu</title>
</head>
<body>
	<?php
		require_once("class_jeux.php");

		//connexion a la bdd
		
		require_once("../include/bdd_connect.php");
		$db = new bddConnect($sql_db, $sql_user, $sql_pass, $sql_server, $sql_type);

		// Déclaration des variables
        $titre = $_POST['titre'];
		$texte = $_POST['texte'];
		$note = $_POST['note'];
		$date = date("Y-m-d H:i:s");
        $user = $_POST['user'];

        $testmodif = new test(NULL, $titre, $date, $texte, $note, $user);

        $requete = "INSERT INTO  (`titre`, `texte`, `note`, `date`, idUser) VALUES ('".$nouvtest->titre."', '".$nouvtest->texte."', ".$nouvtest->note.", '".$nouvtest->date."', " .$nouvtest->pseudo .")";
        $db->query($requete);
        echo 'Le test "'.$nouvtest->titre.'" a bien été créé.</br></br>';
        
        if(($jeuparent == "") || ($jeuparent == " ")) {
            $jeuparent = "NULL";
        }
        

		$testmodif = new test(NULL, $titre, $date, $texte, $note, $user);
		//var_dump("<pre>", $testmodif, "</pre>");
		$requete = "UPDATE `test` 
                    SET titre = '".addslashes($testmodif->titre)."' , 
                        date = '".$testmodif->editeur."' , 
                        texte = '".addslashes($testmodif->texte)."' , 
                        note = '".$testmodif->note."' ,  
                        idUser = '".$testmodif->pseudo."'
                        WHERE id= '".$testmodif->id."'" ;
		$db->query($requete);
		//var_dump("<pre>", $requete, "</pre>");
	?>
    
    <!-- ------------ AFFICHAGE DE LA MODIFICATION ----------------- -->
    
    <section>
        <h2> Le test a été modifié. </h2>
        
        <a href="../test.php">Retour à la page des Tests </a>
        <br><br>
        <a href="../index.php">Retour à l'Accueil</a><br><br>
    </section>
    
</body>
</html>