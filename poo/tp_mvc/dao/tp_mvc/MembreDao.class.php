<?php
class MembreDao
{   

	private $bdd;

	public function __construct()
    {
		// Connexion à la base de données
    	//Le mieux etant de creer une classe singleton pour la connexion
		//Sinon, la variable $bdd est perdue après la validation du formulaire
		try
		{
		    $this->bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
		}
		catch(Exception $e)
		{
		        die('Erreur : '.$e->getMessage());
		}
    }

    public function insert($membre)
    {
       // Insertion
	    $req = $this->bdd->prepare('INSERT INTO membres(pseudo, pass, email, date_inscription) VALUES(:pseudo, :pass, :email, CURDATE())');
	    $req->execute(array(
	    'pseudo' => $membre->getPseudo(),
	    'pass' => $membre->getPass(),
	    'email' => $membre->getEmail(),));       
    }

    public function getMembreById($id)
    {
	       // select
	    $req = $this->bdd->prepare('SELECT * FROM membres WHERE id= :id');
	    $req->execute(array(
	    'id' => $id));
	    $données = $req->fetch();
	    return $données[0];   
    }

    public function getMembreByPseudo($pseudo)
    {
	       // Select 
	    $req = $this->bdd->prepare('SELECT * FROM membres WHERE pseudo= :pseudo');
	    $req->execute(array(
	    'pseudo' => $pseudo));
	    $données = $req->fetch();
	    return $données[0];   
    }
}
?>