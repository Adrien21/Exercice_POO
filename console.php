<?php
class console{
	//const NOM = "PS1", CONSTRUCTEUR = "Sony", DATESORTIE = "19941203";
	private $id, $nom, $constructeur, $prix, $dateSortie;

    public function __construct($id, $nom, $constructeur, $prix, $dateSortie){ 
		$this->id = $id;
		$this->nom = $nom;
		$this->constructeur = $constructeur;
		$this->prix = $prix;
		$this->dateSortie = $dateSortie;
    }
	//getter
	public function __get($variable){
		if($variable != "id"): return $this->$variable;
		endif;
	}
	/*
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
	public function getDateSortie(){
		return $this->dateSortie;
	}
*/
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
	public function setDatesortie($newDateSortie){
		//verifier que date de sortie est au format date
		return $this->dateSortie = $newDateSortie;
	}
}

//info bdd

//connexion a la bdd
include('bdd_connect.php');

//nouvel objet connexion
$db = new bddConnect();

//envoi la requete a l'objet connexion
//$datas = $db->query('UPDATE `console` SET `nom` = "ps1" WHERE `console`.`id` = 1') ;
$datas = $db->query('SELECT * FROM console') ;
//affiche le resultat
var_dump ($datas);

//parcours les objets du resultat et en affiche chaque elements
foreach($datas as $data){
	echo $data->id."<br />";
	echo $data->nom."<br />";
	echo $data->constructeur."<br />";
	echo $data->prix." €<br />";
	echo $data->dateSortie."<br />";
	echo "<br />";
	
	$data->prix = 10;
	//echo $data->prix."<br />";
};


$PS = new console(1, "PS1", "Sony", 12, "19941203");
echo $PS->nom."<br />";;
echo $PS->id."<br />";;
echo $PS->prix."<br />";;
$PS->setPrix(10);
$PS->autre = 9;
//$PS->prix = 9;
echo $PS->autre."<br />";;

var_dump($PS);

?>
