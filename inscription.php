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
			$nom = $_POST['nom'];
			$prenom = $_POST['prenom'];
			$email = $_POST['email'];
			$pseudo = $_POST['pseudo'];
			$mdp = $_POST['mdp'];
			$mdpcheck = $_POST['mdpconfirm'];
			$compteur = 0;

			// Vérification des chaînes pseudo, nom, mdp et prénom
			$trimmedNom = trim($nom);
			$trimmedPrenom = trim($prenom);
			$trimmedPseudo = trim($pseudo);
			$trimmedMdp = trim($mdp);
			if ($trimmedNom != "" && $trimmedPrenom != "" && $trimmedPseudo != "" && $trimmedMdp != "") {
				// Création de compte
				// Vérification de l'existence du pseudo
				$resultats = $dbh->query("SELECT pseudo FROM user");
				$resultats->setFetchMode(PDO::FETCH_OBJ);
				$array_utilisateur = [];
				while ($resultat = $resultats->fetch()) {
					array_push($array_utilisateur, ($resultat->pseudo));
				}

				for ($i = 0; $i < count($array_utilisateur); $i++) { 
					if ($array_utilisateur[$i] == $pseudo) {
						$compteur++;
					}
				}

				// Si aucun pseudo n'est identique (compteur = 0), création du compte
				if ($compteur == 0) {
					if ($mdpcheck !== $mdp){
						echo "<span class='error'>Erreur : le mot de passe n'est pas identique dans les 2 champs</span><br/>";
						echo "<br/><a href='inscription.html'> << retour </a>";
					} else {
						// Implémentation dans la BDD
						$dbh->exec("INSERT INTO user (pseudo, mdp, nom, prenom, email, type) VALUES ('" .$pseudo ."', '" .password_hash($mdp, PASSWORD_DEFAULT) ."', '" .$nom ."', '" .$prenom ."', '" .$email ."', 'membre')");
						echo "Vous êtes inscrit";
					}
				} else {
					// Sinon c'est reparti
					echo "<span class='error'>Erreur : ce pseudo est déjà utilisé</span><br/>";
					echo "<br/><a href='inscription.html'> << retour </a>";
				}
			} else {
				echo "<span class='error'>Erreur : les champs nom, prénom, mot de passe et pseudo ne doivent pas contenir uniquement des espaces</span><br/>";
				echo "<br/><a href='inscription.html'> << retour </a>";
			}
		?>
	</body>
</html>