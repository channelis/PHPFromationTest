
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
if (isset($_POST['nom']) AND isset($_POST['possesseur']) AND isset($_POST['console']) AND isset($_POST['prix']) AND isset($_POST['nbre_joueurs_max']) AND isset($_POST['commentaires']))
{


$req = $bdd->prepare('INSERT INTO jeux_video(nom, possesseur, console, prix, nbre_joueurs_max, commentaires) VALUES(:nom, :possesseur, :console, :prix, :nbre_joueurs_max, :commentaires)');
$req->execute(array(
	'nom' => $_POST['nom'],
	'possesseur' => $_POST['possesseur'],
	'console' => $_POST['console'],
	'prix' => $_POST['prix'],
	'nbre_joueurs_max' => $_POST['nbre_joueurs_max'],
	'commentaires' => $_POST['commentaires']
	));

echo 'Le jeu a bien été ajouté !';
}
else
{
	echo "Le formulaire est incomplet, merci de recommencer";
}
?>