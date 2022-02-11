<?php
$output = '';
// header("Content-Type:text/csv;");
// header("Content-Disposition: attachment; filename='liste-devis.csv'");
//$bdd  = new PDO('mysql:host=localhost;dbname=htsoftdeuzcaract','root', '');

//  $bdd = new PDO("mysql:host=htsoftdeuzcaract.mysql.db;dbname=htsoftdeuzcaract", "htsoftdeuzcaract", "HTsoft2019caractere");
require_once('../classe/classeConnexion.php');

if (isset($_POST["export_excel"])) {
    $requete = Connexion::Connect()->prepare("SELECT * FROM vdevis WHERE idEtat = 5 AND idDevis NOT IN (SELECT idDevis FROM devisbc WHERE etat = 1)");
    $requete->execute();
    $devis = $requete->fetchAll();
    if (count($devis) > 0) {
        $output .= '
        <table id="example1" class="table table-bordered table-hover dataTable">
        <thead>
          <tr role="row">
            <th>Numéro</th>
            <th>Objet</th>
            <th>Auteur</th>
            <th>Client</th>
            <th>Montant (FCFA)</th>
            <th>Date</th>
            <th>Etat</th>
          </tr>
        </thead>
        ';
        foreach($devis as $d)
                    {
                        $output .='
                        <tr>
                        <td>'.$d["numeroDevis"].'</td>
                        <td>'.$d["objet"].'</td>
                        <td>'.$d["prenom"].'</td>
                        <td>'.$d['nomClient'].'</td>
                        <td>'.$d["montantDevis"].'</td>
                        <td>'.$d["dateAjout"].'</td>
                        <td>'.$d["idEtat"].'</td>
                        

                        </tr>
                        ';
                    }
                    $output.='</table>';
                    header("Content-Type: application/xls");
                    header("Content-Disposition: attachment; filename=devisattentebc.xls");
                    echo $output;
    }
}

?> 