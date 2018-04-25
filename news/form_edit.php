<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Création d'une news</title>
</head>
<body>
	<?php
		require_once("class_newsAvis.php");

		//connexion a la bdd
		require_once("../include/bdd_connect.php");
		$maCo = new bddConnect($sql_db, $sql_user, $sql_pass, $sql_server, $sql_type);
		
		
		if(!isset($_POST["selectednews"]))
			$_POST["selectednews"] = 0;
	?>
	<form name="selectnews" method="POST" action="#">
		<select name="selectednews">
			<option value=0 disabled selected>Choisissez la news à éditer</option>
			<?php
				$listeNews = $maCo->query("SELECT news.id, news.titre, news.texte FROM news ORDER BY news.date DESC");
				$i=0;
				foreach($listeNews as $new)
				{
					echo '<option value='.$new->id.'>'.$new->titre.'</option>';
					$i++;
				}
			?>
			
		</select></br></br>
	</form>
	<form id="editnew" method="POST" action="update_news.php">
		<input hidden name="selectednews" value=<?php echo $_POST["selectednews"]; ?>>
		<label for="newtitre">Nouveau titre : </label><input type="text" name="newtitre" value="<?php
		foreach($listeNews as $new)
		{
			if($new->id==$_POST["selectednews"])
				echo $new->titre;
		}?>" required></br></br>
		<label for="newtexte">Nouveau texte : </label><textarea form="editnew" name="newtexte"><?php
		foreach($listeNews as $new)
		{
			if($new->id==$_POST["selectednews"])
				echo $new->texte;
		}
		?></textarea></br></br>
		<input type="submit" value="Modifier" id="valider">
	</form>
		
	<?php
		//$maCo->query("INSERT INTO `news` (`titre`, `texte`, `idUser`, `idLien`, `date`) VALUES ('".$_POST['crea_titre']."', '".$_POST['crea_texte']."', ".intval($user).", ".intval($lien).", '".date("Y-m-d H:i:s")."')");
		//echo 'La news "'.$_POST['crea_titre'].'" a bien été créée.';
	?>
</body>

<script>
		let newsChoisie = document.getElementsByName("selectednews")[0];
		let selectNews = document.getElementsByName("selectnews")[0];
		
		
		newsChoisie.onchange = function(){
			selectNews.submit();
		}
		
		
		
		
	</script>
</html>
