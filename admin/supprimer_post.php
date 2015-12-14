<?php
// Connexion à la base de données
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

//Le mieux serait de faire une popup de demande de confirmation de suppression
//des commentaires liés à ce billet
$req = $bdd->prepare('DELETE CASCADE FROM billets WHERE id= :id_billet');
$req->execute(array('id_billet' => $_GET['id_billet']));


//echo "mon billet supprimé: ".$_GET['id_billet'];
// Redirection du visiteur vers la page du minichat
header('Location: supprimer.php');
?>