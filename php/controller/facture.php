<?php
    @session_start();
    require_once('functions.php');
    function matricule($table, $champs){
        require_once('../classe/classeConnexion.php');
        $requete = Connexion::Connect()->query("SELECT $champs FROM $table ORDER BY $champs DESC LIMIT 0,1;");
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
        require_once("../classe/classeFacture.php");
        $Id= htmlentities(htmlspecialchars($_GET['changerEtat']), ENT_SUBSTITUTE);
        $etat= htmlentities(htmlspecialchars($_GET['etat']), ENT_SUBSTITUTE);
        $str = explode("$", $Id);
        $a=0;
        $objet = new Facture();
        foreach($str as $ide){
            $a= $objet->changeState($ide, $etat);
        }
        echo $a;
        // header("location: index.php");
    }else if(isset($_GET['resetPassword'])){
        require_once("../classe/classeFacture.php");
        $Id= htmlentities(htmlspecialchars($_GET['resetPassword']), ENT_SUBSTITUTE);
        $str = explode("$", $Id);
        $a=0;
        $objet = new Facture();
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
        require_once("../classe/classeFacture.php");
        $Id= htmlentities(htmlspecialchars($_GET['supprimer']), ENT_SUBSTITUTE);
        $str = explode("$", $Id);
        $a=0;
        $objet = new Facture();
        foreach($str as $ide){
            $a= $objet->deleteFacture($ide);
        }
        echo $a;
        // header("location: index.php");
    }
    else if(isset($_POST['ajouter'])){
        require_once('../classe/classeFacture.php');
        

        $a = matricule("facture", "numeroFacture");
        $anneeMois = explode("/", htmlentities(htmlspecialchars($_POST['dateFacture']), ENT_SUBSTITUTE));
        $anneeMois = $anneeMois[2]." / ".$anneeMois[1]." / ";
        if($a != "0"){
            $str = explode(" / ", $a);
            $tmp = intval($str[2])+1;
            $tmp = str_pad($tmp, 3, "0", STR_PAD_LEFT);
            $a = $anneeMois.$tmp;
           
        }else{
            $a = $anneeMois."001";
        }
        // echo $a;
        $idFacture = NULL;
        $numeroFacture = $a;
        $destinataire = htmlentities(htmlspecialchars($_POST['destinataire']), ENT_SUBSTITUTE);
        $dateFacture = htmlentities(htmlspecialchars($_POST['dateFacture']), ENT_SUBSTITUTE);
        $accompte = htmlentities(htmlspecialchars($_POST['accompte']), ENT_SUBSTITUTE);
        $idDevis = htmlentities(htmlspecialchars($_POST['idDevis']), ENT_SUBSTITUTE);
        $idResponsable = $_SESSION['gestionDevisidUser'];
        
        $Facture = new Facture($idFacture, $numeroFacture, $destinataire, $dateFacture, $accompte, $idDevis, $idResponsable);
        echo $Facture->addFacture();
        
    }
    else if(isset($_POST['modifier'])){
        require_once('../classe/classeFacture.php');
        $Facture = new Facture();
        if ($Facture->emailExist2(htmlentities(htmlspecialchars($_POST['email']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['modifier']), ENT_SUBSTITUTE)) == false && $Facture->loginExist2(htmlentities(htmlspecialchars($_POST['login']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['modifier']), ENT_SUBSTITUTE)) == false) {
            if(isset($_POST['idStructure'])){
                $idStructure = htmlentities(htmlspecialchars($_POST['idStructure']), ENT_SUBSTITUTE);
            }else{
                $idStructure = 1;
            }
            $Facture = new Facture();
            echo $Facture->updateFacture(htmlentities(htmlspecialchars($_POST['modifier']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['nom']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['prenom']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['email']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['adresse']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['telephone']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['login']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['idRole']), ENT_SUBSTITUTE), $idStructure, htmlentities(htmlspecialchars($_POST['idCompte']), ENT_SUBSTITUTE));
        }
        else if ($Facture->loginExist2(htmlentities(htmlspecialchars($_POST['login']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['modifier']), ENT_SUBSTITUTE)) == true) {
             echo 2;
        }
        else if ($Facture->emailExist2(htmlentities(htmlspecialchars($_POST['email']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['modifier']), ENT_SUBSTITUTE)) == true){
            echo 3;
        }
    }
    else{
        if(isset($opt)){
            $opt = explode("-", $opt);
            $option = $opt[0];
            if($option == "ajouter"){
                include('php/view/facture/ajouter.php');
            }else if($option == "modifier"){
                require_once('php/classe/classeFacture.php');

                include('php/view/facture/modifier.php');
            }else if($option=="supprimer"){
               require_once('php/classe/classeFacture.php');

                include('php/view/facture/liste.php');
            }
            else if($option=="details"){
                include('php/view/facture/details.php');
            }else if($option=="liste"){
                include('php/view/facture/liste.php');
            }
            else if($option=="listeafacturerbc"){
                include('php/view/facture/listeafacturerbc.php');
            }else if($option=="listeafacturersansbc"){
                include('php/view/facture/listeafacturersansbc.php');
            }else if($option=="listefactures"){
                include('php/view/facture/listefactures.php');
            }else if($option=="etat"){
                include('php/view/facture/etat.php');
            }
        }
        else{
            include('php/view/facture/liste.php');
        }
    }
?>