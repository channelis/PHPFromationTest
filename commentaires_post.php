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
//echo "POST: id_billet: ".$_POST['id_billet'];

$datejour = date_create()->format('Y-m-d H:i:s');
// Insertion du message à l'aide d'une requête préparée
$req = $bdd->prepare('INSERT INTO commentaires (auteur, commentaire,date_commentaire,id_billet) VALUES(?, ?, ?, ?)');
$req->execute(array($_POST['auteur'], $_POST['commentaire'], $datejour, $_POST['id_billet']));

// Redirection du visiteur vers la page du minichat
header('Location: commentaires.php?id_billet='.$_POST['id_billet']);
?>