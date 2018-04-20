<?php
	// Connection à la BDD
	require_once("../include/bdd_id.php");
	require_once("../include/bdd_connect.php");
	$db = new bddConnect($mysql_db, $mysql_user, $mysql_pass, $mysql_server);
?>
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