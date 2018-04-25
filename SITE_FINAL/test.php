<?php
	include("template/header.php");
	if(isset($_POST['testChoisi'])){
		$testChoisi = $_POST['testChoisi'];
	} else if(isset($_GET['testChoisi'])){
		$testChoisi = $_GET['testChoisi'];
	}
	require_once("class_test.php");
	require_once("../include/bdd_connect.php");
	
	//  Connexion a la BDD
	$db = new bddConnect($sql_db, $sql_user, $sql_pass, $sql_server, $sql_type);
	
	//obtenir la liste du nom des jeux
	$listeJeux = $db->query('SELECT * FROM jeudlc ORDER BY nom ASC');
	//obtenir la liste des tests
	$listeTests = $db->query('SELECT * FROM test ORDER BY date ASC');
	
	//  Affichage objet
	//pour conditions affichage
	if (isset($test)){
		$titreTest = $test->titre;
		$texteTest = $test->texte;
	}
	
?>
<!-- ici commence l'affichage du test -->
<hr/>
<fieldset>
	<section id="test">
	<?php 
		if (isset($testChoisi)) {
	?>
		<nav>
			<form id="selectTest" name="selectTest" method="POST" action="" >
				<select name="testChoisi" >
					<option selected>Lire un autre test</option>
					<?php
						foreach($listeTests as $titreTest){
							echo '<option name="'.$titreTest->titre.'" value="'.$titreTest->titre.'" >'.$titreTest->titre.'</option>';
						}
					?>
				</select>
			</form>
		</nav>
		<?php
		//pour la table test + obtenir pseudo user
		$result2 = $db->query('SELECT test.*, user.pseudo FROM test JOIN lien ON lien.idTest = test.id JOIN jeuDlc ON jeuDlc.id = lien.idJeuDlc JOIN user ON user.id = test.idUser WHERE test.titre ="'.addslashes($testChoisi).'"');
		
		foreach($result2 as $row) {
			$test = new test($row->id, $row->titre, $row->date, $row->texte, $row->note, $row->pseudo);
		}
		if(isset($testChoisi) && !empty($titreTest)){
			echo '<h2>Test du jeu</h2>';
			echo '<h2>';
			echo '<hr/>';
				echo $test->titre;
			echo '<hr/>';
			echo '</h2>';
		
			echo '<fieldset>';
			echo '<aside>';
			
			echo '<p id="dateTest">';
				
				echo 'Edité le : '.$test->date;
				
			echo '</p>';
			echo '<p id="auteurTest">';
				
				echo 'Par : '.$test->pseudo;
				
			echo '</p>';
			echo '<p id="noteTest">';
				
				echo 'Note : '.$test->note.'/20';
				
			echo '</p>';
			echo '</aside>';
			echo '</fieldset>';
			echo '<fieldset>';
			echo '<article>';
		
				echo $test->texte;
		
			echo '</article>';
			echo '</fieldset>';
			
		} else if(isset($testChoisi)) {
			echo "<p>Aucun test pour ce titre n'a été rédigé pour le moment.</p>";
		}} else if(!isset($testChoisi)) {
			foreach($listeTests as $titreTest){
				echo '<fieldset>';
				echo '<a href="?testChoisi='.$titreTest->titre.'">'.$titreTest->titre.'</a>';
				echo '<p>'.substr($titreTest->texte, 0, 119).' ... </p><br/>';
				echo '</fieldset>';
			}
		}
		
		?>
	</section>
</fieldset>
<!-- ici finit l'affichage du test du jeu -->
<?php include("template/footer.php"); ?>