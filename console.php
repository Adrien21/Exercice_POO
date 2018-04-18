<?php
class console{
	//const NOM = "PS1", CONSTRUCTEUR = "Sony", DATESORTIE = "19941203";
	private $id, $nom, $constructeur, $prix, $dateSortie;

    public function __construct($id, $nom, $constructeur, $prix, $dateSortie){ 
		$this->id = $id;
		$this->nom = $nom;
		$this->constructeur = $constructeur;
		$this->prix = $prix;
		$this->datesortie = $dateSortie;
    }
	//getter
	public function getId(){
		return $this->id;
	}
	public function getNom(){
		return $this->nom;
	}
	public function getConstructeur(){
		return $this->constructeur;
	}
	public function getPrix(){
		return $this->prix;
	}
	public function getDatesortie(){
		return $this->datesortie;
	}
	//setter
	public function setNom($newNom){
		return $this->nom = $newNom;
	}
	public function setConstructeur($newConstructeur){
		return $this->constructeur = $newConstructeur;
	}
	public function setPrix($newPrix){
		//verifier que prix est numérique et positif
		if(is_numeric($newPrix) && $newPrix > 0):
		$this->prix = $newPrix;
		endif;
	}
	public function setDatesortie($newDatesortie){
		//verifier que date de sortie est au format date
		
		return $this->datesortie = $newDatesortie;
	}
}
//info bdd
$mysql_user = 'root';
$mysql_pass = '';
$mysql_db = 'site_jv';
//connexion a la bdd
try {
    $dbconnect = new PDO('mysql:host=localhost;dbname='.$mysql_db, $mysql_user, $mysql_pass, array(PDO::ATTR_PERSISTENT => true));
	$dbrequete = $dbconnect->query('SELECT * from console');
    foreach($dbrequete as $row) {
		$ps1 = new console($row['id'], $row['nom'], $row['constructeur'], $row['prix'], $row['dateSortie']);
		echo $ps1->getId()."<br />";
		echo $ps1->getNom()."<br />";
		echo $ps1->getConstructeur()."<br />";
		echo $ps1->getPrix()." euros<br />";
		echo $ps1->getDatesortie()."<br />";
		echo "<br />";
	}
    $dbrequete = null;
	//
} catch (PDOException $e) {
    print "Erreur : " . $e->getMessage() . "<br/>";
    die();
}

//modification du prix du jeu
echo "--- modification du prix du jeu ---<br /><br />";
$ps1->setPrix(35);

echo $ps1->getId()."<br />";
echo $ps1->getNom()."<br />";
echo $ps1->getConstructeur()."<br />";
echo $ps1->getPrix()." euros<br />";
echo $ps1->getDatesortie()."<br />";



?>
