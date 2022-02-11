
<?php
@session_start();
require_once("../../classe/classeConnexion.php");

if (isset($_GET["idRubrique"])) {
    try {
        $requete = Connexion::Connect()->query("SELECT * FROM rubrique");
    } catch (PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
    if (!empty($requete))
        echo '<option value="0">Veuillez choisir un type service</option>';
    else
        echo '<option value="0">Aucun type service trouv&eacute;</option>';

    foreach ($requete as $value) {
        echo '<option value="' . $value['idRubrique'] . '">' . $value['rubrique'] . '</option>';
    }
}
