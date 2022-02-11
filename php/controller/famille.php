<?php
    function matricule($table, $champs){
        require_once('../classe/classeConnexion.php');
        $moisAnnee = "TS".date("m").date("Y");
        $requete = Connexion::Connect()->query("SELECT $champs FROM $table WHERE referenceFamille LIKE \"%$moisAnnee%\" ORDER BY $champs DESC LIMIT 0,1;");
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

    if(isset($_GET['supprimer'])){
        require_once("../classe/classeFamille.php");
        $Id= htmlentities(htmlspecialchars($_GET['supprimer']), ENT_SUBSTITUTE);
        $str = explode("$", $Id);
        $a=0;
        $objet = new Famille();
        foreach($str as $ide){
            $a= $objet->deleteFamille($ide);
        }
        echo $a;
        // header("location: index.php");
    }
    else if(isset($_POST['ajouter'])){
        require_once('../classe/classeFamille.php');
        $Famille = new Famille();
        if ($Famille->libelleExist(htmlentities(htmlspecialchars($_POST['typeService']), ENT_SUBSTITUTE)) == false) {
            $Famille = new Famille(NULL, htmlentities(htmlspecialchars($_POST['typeService']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['description']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['idRubrique']), ENT_SUBSTITUTE), "", 1);
            echo $Famille->addFamille();
        }
        else{
            echo 2;
        }
    }
    else if(isset($_POST['modifier'])){
        require_once('../classe/classeFamille.php');
        $Famille = new Famille();
        if ($Famille->libelleExist2(htmlentities(htmlspecialchars($_POST['typeServiceMod']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['modifier']), ENT_SUBSTITUTE)) == false ) {
            $Famille = new Famille(htmlentities(htmlspecialchars($_POST['modifier']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['typeServiceMod']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['descriptionMod']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['idRubriqueMod']), ENT_SUBSTITUTE), "", 1);
            echo $Famille->updateFamille();
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
                include('php/view/famille/ajouter.php');
            }else if($option == "modifier"){
                require_once('php/classe/classeFamille.php');

                include('php/view/famille/modifier.php');
            }else if($option=="supprimer"){
               require_once('php/classe/classeFamille.php');

                include('php/view/famille/liste.php');
            }
            else if($option=="details"){
                include('php/view/famille/details.php');
            }else if($option=="liste"){
                include('php/view/famille/liste.php');
            }
        }
        else{
            include('php/view/famille/liste.php');
        }
    }
?>