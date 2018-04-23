<?php
	// Connection à la BDD
	require_once("../include/bdd_connect.php");
	$db = new bddConnect($sql_db, $sql_user, $sql_pass, $sql_server, $sql_type);?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>Utilisateur</title>
	</head>
	<body>
		<header>
			<h1>Pseudo utilisateur :
				<?php 
					$requeteUtilisateur = $db->query("SELECT * FROM user WHERE nom='toto'");
					echo $requeteUtilisateur[0]->pseudo ."</h1></br>";
					echo "<h2>Prénom : " .$requeteUtilisateur[0]->prenom ."</h2>";
					?>
		</header>
	</body>
</html>