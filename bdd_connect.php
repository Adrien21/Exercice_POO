<?php
//objet connexion a la bdd
class bddConnect{
	private $mysql_server;
	private $mysql_user;
	private $mysql_pass;
	private $mysql_db;
	private $pdo;
	
	//constructeur de l'objet avec 4 parametres : base, utilisateur, mdp, adresse du site
	public function __construct($mysql_db = 'site_jv', $mysql_user = 'root', $mysql_pass = '', $mysql_server = '127.0.0.1'){
		$this->mysql_db = $mysql_db;
		$this->mysql_user = $mysql_user;
		$this->mysql_pass = $mysql_pass;
		$this->mysql_server = $mysql_server;
	}
	//fonction privee pour la connexion
	private function getPDO(){
		//si la connexion n'existe pas on la tente
		if($this->pdo === null){
			try{
				$dbconnect = new PDO('mysql:host='.$this->mysql_server.';dbname='.$this->mysql_db, $this->mysql_user, $this->mysql_pass);
				//$dbconnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$this->pdo = $dbconnect;
			}
				catch (PDOException $e) {
				print "Erreur : " . $e->getMessage() . "<br/>";
				die();
			}
		}
		return $this->pdo;
	}
	
	public function query($requete){
		$req = $this->getPDO()->query($requete);
		$data = $req->fetchAll(PDO::FETCH_OBJ);
		return $data;
	}
}
?>
