<?php

include_once('../../modele/tp_mvc/Membre.class.php');
include_once('../../dao/tp_mvc/MembreDao.class.php');

$membre = new Membre();

echo " Mon controleur: ".$_GET['pseudo'];

//$billets = get_billets(0, 5);

// On effectue du traitement sur les données (contrôleur)
// Ici, on doit surtout sécuriser l'affichage
//foreach($billets as $cle => $billet)
//{
 //   $billets[$cle]['titre'] = htmlspecialchars($billet['titre']);
//    $billets[$cle]['contenu'] = nl2br(htmlspecialchars($billet['contenu']));
//}

// On affiche la page (vue)
//include_once('vue/blog/index.php');

