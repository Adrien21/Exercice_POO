
<!DOCTYPE html>
<html>

<head>
    <title> Objet Jeux / DLC </title>  
    <meta charset="utf-8"> 
</head>
<body>
    <?php


//création de l'objet 
class jeuDlc {

    // déclaration des variables
    private $id, $nom, $editeur, $dev, $dateSortie, $prix, $pegi, $description;
    
    //construction de l'objet
    public function __construct($id, $nom, $editeur, $dev, $dateSortie, $prix, $pegi, $description) {
        $this->id = $id;
        $this->nom = $nom;
        $this->editeur = $editeur;
        $this->dev = $dev;
        $this->dateSortie = $dateSortie;
        $this->prix = $prix;
        $this->pegi = $pegi;
        $this->description = $description;
    }
    
    //fonctions qui retournent les valeurs de la BDD (getter)
    public function getID() {
        return $this->id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getEditeur() {
        return $this->editeur;
    }

    public function getDev() {
        return $this->dev;
    }

    public function getDateSortie() {
        return $this->dateSortie;
    }

    public function getPrix() {
        return $this->prix;
    }

    public function getPegi() {
        return $this->pegi;
    }

    public function getDescription() {
        return $this->description;
    }

   //fonctions qui modifient les valeurs de la BDD (setter) 
    public function setNom($newNom) {
        return $this->nom = $newNom;
    }

    public function setEditeur($newEditeur) {
        return $this->editeur = $newEditeur;
    }

    public function setDev($newDev) {
        return $this->dev = $newDev;
    }

    public function setDateSortie($newDateSortie) {
        return $this->dateSortie = $newDateSortie;
    }

    public function setPrix($newPrix) {
        return $this->prix = $newPrix;
    }

    public function setPegi($newPegi) {
        return $this->pegi = $newPegi;
    }

    public function setDescription($newDescription) {
        return $this->description = $newDescription;
    }
}

//info bdd
$mysql_user = 'root';
$mysql_pass = '';
$mysql_db = 'site_jv';
//connexion a la bdd

try {
    $dbconnect = new PDO('mysql:host=localhost;dbname='.$mysql_db, $mysql_user, $mysql_pass, array(PDO::ATTR_PERSISTENT => true));
    $dbrequete = $dbconnect->query('SELECT * from jeudlc');
    foreach($dbrequete as $row) {
        $godOfWar = new jeudlc($row['id'], $row['nom'], $row['editeur'], $row['dev'], $row['dateSortie'], $row['prix'], $row['pegi'], $row['description']);
        echo $godOfWar->getId()."<br />";
        echo $godOfWar->getNom()."<br />";
        echo $godOfWar->getEditeur()."<br />";
        echo $godOfWar->getDev()."<br />";
        echo $godOfWar->getDateSortie()."<br />";
        echo $godOfWar->getPrix()." euros<br />";
        echo $godOfWar->getPegi()."<br />";
        echo $godOfWar->getDescription()."<br />";
        echo "<br />";
    }
    $dbrequete = null;
    //
} catch (PDOException $e) {
    print "Erreur : " . $e->getMessage() . "<br/>";
    die();
}
// //modification du prix du jeu
// echo "--- modification du prix du jeu ---<br /><br />";
// $ps1->setPrix(35);
// echo $ps1->getId()."<br />";
// echo $ps1->getNom()."<br />";
// echo $ps1->getConstructeur()."<br />";
// echo $ps1->getPrix()." euros<br />";
// echo $ps1->getDatesortie()."<br />";



?>
    
</body>
</html>

