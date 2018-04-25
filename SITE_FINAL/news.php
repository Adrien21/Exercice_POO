

<?php
include("template/header.php");


include_once ("news/class_newsavis.php");
include_once ("include/bdd_connect.php");

			
			$maCo = new bddConnect($sql_db, $sql_user, $sql_pass, $sql_server, $sql_type);
			$listeNews = $maCo->query("SELECT news.id, news.date, news.texte, news.titre, user.pseudo, jeuDlc.nom FROM news JOIN user ON idUser = user.id JOIN lien ON lien.id = news.idLien JOIN jeuDlc ON jeuDlc.id=lien.idJeuDlc ORDER BY news.date DESC");
			// Sélectionne TOUTES les news. Pour ne sélectionner que celles d'un jeu en particulier, la requête devient 'SELECT news.* FROM news JOIN user ON news.idUser=user.id JOIN lien ON lien.id=news.idLien JOIN jeuDlc ON lien.idJeuDlc = jeuDlc.id WHERE jeuDlc.nom = "nom du jeu" ORDER BY news.date DESC'
			
			foreach($listeNews as $new)
			{
				$allNews[]=new news($new->date, $new->texte, $new->pseudo, $new->titre, $new->nom, $new->id);
			}
			//var_dump_pre($allNews);
			
		?>
		
	
	
		<fieldset>
			<h1>Toutes les news</h1>
            <a href="news/form_creation.php">Ajouter une News</a><br><br>
			<?php
				foreach($allNews as $new)
				{
					echo '<fieldset>';
					$new->display();
					echo '</fieldset>';
				}
			
			?>
		</fieldset>

        <?php include("template/footer.php"); ?>
