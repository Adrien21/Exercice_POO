<?php
class console{
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
		if(isset($this->$variable)): 
			//on donne acces auw attributs qui existent
			return $this->$variable;
		else:
			echo "L'attribut ".$variable." n'existe pas !<br />";
		endif;
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
	
	//autres fonctions
	public function display($connexion){
		//pour afficher jeux en fonction de la console choisi
		$arrDisponible = $connexion->query('SELECT jeuDlc.nom FROM console JOIN lien ON lien.idconsole = console.id JOIN jeuDlc ON jeuDlc.id = lien.idJeuDlc WHERE console.id = "'.$this->id.'"');
		//var_dump($arrDisponible);
		echo '<article class="console">
			 <h1>'.$this->nom.'</h1>
			 <p>Constructeur : '.$this->constructeur.'</p>
			 <p>Prix : '.$this->prix.'€</p>
			 <p>Sortie le : '.$this->dateSortie.'</p>
			 <p><a href="console/modif_console.php?console='.$this->id.'">Modifier</a></p>
			 <p><a href="#">Supprimer</a></p>
			</p>Jeux disponibles : ';
			if(!empty($arrDisponible[0]->nom)){
				$strDpb="";
				foreach($arrDisponible as $dpb){
					$strDpb = $strDpb.'<a href="../jeudlc.php?jeuChoisi='.$dpb->nom.'">'.$dpb->nom.'</a>, ';
				}
				echo substr($strDpb, 0, -2);
			}
			
			echo '</p></article>';
	}
}
?>
