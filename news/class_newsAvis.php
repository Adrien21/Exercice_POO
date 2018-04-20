<?php
	
	class newsAvis // objet commun, tous les champs sont identiques à l'exception de note et titre
	{
		protected $_id;
		protected $_date;
		protected $_idUser;
		protected $_texte;
		protected $_idLien;
		
		protected function __construct($id, $date, $texte, $user, $lien)
		{
			$this->_id = $id;
			$this->_date = $date;
			$this->_texte = $texte;
			$this->_idUser = $user;
			$this->_idLien = $lien;
		}
		
		//fonctions get
		protected function __get($variable){
			//if(isset($this->$variable) && $variable != "id"): 
			if(isset($this->$variable)): 
				//on donne acces auw attributs qui existent
				return $this->$variable;
			else:
				echo "L'attribut ".$variable." n'existe pas !<br />";
			endif;
		}
		
		protected function getId(){
			$this->_id;
			return $this;
		}
		
		
		protected function getDate(){
			$this->_date;
			return $this;
		}
		protected function getIdUser(){
			$this->_idUser;
			return $this;
		}
		protected function getIdLien(){
			$this->_idLien;
			return $this;
		}
		protected function getTexte(){
			$this->_texte;
			return $this;
		}
		
		
		
		
		protected function setDate($newDate){
			$this->_date = $newDate;
			return $this;
		}
		
		protected function setIdUser($newIdUser){
			$this->_idUser = $newIdUser;
			return $this;
		}
		
		protected function setTexte($newTexte){
			$this->_texte = $newTexte;
			return $this;
		}
		
		protected function setIdLien($newIdLien){
			$this->_idLien = $newIdLien;
			return $this;
		}
		
	}
	
	class avis extends newsAvis
	{
		private $_note;
		
		public function __construct($id, $date, $texte, $user, $lien, $note){
			$this->_note = $note;
			parent::__construct($id, $date, $texte, $user, $lien);
		}
		
		public function getNote(){
			$this->_note;
			return $this;
		}
		
		public function setNote($newNote){
			$this->_note = $newNote;
			return $this;
		}
	}
	
	class news extends newsAvis
	{
		private $_titre;
		
		public function __construct($id, $date, $texte, $user, $lien, $titre){
			$this->_titre = $titre;
			parent::__construct($id, $date, $texte, $user, $lien);
		}
		
		public function getTitre(){
			$this->_titre;
			return $this;
		}
		
		public function setTitre($newTitre){
			$this->_titre = $newTitre;
			return $this;
		}
	}
	
	
?>
