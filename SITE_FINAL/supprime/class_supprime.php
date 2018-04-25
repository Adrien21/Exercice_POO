<?php
class supprime{
	private $id, $nom, $table;

    public function __construct($id, $nom, $table){ 
		$this->id = $id;
		$this->nom = $nom;
		$this->table = $table;

		?>
		<p></p>
		<form name="supprime" action="supprime/supprime.php" method="post">
			Cocher pour confirmer la suppression :<input type="checkbox" name="confirm" alt="Cocher pour confirmer la suppression">
			<input type="hidden" name="id" value="<?=$this->id?>">
			<input type="hidden" name="nom" value="<?=$this->nom?>">
			<input type="hidden" name="page_origine" value="<?=$_SERVER['PHP_SELF']?>">
			<input type="hidden" name="table" value="<?=$this->table?>">
			<input type="submit" value="Supprimer">
		</form>
		<?php
    }
	
}
?>