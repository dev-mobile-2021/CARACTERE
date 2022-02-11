<?php
require_once('../classe/classeConnexion.php');
class Outil{
    function referenceAndTelephone( $reference, $telephoneClient)
    {
    
        $list = array();
    
        $requete = Connexion::Connect()->query("SELECT * FROM  client WHERE  telephoneClient = \"$telephoneClient\" AND reference= \"$reference\" ");
    // echo $requete;
        //On récupère le résultat de la requete, on le parcours, on le met dans une variable qu'on retourne 
        foreach ($requete as $donnee) {
            $list[] = $donnee;
        }
    //   echo var_dump($list);
            return $list;
       
    }

    function referenceAndTelephonefournisseur( $reference, $telephoneFournisseur)
    {
    
        $list = array();
    
        $requete = Connexion::Connect()->query("SELECT * FROM  fournisseur WHERE  telephoneFournisseur = \"$telephoneFournisseur\" AND reference= \"$reference\" ");
    // echo $requete;
        //On récupère le résultat de la requete, on le parcours, on le met dans une variable qu'on retourne 
        foreach ($requete as $donnee) {
            $list[] = $donnee;
        }
    //   echo var_dump($list);
            return $list;
       
    }
    
}

?>