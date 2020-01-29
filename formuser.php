<?php
/* 
    Programme d'authentification d'un utilisateur

    Variables de travail sont : 
    *login : login unique 
    *mot de passe : mdp
    *msg : pour retourner=afficher un message d'erreur ou de bienvenue.

    Algorithme:
    1. recuperer les données (login, mdp) postées par le form.
    2. vérifier la validité des données
    3. Si pas d'erreurs de validité alors passer à l'étape 5
    4. Si il a des erreurs de validité alors retourner le message des erreurs rencontrées
    5. Authentifier le login et le mdp existent et identifient une seule personne 
    6. Si utilisateur connu alors envoyer message de bienvenue
    7. Sinon envoyer le message d'erreur : compte inconnu

*/

// Etape 1

$login = isset($_POST['login']) ? $_POST['login'] : null;

$mdp = isset($_POST['mdp']) ? $_POST['mdp'] : null;

// Etape 2
//RG les login et mdp doivent etre non vides
if (empty($login) || empty($mdp)) {
    //etape 4
    $msg = 'veuillez remplir les champs obligatoires !';
    }

// Etape 3 & 5
else {
    //Authentification de l'utilisateur
    if ( utilisateurExiste($login, $mdp) ) { 
       // pour ecrire un message :  $msg = 'Bienvenue, '.$login;
       // pour Enregistrer les données user dans une session
       session_start();
       $_SESSION['user'] = array(
           'login' => $login,
            'nom' => 'sadeq',
            'email' => 'sadeq@mail.com',
            'photo' => 'sadeq.jpg',
       );
       //redirection vers la page profil user
       header('Location: ./profilUser.php');
       exit; // fin du programme formuser.php

    }else {
        $msg = 'Désolé, compte inconnu !';
    }
}

// fonction utiles 
function utilisateurExiste($login, $mdp){
    if ($login == 'sadeq' && $mdp == "123") {
        return true;
    }
    return false;
}

?>


<div id="form_user">
    <form action="formuser.php" method="post"> <!--action est le dosssier vers lequel nous allons envoyé les données, le method est pour avoir les infos utilisateur caché !--> 
        <h1>Connectez-vous</h1>
        <p>
            <label>Login*</label>
            <input type="text" required name="login" value="<?=$login ?>"/>
        </p>
        <p>
            <label>Mot de passe*</label>
            <input type="password" required name="mdp" value="<?=$mdp ?>"/>
        </p>
        <p>
        <button type="submit" name="connecter">Validez</button>
        </p>
        <p>
            <div id="message"><?=$msg?></div>
        </p>
    </form>
</div>

 
