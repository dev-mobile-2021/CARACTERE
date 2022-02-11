<?php
    @session_start();
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
        require_once("../classe/classeContact.php");
        $Id= htmlentities(htmlspecialchars($_GET['changerEtat']), ENT_SUBSTITUTE);
        $etat= htmlentities(htmlspecialchars($_GET['etat']), ENT_SUBSTITUTE);
        $str = explode("$", $Id);
        $a=0;
        $objet = new Contact();
        foreach($str as $ide){
            $a= $objet->changeState($ide, $etat);
        }
        echo $a;
        // header("location: index.php");
    }else if(isset($_GET['resetPassword'])){
        require_once("../classe/classeContact.php");
        $Id= htmlentities(htmlspecialchars($_GET['resetPassword']), ENT_SUBSTITUTE);
        $str = explode("$", $Id);
        $a=0;
        $objet = new Contact();
        foreach($str as $ide){
            $a= $objet->resetPassword($ide);
        }
        $res = explode("-", $a);
        echo $res[0];
        // header("location: index.php");
    }else if(isset($_GET['supprimer'])){
        require_once("../classe/classeContact.php");
        $Id= htmlentities(htmlspecialchars($_GET['supprimer']), ENT_SUBSTITUTE);
        $str = explode("$", $Id);
        $a=0;
        $objet = new Contact();
        foreach($str as $ide){
            $a= $objet->deleteContact($ide);
        }
        echo $a;
        // header("location: index.php");
    }
    else if(isset($_POST['ajouter'])){
        require_once('../classe/classeContact.php');
        $Contact = new Contact();
        if ($Contact->libelleExist(htmlentities(htmlspecialchars($_POST['telephone']), ENT_SUBSTITUTE)) == false) {
            $Contact = new Contact(NULL, htmlentities(htmlspecialchars($_POST['nom']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['prenom']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['telephone']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['email']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['idClient']), ENT_SUBSTITUTE), $_SESSION['gestionDevisidUser'], "", 1);
            echo $Contact->addContact();
        }
        else{
            echo 2;
        }
    }
    else if(isset($_POST['modifier'])){
        require_once('../classe/classeContact.php');
        $Contact = new Contact();
        if ($Contact->libelleExist2(htmlentities(htmlspecialchars($_POST['telephoneMod']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['modifier']), ENT_SUBSTITUTE)) == false ) {
            $Contact = new Contact(htmlentities(htmlspecialchars($_POST['modifier']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['nomMod']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['prenomMod']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['telephoneMod']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['emailMod']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['idClientMod']), ENT_SUBSTITUTE), $_SESSION['gestionDevisidUser'], "", 1);
            echo $Contact->updateContact();
        }
        else{
            echo 2;
        }
    }
    else{
        if(isset($opt)){
            $opt = explode("-", $opt);
            $option = $opt[0];
            if($option == "ajouter"){
                include('php/view/contact/ajouter.php');
            }else if($option == "modifier"){
                require_once('php/classe/classeContact.php');

                include('php/view/contact/modifier.php');
            }else if($option=="supprimer"){
               require_once('php/classe/classeContact.php');

                include('php/view/contact/liste.php');
            }
            else if($option=="details"){
                include('php/view/contact/details.php');
            }else if($option=="liste"){
                include('php/view/contact/liste.php');
            }
        }
        else{
            include('php/view/contact/liste.php');
        }
    }
?>