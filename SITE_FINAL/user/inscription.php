<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>Inscription</title>
	</head>
	<body>
		<?php
			// Connection à la BDD
			require_once("../include/bdd_connect.php");
			$db = new bddConnect($sql_db, $sql_user, $sql_pass, $sql_server, $sql_type);
			// Déclaration des variables
			$nom = $_POST['nom'];
			$prenom = $_POST['prenom'];
			$email = $_POST['email'];
			$pseudo = $_POST['pseudo'];
			$mdp = $_POST['mdp'];
			$mdpcheck = $_POST['mdpconfirm'];

			function verification($param, $test, $db) {
				$verif = 0;
				// Vérification de l'existence d'un pseudo ou email similaire
				$resultats = $db->query("SELECT " .$test ." FROM user WHERE " .$test ."='" .$param ."'");
				$array_verif = [];
				foreach ($resultats as $compteur) {
					array_push($array_verif, ($compteur->$test));
				}

				for ($i = 0; $i < count($array_verif); $i++) { 
					if ($array_verif[$i] == $param) {
						$verif++;
					}
				}
				return $verif;
			}

			// Vérification des chaînes pseudo, nom, mdp et prénom (qui ne doivent pas contenir que des espaces)
			$trimmedNom = trim($nom);
			$trimmedPrenom = trim($prenom);
			$trimmedPseudo = trim($pseudo);
			$trimmedMdp = trim($mdp);
			if ($trimmedNom != "" && $trimmedPrenom != "" && $trimmedPseudo != "" && $trimmedMdp != "") {

				// Création de compte
				// Si aucun pseudo n'est identique (verifPseudo = 0), création du compte
				if (($verifPseudo = verification($pseudo, 'pseudo', $db)) == 0) {
					if ($mdpcheck !== $mdp){
						echo "<span class='error'>Erreur : le mot de passe n'est pas identique dans les 2 champs</span><br/>";
						echo "<br/><a href='inscription.html'> << retour </a>";
					} else {
						if (($verifEmail = verification($email, 'email', $db)) == 0) {
							// Implémentation dans la BDD
							$db->query("INSERT INTO user (pseudo, mdp, nom, prenom, email, type) VALUES ('" .$pseudo ."', '" .password_hash($mdp, PASSWORD_DEFAULT) ."', '" .$nom ."', '" .$prenom ."', '" .$email ."', 'membre')");
							echo "<h1>Succès !</h1>Vous serez redirigé dans 3 secondes";
							header("refresh:3;url=userinterface.php");
						} else {
							echo "<span class='error'>Erreur : cette adresse email est déjà utilisée</span><br/>";
							echo "<br/><a href='inscription.html'> << retour </a>";
						}
					}
				} else {
					echo "<span class='error'>Erreur : ce pseudo est déjà utilisé</span><br/>";
					echo "<br/><a href='inscription.html'> << retour </a>";
				}
			} else {
				echo "<span class='error'>Erreur : les champs nom, prénom, mot de passe ou pseudo ne doivent pas contenir uniquement des espaces</span><br/>";
				echo "<br/><a href='inscription.html'> << retour </a>";
			}
		?>
	</body>
</html>