<!-- Le formulaire de login -->



<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mon blog</title>
        <link rel="stylesheet" type="text/css" href="../blog.css">
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


// Récupération des 10 derniers messages
$reponse = $bdd->query('SELECT * FROM billets ORDER BY ID DESC LIMIT 0, 10');

// Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
echo '<ul class="news">';
while ($donnees = $reponse->fetch())
{
    
        echo  '<h3>'.htmlspecialchars($donnees['titre']).' '.htmlspecialchars($donnees['date_creation']).'</h3>';
        echo  '<p>'.htmlspecialchars($donnees['contenu']).'</p>';
        echo  '<a href="http://localhost/tests/admin/modifier_post.php?id_billet='.htmlspecialchars($donnees['id']).'">Modifier le billet</a>';


}
echo '</ul>';
$reponse->closeCursor();

?>

    </body>
</html>