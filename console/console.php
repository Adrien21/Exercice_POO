<?php
/*class console{
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
*/
//info bdd

//connexion a la bdd
include('bdd_connect.php');

//nouvel objet connexion
$db = new bddConnect('ma');

//envoi la requete a l'objet connexion
$data = $db->query('SELECT * from console') ;
//affiche le resultat
var_dump ($data);

//parcours les objets du resultat et en affiche chaque elements
foreach($db->query('SELECT * from console') as $data){
	echo $data->id."<br />";
	echo $data->nom."<br />";
	echo $data->constructeur."<br />";
	echo $data->prix."<br />";
	echo $data->dateSortie."<br />";
	echo "<br />";
	
	$data->prix = 10;
	echo $data->prix."<br />";
};



?>
