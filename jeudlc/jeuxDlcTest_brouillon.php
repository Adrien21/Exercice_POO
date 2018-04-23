<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<title>Site Jeux Video POO</title>
		
		
		<?php
			// connexion ...
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
			////
			
			// pour navigation interne à la page 
			
			if(isset($_POST['jeuChoisi'])){
				$jeuChoisi = $_POST['jeuChoisi'];
			} else if(isset($_GET['jeuChoisi'])){
				$jeuChoisi = $_GET['jeuChoisi'];
			}
			//echo $_GET['jeuChoisi'];
			
			
			//REQUETES BDD
			
			//obtenir la liste du nom des jeux pour le select
			$listeJeux = $connexion->query('SELECT * FROM jeudlc ORDER BY nom ASC');
						
			if(isset($jeuChoisi)){
								
				//pour la table jeudlc
				$result = $connexion->query('SELECT * FROM jeudlc WHERE nom = "'.$jeuChoisi.'"');
				$infosJeu = $result->fetch_array(MYSQLI_BOTH);
				
				//pour la table test
				$result2 = $connexion->query('SELECT test.*, user.pseudo FROM test JOIN lien ON lien.idTest = test.id JOIN jeuDlc ON jeuDlc.id = lien.idJeuDlc JOIN `user` ON `user`.id = test.idUser WHERE jeuDlc.nom = "'.$jeuChoisi.'"');
				$infosTest = $result2->fetch_array(MYSQLI_ASSOC);
				
				//affichage du jeu parent pour les dlc ...
				$rq = $connexion->query('SELECT nom FROM jeudlc WHERE id = "'.$infosJeu['idJeuParent'].'"');
				$arrJeuParent = $rq->fetch_array(MYSQLI_BOTH);
				//et de la liste des dlc pour un jeu
				$rq2 = $connexion->query('SELECT dlc.nom FROM jeudlc jeu JOIN jeudlc dlc WHERE dlc.idJeuParent = jeu.id AND jeu.nom = "'.$jeuChoisi.'"');
				$arrDlc = $rq2->fetch_all(MYSQLI_ASSOC);
							
				//pour afficher console en fonction du jeu choisi
				$result3 = $connexion->query('SELECT console.nom FROM jeuDlc JOIN lien ON lien.idJeuDlc = jeudlc.id JOIN console ON console.id = lien.idConsole WHERE jeuDlc.nom = "'.$jeuChoisi.'"');
				$arrPlatform = $result3->fetch_all(MYSQLI_ASSOC);
			}
		?>
	</head>
	<body>
			<header>
				
				<nav>
					<form id="selectJeux" name="selectJeu" method="POST" action="" >
						<select name="jeuChoisi" >
							<option selected>séléctionner jeu</option>
							
							<?php
								
								foreach($listeJeux as $nomJeu){
									echo '<option name="'.$nomJeu['nom'].'" value="'.$nomJeu['nom'].'" >'.$nomJeu['nom'].'</option>';
								}
							?>
							
						</select>
					</form>
				</nav>
				
				<hr/>
				
			</header>
			<main>
				<fieldset>
					<section id="ficheJeu">
						<hr/>
							<h2>
							<?php 
								if(isset($jeuChoisi)){
									echo $jeuChoisi;
								} else {
									echo 'Aucun jeu séléctionné';
								}
							?>
							</h2>
						<hr/>
						
						<?php
						if(isset($jeuChoisi)){
						
						echo '<fieldset>';
							echo '<article>';
							
							
								echo $infosJeu['description'];
							
							
							echo '</article>';
						echo '</fieldset>';
						echo '<fieldset>';
							echo '<aside>';
								echo '<p id="dlcFrom">';
									
										if($infosJeu['idJeuParent'] != null){
											
											echo 'DLC de : <a href="?jeuChoisi='.$arrJeuParent[0].'">'.$arrJeuParent[0].'</a>';
										}
										
										if(!empty($arrDlc[0]['nom'])){
											echo "DLC's : ";
											$strDlc="";
											foreach($arrDlc as $dlc){
												//echo strlen($dlc['nom']);
												
												$strDlc = $strDlc.'<a href="?jeuChoisi='.$dlc['nom'].'">'.$dlc['nom'].'</a>, ';
													
											}
											echo substr($strDlc, 0, -2);
										}
									
									
								echo '</p>';
								echo '<p id="dateSortie">';
									
										echo 'Date de sortie : '.$infosJeu['dateSortie'];
									
								echo '</p>';
								echo '<p id="plateforme">';
								
								echo "Plateformes : ";
											
										if(!empty($arrPlatform[0]['nom'])){
											$strPtf="";
											foreach($arrPlatform as $ptf){
												
												$strPtf = $strPtf.'<a href="#">'.$ptf['nom'].'</a>, ';
											
											}
											echo substr($strPtf, 0, -2);
										}
									
								echo '</p>';
								echo '<p id="pegi">';
									
										echo 'PEGI : '.$infosJeu['pegi'];
									
								echo '</p>';
								echo '<p id="studio">';
									
										echo 'Développé par : '.$infosJeu['dev'];
									
								echo '</p>';
								echo '<p id="editeur">';
									
										echo 'Edité par : '.$infosJeu['editeur'];
									
								echo '</p>';
								echo '<p id="prix">';
									
										echo 'Prix : '.$infosJeu['prix'].' $';
									
								echo '</p>';
							echo '</aside>';
						echo '</fieldset>';
						
						} else {
							
							
							//echo '<ul>';
							foreach($listeJeux as $nomJeu){
								echo '<fieldset>';
								echo '<a href="?jeuChoisi='.$nomJeu['nom'].'">'.$nomJeu['nom'].'</a>';
								echo '<p>'.substr($nomJeu['description'], 0, 120).' ... </p><br/>';
								echo '</fieldset>';
							}
							//echo '</ul>';
							
						}
						
						?>
						
					</section>
				</fieldset>
				<hr/>
				<fieldset>
					<section id="test">
					
						<h2>
						<?php 
							if(isset($jeuChoisi) && !empty($infosTest['titre'])){
								echo '<hr/>';
								echo $infosTest['titre'];
								echo '<hr/>';
							}
						?>
						</h2>
						
						<?php 
						if(!empty($infosTest['titre'])){
							echo '<fieldset>';
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
							echo '</fieldset>';
							echo '<fieldset>';
							echo '<article>';
						
								echo $infosTest['texte'];
						
							echo '</article>';
							echo '</fieldset>';
							
						} else if(isset($jeuChoisi)) {
							echo "<p>Aucun test pour ce titre n'a été rédigé pour le moment.</p>";
						}
						
						?>
					
					</section>
				</fieldset>
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
