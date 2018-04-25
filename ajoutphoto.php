<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title> Ajouter une photo à un jeu </title>
</head>
<body>
    <?php
            include("include/bdd_connect.php");
            include("jeudlc/class_jeux.php");
    
    $db = new bddConnect($sql_db, $sql_user, $sql_pass, $sql_server, $sql_type);
			
			//obtenir la liste du nom des jeux pour la liste
			$listeJeux = $db->query('SELECT * FROM jeudlc ORDER BY nom ASC');
						
			
    ?>
    
    
    
    
    <h1> Ajouter une photo </h1>
        <form method="post" action="ajoutphoto.php" enctype="multipart/form-data"> 
            <fieldset>
                <legend> Choisissez une photo </legend>
                Jeu<br>
                <select name="jeuChoisi" >
				    <option selected>séléctionner jeu</option>
				        <?php
							foreach($listeJeux as $nomJeu){
								echo '<option name="'.$nomJeu->nom.'" value="'.$nomJeu->nom.'" >'.$nomJeu->nom.'</option>';
							 }
				        ?>
							
				</select><br>
                Nom de la photo <br>
                <input type="text" name="nom"><br>
                Photo
                <input type="file" name="photo"> <br><br>
                <input type="submit" name="Envoyer"><br>
            </fieldset>
        </form>
    
<?php
    
//     OBJECTIF >> Enoyer les fichiers textes et photos dans upload 
//              >> Compter le nombre de fichiers texte dans le dossier upload
              
    
    
    
 
    
    $nomUtilisateur = $_POST['nom'];
    
 
    
    var_dump(__DIR__);  //-------> trouver le chemin du repertoire
    
    
    $files = glob(__DIR__."/img/"."*.jpg");/* Indique le repertoire et  *.* précise  l'extension du fichier (.jpg, .php, etc...) */
    $compteur = count($files);/* Variable $compteur pour compter (count) les fichiers lister ($files) dans le dossier */
    echo "Il y a <font color=#FF0000>$compteur</font>";
    if ($compteur > 1) { echo " Utilisateurs enregistrés"; }
    else { echo " Utilisateur enregistré"; }

    
    
    
    $nomDossier = $nomUtilisateur . "_" . $compteur;
    
    
       if (isset($_POST['nom']) && isset($_POST['email']) && isset($_FILES['photo'])) {   // ---------------------------> On vérifie la présence du nom, de l'email et de la photo

            
           
            if(file_exists($nomDossier)) {   // -------------------------------------------------------------------------> On vériefie si un dossier du même nom éxiste
                
                $compteur++;     
                $nomDossier = $nomUtilisateur . "_" . $compteur ;
                
                // Fichier Texte //

                $data = $_POST['nom'] . '-' . $_POST['email'];    // ---------------------------------------------------> Contenu du fichier.txt
                $fichiertxt = fopen($nomDossier ."_" ."infos.txt", "w");   // ---------------------------------------------------> Création du fichier
                $ret = fwrite($fichiertxt, $data);
                    if($ret === false) {
                        echo 'Erreur d\'ecriture du fichier texte';
                    }
                    else {
                        echo '<br>' . $ret . "bytes ajoutés au fichier";
                    }

                // Photo // 

                 $fichier = $_POST['nom'] . ".". "Photo_de_profil" . "." . basename($_FILES['photo']['name']) ; // 
                     
                    if(move_uploaded_file($_FILES['photo']['tmp_name'], $nomDossier . $fichier)) { 
                          echo '<br>Upload effectué avec succès !';
                     }
            
               
                
            
            }
           else {
               


                // Fichier Texte //

                $data = $_POST['nom'] . '-' . $_POST['email'];    // ---------------------------------------------------> Contenu du fichier.txt
                $fichiertxt = fopen($nomDossier . "infos.txt", "w");   // ---------------------------------------------------> Création du fichier
                $ret = fwrite($fichiertxt, $data);
                    if($ret === false) {
                        echo '<br>Erreur d\'ecriture du fichier texte';
                    }
                    else {
                        echo "<br>" . $ret . "bytes ajoutés au fichier";
                    }

                // Photo // 

                 
                 $fichier = $_POST['nom'] . ".". "Photo_de_profil" . "." . basename($_FILES['photo']['name']) ; // 
                     
                    if(move_uploaded_file($_FILES['photo']['tmp_name'], $nomDossier . $fichier)) { 
                          echo ' <br> Upload effectué avec succès !';
                     }
                
              
           }
    
    
    }
?>
</body>
</html>
