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
        require_once("../classe/classeFournisseur.php");
        $Id= htmlentities(htmlspecialchars($_GET['changerEtat']), ENT_SUBSTITUTE);
        $etat= htmlentities(htmlspecialchars($_GET['etat']), ENT_SUBSTITUTE);
        $str = explode("$", $Id);
        $a=0;
        $objet = new Fournisseur();
        foreach($str as $ide){
            $a= $objet->changeState($ide, $etat);
        }
        echo $a;
        // header("location: index.php");
    }else if(isset($_GET['resetPassword'])){
        require_once("../classe/classeFournisseur.php");
        $Id= htmlentities(htmlspecialchars($_GET['resetPassword']), ENT_SUBSTITUTE);
        $str = explode("$", $Id);
        $a=0;
        $objet = new Fournisseur();
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
        require_once("../classe/classeFournisseur.php");
        $Id= htmlentities(htmlspecialchars($_GET['supprimer']), ENT_SUBSTITUTE);
        $str = explode("$", $Id);
        $a=0;
        $objet = new Fournisseur();
        foreach($str as $ide){
            $a= $objet->deleteFournisseur($ide);
        }
        echo $a;
        // header("location: index.php");
    }else if(isset($_POST['updateProfile'])){
        require_once('../classe/classeFournisseur.php');
        $Fournisseur = new Fournisseur();
        if ($Fournisseur->isLogged(htmlentities(htmlspecialchars($_POST['login']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['motDePasseActuel']), ENT_SUBSTITUTE))) {
            $Fournisseur = new Fournisseur();
            echo $Fournisseur->updateProfile(htmlentities(htmlspecialchars($_POST['login']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['motDePasseActuel']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['motDePasse']), ENT_SUBSTITUTE));
        }
        else {
             echo 2;
        }
    }
    else if(isset($_POST['ajouter'])){
        require_once('../classe/classeFournisseur.php');
        $Fournisseur = new Fournisseur();
        $photoFournisseur = null;
        $target_dir = "../../dist/img/fournisseurs";
        $path = $_FILES['photoFournisseur']['name'];
        $photoFournisseur = $target_dir."/".$path;
        $photoToSave = "dist/img/fournisseurs/".$path;

        if(!empty($_FILES['photoFournisseur']['tmp_name']) && move_uploaded_file($_FILES['photoFournisseur']['tmp_name'], $photoFournisseur)){
            $Fournisseur = new Fournisseur(NULL, htmlentities(htmlspecialchars($_POST['prenomFournisseur']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['nomFournisseur']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['adresseFournisseur']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['paysFournisseur']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['telephoneFournisseur']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['emailFournisseur']), ENT_SUBSTITUTE), $photoToSave, "",1);
            echo $Fournisseur->addFournisseur();
        }else if(empty($_FILES['photoFournisseur']['tmp_name'])){
            $photoFournisseur = null;
            $Fournisseur = new Fournisseur(NULL, htmlentities(htmlspecialchars($_POST['prenomFournisseur']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['nomFournisseur']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['adresseFournisseur']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['paysFournisseur']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['telephoneFournisseur']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['emailFournisseur']), ENT_SUBSTITUTE), $photoToSave, "",1);
            echo $Fournisseur->addFournisseur();
        }
        
    }
    else if(isset($_POST['modifier'])){
        require_once('../classe/classeFournisseur.php');
        $Fournisseur = new Fournisseur();
        $photoFournisseur = null;
        $target_dir = "../../dist/img/fournisseurs";
        $path = $_FILES['photoFournisseurMod']['name'];
        $photoFournisseur = $target_dir."/".$path;
        $photoToSave = "dist/img/fournisseurs/".$path;

        if(!empty($_FILES['photoFournisseurMod']['tmp_name']) && move_uploaded_file($_FILES['photoFournisseurMod']['tmp_name'], $photoFournisseur)){
            $Fournisseur = new Fournisseur(htmlentities(htmlspecialchars($_POST['modifier']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['prenomFournisseurMod']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['nomFournisseurMod']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['adresseFournisseurMod']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['paysFournisseurMod']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['telephoneFournisseurMod']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['emailFournisseurMod']), ENT_SUBSTITUTE), $photoToSave, "",1);
            echo $Fournisseur->updateFournisseur();
        }else if(empty($_FILES['photoFournisseurMod']['tmp_name'])){
            $photoToSave = $_GET['img'];
            $Fournisseur = new Fournisseur(htmlentities(htmlspecialchars($_POST['modifier']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['prenomFournisseurMod']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['nomFournisseurMod']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['adresseFournisseurMod']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['paysFournisseurMod']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['telephoneFournisseurMod']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['emailFournisseurMod']), ENT_SUBSTITUTE), $photoToSave, "",1);
            echo $Fournisseur->updateFournisseur();
        }
    }
    else{
        if(isset($opt)){
            $opt = explode("-", $opt);
            $option = $opt[0];
            if($option == "ajouter"){
                include('php/view/fournisseur/ajouter.php');
            }else if($option == "modifier"){
                require_once('php/classe/classefournisseur.php');

                include('php/view/fournisseur/modifier.php');
            }else if($option=="supprimer"){
               require_once('php/classe/classefournisseur.php');

                include('php/view/fournisseur/liste.php');
            }
            else if($option=="details"){
                include('php/view/fournisseur/details.php');
            }else if($option=="liste"){
                include('php/view/fournisseur/liste.php');
            }
        }
        else{
            include('php/view/fournisseur/liste.php');
        }
    }
?>