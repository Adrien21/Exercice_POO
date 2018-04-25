<?php 

session_start(); 
 //session_destroy(); //------------------------------------------>detruire la session
/*  si on a besoin de rajouter du php avant  */

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <link rel="stylesheet" href="NOTRE CSS OPTIONNEL">
        <meta charset="utf-8">
        <meta name="author" content="Adrien Arnaud Henry Eric Léo Valentin">
        <title> GAME THEM ALL </title>
    </head>
    <body>
        <header>
            
            <h1 style="text-align: center">- GAME THEM ALL -</h1>
            <br>
            
            <?php
            
            if (isset($_SESSION['userGranted'])) {
                    if ($_SESSION['userGranted'] == true ) {
                
                echo "<h3>Bienvenue,  ".$_SESSION['pseudo'].", vous êtes un ".$_SESSION['role']." de GAME THEM ALL!!</h3>";
//                echo "<form action='index.php'><input type='hidden' name='btLogOut' value='logout'><button type='submit'>Se deconnecter</button></form>" ;   POUR SE DECONNECTER
//                        
//                        
//                        if (isset($_POST['btLogOut'])){
//                            echo "bidule";
//                            session_destroy();
//                            
//                        }
                
            }
                
                    
            }
            else {
                        echo "<h3> Connectez vous </h3>";
                        echo "<span>
                <a href=\"user/inscription.html\">S'inscrire</a> ou
                <a href=\"user/connexion.html\"> Se connecter</a>
            </span>
            <br><br>" ;
                    } 
            ?>
            
            <nav>
                <ul>
                    <li><a href="index.php"> Accueil</a></li>
                    <li><a href="jeudlc.php"> Tous les Jeux</a></li>
                    <li><a href="news.php"> Toutes les News</a></li>
                   <li><a href="test.php"> Tous les Tests</a></li> 
                    <li><a href="console.php"> Toutes les consoles</a></li>
                </ul>  
            </nav>
          
        </header>
        
        
        <main>
        



