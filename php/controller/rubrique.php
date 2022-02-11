<?php
    function matricule($table, $champs){
        require_once('../classe/classeConnexion.php');
        $moisAnnee = "RF".date("m").date("Y");
        $requete = Connexion::Connect()->query("SELECT $champs FROM $table WHERE referenceRubrique LIKE \"%$moisAnnee%\" ORDER BY $champs DESC LIMIT 0,1;");
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
        require_once("../classe/classeRubrique.php");
        $Id= htmlentities(htmlspecialchars($_GET['changerEtat']), ENT_SUBSTITUTE);
        $etat= htmlentities(htmlspecialchars($_GET['etat']), ENT_SUBSTITUTE);
        $str = explode("$", $Id);
        $a=0;
        $objet = new Rubrique();
        foreach($str as $ide){
            $a= $objet->changeState($ide, $etat);
        }
        echo $a;
        // header("location: index.php");
    }else if(isset($_GET['resetPassword'])){
        require_once("../classe/classeRubrique.php");
        $Id= htmlentities(htmlspecialchars($_GET['resetPassword']), ENT_SUBSTITUTE);
        $str = explode("$", $Id);
        $a=0;
        $objet = new Rubrique();
        foreach($str as $ide){
            $a= $objet->resetPassword($ide);
        }
        $res = explode("-", $a);
        echo $res[0];
        // header("location: index.php");
    }else if(isset($_GET['supprimer'])){
        require_once("../classe/classeRubrique.php");
        $Id= htmlentities(htmlspecialchars($_GET['supprimer']), ENT_SUBSTITUTE);
        $str = explode("$", $Id);
        $a=0;
        $objet = new Rubrique();
        foreach($str as $ide){
            $a= $objet->deleteRubrique($ide);
        }
        echo $a;
        // header("location: index.php");
    }
    else if(isset($_POST['ajouter'])){
        $a = matricule("rubrique", "referenceRubrique");
        $moisAnnee = date("m").date("Y");
        if($a != "0"){
            $str = explode("-", $a);
            $tmp = intval($str[1])+1;
            $tmp = str_pad($tmp, 3, "0", STR_PAD_LEFT);
            $a = "RF".$moisAnnee."-".$tmp;
           
        }else{
            $a="RF".$moisAnnee."-001";
        }
        // echo $a;
        require_once('../classe/classeRubrique.php');
        $Rubrique = new Rubrique();
        if ($Rubrique->libelleExist(htmlentities(htmlspecialchars($_POST['rubrique']), ENT_SUBSTITUTE)) == false) {
            $Rubrique = new Rubrique(NULL, $a, htmlentities(htmlspecialchars($_POST['rubrique']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['description']), ENT_SUBSTITUTE));
            echo $Rubrique->addRubrique();
        }
        else{
            echo 2;
        }
    }
    else if(isset($_POST['modifier'])){
        require_once('../classe/classeRubrique.php');
        $Rubrique = new Rubrique();
        // echo "lol0";
        // echo $_POST['modifier'];
        if ($Rubrique->libelleExist2(htmlentities(htmlspecialchars($_POST['rubriqueMod']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['modifier']), ENT_SUBSTITUTE)) == false ) {
            $Rubrique = new Rubrique(htmlentities(htmlspecialchars($_POST['modifier']), ENT_SUBSTITUTE), "", htmlentities(htmlspecialchars($_POST['rubriqueMod']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['descriptionMod']), ENT_SUBSTITUTE));
            echo $Rubrique->updateRubrique();
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
                include('php/view/rubrique/ajouter.php');
            }else if($option == "modifier"){
                require_once('php/classe/classeRubrique.php');

                include('php/view/rubrique/modifier.php');
            }else if($option=="supprimer"){
               require_once('php/classe/classeRubrique.php');

                include('php/view/rubrique/liste.php');
            }
            else if($option=="details"){
                include('php/view/rubrique/details.php');
            }else if($option=="liste"){
                include('php/view/rubrique/liste.php');
            }
        }
        else{
            include('php/view/rubrique/liste.php');
        }
    }
?>