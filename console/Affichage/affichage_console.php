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
			
			$connexion->set_charset('utf8');
			
			//// fin connexion
			if(isset($_POST['jeuChoisi'])){
				$jeuChoisi = $_POST['jeuChoisi'];
			} else if(isset($_GET['jeuChoisi'])){
				$jeuChoisi = $_GET['jeuChoisi'];
			}
			
			
			// pour navigation interne à la page (liens internes entre les consoles)
			if(isset($_POST['consoleChoisi'])){
				$consoleChoisi = $_POST['consoleChoisi'];
			} else if(isset($_GET['consoleChoisi'])){
				$consoleChoisi = $_GET['consoleChoisi'];
			}
			
			
			//REQUETES BDD
			
			//obtenir la liste du nom des consoles pour le select
			$listeConsole = $connexion->query('SELECT * FROM console ORDER BY nom ASC');
						
			if(isset($consoleChoisi)){
								
				//pour la table console
				$result = $connexion->query('SELECT * FROM console WHERE nom = "'.$consoleChoisi.'"');
				$infosConsole = $result->fetch_array(MYSQLI_BOTH);
				
				//pour afficher jeux en fonction de la console choisi
				$result3 = $connexion->query('SELECT jeuDlc.nom FROM console JOIN lien ON lien.idconsole = console.id JOIN jeuDlc ON jeuDlc.id = lien.idJeuDlc WHERE console.nom = "'.$consoleChoisi.'"');
				$arrDisponible = $result3->fetch_all(MYSQLI_ASSOC);
			}
		?>
	</head>
	<body>
			<header>
				
				<nav>
					<form id="selectConsole" name="selectConsole" method="POST" action="" >
						<select name="consoleChoisi" >
							<option selected>séléctionner console</option>
							
							<?php
							foreach($listeConsole as $nomConsole){
								echo '<option name="'.$nomConsole['nom'].'" value="'.$nomConsole['nom'].'" >'.$nomConsole['nom'].'</option>';
							}
							?>
							
						</select>
					</form>
				</nav>
				
				<hr/>
				
			</header>
			
			<main>
			<!-- ici finit le header -->
			
			<!-- ici commence l'affichage de la fiche de la console -->
				<fieldset>
					<section id="ficheConsole">
						<hr/>
							<h2>
							<?php 
							if(isset($consoleChoisi)){
								echo $consoleChoisi;
							} else {
								echo 'Aucune console séléctionnée';
							}
							?>
							</h2>
						<hr/>
						
						<?php
						if(isset($consoleChoisi)){
						
						echo '<fieldset>';
						echo '<article>';
							
							echo $infosConsole['constructeur'];
							
						echo '</article>';
						echo '</fieldset>';
						echo '<fieldset>';
						echo '<aside>';

						echo '</p>';
						echo '<p id="dateSortie">';
							
							echo 'Date de sortie : '.$infosConsole['dateSortie'];
						
						echo '</p>';
						echo '<p id="prix">';
						
							echo 'Prix : '.$infosConsole['prix'].' $';					
					
						echo '</p>';
						echo "Jeux disponibles : ";					
						if(!empty($arrDisponible[0]['nom'])){
							$strDpb="";
							foreach($arrDisponible as $dpb){
								$strDpb = $strDpb.'<a href="../jeudlc/jeuxDlcTest_brouillon.php?jeuChoisi='.$dpb['nom'].'">'.$dpb['nom'].'</a>, ';
							}
							echo substr($strDpb, 0, -2);
						}
						
						echo '</p>';
						echo '</aside>';
						echo '</fieldset>';
						
						} else {
							foreach($listeConsole as $nomConsole){
								echo '<fieldset>';
								echo '<a href="?consoleChoisi='.$nomConsole['nom'].'">'.$nomConsole['nom'].'</a>';
								echo '<p>'.substr($nomConsole['constructeur'], 0, 120).' </p><br/>';
								echo '</fieldset>';
							}
						}
						?>
						
					</section>
				</fieldset>
				<!-- ici finit l'affichage de la fiche de la console -->
					
					</section>
				</fieldset>
			
			<!-- ici commence le footer -->
			</main>
			<footer>
				
			</footer>
	</body>
	
	<script>
		let consoleChoisi = document.getElementsByName("consoleChoisi")[0];
		let selectConsole = document.getElementsByName("selectConsole")[0];
		
		consoleChoisi.onchange = function(){
			selectConsole.submit();
			
		}
		
	</script>
	
</html>
