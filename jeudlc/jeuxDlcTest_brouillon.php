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
			
			//pour la table jeudlc
			$result = $connexion->query('SELECT * FROM jeudlc WHERE nom = "'.$_POST['jeuChoisi'].'"');
			$infosJeu = $result->fetch_array(MYSQLI_BOTH);
			
			//pour la table test
			$result2 = $connexion->query('SELECT test.*, user.pseudo FROM test JOIN lien ON lien.idTest = test.id JOIN jeuDlc ON jeuDlc.id = lien.idJeuDlc JOIN `user` ON `user`.id = test.idUser WHERE jeuDlc.nom = "'.$_POST['jeuChoisi'].'"');
			$infosTest = $result2->fetch_array(MYSQLI_ASSOC);
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
								
								$rq2 = $connexion->query('SELECT dlc.nom FROM jeudlc jeu JOIN jeudlc dlc WHERE dlc.idJeuParent = jeu.id AND jeu.nom = "'.$_POST['jeuChoisi'].'"');
								$arrDlc = $rq2->fetch_all(MYSQLI_ASSOC);
								
								if(!empty($arrDlc[0]['nom'])){
									echo "DLC's : ";
									foreach($arrDlc as $dlc){
										
										echo $dlc['nom'].', ';
									}
								}
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
					<h2>
					<?php 
						if(isset($_POST['jeuChoisi']) && !empty($infosTest['titre'])){
							echo $infosTest['titre'];
						}
					?>
					</h2>
					
					<?php 
					if(!empty($infosTest['titre'])){
					echo '<aside>';
						echo '<p id="dateTest">';
							
								echo 'Edité le : '.$infosTest['date'];
							
						echo '</p>';
						echo '<p id="auteurTest">';
							
								echo 'Par : '.$infosTest['pseudo'];
							
						echo '</p>';
						echo '<p id="noteTest">';
							
								echo 'Note : '.$infosTest['note'].'/20';
							
						echo '</p>';
					echo '</aside>';
					echo '<article>';
					
					
						echo $infosTest['texte'];
					
					
					echo '</article>';
					} else {
						echo "<p>Aucun test pour ce titre n'a été rédigé pour le moment</p>";
					}
					
					?>
					
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
