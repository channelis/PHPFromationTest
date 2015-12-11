<?php

        // Testons si le mot de passe est correct
        if ($_POST['password'] == 'kangourou')
        {
               echo "Affichages des codes secret de la NASA";
        }
        else
        {
                echo "Le mot de passe est incorret";
        }




?>
AFFichage de $_POST
<pre>
<?php
print_r($_POST);
?>
</pre>

AFFichage de $_SERVER
<pre>
<?php
print_r($_SERVER);
?>
</pre>

AFFichage de $_ENV
<pre>
<?php
print_r($_ENV);
?>
</pre>

AFFichage de $_SERVER['REMOTE_ADDR']
<pre>
<?php
echo $_SERVER['REMOTE_ADDR'];
?>
</pre>

AFFichage de $_SESSION 
<pre>
<?php
print_r($_SESSION );
?>
</pre>

AFFichage de $_COOKIE  
<pre>
<?php
print_r($_COOKIE  );
?>
</pre>

AFFichage de $_FILES   
<pre>
<?php
print_r($_FILES   );
?>
</pre>