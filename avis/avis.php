<?php
	
	class newsAvis // objet commun, tous les champs sont identiques à l'exception de note et titre
	{
		private $_id;
		private $_note;
		private $_titre
		private $_date;
		private $_idUser;
		private $_texte;
		private $_idLien;
		
		public function __construct($id, $spec, $date, $texte, $user, $lien)
		{
			this->$_id = $id;
			
			if(is_numeric($spec)) //si $spec est un nombre, alors c'est une note (cas avis)
				this->$_note = $spec;
			else //sinon, c'est un titre (cas news)
				this->$_titre = $spec;
				
			this->$_date = $date;
			this->$_texte = $texte;
			this->$_idUser = $user;
			this->$_idLien = $lien;
		}
		
		//fonctions get
		public function getId(){
			return this->$_id
		}
		public function getNote(){
			return this->$_note
		}
		public function getTitre(){
			return this->$_titre
		}
		public function getDate(){
			return this->$_date
		}
		public function getIdUser(){
			return this->$_idUser
		}
		public function getIdLien(){
			return this->$_idLien
		}
		public function getTexte(){
			return this->$_texte
		}
		
		
	}
	
	
	
	
?>
