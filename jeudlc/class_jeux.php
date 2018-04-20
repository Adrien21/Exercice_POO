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
?>