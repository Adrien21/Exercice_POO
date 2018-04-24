<?php
//création de l'objet 
class test {

    // déclaration des variables
    private $id, $titre, $date, $texte, $note, $pseudo;
    
    //construction de l'objet
    public function __construct($id, $titre, $date, $texte, $note, $pseudo) {
        $this->id = $id;
        $this->titre = $titre;
        $this->date = $date;
        $this->texte = $texte;
        $this->note = $note;
        $this->pseudo = $pseudo;
    }
    
    //getter - fonctions qui retournent les valeurs de la BDD 
 	//acces aux attributs auquels on ne peux theoriquement pas accéder
	public function __get($variable){
		//if(isset($this->$variable) && $variable != "id"): 
		if(isset($this->$variable)): 
			//on donne acces aux attributs qui existent
			return $this->$variable;
		else:
			//echo "L'attribut ".$variable." n'existe pas !<br />";
		endif;
	}

	public function getID() {
        return $this->id;
    }
    public function getTitre() {
        return $this->titre;
    }
    public function get_Date() {
        return $this->date;
    }
    public function getTexte() {
        return $this->texte;
    }
    public function getNote() {
        return $this->note;
    }
    public function getPseudo() {
        return $this->pseudo;
    }
    

	//setter - fonctions qui modifient les valeurs de la BDD 
	//bloquer l'ajout d'attributs non autorisés
		
    public function setTitre($newTitre){
        $this->titre = $newTitre;
		return $this;
    }
    public function set_Date($newDate){
        $this->date = $newDate;
 		return $this;
	}
    public function setTexte($newTexte){
        $this->texte = $newTexte;
 		return $this;
	}
    public function setNote($newNote){
        $this->note = $newNote;
		return $this;
    }
    
    
}
?>



