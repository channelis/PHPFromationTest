
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
    <head>
        <title>Inscription</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <link href="vue/tp_mvc/style.css" rel="stylesheet" type="text/css" /> 
    </head>
        
    <body>
        <h1>Ma page d'inscription</h1>
        
 
    <form action="controleur/tp_mvc/insert_membre.php" method="post">

        <label for="pseudo">Pseudo :</label><input type="text" name="pseudo" /><br />
        <label for="motdepasse">Mot de passe :</label><input type="password" name="motdepasse" /><br />
        <label for="confirmation">Confirmation mdp :</label><input type="password" name="confirmation" /><br />
        <label for="email">Adresse email :</label><input type="text" name="email" /><br />
        <input type="submit" value="Valider">

</form>

</body>
</html>