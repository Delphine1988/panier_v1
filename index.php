<?php


/* Ce programme affiche Bonjour*/

echo '<p>Bonjour</p>';
// déclarer les variables de travail
//pour php les variables sont initialisées avec des dollars
$a = 1;
$b = 5;

// calculer la somme

$s = $a + $b;

// le point est l'opérateur de concaténation
echo '<p>La somme de '.$a. ' et '.$b. ' est : '.$s.'</p>';

//alternative d'écriture mais consomme plus de ressources (moins economique)
echo "<p>La somme de $a et $b est $s</p>";

// débug egalement pour débuger il faut inspecter le resultat sur le navigateur
var_dump($s);

// utiliser un tableau dans php
$users = array( 'marc', 'aline' , 'sadeq');
var_dump($users);
echo '<pre>';
print_r($users);
echo '</pre>';
// pre permet l'affichage encapsulée du tableau en 1 dimension et non lineaire

// afficher le tableau users ligne par ligne
for ($i=0; $i < 3 ; $i++) { 
    echo $users[$i] . "\n";//caractere special retour chariot 
}
// boite à outils programmeur
function debug($var){
    // afficher $var
    echo '<pre>';
    print_r($var);
    echo '</pre>';
}
//tableau à 2 dimensions
$users = array(
    array('sadeq','sadeq@mail.fr'),
    array('aline','aline@mail.fr'),
    array('marc','marc@mail.fr'),//la virgule permet d'ajouter des éléments dans un tableau
);

debug($users);

// obtenir des données à partir d'un Request = data provenant d'une URL d'une page web
// ex : index.php?nom=sadeq&email=sadeq@mail.fr(c'est une URL porteuse de données = data)
// ? veut dire début des paramètres transmis par l'URL
//& est un séparateur des data
// champ = valeur c'est des data



debug($_GET); //$_GET : tableau système à visibiltée globale dans le programme
//qui contient les données envoyées par la méthode get d'un formulaire ou URL

//afficher les données GET
//1. inserer l'utilisateur dans la table $users
$users[] = array(
'nom' => $_GET['nom'], // les crochets vide veut dire inserer une nouvelle case
'email' => $_GET['email'],
);
debug($users);



session_start();

//creation d'une session pour enregistrer les nom et email des clients qui laissent leurs coordonnées sur le formulaire html
$_SESSION["users"]= array(
    'nom' => $_GET['nom'], 
    'email' => $_GET['email'],
    );
debug($_SESSION["users"]);

?>