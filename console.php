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

$ps1 = new console(1, "PS1", "Sony", 397, "19941203");
echo $ps1->getId()."<br />";
echo $ps1->getNom()."<br />";
echo $ps1->getConstructeur()."<br />";
echo $ps1->getPrix()." euros<br />";
echo $ps1->getDatesortie()."<br />";
echo "<br />";
//modification du prix du jeu
echo "--- modification du prix du jeu ---<br /><br />";
$ps1->setPrix(35);

echo $ps1->getId()."<br />";
echo $ps1->getNom()."<br />";
echo $ps1->getConstructeur()."<br />";
echo $ps1->getPrix()." euros<br />";
echo $ps1->getDatesortie()."<br />";
/*
class Perso {
    const PV_INITIAL = 2000;
    private $pv;

    public function __construct($pv = true) { // Paramètre optionnel
        if (!is_numeric($pv) || $pv < 0 || $pv > 100000000)
            $this->pv = self::PV_INITIAL;
        else
            $this->pv = $pv;
    }

    // Accesseurs
    public function getPv() {
        return $this->pv;
    }
	//verifier si vivant
    public function isDead() {
        return $this->pv == 0;
    }
	//tuer personnage
    public function Tuer() {
        return $this->pv = 0;
    }
}

//fonction verification si vivant
function isAlive($personnage){
	if($personnage->isDead()): echo 'Vous etes mort<br />';
	else: echo 'Vous etes vivant<br />';
	endif;
}

// Création d'une classe enfant de Perso
class Magicien extends Perso {
    private $magie;
}

// Création d'une instance de classe
$perso = new Perso(1300);
$perso2 = new Perso();
// Utilisation de l'objet
echo 'Votre personnage a ' . $perso->getPV() . ' PV.<br />';
echo 'Votre personnage2 a ' . $perso2->getPV() . ' PV.<br />';

isAlive($perso2);

$perso2->Tuer();

echo 'Votre personnage2 a ' . $perso2->getPV() . ' PV.<br />';
isAlive($perso2);

// Constantes de classes
echo 'Le PV par défaut attribué à un nouveau personnage est de ' . Perso::PV_INITIAL . '.';

// Destruction de l'objet
unset($perso);
*/
?>
