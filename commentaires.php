<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mon blog</title>
        <link rel="stylesheet" type="text/css" href="blog.css">
    </head>
    <body>
<h1><strong>Mon premier blog!</strong></h3>
<h1>Liste des billets</h1>

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

//Récupération du contenu du billet
$reponse = $bdd->prepare('SELECT * FROM billets WHERE id= :id_billet');
$reponse->execute(array('id_billet' => $_GET['id_billet']));
$donnéesBillet = $reponse->fetch();

// Récupération des 10 derniers messages
$req = $bdd->prepare('SELECT * FROM commentaires WHERE id_billet= :id_billet');
$req->execute(array('id_billet' => $_GET['id_billet']));

echo '<ul class="news">';
		echo  '<h3>Bienvenue sur mon blog! le '.htmlspecialchars($donnéesBillet['date_creation']).'</h3>';
		echo  '<p>'.htmlspecialchars($donnéesBillet['contenu']).'</p>';
echo '</ul>';
// Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)

while ($donnees = $req->fetch())
{
		
        echo  '<p><strong>'.htmlspecialchars($donnees['auteur']).'</strong> le '.htmlspecialchars($donnees['date_commentaire']).'</p>';
        echo  '<p>'.htmlspecialchars($donnees['commentaire']).'</p>';
        //echo  '<a href="http://localhost/tests/commentaires.php?id_billet='.htmlspecialchars($donnees['id']).'">Commentaires</a>';
        

}

$req->closeCursor();

?>
    </body>
</html>