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

if (!empty($donnéesBillet))
{
//Pagination des commentaires
//s'il n'y a pas de variable page dans l'url, on affcihe la page 1
$page = 1;
if(!empty($_GET['page'])){
	$page = $_GET['page'];	
}
$pagemin=5*($page -1);

//Nombre de commentaires de ce billet:
$req_count = $bdd->prepare('SELECT COUNT(*) FROM commentaires WHERE id_billet= :id_billet');
$req_count->execute(array('id_billet' => $_GET['id_billet']));
$nbre_comm = $req_count->fetch()[0];
echo "nbre_comm: ". $nbre_comm;

//Calcul du nombre de pages pour l'affichage des commentaires:
if (($nbre_comm % 5)>0)
{
	$nbre_pages = (int) ($nbre_comm/5) +1;
	echo " nbre_pages: ".$nbre_pages;
}
elseif (($nbre_comm % 5)==0)
{
	$nbre_pages = ($nbre_comm/5);
	echo " nbre_pages: ".$nbre_pages;
}
else
{
	echo "erreur";
	// Redirection du visiteur vers la page des billets
	header('Location: blog.php');
}
$limit_inf=($page-1)*5;

// Récupération des 10 derniers messages
$req = $bdd->prepare('SELECT * FROM commentaires WHERE id_billet= :id_billet ORDER BY date_commentaire DESC LIMIT '.$limit_inf.', 5');
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

//Affichage de la pagination
for ($i=1; $i <= $nbre_pages; $i++) { 
	echo '<a href="commentaires.php?id_billet='.$_GET['id_billet'].'&page='.$i.'">'.$i.'</a> - ';
}
?>

<!--Formulaire d'ajout de commentaires:-->
<form action="commentaires_post.php" method="post">
<p>
    <label for="auteur">nom</label></label><input type="text" name="auteur" /></br>
    <label for="id_billet"></label><input type="hidden" name="id_billet" value= <?php echo $_GET['id_billet'] ?>/></br>
    <label for="commentaire">commentaire</label><textarea name="commentaire" rows="8" cols="45">
    Votre message ici.
    </textarea></br>

    <input type="submit" value="Ajouter le commentaire" />
</form>

<?php
}
else
{
	echo "Ce billet n'existe pas!";
}
?>
    </body>
</html>