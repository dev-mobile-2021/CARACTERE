<?php
$output = '';

//$bdd  = new PDO('mysql:host=localhost;dbname=htsoftdeuzcaract','root', '');

//  $bdd = new PDO("mysql:host=htsoftdeuzcaract.mysql.db;dbname=htsoftdeuzcaract", "htsoftdeuzcaract", "HTsoft2019caractere");
require_once('../classe/classeConnexion.php');

if (isset($_POST["export_excel"])) {
    $requete = Connexion::Connect()->prepare("SELECT * FROM vdevis2 WHERE  idDevis NOT IN (SELECT idDevis FROM devisbc WHERE etat = 1)");
    $requete->execute();
    $devis = $requete->fetchAll();

    $nom = time() . '.txt';
    $lien =  dirname(dirname(dirname(__FILE__))) . '/fichiersExport/' . $nom;
    $ligne = "";
   if (count($devis) > 0) {
    foreach ($devis as $value) {
      $ligne = "" . $value['numeroDevis'] . "\t" . $value['objet'] . "\t" . $value['prenom'] . "\t" . $value['nomClient'] . "\t" . $value['montantDevis'] . "\t" . $value['dateAjout']. "\t" . $value['idEtat']. "\t\n";
      
      $myfile = file_put_contents($lien, $ligne . PHP_EOL, FILE_APPEND | LOCK_EX);
      header("Content-Type: text/plain");
      header("Content-Disposition: attachment; filename=facturesansBC.txt");
     
      echo html_entity_decode($ligne);
    }
   
  }
    // if (count($devis) > 0) {
    //     $output .= '
    //     <table id="example1" class="table table-bordered table-hover dataTable">
    //     <thead>
    //       <tr role="row">
    //         <th>Numéro</th>
    //         <th>Objet</th>
    //         <th>Auteur</th>
    //         <th>Client</th>
    //         <th>Montant (FCFA)</th>
    //         <th>Date</th>
    //         <th>Etat</th>
    //       </tr>
    //     </thead>
    //     ';
    //     foreach($devis as $d)
    //                 {
    //                     $output .='
    //                     <tr>
    //                     <td>'.$d["numeroDevis"].'</td>
    //                     <td>'.$d["objet"].'</td>
    //                     <td>'.$d["prenom"].'</td>
    //                     <td>'.$d['nomClient'].'</td>
    //                     <td>'.$d["montantDevis"].'</td>
    //                     <td>'.$d["dateAjout"].'</td>
    //                     <td>'.$d["idEtat"].'</td>
                        

    //                     </tr>
    //                     ';
    //                 }
    //                 $output.='</table>';
    //                 header("Content-Type: application/xls");
    //                 header("Content-Disposition: attachment; filename=afacturersansbc.xls");
    //                 echo $output;
    // }
}

?> 