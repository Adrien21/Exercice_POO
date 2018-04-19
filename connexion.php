<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>Inscription</title>
	</head>
	<body>
		<?php
			// Connection à la BDD
			$user = "root";
			$pass = "";

			try {
				$dbh = new PDO("mysql:dbname=site_jv;host=localhost", $user, $pass);
			} catch (PDOException $e) {
				echo 'Echec de la connection : ' .$e->getMessage();
			}

			// Déclaration des variables
			$pseudo = $_POST['pseudo'];
			$mdp = $_POST['mdp'];
			$compteur = 0;

			// Connection au compte
			// Récupération des pseudo
			$identification_P = $dbh->query("SELECT pseudo FROM user WHERE pseudo='" .$pseudo ."'");
			$identification_P->setFetchMode(PDO::FETCH_OBJ);
			$ar_identification_P = "";
			while ($resultat = $identification_P->fetch()) {
				$ar_identification_P .= ($resultat->pseudo);
			}
			
			// Vérification de l'existence du pseudo
			if ($ar_identification_P == $pseudo) {
				$compteur++;
			}

			// Si aucun pseudo n'est identique (compteur = 0), redirection vers la création de compte
			if ($compteur == 0) {
				echo "<span class='error'>Erreur : ce pseudo n'existe pas, veuillez recommencer la saisie ou vous inscrire</span><br/>";
				echo "<br/><a href='connexion.html'> << retour à la page de connexion </a>";
				echo "<br/><a href='inscription.html'> << aller à la page d'inscription </a>";
				exit;
			} else {
				// Sinon, récupération du mot de passe
				$identification_MDP = $dbh->query("SELECT mdp FROM user WHERE pseudo='" .$pseudo ."'");
				$identification_MDP->setFetchMode(PDO::FETCH_OBJ);
				$ar_identification_MDP = "";
				while ($resultat = $identification_MDP->fetch()) {
					$ar_identification_MDP .= ($resultat->mdp);
				}
				// Vérification du mot de passe
				if (password_verify($mdp, $ar_identification_MDP)) {
					echo "Vous êtes connecté !";
				} else {
					echo "Mot de passe invalide";
					echo "<br/><a href='connexion.html'> << retour à la page de connexion </a>";
				}
			}
		?>
	</body>
</html>