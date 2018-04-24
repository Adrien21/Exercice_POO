<?php
//header('Location: console.php');
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<title>Site Jeux Video POO</title>
		
		
		<?php
			//REQUETES BDD
			require_once("class_console.php");
			require_once("../include/bdd_connect.php");
			$connexion = new bddConnect($sql_db, $sql_user, $sql_pass, $sql_server, $sql_type);
		
			//// fin connexion
			/*
			if(isset($_POST['jeuChoisi'])){
				$jeuChoisi = $_POST['jeuChoisi'];
			} else if(isset($_GET['jeuChoisi'])){
				$jeuChoisi = $_GET['jeuChoisi'];
			}*/

			// pour navigation interne à la page (liens internes entre les consoles)
			if(isset($_POST['consoleChoisi'])){
				$consoleChoisi = $_POST['consoleChoisi'];
			} else if(isset($_GET['consoleChoisi'])){
				$consoleChoisi = $_GET['consoleChoisi'];
			}
	
			//obtenir la liste du nom des consoles pour le select
			$listeConsole = $connexion->query('SELECT * FROM console ORDER BY nom ASC');
			//var_dump($listeConsole);
			if(isset($consoleChoisi)){
								
			//pour la table console
			$infosConsole = $connexion->query('SELECT * FROM console WHERE id = "'.$consoleChoisi.'"');
			//var_dump($infosConsole);
			$infosConsole = new console($infosConsole[0]->id, $infosConsole[0]->nom, $infosConsole[0]->constructeur, $infosConsole[0]->prix, $infosConsole[0]->dateSortie);
			
			//pour afficher jeux en fonction de la console choisi
			$arrDisponible = $connexion->query('SELECT jeuDlc.nom FROM console JOIN lien ON lien.idconsole = console.id JOIN jeuDlc ON jeuDlc.id = lien.idJeuDlc WHERE console.id = "'.$consoleChoisi.'"');
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
								echo '<option name="'.$nomConsole->id.'" value="'.$nomConsole->id.'" >'.$nomConsole->nom.'</option>';
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
							
						<?php 
						if(!isset($consoleChoisi)):
							?>
							<a href='modif_console.php'>Créer nouvelle console</a>
							<h2>Aucune console séléctionnée</h2>
						<?php
						endif;
						if(isset($consoleChoisi)){
						$infosConsole->display($connexion);
						} else {
							foreach($listeConsole as $row){
								$allConsole[] = new console($row->id, $row->nom, $row->constructeur, $row->prix, $row->dateSortie);
							}
							foreach($allConsole as $console){
								echo '<fieldset>';
								$console->display($connexion);
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
