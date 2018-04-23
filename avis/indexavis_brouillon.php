<!DOCTYPE html>

<?php

function var_dump_pre($mixed = null) {
  echo '<pre>';
  var_dump($mixed);
  echo '</pre>';
  return null;
}

include "../news/class_newsavis.php";
include "../include/bdd_connect.php";
?>

<html>
	<head>
		<meta charset="UTF-8" />
		<title>Site Jeux Video POO</title>
		
		
		<?php
			
			
			$maCo = new bddConnect();
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
			<?php
				foreach($allAvis as $avis)
				{
					$avis->display();
				}
			
			?>
			
	</body>
	
	<script>
		
	</script>
	
</html>
