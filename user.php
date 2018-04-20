<?php
class user{

	private $id, $nom, $prenom, $pseudo, $email, $type;

    public function __construct($id, $nom, $prenom, $pseudo, $email, $type){ 
		$this->id = $id;
		$this->nom = $nom;
		$this->prenom = $prenom;
		$this->pseudo = $pseudo;
		$this->email = $email;
		$this->type = $type;
    }

	//getter
	public function __get($variable){
			if($variable != "id"): return $this->$variable;
			endif;
		}
	// public function getId(){
	// 	return $this->id;
	// }
	// public function getNom(){
	// 	return $this->nom;
	// }
	// public function getPrenom(){
	// 	return $this->prenom;
	// }
	// public function getPseudo(){
	// 	return $this->pseudo;
	// }
	// public function getEmail(){
	// 	return $this->email;
	// }
	// public function getType(){
	// 	return $this->type;
	// }
	

	//setter
	public function setNom($newNom){
		// Vérification de la NULL-ité du nom
		$trimmedNewNom = trim($newNom);
		if ($trimmedNewNom != "") {
			return $this->nom = $newNom;
		}
	}
	public function setPrenom($newPrenom){
		// Vérification de la NULL-ité du prénom
		$trimmedNewPrenom = trim($newPrenom);
		if ($trimmedNewPrenom != "") {
			return $this->prenom = $newPrenom;
		}
	}
	public function setPseudo($newPseudo){
		// Vérification de la NULL-ité du pseudo
		$trimmedNewPseudo = trim($newPseudo);
		if ($trimmedNewPseudo != "") {
			return $this->pseudo = $newPseudo;
		}
	}
	public function setEmail($newEmail){
		// Vérification du format entré
		if (filter_var($newEmail, FILTER_VALIDATE_EMAIL)) {
		  return $this->email = $newEmail;
		} else {
		  return;
		}
	}
}

include('bdd_connect.php');
$db = new bddConnect();

$requeteUtilisateur = $db->query('SELECT id, nom, prenom, pseudo, email, type FROM user');
var_dump("<pre>", $requeteUtilisateur, "</pre>");


// // Connection à la BDD
// $user = "root";
// $pass = "";

// try {
// 	// Affichage des objets utilisateurs
// 	$dbh = new PDO("mysql:dbname=site_jv;host=localhost", $user, $pass);
// 	$requeteUtilisateur = $dbh->query('SELECT * from user');
// 	$i = 1;
//     foreach($requeteUtilisateur as $row) {
// 		$user = new user($row['id'], $row['nom'], $row['prenom'], $row['pseudo'], $row['email'], $row['type']);
// 		echo "Utilisateur n°" .$i ."</br>";
// 		echo "Id : " .$user->getId() ."</br>";
// 		echo "Nom : " .$user->getNom() ."</br>";
// 		echo "Prenom : " .$user->getPrenom() ."</br>";
// 		echo "Pseudo : " .$user->getPseudo() ."</br>";
// 		echo "Email : " .$user->getEmail() ."</br>";
// 		echo "Type : " .$user->getType() ."</br>";
// 		echo "</br>";
// 		$i++;
// 	}
//     $dbrequete = null;
// } catch (PDOException $e) {
// 	echo 'Echec de la connexion : ' .$e->getMessage();
// }

?>