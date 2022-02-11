<?php
    @session_start();
    require_once('functions.php');
    function matricule($table, $champs){
        require_once('../classe/classeConnexion.php');
        $moisAnnee = "BC".date("m").date("Y");
        $requete = Connexion::Connect()->query("SELECT $champs FROM $table WHERE numeroBon LIKE \"%$moisAnnee%\" ORDER BY $champs DESC LIMIT 0,1;");
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
        require_once("../classe/classeBon.php");
        $Id= htmlentities(htmlspecialchars($_GET['changerEtat']), ENT_SUBSTITUTE);
        $etat= htmlentities(htmlspecialchars($_GET['etat']), ENT_SUBSTITUTE);
        $str = explode("$", $Id);
        $a=0;
        $objet = new Bon();
        foreach($str as $ide){
            $a= $objet->changeState($ide, $etat);
        }
        echo $a;
        // header("location: index.php");
    }else if(isset($_GET['resetPassword'])){
        require_once("../classe/classeBon.php");
        $Id= htmlentities(htmlspecialchars($_GET['resetPassword']), ENT_SUBSTITUTE);
        $str = explode("$", $Id);
        $a=0;
        $objet = new Bon();
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
        require_once("../classe/classeBon.php");
        $Id= htmlentities(htmlspecialchars($_GET['supprimer']), ENT_SUBSTITUTE);
        $str = explode("$", $Id);
        $a=0;
        $objet = new Bon();
        foreach($str as $ide){
            $a= $objet->deleteBon($ide);
        }
        echo $a;
        // header("location: index.php");
    }else if(isset($_GET['supprimerProduit'])){
        require_once("../classe/classeBon.php");
        $Id= htmlentities(htmlspecialchars($_GET['supprimerProduit']), ENT_SUBSTITUTE);
        $str = explode("$", $Id);
        $a=0;
        $objet = new Bon();
        foreach($str as $ide){
            $a= $objet->deleteProduit($ide);
        }
        echo $a;
        // header("location: index.php");
    }else if(isset($_GET['validerBon'])){
        require_once("../classe/classeBon.php");
        $Id= htmlentities(htmlspecialchars($_GET['validerBon']), ENT_SUBSTITUTE);
        $str = explode("$", $Id);
        $a=0;
        $objet = new Bon();
        foreach($str as $ide){
            $a= $objet->validerBon($ide, $_SESSION['gestionDevisidUser']);
        }
        echo $a;
        // header("location: index.php");
    }else if(isset($_POST['updateProfile'])){
        require_once('../classe/classeBon.php');
        $Bon = new Bon();
        if ($Bon->isLogged(htmlentities(htmlspecialchars($_POST['login']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['motDePasseActuel']), ENT_SUBSTITUTE))) {
            $Bon = new Bon();
            echo $Bon->updateProfile(htmlentities(htmlspecialchars($_POST['login']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['motDePasseActuel']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['motDePasse']), ENT_SUBSTITUTE));
        }
        else {
             echo 2;
        }
    }
    else if(isset($_POST['ajouterProduit'])){
        require_once('../classe/classeBon.php');
        $Bon = new Bon();
        
        $idBon = htmlentities(htmlspecialchars($_POST['idBon']), ENT_SUBSTITUTE);
        $designation = htmlentities(htmlspecialchars($_POST['designation']), ENT_SUBSTITUTE);
        $prixUnitaire = htmlentities(htmlspecialchars($_POST['prixUnitaire']), ENT_SUBSTITUTE);
        $quantite = htmlentities(htmlspecialchars($_POST['quantite']), ENT_SUBSTITUTE);

        echo $Bon->ajouterProduit($idBon, $designation, $prixUnitaire, $quantite);
    }
    else if(isset($_POST['updateNow'])){
        if($_POST['conditionPaiement'] == "Autre")
            $conditionPaiement = htmlentities(htmlspecialchars($_POST['autre']), ENT_SUBSTITUTE);
        else
            $conditionPaiement = htmlentities(htmlspecialchars($_POST['conditionPaiement']), ENT_SUBSTITUTE);

        require_once('../classe/classeBon.php');
        $Bon = new Bon(htmlentities(htmlspecialchars($_POST['updateNow']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['numeroProforma']), ENT_SUBSTITUTE), "", "", htmlentities(htmlspecialchars($_POST['titre']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['contact']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['notabene']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['delaisLivraison']), ENT_SUBSTITUTE), $conditionPaiement, 0,htmlentities(htmlspecialchars($_POST['idTypetaxe']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['idClient']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['idDevis']), ENT_SUBSTITUTE), $_SESSION['gestionDevisidUser'], 3, 0, "", 1);
        echo $Bon->updateBon();
        
    }
    else if(isset($_POST['ajouter'])){
        $a = matricule("bon", "numeroBon");
        $moisAnnee = date("m").date("Y");
        if($a != "0"){
            $str = explode("-", $a);
            $tmp = intval($str[1])+1;
            $tmp = str_pad($tmp, 3, "0", STR_PAD_LEFT);
            $a = "BC".$moisAnnee."-".$tmp;
           
        }else{
            $a="BC".$moisAnnee."-001";
        }

        if($_POST['conditionPaiement'] == "Autre")
            $conditionPaiement = htmlentities(htmlspecialchars($_POST['autre']), ENT_SUBSTITUTE);
        else
            $conditionPaiement = htmlentities(htmlspecialchars($_POST['conditionPaiement']), ENT_SUBSTITUTE);

        //
        require_once('../classe/classeBon.php');
        $Bon = new Bon(NULL, htmlentities(htmlspecialchars($_POST['numeroProforma']), ENT_SUBSTITUTE), $a, date("d-m-Y") ,htmlentities(htmlspecialchars($_POST['titre']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['contact']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['notabene']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['delaisLivraison']), ENT_SUBSTITUTE), $conditionPaiement, 0,htmlentities(htmlspecialchars($_POST['idTypetaxe']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['idClient']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['idDevis']), ENT_SUBSTITUTE), $_SESSION['gestionDevisidUser'], 3, 0, "", 1);
        echo $Bon->addBon();
    }
    else if(isset($_POST['modifier'])){
        require_once('../classe/classeBon.php');
        $Bon = new Bon();
        if ($Bon->emailExist2(htmlentities(htmlspecialchars($_POST['email']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['modifier']), ENT_SUBSTITUTE)) == false && $Bon->loginExist2(htmlentities(htmlspecialchars($_POST['login']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['modifier']), ENT_SUBSTITUTE)) == false) {
            if(isset($_POST['idStructure'])){
                $idStructure = htmlentities(htmlspecialchars($_POST['idStructure']), ENT_SUBSTITUTE);
            }else{
                $idStructure = 1;
            }
            $Bon = new Bon();
            echo $Bon->updateBon(htmlentities(htmlspecialchars($_POST['modifier']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['nom']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['prenom']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['email']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['adresse']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['telephone']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['login']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['idRole']), ENT_SUBSTITUTE), $idStructure, htmlentities(htmlspecialchars($_POST['idCompte']), ENT_SUBSTITUTE));
        }
        else if ($Bon->loginExist2(htmlentities(htmlspecialchars($_POST['login']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['modifier']), ENT_SUBSTITUTE)) == true) {
             echo 2;
        }
        else if ($Bon->emailExist2(htmlentities(htmlspecialchars($_POST['email']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['modifier']), ENT_SUBSTITUTE)) == true){
            echo 3;
        }
    }
    else{
        if(isset($opt)){
            $opt = explode("-", $opt);
            $option = $opt[0];
            if($option == "ajouter"){
                include('php/view/bon/ajouter.php');
            }else if($option == "modifier"){
                require_once('php/classe/classeBon.php');

                include('php/view/bon/modifier.php');
            }else if($option=="supprimer"){
               require_once('php/classe/classeBon.php');

                include('php/view/bon/liste.php');
            }
            else if($option=="details"){
                include('php/view/bon/details.php');
            }else if($option=="liste"){
                include('php/view/bon/liste.php');
            }
            else if($option=="listeavalider"){
                include('php/view/bon/listeavalider.php');
            }
        }
        else{
            include('php/view/bon/liste.php');
        }
    }
?>