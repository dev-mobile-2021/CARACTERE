<?php
    function matricule($table, $champs){
        require_once('../classes/classeConnexion.php');
        $requete = Connection::Connexion()->query("SELECT $champs FROM $table ORDER BY $champs DESC LIMIT 0,1;");
        $result = "0";
        foreach ($requete as $donne) 
            $result = $donne[0];
        if($result == "0")
            return ("0");
        else
            return($result);
    }

    function sendEmailResetPassword($sujet, $mailDestinataire, $contenu){
        if(mail($mailDestinataire, $sujet, $contenu)){
            echo 1;
        }
        else{
            echo 0;
        }
    }

    if(isset($_GET['changerEtat'])){
        require_once("../classe/classeUser.php");
        $Id= htmlentities(htmlspecialchars($_GET['changerEtat']), ENT_SUBSTITUTE);
        $etat= htmlentities(htmlspecialchars($_GET['etat']), ENT_SUBSTITUTE);
        $str = explode("$", $Id);
        $a=0;
        $objet = new User();
        foreach($str as $ide){
            $a= $objet->changeState($ide, $etat);
        }
        echo $a;
        // header("location: index.php");
    }else if(isset($_GET['resetPassword'])){
        require_once("../classe/classeUser.php");
        $Id= htmlentities(htmlspecialchars($_GET['resetPassword']), ENT_SUBSTITUTE);
        $str = explode("$", $Id);
        $a=0;
        $objet = new User();
        foreach($str as $ide){
            $a= $objet->resetPassword($ide);
        }
        $res = explode("$", $a);
        //echo $res[0];
        $sujet = "Reinitialisation de votre mot de passe Gilab MS";
        $mailDestinataire = $res[2];
		// echo $res[2];
        $contenu = "Votre nouveau mot de passe est : ".$res[1];
        sendEmailResetPassword($sujet, $mailDestinataire, $contenu);
        // header("location: index.php");
    }else if(isset($_GET['supprimer'])){
        require_once("../classe/classeUser.php");
        $Id= htmlentities(htmlspecialchars($_GET['supprimer']), ENT_SUBSTITUTE);
        $str = explode("$", $Id);
        $a=0;
        $objet = new User();
        foreach($str as $ide){
            $a= $objet->deleteUser($ide);
        }
        echo $a;
        // header("location: index.php");
    }else if(isset($_POST['updateProfile'])){
        require_once('../classe/classeUser.php');
        $User = new User();
        if ($User->isLogged(htmlentities(htmlspecialchars($_POST['login']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['motDePasseActuel']), ENT_SUBSTITUTE))) {
            $User = new User();
            echo $User->updateProfile(htmlentities(htmlspecialchars($_POST['login']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['motDePasseActuel']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['motDePasse']), ENT_SUBSTITUTE));
        }
        else {
             echo 2;
        }
    }
    else if(isset($_POST['ajouter'])){
        require_once('../classe/classeUser.php');
        $User = new User();
        $photo = null;
        $target_dir = "../../dist/img/users";
        $path = $_FILES['photo']['name'];
        $photo = $target_dir."/".$path;
        $photoToSave = "dist/img/users/".$path;

        if(!empty($_FILES['photo']['tmp_name']) && move_uploaded_file($_FILES['photo']['tmp_name'], $photo)){
            if ($User->emailExist(htmlentities(htmlspecialchars($_POST['email']), ENT_SUBSTITUTE)) == false) {
            $User = new User(NULL, htmlentities(htmlspecialchars($_POST['email']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['password']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['prenom']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['nom']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['telephone']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['adresse']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['idRole']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['idAgence']), ENT_SUBSTITUTE), $photoToSave);
            echo $User->addUser();
            }
            else if ($User->emailExist(htmlentities(htmlspecialchars($_POST['email']), ENT_SUBSTITUTE)) == true){
                echo 3;
            }
        }else if(empty($_FILES['photo']['tmp_name'])){
            $photoToSave = null;
            if ($User->emailExist(htmlentities(htmlspecialchars($_POST['email']), ENT_SUBSTITUTE)) == false) {
            $User = new User(NULL, htmlentities(htmlspecialchars($_POST['email']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['password']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['prenom']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['nom']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['telephone']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['adresse']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['idRole']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['idAgence']), ENT_SUBSTITUTE), $photoToSave);
            echo $User->addUser();
            }
            else if ($User->emailExist(htmlentities(htmlspecialchars($_POST['email']), ENT_SUBSTITUTE)) == true){
                echo 3;
            }
        }
        
    }
    else if(isset($_POST['modifier'])){
        require_once('../classe/classeUser.php');
        $User = new User();
        $photo = null;
        $target_dir = "../../dist/img/users";
        $path = $_FILES['photoMod']['name'];
        $photo = $target_dir."/".$path;
        $photoToSave = "dist/img/users/".$path;

        if(!empty($_FILES['photoMod']['tmp_name']) && move_uploaded_file($_FILES['photoMod']['tmp_name'], $photo)){
            if ($User->emailExist2(htmlentities(htmlspecialchars($_POST['emailMod']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['modifier']), ENT_SUBSTITUTE)) == false) {
            $User = new User(htmlentities(htmlspecialchars($_POST['modifier']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['emailMod']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['passwordMod']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['prenomMod']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['nomMod']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['telephoneMod']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['adresseMod']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['idRoleMod']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['idAgenceMod']), ENT_SUBSTITUTE), $photoToSave);
            echo $User->updateUser();
            }
            else if ($User->emailExist2(htmlentities(htmlspecialchars($_POST['emailMod']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['modifier']), ENT_SUBSTITUTE)) == true){
                echo 3;
            }
        }else if(empty($_FILES['photoMod']['tmp_name'])){
            $photoToSave = $_GET['img'];
            if ($User->emailExist2(htmlentities(htmlspecialchars($_POST['emailMod']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['modifier']), ENT_SUBSTITUTE)) == false) {
            $User = new User(htmlentities(htmlspecialchars($_POST['modifier']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['emailMod']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['passwordMod']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['prenomMod']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['nomMod']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['telephoneMod']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['adresseMod']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['idRoleMod']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['idAgenceMod']), ENT_SUBSTITUTE), $photoToSave);
            echo $User->updateUser();
            }
            else if ($User->emailExist2(htmlentities(htmlspecialchars($_POST['emailMod']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['modifier']), ENT_SUBSTITUTE)) == true){
                echo 3;
            }
        }
    }
    else{
        if(isset($opt)){
            $opt = explode("-", $opt);
            $option = $opt[0];
            if($option == "ajouter"){
                include('php/view/user/ajouter.php');
            }else if($option == "modifier"){
                require_once('php/classe/classeUser.php');

                include('php/view/user/modifier.php');
            }else if($option=="supprimer"){
               require_once('php/classe/classeUser.php');

                include('php/view/user/liste.php');
            }
            else if($option=="details"){
                include('php/view/user/details.php');
            }else if($option=="liste"){
                include('php/view/user/liste.php');
            }
        }
        else{
            include('php/view/user/liste.php');
        }
    }
?>