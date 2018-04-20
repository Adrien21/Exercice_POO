<!DOCTYPE html>

<?php

function var_dump_pre($mixed = null) {
  echo '<pre>';
  var_dump($mixed);
  echo '</pre>';
  return null;
}

?>

<html>
	<head>
		<meta charset="UTF-8" />
		<title>Site Jeux Video POO</title>
		
		
		<?php
			$host = "127.0.0.1";
			$bdd = "site_jv";
			$admin = "root";
			$pw = "";
			
			try {
				$connexion = mysqli_connect($host, $admin, $pw, $bdd);
			}
			catch (Exception $e){
				die('Erreur : '.$e->getMessage());
			}
			
			$news = $connexion->query('SELECT * FROM news JOIN user WHERE idUser = user.id');
			$listeNews = $news->fetch_all(MYSQLI_ASSOC);
			//var_dump_pre($listeNews);
			foreach($listeNews as $new)
				print_r($new["titre"]."<br/>Posté le: ".$new["date"]."<br/>".$new["texte"]."<br/>Auteur: ".$new["pseudo"]."<br/><br/>");
			
		?>
		
	</head>
	<body>
			<!--<header>
				
				<nav>
					
				</nav>
				
			</header>
			<main>
				<section id="ficheJeu">
					<h2>Toutes les news</h2>
					<!--_________________________________________________________________- ->
					
					<article class="news">
						<p class="titre">
							<?php
								//echo $listeNews["titre"];
							?>
						</p>
						
						<p class="date">
							<?php
								//echo $listeNews["date"];
							?>
						</p>
						
						<p class="texte">
							<?php
								//echo $listeNews["texte"];
							?>
						</p>
					</article>
					
					
					<!--_________________________________________________________________- ->
					
					
				</section>
			</main>
			<footer>
				
			</footer>-->
	</body>
	
	<script>
		
	</script>
	
</html>
