<?php
	
	class newsAvis // objet commun, tous les champs sont identiques à l'exception de note et titre
	{
		protected $_date;
		protected $_pseudo;
		protected $_texte;
		protected $_jeuDlc;

		
		protected function __construct($date, $texte, $user, $jeu)
		{

			$this->_date = $date;
			$this->_texte = $texte;
			$this->_pseudo = $user;
			$this->_jeuDlc = $jeu;

		}
		
		//fonctions get
		public function __get($variable){
			//if(isset($this->$variable) && $variable != "id"): 
			if(isset($this->$variable)): 
				//on donne acces auw attributs qui existent
				return $this->$variable;
			else:
				echo "L'attribut ".$variable." n'existe pas !<br />";
			endif;
		}
		
		
		
		protected function getDate(){
			return $this->_date;
		}
		protected function getPseudo(){
			return $this->_pseudo;
		}

		protected function getTexte(){
			return $this->_texte;
		}
		
		 protected function getJeuDlc(){
			 return $this->_jeuDlc;
		 }
		
		
		
		
		protected function setDate($newDate){
			$this->_date = $newDate;
			return $this;
		}
		
		protected function setPseudo($newPseudo){
			$this->_pseudo = $newPseudo;
			return $this;
		}
		
		protected function setTexte($newTexte){
			$this->_texte = $newTexte;
			return $this;
		}
		
		protected function setJeuDlc($newJeuDlc){
			$this->_jeuDlc = $newJeuDlc;
			return $this;
		}
		
		
	}
	
	class avis extends newsAvis
	{
		private $_note;
		
		public function __construct($date, $texte, $user, $note, $jeu){
			$this->_note = $note;
			parent::__construct($date, $texte, $user, $jeu);
		}
		
		public function getNote(){
			return $this->_note;
		}
		
		public function setNote($newNote){
			$this->_note = $newNote;
			return $this;
		}
		
		public function display(){
			echo '<article class="news">
				 <h1>Note pour '.$this->_jeuDlc.' : '.$this->_note.'/20</h1>
				 <p>'.$this->_texte.'</p>
				 <p>Ecrit le : '.$this->_date.' par '.$this->_pseudo.'</p>
				 </article>';
		}
	}
	
	class news extends newsAvis
	{
		private $_titre;
		
		public function __construct($date, $texte, $user, $titre, $jeu){
			$this->_titre = $titre;
			parent::__construct($date, $texte, $user, $jeu);
		}
		
		public function getTitre(){
			return $this->_titre;
		}
		
		public function setTitre($newTitre){
			$this->_titre = $newTitre;
			return $this;
		}
		
		public function display(){
			echo '<article class="news">
				 <h1>'.$this->_titre.'</h1>
				 <p>'.$this->_texte.'</p>
				 <p>Ecrit le : '.$this->_date.' par '.$this->_pseudo.'<br/>Pour le jeu '.$this->_jeuDlc.'</p>
				 </article>';
		}
	}
	
	
?>
