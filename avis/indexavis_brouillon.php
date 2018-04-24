<!DOCTYPE html>

<?php



include_once "../news/class_newsavis.php";
include_once "../include/bdd_connect.php";
?>

<html>
	<head>
		<meta charset="UTF-8" />
		<title>Site Jeux Video POO</title>
		
		
		<?php
			
			$maCo = new bddConnect($sql_db, $sql_user, $sql_pass, $sql_server, $sql_type);
			$listeAvis = $maCo->query("SELECT avis.date, avis.texte, avis.note, user.pseudo, jeuDlc.nom FROM avis JOIN user ON idUser = user.id JOIN lien ON lien.id = avis.idLien JOIN jeuDlc ON jeuDlc.id = lien.idJeuDlc ORDER BY avis.date DESC");
			// Sélectionne TOUS les avis. Pour ne sélectionner que ceux d'un jeu en particulier, la requête devient "SELECT avis.* FROM avis JOIN user ON avis.idUser=user.id JOIN lien ON lien.id=avis.idLien JOIN jeuDlc ON lien.idJeuDlc = jeuDlc.id WHERE jeuDlc.nom = "nom du jeu"'
			
			foreach($listeAvis as $avis)
			{
				$allAvis[]=new avis($avis->date, $avis->texte, $avis->pseudo, $avis->note, $avis->nom);
			}
			//var_dump_pre($allNews);
			
		?>
		
	</head>
	<body>
		<fieldset>
			<h1>Tous les avis</h1>
			<?php
				foreach($allAvis as $avis)
				{
					echo '<fieldset>';
					$avis->display();
					echo '</fieldset>';
				}
			
			?>
		</fieldset>
	</body>
	
	<script>
		
	</script>
	
</html>
