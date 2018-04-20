<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<title>Site Jeux Video POO</title>
		<link rel="stylesheet" href="style.css" />
		
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
			
			$result = $connexion->query('SELECT * FROM jeudlc WHERE nom = "'.$_POST['jeuChoisi'].'"');
			$infosJeu = $result->fetch_array(MYSQLI_BOTH);
		?>
		
	</head>
	<body>
			<header>
				
				<nav>
					<form id="selectJeux" name="selectJeu" method="POST" action="" >
						<select name="jeuChoisi" >
							<option selected>sélectionner jeu</option>
							
							<?php
								$listeJeux = $connexion->query('SELECT nom FROM jeudlc');
								foreach($listeJeux as $nomJeu){
									echo '<option name="'.$nomJeu['nom'].'" value="'.$nomJeu['nom'].'" >'.$nomJeu['nom'].'</option>';
								}
							?>
							
						</select>
					</form>
				</nav>
				
			</header>
			<main>
				<section id="ficheJeu">
					<h2>
					<?php 
						if(isset($_POST['jeuChoisi'])){
							echo $_POST['jeuChoisi'];
						}
					?>
					</h2>
					<article>
					
					<?php
						echo $infosJeu['description'];
					?>
					
					</article>
					<aside>
						<p id="dlcFrom">
							<?php
								$rq = $connexion->query('SELECT nom FROM jeudlc WHERE id = "'.$infosJeu['idJeuParent'].'"');
								$arrJeuParent = $rq->fetch_array(MYSQLI_BOTH);
								
								if($infosJeu['idJeuParent'] != null){
									
									echo 'DLC de : '.$arrJeuParent[0];
								}
								
								$rq2 = $connexion->query('SELECT dlc.nom FROM jeudlc jeu JOIN jeudlc dlc WHERE dlc.idJeuParent = jeu.id AND jeu.nom = "jeu3"');
								$arrDlc = $rq2->fetch_all(MYSQLI_ASSOC);
								
								//var_dump($arrDlc);
								//echo $arrDlc;
								echo $arrDlc[0][1];
								
								echo "DLC's : ";
								/*foreach($arrDlc as $dlc){
									
									echo $dlc.', ';
								}*/
								
							?>
						</p>
						<p id="dateSortie">
							<?php
								echo 'Date de sortie : '.$infosJeu['dateSortie'];
							?>
						</p>
						<p id="pegi">
							<?php
								echo 'PEGI : '.$infosJeu['pegi'];
							?>
						</p>
						<p id="studio">
							<?php
								echo 'Développé par : '.$infosJeu['dev'];
							?>
						</p>
						<p id="editeur">
							<?php
								echo 'Edité par : '.$infosJeu['editeur'];
							?>
						</p>
						<p id="prix">
							<?php
								echo 'Prix : '.$infosJeu['prix'].' $';
							?>
						</p>
					</aside>
				</section>
				<section id="test">
					
				</section>
			</main>
			<footer>
				
			</footer>
	</body>
	
	<script>
		let jeuChoisi = document.getElementsByName("jeuChoisi")[0];
		let selectJeu = document.getElementsByName("selectJeu")[0];
		
		jeuChoisi.onchange = function(){
			selectJeu.submit();
			
		}
	</script>
	
</html>
