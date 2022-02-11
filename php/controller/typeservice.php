<?php
    function matricule($table, $champs){
        require_once('../classe/classeConnexion.php');
        $moisAnnee = "TS".date("m").date("Y");
        $requete = Connexion::Connect()->query("SELECT $champs FROM $table WHERE referenceTypeservice LIKE \"%$moisAnnee%\" ORDER BY $champs DESC LIMIT 0,1;");
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
        require_once("../classe/classeTypeservice.php");
        $Id= htmlentities(htmlspecialchars($_GET['changerEtat']), ENT_SUBSTITUTE);
        $etat= htmlentities(htmlspecialchars($_GET['etat']), ENT_SUBSTITUTE);
        $str = explode("$", $Id);
        $a=0;
        $objet = new Typeservice();
        foreach($str as $ide){
            $a= $objet->changeState($ide, $etat);
        }
        echo $a;
        // header("location: index.php");
    }else if(isset($_GET['resetPassword'])){
        require_once("../classe/classeTypeservice.php");
        $Id= htmlentities(htmlspecialchars($_GET['resetPassword']), ENT_SUBSTITUTE);
        $str = explode("$", $Id);
        $a=0;
        $objet = new Typeservice();
        foreach($str as $ide){
            $a= $objet->resetPassword($ide);
        }
        $res = explode("-", $a);
        echo $res[0];
        // header("location: index.php");
    }else if(isset($_GET['supprimer'])){
        require_once("../classe/classeTypeservice.php");
        $Id= htmlentities(htmlspecialchars($_GET['supprimer']), ENT_SUBSTITUTE);
        $str = explode("$", $Id);
        $a=0;
        $objet = new Typeservice();
        foreach($str as $ide){
            $a= $objet->deleteTypeservice($ide);
        }
        echo $a;
        // header("location: index.php");
    }
    else if(isset($_POST['ajouter'])){
        $a = matricule("typeservice", "referenceTypeservice");
        $moisAnnee = date("m").date("Y");
        if($a != "0"){
            $str = explode("-", $a);
            $tmp = intval($str[1])+1;
            $tmp = str_pad($tmp, 3, "0", STR_PAD_LEFT);
            $a = "TS".$moisAnnee."-".$tmp;
           
        }else{
            $a="TS".$moisAnnee."-001";
        }
        // echo $a;
        require_once('../classe/classeTypeservice.php');
        $Typeservice = new Typeservice();
        if ($Typeservice->libelleExist(htmlentities($_POST['typeService'], ENT_SUBSTITUTE)) == false) {
            $Typeservice = new Typeservice(NULL, $a, htmlentities($_POST['typeService'], ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['idFamille']), ENT_SUBSTITUTE), htmlentities($_POST['description'], ENT_SUBSTITUTE));
            echo $Typeservice->addTypeservice();
        }
        else{
            echo 2;
        }
    }
    else if(isset($_POST['modifier'])){
        require_once('../classe/classeTypeservice.php');
        $Typeservice = new Typeservice();
        if ($Typeservice->libelleExist2(htmlentities($_POST['typeServiceMod'], ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['modifier']), ENT_SUBSTITUTE)) == false ) {
            $Typeservice = new Typeservice(htmlentities(htmlspecialchars($_POST['modifier']), ENT_SUBSTITUTE), "", htmlentities($_POST['typeServiceMod'], ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['idFamilleMod']), ENT_SUBSTITUTE), htmlentities($_POST['descriptionMod'], ENT_SUBSTITUTE));
            echo $Typeservice->updateTypeservice();
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
                include('php/view/typeservice/ajouter.php');
            }else if($option == "modifier"){
                require_once('php/classe/classeTypeservice.php');

                include('php/view/typeservice/modifier.php');
            }else if($option=="supprimer"){
               require_once('php/classe/classeTypeservice.php');

                include('php/view/typeservice/liste.php');
            }
            else if($option=="details"){
                include('php/view/typeservice/details.php');
            }else if($option=="liste"){
                include('php/view/typeservice/liste.php');
            }
        }
        else{
            include('php/view/typeservice/liste.php');
        }
    }
?>