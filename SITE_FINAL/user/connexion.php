<?php session_start(); ?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>Connexion</title>
	</head>
	<body>
		<?php
        
        
			// Connection à la BDD
			require_once("../include/bdd_connect.php");
			$db = new bddConnect($sql_db, $sql_user, $sql_pass, $sql_server, $sql_type);
			// Déclaration des variables
			$pseudo = $_POST['pseudo'];
			$mdp = $_POST['mdp'];
			$compteur = 0;
            
            $_SESSION['userGranted'] = false ;
            
			// Connection au compte
			// Récupération des pseudo
			$identification_P = $db->query("SELECT pseudo FROM user WHERE pseudo='" .$pseudo ."'");
			$ar_identification_P = [];
			foreach ($identification_P as $recherche) {
				array_push($ar_identification_P, ($recherche->pseudo));
			}
			
			// Vérification de l'existence du pseudo
			if (array_key_exists('0', $ar_identification_P)) {
				// Récupération du mot de passe si la clé [0] existe
				$identification_MDP = $db->query("SELECT mdp FROM user WHERE pseudo='" .$pseudo ."'");
				$ar_identification_MDP = [];
				foreach ($identification_MDP as $recherche) {
					array_push($ar_identification_MDP, ($recherche->mdp));
				}
				// Vérification du mot de passe
				if (password_verify($mdp, $ar_identification_MDP[0])) {
					echo "<h1>Vous êtes connecté !</h1>Vous serez redirigé dans 3 secondes";
                    $_SESSION['userGranted'] = true;
                    $_SESSION['pseudo'] = $pseudo;
                    // ----------------------------------------------------- rajouter la suite
					header("refresh:3;url=../index.php");
				} else {
					echo "Mot de passe invalide";
					echo "<br/><a href='connexion.html'> << retour à la page de connexion </a>";
				}
			} else {
				echo "<span class='error'>Erreur : ce pseudo n'existe pas, veuillez recommencer la saisie ou vous inscrire</span><br/>";
				echo "<br/><a href='connexion.html'> << retour à la page de connexion </a>";
				echo "<br/><a href='inscription.html'> << aller à la page d'inscription </a>";
				exit;
			}
		?>
	</body>
</html>