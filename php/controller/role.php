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
        require_once("../classe/classeRole.php");
        $Id= htmlentities(htmlspecialchars($_GET['changerEtat']), ENT_SUBSTITUTE);
        $etat= htmlentities(htmlspecialchars($_GET['etat']), ENT_SUBSTITUTE);
        $str = explode("$", $Id);
        $a=0;
        $objet = new Role();
        foreach($str as $ide){
            $a= $objet->changeState($ide, $etat);
        }
        echo $a;
        // header("location: index.php");
    }else if(isset($_GET['resetPassword'])){
        require_once("../classe/classeRole.php");
        $Id= htmlentities(htmlspecialchars($_GET['resetPassword']), ENT_SUBSTITUTE);
        $str = explode("$", $Id);
        $a=0;
        $objet = new Role();
        foreach($str as $ide){
            $a= $objet->resetPassword($ide);
        }
        $res = explode("-", $a);
        echo $res[0];
        // header("location: index.php");
    }else if(isset($_GET['supprimer'])){
        require_once("../classe/classeRole.php");
        $Id= htmlentities(htmlspecialchars($_GET['supprimer']), ENT_SUBSTITUTE);
        $str = explode("$", $Id);
        $a=0;
        $objet = new Role();
        foreach($str as $ide){
            $a= $objet->deleteRole($ide);
        }
        echo $a;
        // header("location: index.php");
    }
    else if(isset($_POST['ajouter'])){
        require_once('../classe/classeRole.php');
        $Role = new Role();
        if ($Role->libelleExist(htmlentities(htmlspecialchars($_POST['libelle']), ENT_SUBSTITUTE)) == false) {
            $Role = new Role(NULL, htmlentities(htmlspecialchars($_POST['libelle']), ENT_SUBSTITUTE));
            echo $Role->addRole();
        }
        else{
            echo 2;
        }
    }
    else if(isset($_POST['modifier'])){
        require_once('../classe/classeRole.php');
        $Role = new Role();
        if ($Role->libelleExist2(htmlentities(htmlspecialchars($_POST['libelle']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['modifier']), ENT_SUBSTITUTE)) == false ) {
            $Role = new Role(htmlentities(htmlspecialchars($_POST['modifier']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['libelle']), ENT_SUBSTITUTE));
            echo $Role->updateRole();
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
                include('php/view/role/ajouter.php');
            }else if($option == "modifier"){
                require_once('php/classe/classeRole.php');

                include('php/view/role/modifier.php');
            }else if($option=="supprimer"){
               require_once('php/classe/classeRole.php');

                include('php/view/role/liste.php');
            }
            else if($option=="details"){
                include('php/view/role/details.php');
            }else if($option=="liste"){
                include('php/view/role/liste.php');
            }else if($option=="privileges"){
                include('php/view/role/privileges.php');
            }
        }
        else{
            include('php/view/role/liste.php');
        }
    }
?>