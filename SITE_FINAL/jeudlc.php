<?php
include("template/header.php");

			// pour navigation interne à la page (liens internes entre les jeux)
			if(isset($_POST['jeuChoisi'])){
				$jeuChoisi = $_POST['jeuChoisi'];
			} else if(isset($_GET['jeuChoisi'])){
				$jeuChoisi = $_GET['jeuChoisi'];
			}
		
			require_once("jeudlc/class_jeux.php");
			//  Connexion a la BDD
			require_once("include/bdd_connect.php");
			$db = new bddConnect($sql_db, $sql_user, $sql_pass, $sql_server, $sql_type);
			
			//obtenir la liste du nom des jeux pour la liste
			$listeJeux = $db->query('SELECT * FROM jeudlc ORDER BY nom ASC');
						
			//  Affichage objet
			if(isset($jeuChoisi)){
				$requete = "SELECT * FROM jeudlc WHERE nom='".addslashes($jeuChoisi)."'"; // "nom=" <-- A modifier pour afficher dynamiquement
				$dbrequete = $db->query($requete);
				
				foreach($dbrequete as $row) {
					$jeu = new jeudlc($row->id, $row->nom, $row->editeur, $row->dev, $row->dateSortie, $row->prix, $row->pegi, $row->description, $row->idJeuParent);
			?>
				
				<nav>
					<form id="selectJeux" name="selectJeu" method="POST" action="" >
						<select name="jeuChoisi" >
							<option selected>séléctionner jeu</option>
							
							<?php
							foreach($listeJeux as $nomJeu){
								echo '<option name="'.$nomJeu->nom.'" value="'.$nomJeu->nom.'" >'.$nomJeu->nom.'</option>';
							}
							?>
							
						</select>
					</form>
				</nav>
				
				<!-- ici commence l'affichage de la fiche du jeu -->
				<fieldset>
					<section id="ficheJeu">
						<hr/>
							<h2>
								<?= $jeu->nom; ?>
							</h2>
						<hr/>
				
				<?php
				$requete_dlc = $db->query("SELECT nom FROM jeudlc WHERE idJeuParent=" .$jeu->id);
					
				//pour afficher console en fonction du jeu choisi
				$result3 = $db->query('SELECT console.nom FROM jeuDlc JOIN lien ON lien.idJeuDlc = jeudlc.id JOIN console ON console.id = lien.idConsole WHERE jeuDlc.nom = "'.$jeuChoisi.'"');
				
					echo '<fieldset>';
					echo '<article>';
					
						echo $jeu->description;
					
					echo '</article>';
					echo '</fieldset>';
					echo '<fieldset>';
					echo '<aside>';
					echo '<p id="dlcFrom">';
					
					if(!is_null($jeu->idJeuParent)) {
						$requete_parent = $db->query("SELECT nom FROM jeudlc WHERE id=" .$jeu->idJeuParent);
						$nom_jeu_parent = "";
						foreach($requete_parent as $parent){
							$nom_jeu_parent .= $parent->nom;
							echo 'DLC de : <a href="?jeuChoisi='.$nom_jeu_parent.'">'.$nom_jeu_parent.'</a>';
						}
					}   
					if(!empty($requete_dlc[0]->nom)) {
						
						$dlc = [];
						$index = 0;
						echo "DLC pour ce jeu : ";
						//echo "<ul>";
						$strDlc = "";
						foreach ($requete_dlc as $jeu_enfant) {
							array_push($dlc, ($jeu_enfant->nom));
							
							//echo "<li>" .$dlc[$index] ."</li>";
							
							$strDlc = $strDlc.'<a href="?jeuChoisi='.$dlc[$index].'">'.$dlc[$index].'</a>, ';
							
							$index++;
						}
						//echo "</ul>";
						echo substr($strDlc, 0, -2);
					}
					
					echo '</p>';
					echo '<p id="dateSortie">';
							
							echo 'Date de sortie : '.$jeu->dateSortie;
									
					echo '</p>';
					echo '<p id="plateforme">';
								
					echo "Plateformes : ";
					$arrPlatform = [];
					$i = 0;
					$strPlt = "";
					foreach ($result3 as $console) {
						array_push($arrPlatform, ($result3[$i]->nom));
						$strPlt .= '<a href="console.php">'.$arrPlatform[$i] .'</a>, ';
						$i++;
					}
					echo substr($strPlt, 0, -2);
					
					echo '</p>';
					echo '<p id="pegi">';
							
						echo 'PEGI : '.$jeu->pegi;
							
					echo '</p>';
					echo '<p id="studio">';
							
						echo 'Développé par : '.$jeu->dev;
							
					echo '</p>';
					echo '<p id="editeur">';
						
						echo 'Edité par : '.$jeu->editeur;
							
					echo '</p>';
					echo '<p id="prix">';
						
						echo 'Prix : '.$jeu->prix.' €';
						
					echo '</p>';
					echo '</aside>';
					echo '</fieldset>
					<form method="post" action="jeudlc/modification/form_modif.php" enctype="multipart/form-data">
						<input type="hidden" name="jeuamodif" value="' .$jeu->id .'">
						<input type="submit" name="modifier" value="Modifier le jeu">
					</form>';
					require_once('supprime/class_supprime.php'); 
					$affichche_suppr = new supprime($jeu->id, $jeu->nom, "jeudlc"); 
					
					include("test/affichage_test.php");
					include("news/newsjeu.php");
					include("avis/avisjeu.php");
					?>
				</section>
				
				
				<?php
				} 
				
			} else if(!isset($jeuChoisi)) {
				echo '<a href="jeudlc/creation/form_creation.php">Ajouter un jeu</a></br></br>';
				foreach($listeJeux as $nomJeu){
					echo '<fieldset>';
					echo '<a href="?jeuChoisi='.$nomJeu->nom.'">'.$nomJeu->nom.'</a>';
					echo '<p>'.substr($nomJeu->description, 0, 120).' ... </p><br/>';
					echo '</fieldset>';
				}
				if(empty($listeJeux) == 1): echo "<p>Aucun jeu</p>";
				endif;
		  }?>

<?php
include("template/footer.php");
?>
		
	
