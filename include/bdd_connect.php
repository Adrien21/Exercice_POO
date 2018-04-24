<?php
require_once("bdd_id.php");
//objet connexion a la bdd
class bddConnect{
	private $sql_type;
	private $sql_server;
	private $sql_user;
	private $sql_pass;
	private $sql_db;
	private $pdo;
	
	//constructeur de l'objet avec 4 parametres : base, utilisateur, mdp, adresse du site
	public function __construct($sql_db, $sql_user, $sql_pass, $sql_server, $sql_type){
		$this->sql_db = $sql_db;
		$this->sql_user = $sql_user;
		$this->sql_pass = $sql_pass;
		$this->sql_server = $sql_server;
		$this->sql_type = $sql_type;
	}
	//destruction de l'objet
	public function __destruct(){
	//	echo 'Destruction de MaClasse<br />';
	}
	//getter
	//acces aux attributs auquels on ne peux theoriquement pas accéder
	public function __get($variable){
		echo "L'attribut ".$variable." n'est pas accessible!<br />";
	}
	//setter
	//bloquer l'ajout d'attributs
	public function __set($nom, $valeur){
		echo "Impossible d'enregirter l'attribut ".$nom."<br />";
	}
	//fonction privee pour la connexion
	private function getPDO(){
		//si la connexion n'existe pas on la tente
		if($this->pdo === null){
			try{
				$dbconnect = new PDO($this->sql_type.':host='.$this->sql_server.';charset=UTF8;dbname='.$this->sql_db, $this->sql_user, $this->sql_pass);
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
		//n'executer que les SELECT
		if(stripos($requete, "SELECT") === 0):
			$req = $this->getPDO()->query($requete);
			$data = $req->fetchAll(PDO::FETCH_OBJ);
		//execute les UPDATE
		elseif(stripos($requete, "UPDATE") === 0): 
			$req = $this->getPDO()->query($requete); 
			
			$tab = explode(' ', $requete, 3);
			$where = substr($requete, stripos($requete, 'WHERE'));
			$select = "SELECT * FROM ".$tab['1']." ".$where;

			$req = $this->getPDO()->query($select);
			$data = $req->fetchAll(PDO::FETCH_OBJ);
		//execute les INSERT
		elseif(stripos($requete, "INSERT") === 0):
			$req = $this->getPDO()->query($requete);
			$data = '';
		else:
		echo "SQL non reconnu ou non autorisé !<br />";
			$data = '';
		endif;
		return $data;
	}

}
?>
