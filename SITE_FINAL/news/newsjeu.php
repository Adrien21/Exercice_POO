<?php





    include_once("class_newsavis.php");
    


        $maCo = new bddConnect($sql_db, $sql_user, $sql_pass, $sql_server, $sql_type);
        $listeNews = $maCo->query('SELECT news.date, news.texte, news.titre, user.pseudo, jeuDlc.nom FROM news JOIN user ON idUser = user.id JOIN lien ON lien.id = news.idLien JOIN jeuDlc ON jeuDlc.id=lien.idJeuDlc WHERE jeuDlc.nom ="'.$jeuChoisi.'" ORDER BY news.date DESC');
        // Sélectionne TOUTES les news. Pour ne sélectionner que celles d'un jeu en particulier, la requête devient 'SELECT news.* FROM news JOIN user ON news.idUser=user.id JOIN lien ON lien.id=news.idLien JOIN jeuDlc ON lien.idJeuDlc = jeuDlc.id WHERE jeuDlc.nom = "nom du jeu" ORDER BY news.date DESC'

        foreach($listeNews as $new)
        {
            $allNews[]=new news($new->date, $new->texte, $new->pseudo, $new->titre, $new->nom);
        }
        //var_dump_pre($allNews);

    ?>
    
    <?php
        foreach($allNews as $new)
        {
            echo '<fieldset>';
            $new->display();
            echo '</fieldset>';
        }


?>
