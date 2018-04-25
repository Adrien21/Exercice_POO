<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>Création BDD avec formulaire</title>
	</head>
	<body>
		<form method="post" action="create_avis.php" enctype="multipart/form-data" id="formavis">
			<!-- Créer nouvelle news -->
			<h1>Nouvel avis</h1>
			<input hidden name="jeu" value=<?php echo intval($_GET['jeu'])?>>
			<label for="crea_note">Note sur 20 : </label><select form="formavis" name="crea_note">
				<?php
				
					for($i=0;$i<21;$i++)
					{
						echo '<option value='.$i.'>'.$i.'</option>';
					}
				?>
			</select></br></br>
			<label for="crea_texte">Texte : </label><textarea form="formavis" name="crea_texte" required></textarea></br></br>
			
			<label for="user">Vous êtes : </label><select form="formavis" name="user">
				<?php
					include_once("../include/bdd_connect.php");
					$maCo = new bddConnect($sql_db, $sql_user, $sql_pass, $sql_server, $sql_type);
					$requete = $maCo->query("SELECT pseudo, id FROM user");
					
					foreach($requete as $pseud)
					{
						echo '<option value="'.$pseud->id.'">'.$pseud->pseudo.'</option>';
					}
				?>
			</select></br></br>
			<input type="submit" name="Créer" value="Créer">
		</form>
	</body>
</html>
