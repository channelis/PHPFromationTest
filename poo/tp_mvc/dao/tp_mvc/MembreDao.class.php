<?php
class MembreDao
{   
    
    public function insert($membre)
    {
       // Insertion
    $req = $bdd->prepare('INSERT INTO membres(pseudo, pass, email, date_inscription) VALUES(:pseudo, :pass, :email, CURDATE())');
    $req->execute(array(
    'pseudo' => $membre->getPseudo(),
    'pass' => $membre->getPass(),
    'email' => $membre->getEmail(),));       
    }

    
}
?>