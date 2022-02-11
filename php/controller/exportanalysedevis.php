<?php

// $bdd  = new PDO('mysql:host=localhost;dbname=htsoftdeuzcaract', 'root', '');
require_once('../classe/classeConnexion.php');

$output = '';
//  $bdd =new PDO("mysql:host=htsoftdeuzcaract.mysql.db;dbname=htsoftdeuzcaract", "htsoftdeuzcaract", "HTsoft2019caractere");
if (isset($_POST["export_excel"])) {
  $now = new DateTime();
  $year = $now->format("Y");
  $montantTotal = 0;
  $sommeMontant = 0;
  $montantResultat= 0;
  if (isset($_POST['year'])) {
    $year = $_POST['year'];
  }
  
    $requete = Connexion::Connect()->prepare("SELECT rubriques, SUM(montantDevis) 'total' ,montantDevis,montantDevisAchat,(SUM(montantDevis)*((montantDevis- montantDevisAchat) / montantDevis*100)/100) 'resultat'
    FROM vdevis2
        WHERE YEAR(dateAjout) = \"$year\"
        GROUP BY  rubriques ,'total' ");
    $requete->execute();
    $devis = $requete->fetchAll();

    
    if ($year !=0 && count($devis)==0) {

      echo "<p style='text-align: center'>L'ANNEE CHOISIT N'A PAS DE DONNEES</p><br>";
    }

    foreach ($devis as $key => $dv) {
      $montantTotal += $dv["total"];
      $montantResultat += $dv["resultat"];

    }
    $sommeMontant = $montantTotal;
  // echo $sommeMontant;
      if (count($devis) > 0) {
        $output .= '
            <table id="example1" class="table table-bordered table-hover dataTable">
            <b style="text-align:center">ANALYSE</b>

            <thead>
              <tr role="row">

              <th>TYPE DE SERVICES</th>
                <th>TOTAL CA</th>
                <th>RAPPORT SUR CA</th>
                <th>MARGE PRODUIT</th>
                <th>RESULTAT</th>



              </tr>
            </thead>
            ';
        foreach ($devis as $d) {
          $output .= '
                            <tr>
                            <td>' . $d["rubriques"] . '</td>
                            <td>' . $d["total"] . ' F</td>
                            <td>' .round((( $d["total"] *100)/$sommeMontant)). ' %</td>
                            <td >'.round((($d['montantDevis'] - $d['montantDevisAchat']) / $d['montantDevis']) * 100) . ' %</td>
                            <td>' . round($d["resultat"]) . ' F</td>
                            </tr>
                            ';
        }
        $output .= '
        <tr>
                            <th>TOTAUX</th>
                            <td>' . $sommeMontant . ' F</td>
                            <td></td>
                            <td ></td>
                            <td>' . round($montantResultat). ' F</td>
                            </tr>
        ';
        $output.='</table>';
        header("Content-Type: application/xls");
        header("Content-Disposition: attachment; filename=analyse.xls");
        echo $output;
      }

}
