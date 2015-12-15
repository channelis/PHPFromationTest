<?php

include_once('modele/connexion_sql.php');

if (!isset($_GET['section']) OR $_GET['section'] == 'index')
{
    // On affiche le formulaire d'inscription
	include_once('vue/tp_mvc/inscription.php');
}
