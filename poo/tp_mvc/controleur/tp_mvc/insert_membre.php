<?php

include_once('../../modele/tp_mvc/Membre.class.php');
include_once('../../dao/tp_mvc/MembreDao.class.php');


// Vérification de la validité des informations
if($_POST['motdepasse']==$_POST['confirmation'])
{
	$membreDao = new MembreDao();
	
	if ($membreDao->getMembreByPseudo($_POST['pseudo'])==null)
	{
		// Hachage du mot de passe
		$pass = sha1($_POST['motdepasse']);
		$membre = new Membre();
		$membre->setPseudo($_POST['pseudo']);
		$membre->setEmail($_POST['email']);
		$membre->setPass($pass);
		//la date est automatiquement renseignée dans la dao!
		$membreDao->insert($membre);
	}
	else
	{
		echo "Ce pseudo existe déjà, merci de recommencer";
	}
	//Ici on pourrait aussi vérifier la validite de l'adresse email par une un regexp
}
else
{
	echo "Les mots de passe sont différents, merci de recommencer votre saisie";
}

// On affiche la page (vue)
//include_once('vue/blog/index.php');