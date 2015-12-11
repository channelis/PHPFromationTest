<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mon super site</title>
    </head>
 
    <body>
 
    <?php include("entete.php"); ?>
    
    <?php include("menus.php"); ?>
    
    <!-- Le corps -->
    
    <div id="corps">
        <h1>Mon super site</h1>
        
        <!--Concatenation -->
        <?php
        $age_du_visiteur = 17;
        echo 'Le visiteur a ' . $age_du_visiteur . ' ans';
        ?>
        <!--Calcul -->
        <?php
        $nombre = 10;
        $resultat = ($nombre + 5) * $nombre; // $resultat prend la valeur 150
        ?>
        <!--Modulo -->
        <?php
        $nombre = 10 % 5; // $nombre prend la valeur 0 car la division tombe juste
        $nombre = 10 % 3; // $nombre prend la valeur 1 car il reste 1
        ?>
        <!--Condition -->
        <?php
        $age = 8;
         
        if ($age <= 12) // SI l'âge est inférieur ou égal à 12
        {
            echo "Salut gamin ! Bienvenue sur mon site !<br />";
            $autorisation_entrer = "Oui";
        }
        else // SINON
        {
            echo "Ceci est un site pour enfants, vous êtes trop vieux pour pouvoir  entrer. Au revoir !<br />";
            $autorisation_entrer = "Non";
        }
         
        echo "Avez-vous l'autorisation d'entrer ? La réponse est : $autorisation_entrer";
        ?>
        <!--OperateursLogiques-->
        <?php
        $langue = "français";
        $sexe = "";
        if ($age <= 12 AND $langue == "français")
        {
            echo "Bienvenue sur mon site !";
        }
        elseif ($age <= 12 AND $langue == "anglais")
        {
            echo "Welcome to my website!";
        }
        ?>
        <?php
        if ($sexe == "fille" OR $sexe == "garçon")
        {
            echo "Salut Terrien !";
        }
        else
        {
            echo "Euh, si t'es ni une fille ni un garçon, t'es quoi alors ?";
        }
        ?>
        <!--Boucles-->
        <?php
        for ($nombre_de_lignes = 1; $nombre_de_lignes <= 100; $nombre_de_lignes++)
        {
           // echo 'Ceci est la ligne n°' . $nombre_de_lignes . '<br />';
        }
        ?>
        <!--Fonctions-->
        <?php
        $phrase = 'Bonjour tout le monde ! Je suis une phrase !';
        $longueur = strlen($phrase);                
        echo 'La phrase ci-dessous comporte ' . $longueur . ' caractères :<br ></code>' . $phrase;
        ?>
        <?php
        $ma_variable = str_replace('b', 'p', 'bim bam boum');
         
        echo $ma_variable;
        ?>
        <?php
        $chaine = 'Cette chaîne va être mélangée !';
        $chaine = str_shuffle($chaine);
         
        echo $chaine;
        ?>
        <?php
        // Enregistrons les informations de date dans des variables

        $jour = date('d');
        $mois = date('m');
        $annee = date('Y');

        $heure = date('H');
        $minute = date('i');

        // Maintenant on peut afficher ce qu'on a recueilli
        echo 'Bonjour ! Nous sommes le ' . $jour . '/' . $mois . '/' . $annee . 'et il est ' . $heure. ' h ' . $minute;
        ?>
        <?php
        function DireBonjour($nom)
        {
            echo 'Bonjour ' . $nom . ' !<br ></code>';
        }

        DireBonjour('Marie');
        DireBonjour('Patrice');
        DireBonjour('Edouard');
        DireBonjour('Pascale');
        DireBonjour('François');
        DireBonjour('Benoît');
        DireBonjour('Père Noël');
        ?>
        <?php
        function VolumeCone($rayon,$hauteur)
        {
            return (pow($rayon,2)*M_PI*($hauteur/3));
        }
        echo 'Le volume du cone est' .volumeCone(3,9).'cm<sup>3</sup>!<br>';
        
        ?>
        <!--Les tableaux-->
        <?php
        // La fonction array permet de créer un array
        $prenoms = array ('François', 'Michel', 'Nicole', 'Véronique', 'Benoît');
        ?>
        <!--Les Tableaux associatifs-->
        <?php
        $coordonnees = array (
            'prenom' => 'François',
            'nom' => 'Dupont',
            'adresse' => '3 Rue du Paradis',
            'ville' => 'Marseille');

        foreach($coordonnees as $element)
        {
            echo $element . '<br />';
        }
        foreach($coordonnees as $cle => $element)
        {
            echo $cle.' : '. $element . '<br />';
        }
        ?>
        <!--Afficher rapidement le contenu d'un array pour debug-->
        <?php
        $coordonnees = array (
            'prenom' => 'François',
            'nom' => 'Dupont',
            'adresse' => '3 Rue du Paradis',
            'ville' => 'Marseille');

        echo '<pre>';
        print_r($coordonnees);
        echo '</pre>';
        ?>

    </div>
    
    <!-- Le pied de page -->
    
    <?php include("pied_de_page.php"); ?>
    
    </body>
</html>