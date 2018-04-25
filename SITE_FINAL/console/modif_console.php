<?php 
	//varaible pour affichage
	$affichage = "";
	//appel objet jeu
	require_once("class_console.php");
	//connexion a la bdd
	require_once("../include/bdd_connect.php");

	//mise a jour ou creation de console
	if(isset($_POST['id'])):
		//echo $_POST['id'];
		//creation
		if($_POST['id'] == 0):
			$Nconsole = new console(NULL, $_POST['nom'], $_POST['constructeur'], $_POST['prix'], $_POST['dateSortie']);
			$requete = 'INSERT INTO console(nom, constructeur, prix, dateSortie) VALUES ("'.addslashes($Nconsole->nom).'","'.addslashes($Nconsole->constructeur).'",'.$Nconsole->prix.',"'.$Nconsole->dateSortie.'")';
			
			$affichage = "Insertion d'une nouvelle console ".$Nconsole->nom;
			
		//modification
		else:
			$Nconsole = new console($_POST['id'], $_POST['nom'], $_POST['constructeur'], $_POST['prix'], $_POST['dateSortie']);
			$requete = 'UPDATE console SET nom = "'.addslashes($Nconsole->nom).'", constructeur = "'.addslashes($Nconsole->constructeur).'", prix = '.$Nconsole->prix.', dateSortie = "'.$Nconsole->dateSortie.'" WHERE id ='.$Nconsole->id;
			
			$affichage = "Modification de la console ".$Nconsole->id." : ".$Nconsole->nom;			
		endif;

	//connexion et envoi requete
	$db = new bddConnect($sql_db, $sql_user, $sql_pass, $sql_server, $sql_type);
	$db->query($requete);

	endif;
	
	//verifie si on est en modification ou creation
	if(isset($_GET['console'])):
		$db = new bddConnect($sql_db, $sql_user, $sql_pass, $sql_server, $sql_type);
		//envoi la requete a l'objet connexion
		$requete = 'SELECT * from console where id='.$_GET['console'].'';
		$data = $db->query($requete);
		//objet console selectionné
		$consoleSelect = new console($data[0]->id, $data[0]->nom, $data[0]->constructeur, $data[0]->prix, $data[0]->dateSortie);
	else: 
		$consoleSelect = new console(0, "", "", 0, "");
	endif;
	echo $affichage."<br>";
	//affichage de la liste des consoles
	//include("console.php");
	?>
		<form method="post" action="#" enctype="multipart/form-data">
			<!-- Créer, modifier fiche console -->
			<?php if($consoleSelect->id == 0): 
				echo "Créer une nouvelle console"; 
			else: 
				//echo "<a href='modif_console.php'>Créer nouvelle console</a><br>";
				echo "Vous modifier la console ".$consoleSelect->id." : ".$consoleSelect->nom; 

			endif;
			?>
			<br><br>
			<input type="hidden" name="id" value="<?=$consoleSelect->id?>">
			<label for="crea_nom">Nom : </label><input type="text" name="nom" value="<?=$consoleSelect->nom?>" required><br><br>
			<label for="crea_editeur">Constructeur : </label><input type="text" name="constructeur" value="<?=$consoleSelect->constructeur?>" required><br><br>
			<label for="crea_date">Date de sortie: </label><input type="date" name="dateSortie" value="<?=$consoleSelect->dateSortie?>" required><br><br>
			<label for="crea_prix">Prix : </label><input type="number" name="prix" value="<?=$consoleSelect->prix?>" min="0" step="any" required><br><br>
			
			<input type="submit" name="Valider" value="<?php if($consoleSelect->id == 0): echo 'Créer'; else: echo 'Modifier'; endif;?>">
		</form>
        <br><br>
        <a href="../console.php">Retour à la page des Consoles </a><br><br>
		<a href="../index.php">Retour à l'Accueil</a>
        

