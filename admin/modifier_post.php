<h1>Modification du billet N°: <?php echo $_GET['id_billet'] ?> </h1>

<style type="text/css">
label {
    color: #B4886B;
    font-weight: bold;
    display: block;
    width: 150px;
    float: left;
}

input {
	width: 50%;
}
textarea {
	width: 50%;
}

</style>

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



$req = $bdd->prepare('SELECT * FROM billets WHERE id= :id_billet');
$req->execute(array('id_billet' => $_GET['id_billet']));
$donnéesBillet = $req->fetch();

echo htmlspecialchars($donnéesBillet['titre']);
$titre = htmlspecialchars($donnéesBillet['titre']);
$id_billet = $_GET['id_billet'];
echo $id_billet;
?>

<form action="modifier_exec.php" method="post">
<p>
    <label for="titre">titre:</label><input type="text" name="titre" value='<?php echo $titre ?>'></input></br>
    <label for="contenu">contenu:</label><textarea name="contenu" rows="8" cols="45" /><?php echo htmlspecialchars($donnéesBillet['contenu']) ?></textarea></br>
    <input type="hidden" name="id_billet" value='<?php echo $id_billet ?>'></input></br>
    <input type="submit" value="Executer" />
</form>

