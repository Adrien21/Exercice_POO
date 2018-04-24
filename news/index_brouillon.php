<!DOCTYPE html>

<?php

function var_dump_pre($mixed = null) {
  echo '<pre>';
  var_dump($mixed);
  echo '</pre>';
  return null;
}

include_once "class_newsavis.php";
include_once "bdd_connect.php";
?>

<html>
	<head>
		<meta charset="UTF-8" />
		<title>Site Jeux Video POO</title>
		
		
		<?php
			
			$maCo = new bddConnect($sql_db, $sql_user, $sql_pass, $sql_server, $sql_type);
			$listeNews = $maCo->query("SELECT news.date, news.texte, news.titre, user.pseudo, jeuDlc.nom FROM news JOIN user ON idUser = user.id JOIN lien ON lien.id = news.idLien JOIN jeuDlc ON jeuDlc.id=lien.idJeuDlc ORDER BY news.date DESC");
			// Sélectionne TOUTES les news. Pour ne sélectionner que celles d'un jeu en particulier, la requête devient 'SELECT news.* FROM news JOIN user ON news.idUser=user.id JOIN lien ON lien.id=news.idLien JOIN jeuDlc ON lien.idJeuDlc = jeuDlc.id WHERE jeuDlc.nom = "nom du jeu" ORDER BY news.date DESC'
			
			foreach($listeNews as $new)
			{
				$allNews[]=new news($new->date, $new->texte, $new->pseudo, $new->titre, $new->nom);
			}
			//var_dump_pre($allNews);
			
		?>
		
	</head>
	<body>
		<fieldset>
			<h1>Toutes les news</h1>
			<?php
				foreach($allNews as $new)
				{
					echo '<fieldset>';
					$new->display();
					echo '</fieldset>';
				}
			
			?>
		</fieldset>
	</body>
	
	<script>
		
	</script>
	
</html>
