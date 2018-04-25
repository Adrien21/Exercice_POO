
<?php



//include_once "../news/class_newsavis.php";

?>


<?php

	$maCo = new bddConnect($sql_db, $sql_user, $sql_pass, $sql_server, $sql_type);
	$listeAvis = $maCo->query('SELECT avis.id, avis.date, avis.texte, avis.note, user.pseudo, jeuDlc.nom FROM avis JOIN user ON idUser = user.id JOIN lien ON lien.id = avis.idLien JOIN jeuDlc ON jeuDlc.id = lien.idJeuDlc WHERE jeuDlc.nom ="'.$jeuChoisi.'"ORDER BY avis.date DESC');
	
	foreach($listeAvis as $avi)
	{
		$allAvis[]=new avis($avi->date, $avi->texte, $avi->pseudo, $avi->note, $avi->nom, $avi->id);
	}
	
	$idJeuActuel = $maCo->query('SELECT id FROM jeuDlc WHERE jeuDlc.nom="'.$jeuChoisi.'"')[0]->id;
	
?>

<a href="avis/form_creation.php?jeu=<?=$idJeuActuel?>">Nouvel avis</a>
<?php
	foreach($allAvis as $avi)
	{
		echo '<fieldset>';
		$avi->display();
		echo '</fieldset>';
	}

?>
