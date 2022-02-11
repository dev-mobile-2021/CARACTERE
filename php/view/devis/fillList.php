<?php
@session_start();
require_once("../../classe/classeConnexion.php");

if (isset($_GET["idFamille"])) {
    try {
        $requete = Connexion::Connect()->query("SELECT * FROM typeservice  WHERE idFamille='" . $_GET['idFamille'] . "' ");
    } catch (PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
    if (!empty($requete))
        echo '<option value="0">Veuillez choisir un service</option>';
    else
        echo '<option value="0">Aucun service trouv&eacute;</option>';



    $typeServiceUtilises = $_GET['typeServiceUtilises'];
    $typeServiceUtilises = explode(",", $typeServiceUtilises);

    foreach ($requete as $value) {
        if (in_array($value['idTypeservice'], $typeServiceUtilises))
            echo '<option disabled="disabled" value="' . $value['idTypeservice'] . '">' . $value['typeService'] . '</option>';
        else
            echo '<option value="' . $value['idTypeservice'] . '">' . $value['typeService'] . '</option>';
    }
} else if (isset($_GET["idRubrique"])) {
    // $idRubrique = $_POST['idRubrique'];
    // echo $idRubrique;
    try {
        $requete = Connexion::Connect()->query("SELECT * FROM famille WHERE idRubrique='" . $_GET['idRubrique'] . "' ");
    } catch (PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
    if (!empty($requete))
        echo '<option value="0">Veuillez choisir un service</option>';
    else
        echo '<option value="0">Aucun service trouv&eacute;</option>';

    foreach ($requete as $value) {
        echo '<option value="' . $value['idFamille'] . '">' . $value['famille'] . '</option>';
    }
} else if (isset($_GET["idTypeservice"])) {
    try {
        $requete = Connexion::Connect()->query("SELECT * FROM service WHERE idService IN(SELECT idService FROM rubrique_service_typeservice WHERE idTypeservice='" . $_GET['idTypeservice'] . "') ");
    } catch (PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
    if (!empty($requete))
        echo '<option value="">Veuillez choisir un descriptif</option>';
    else
        echo '<option value="">Aucun descriptif trouv&eacute;</option>';
    foreach ($requete as $value) {
        echo '<option value="' . $value['idService'] . '">' . $value['service'] . '</option>';
    }
} else if (isset($_GET["idClient"])) {
    try {
        $requete = Connexion::Connect()->query("SELECT * FROM contact WHERE idClient='" . $_GET['idClient'] . "' ");
    } catch (PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
    if (!empty($requete))
        echo '<option value="">Veuillez choisir un contact</option>';
    else
        echo '<option value="">Aucun contact trouv&eacute;</option>';
    foreach ($requete as $value) {
        echo '<option data-telephone="' . $value['email'] . '" value="' . $value['nom'] . ' ' . $value['prenom'] . '">' . $value['nom'] . ' - ' . $value['prenom'] . '</option>';
    }


    


}
