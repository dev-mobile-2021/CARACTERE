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
        require_once("../classe/classeClient.php");
        $Id= htmlentities(htmlspecialchars($_GET['changerEtat']), ENT_SUBSTITUTE);
        $etat= htmlentities(htmlspecialchars($_GET['etat']), ENT_SUBSTITUTE);
        $str = explode("$", $Id);
        $a=0;
        $objet = new Client();
        foreach($str as $ide){
            $a= $objet->changeState($ide, $etat);
        }
        echo $a;
        // header("location: index.php");
    }else if(isset($_GET['resetPassword'])){
        require_once("../classe/classeClient.php");
        $Id= htmlentities(htmlspecialchars($_GET['resetPassword']), ENT_SUBSTITUTE);
        $str = explode("$", $Id);
        $a=0;
        $objet = new Client();
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
        require_once("../classe/classeClient.php");
        $Id= htmlentities(htmlspecialchars($_GET['supprimer']), ENT_SUBSTITUTE);
        $str = explode("$", $Id);
        $a=0;
        $objet = new Client();
        foreach($str as $ide){
            $a= $objet->deleteClient($ide);
        }
        echo $a;
        // header("location: index.php");
    }else if(isset($_POST['updateProfile'])){
        require_once('../classe/classeClient.php');
        $Client = new Client();
        if ($Client->isLogged(htmlentities(htmlspecialchars($_POST['login']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['motDePasseActuel']), ENT_SUBSTITUTE))) {
            $Client = new Client();
            echo $Client->updateProfile(htmlentities(htmlspecialchars($_POST['login']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['motDePasseActuel']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['motDePasse']), ENT_SUBSTITUTE));
        }
        else {
             echo 2;
        }
    }
    else if(isset($_POST['ajouter'])){
        require_once('../classe/classeClient.php');
        $Client = new Client();
        $photoClient = null;
        $target_dir = "../../dist/img/clients";
        $path = $_FILES['photoClient']['name'];
        $photoClient = $target_dir."/".$path;
        $photoToSave = "dist/img/clients/".$path;

        if(!empty($_FILES['photoClient']['tmp_name']) && move_uploaded_file($_FILES['photoClient']['tmp_name'], $photoClient)){
            $Client = new Client(NULL, htmlentities(htmlspecialchars($_POST['prenomClient']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['nomClient']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['adresseClient']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['paysClient']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['telephoneClient']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['emailClient']), ENT_SUBSTITUTE), $photoToSave, "",1);
            echo $Client->addClient();
        }else if(empty($_FILES['photoClient']['tmp_name'])){
            $photoClient = null;
            $Client = new Client(NULL, htmlentities(htmlspecialchars($_POST['prenomClient']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['nomClient']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['adresseClient']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['paysClient']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['telephoneClient']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['emailClient']), ENT_SUBSTITUTE), $photoToSave, "",1);
            echo $Client->addClient();
        }
        
    }
    else if(isset($_POST['modifier'])){
        require_once('../classe/classeClient.php');
        $Client = new Client();
        $photoClient = null;
        $target_dir = "../../dist/img/clients";
        $path = $_FILES['photoClientMod']['name'];
        $photoClient = $target_dir."/".$path;
        $photoToSave = "dist/img/clients/".$path;

        if(!empty($_FILES['photoClientMod']['tmp_name']) && move_uploaded_file($_FILES['photoClientMod']['tmp_name'], $photoClient)){
            $Client = new Client(htmlentities(htmlspecialchars($_POST['modifier']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['prenomClientMod']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['nomClientMod']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['adresseClientMod']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['paysClientMod']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['telephoneClientMod']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['emailClientMod']), ENT_SUBSTITUTE), $photoToSave, "",1);
            echo $Client->updateClient();
        }else if(empty($_FILES['photoClientMod']['tmp_name'])){
            $photoToSave = $_GET['img'];
            $Client = new Client(htmlentities(htmlspecialchars($_POST['modifier']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['prenomClientMod']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['nomClientMod']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['adresseClientMod']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['paysClientMod']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['telephoneClientMod']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['emailClientMod']), ENT_SUBSTITUTE), $photoToSave, "",1);
            echo $Client->updateClient();
        }
    }
    else{
        if(isset($opt)){
            $opt = explode("-", $opt);
            $option = $opt[0];
            if($option == "ajouter"){
                include('php/view/client/ajouter.php');
            }else if($option == "modifier"){
                require_once('php/classe/classeClient.php');

                include('php/view/client/modifier.php');
            }else if($option=="supprimer"){
               require_once('php/classe/classeClient.php');

                include('php/view/client/liste.php');
            }
            else if($option=="details"){
                include('php/view/client/details.php');
            }else if($option=="liste"){
                include('php/view/client/liste.php');
            }
        }
        else{
            include('php/view/client/liste.php');
        }
    }
?>