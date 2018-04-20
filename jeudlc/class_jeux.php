<?php
//création de l'objet 
class jeuDlc {

    // déclaration des variables
    private $id, $nom, $editeur, $dev, $dateSortie, $prix, $pegi, $description, $idJeuParent;
    
    //construction de l'objet
    public function __construct($id, $nom, $editeur, $dev, $dateSortie, $prix, $pegi, $description, $idJeuParent) {
        $this->id = $id;
        $this->nom = $nom;
        $this->editeur = $editeur;
        $this->dev = $dev;
        $this->dateSortie = $dateSortie;
        $this->prix = $prix;
        $this->pegi = $pegi;
        $this->description = $description;
        $this->idJeuParent = $idJeuParent;
    }
    
    //getter - fonctions qui retournent les valeurs de la BDD 
 	//acces aux attributs auquels on ne peux theoriquement pas accéder
	public function __get($variable){
		//if(isset($this->$variable) && $variable != "id"): 
		if(isset($this->$variable)): 
			//on donne acces auw attributs qui existent
			return $this->$variable;
		else:
			echo "L'attribut ".$variable." n'existe pas !<br />";
		endif;
	}
/*
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
*/
	//setter - fonctions qui modifient les valeurs de la BDD 
	//bloquer l'ajout d'attributs non autorisés
	public function __set($nom, $valeur){
		echo "Impossible d'enregirter l'attribut ".$nom."<br />";
	}
	
    public function setNom($newNom) {
        $this->nom = $newNom;
		return $this;
    }
    public function setEditeur($newEditeur) {
        $this->editeur = $newEditeur;
 		return $this;
   }
    public function setDev($newDev) {
        $this->dev = $newDev;
 		return $this;
   }
    public function setDateSortie($newDateSortie) {
        $this->dateSortie = $newDateSortie;
		return $this;
    }
    public function setPrix($newPrix) {
        $this->prix = $newPrix;
		return $this;
    }
    public function setPegi($newPegi) {
        $this->pegi = $newPegi;
 		return $this;
   }
    public function setDescription($newDescription) {
        $this->description = $newDescription;
		return $this;
    }
    public function setIdJeuParent($idJeuParent) {
        $this->idJeuParent = $idJeuParent;
		return $this;
    }
}
?>