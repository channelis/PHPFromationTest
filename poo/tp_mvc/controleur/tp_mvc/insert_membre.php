<?php

include_once('../../modele/tp_mvc/Membre.class.php');
include_once('../../dao/tp_mvc/MembreDao.class.php');


// V�rification de la validit� des informations
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
		//la date est automatiquement renseign�e dans la dao!
		$membreDao->insert($membre);
	}
	else
	{
		echo "Ce pseudo existe d�j�, merci de recommencer";
	}
	//Ici on pourrait aussi v�rifier la validite de l'adresse email par une un regexp
}
else
{
	echo "Les mots de passe sont diff�rents, merci de recommencer votre saisie";
}

// On affiche la page (vue)
//include_once('vue/blog/index.php');