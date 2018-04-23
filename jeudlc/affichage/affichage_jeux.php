<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>Affichage jeux</title>
	</head>
	<body>
		<?php
			require_once("../class_jeux.php");
			//  Connexion a la BDD
			require_once("../../include/bdd_id.php");
			require_once("../../include/bdd_connect.php");
			$db = new bddConnect($mysql_db, $mysql_user, $mysql_pass, $mysql_server);
			$requete = 'SELECT * FROM jeudlc WHERE id=4'; // "id=" <-- A modifier pour afficher dynamiquement
			$dbrequete = $db->query($requete);

			//  Affichage objet
			foreach($dbrequete as $row) {
				$jeu = new jeudlc($row->id, $row->nom, $row->editeur, $row->dev, $row->dateSortie, $row->prix, $row->pegi, $row->description, $row->idJeuParent);
				echo "<h1>" .$jeu->nom."</h1><br/>";
				echo "<p>Editeur : " .$jeu->editeur."</p><br/>";
				echo "<p>Développeur : " .$jeu->dev."</p><br/>";
				echo "<p>Date de sortie : " .$jeu->dateSortie."</p><br/>";
				echo "<p>Prix : " .$jeu->prix."€</p><br/>";
				echo "<p>PEGI : " .$jeu->pegi."</p><br/>";
				echo "<p>Description : " .$jeu->description."</p><br/>";

				if(!is_null($jeu->idJeuParent)) {
					$requete_parent = $db->query("SELECT nom FROM jeudlc WHERE id=" .$jeu->idJeuParent);
					$nom_jeu_parent = "";
					foreach($requete_parent as $parent){
						$nom_jeu_parent .= $parent->nom;
						echo "<p>DLC de : " .$nom_jeu_parent ."</p><br/>";
					}
				} else {
					$requete_dlc = $db->query("SELECT nom FROM jeudlc WHERE idJeuParent=" .$jeu->id);
					$dlc = [];
					$index = 0;
					echo "DLC de ce jeu :<ul>";
					foreach ($requete_dlc as $jeu_enfant) {
						array_push($dlc, ($jeu_enfant->nom));
						echo "<li>" .$dlc[$index] ."</li>";
						$index++;
					}
					echo "</ul>";
				}
			}
		?>
	</body>
</html>