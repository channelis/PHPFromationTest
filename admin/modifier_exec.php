
<?php
/*
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

// On ajoute une entrée dans la table jeux_video
$bdd->exec('INSERT INTO jeux_video(nom, possesseur, console, prix, nbre_joueurs_max, commentaires) VALUES(\'Battlefield 1942\', \'Patrick\', \'PC\', 45, 50, \'2nde guerre mondiale\')');

echo 'Le jeu a bien été ajouté !';
*/
?>

<!--OU-->

<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

// Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
if (isset($_POST['titre']) AND isset($_POST['contenu']))
{

echo "id_billet: ".$_POST['id_billet'];
echo "titre: ".$_POST['titre'];
echo "contenu: ".$_POST['contenu'];

$req = $bdd->prepare('UPDATE billets SET titre = :titre , contenu = :contenu WHERE id = :id_billet');
$req->execute(array(
	'titre' => $_POST['titre'],
	'contenu' => $_POST['contenu'],
	'id_billet' => $_POST['id_billet']
	));

echo 'Le billet abien été modifié !';
$req->closeCursor();
// Redirection du visiteur vers la page du minichat
header('Location: modifier.php');

}
else
{
	$reponse->closeCursor();
	echo "Le formulaire est incomplet, merci de recommencer";
}
?>