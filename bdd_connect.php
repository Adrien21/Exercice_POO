<?php
try {
	$dbconnect = new PDO('mysql:host=localhost;dbname='.$mysql_db, $mysql_user, $mysql_pass, array(PDO::ATTR_PERSISTENT => true));
};
catch (PDOException $e) {
	print "Erreur : " . $e->getMessage() . "<br/>";
	die();
};
?>
