<?php
class Perso {
    const PV_INITIAL = 2000;
    private $pv;

    public function __construct($pv = true) { // Paramètre optionnel
        if (!is_numeric($pv) || $pv < 0 || $pv > 100000000)
            $this->pv = self::PV_INITIAL;
        else
            $this->pv = $pv;
    }

    // Accesseurs
    public function getPv() {
        return $this->pv;
    }
	//verifier si vivant
    public function isDead() {
        return $this->pv == 0;
    }
	//tuer personnage
    public function Tuer() {
        return $this->pv = 0;
    }
}

//fonction verification si vivant
function isAlive($personnage){
	if($personnage->isDead()): echo 'Vous etes mort<br />';
	else: echo 'Vous etes vivant<br />';
	endif;
}

// Création d'une classe enfant de Perso
class Magicien extends Perso {
    private $magie;
}

// Création d'une instance de classe
$perso = new Perso(1000);
$perso2 = new Perso();
// Utilisation de l'objet
echo 'Votre personnage a ' . $perso->getPV() . ' PV.<br />';
echo 'Votre personnage2 a ' . $perso2->getPV() . ' PV.<br />';

isAlive($perso2);

$perso2->Tuer();

echo 'Votre personnage2 a ' . $perso2->getPV() . ' PV.<br />';
isAlive($perso2);

// Constantes de classes
echo 'Le PV par défaut attribué à un nouveau personnage est de ' . Perso::PV_INITIAL . '.';

// Destruction de l'objet
unset($perso);
?>
