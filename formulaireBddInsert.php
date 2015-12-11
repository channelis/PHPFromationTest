<style type="text/css">
label {
    color: #B4886B;
    font-weight: bold;
    display: block;
    width: 150px;
    float: left;
}
label:after { content: ": " }

</style>

<p>
    Cette page ne contient que du HTML.<br />
    Ajoutez un nouveau jeu à la BDD
</p>

<form action="insert.php" method="post">
<p>
    <label for="nom">nom</label></label><input type="text" name="nom" /></br>
    <label for="possesseur">possesseur</label><input type="text" name="possesseur" /></br>
    <label for="console">console</label><input type="text" name="console" /></br>
    <label for="prix">prix</label><input type="number" name="prix" /></br>
    <label for="nbre_joueurs_max">nbre_joueurs_max</label><input type="number" name="nbre_joueurs_max" /></br>
    <label for="commentaires">commentaires</label><textarea name="commentaires" rows="8" cols="45">
    Votre message ici.
    </textarea></br>

    <input type="submit" value="Envoyer le fichier" />
</form>

******************************************


