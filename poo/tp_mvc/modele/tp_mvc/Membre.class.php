<?php
class Membre
{   
    private $pseudo;
    private $email;
    private $pass;
    private $date_inscription; 

    public function __construct()
    {
        // Récupérer en base de données les infos du membre
        // SELECT pseudo, email, signature, actif FROM membres WHERE id = ...
        
        // Définir les variables avec les résultats de la base
        //$this->pseudo = $donnees['pseudo'];
        //$this->email = $donnees['email'];
        //$this->pass = $donnees['pass'];
        //$this->date_inscription = $donnees['date_inscription'];
        // etc.
    }

    public function getPseudo()
    {
        return $this->pseudo;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getPass()
    {
        return $this->pass;
    }
    public function getDate_inscription()
    {
        return $this->date_inscription;
    }
        
    public function setPseudo($nouveauPseudo)
    {
        if (!empty($nouveauPseudo) AND strlen($nouveauPseudo) < 15)
        {
            $this->pseudo = $nouveauPseudo;
        }
    }
    public function setEmail($email)
    {
        //Ici on pourrait rajouter une vérification
        //de validite  par un test sur une regexp
            $this->email = $email;        
    }
    public function setPass($pass)
    {
            $this->pass = $pass;        
    }
    public function setDate_inscription($date_inscription)
    {       
            $this->date_inscription = $date_inscription;        
    }   
}
?>