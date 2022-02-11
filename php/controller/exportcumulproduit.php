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
  if (isset($_POST['year'])) {
    $year = $_POST['year'];

    // echo $year;
    // echo "<script>alert(\"l'année choisit n'a pas de donneés\")</script>";
    echo "<p style='text-align: center'>L'ANNEE CHOISIT N'A PAS DE DONNEES</p><br>";
  }
    $requete = Connexion::Connect()->prepare("SELECT  typeservices, SUM(montantDevis) 'total' , (montantDevis/1000)'pourcentage'
    FROM vdevis2
        WHERE YEAR(dateAjout) = \"$year\"
        GROUP BY MONTH(dateAjout), typeservices");
    $requete->execute();
    $devis = $requete->fetchAll();

    foreach ($devis as $key => $dv) {
      $montantTotal += $dv["total"];
    }
    $sommeMontant = $montantTotal;

      if (count($devis) > 0) {
        $output .= '
            <table id="example1" class="table table-bordered table-hover dataTable">
            <b style="text-align:center">STATISTIQUES CUMULEES PRODUITS</b>

            <thead>
              <tr role="row">

              <th>Service</th>
                <th>Total</th>
                <th>Pourcentage</th>
                


              </tr>
            </thead>
            ';
        foreach ($devis as $d) {
          $output .= '
                            <tr>
                            <td>' . utf8_decode($d["typeservices"]) . '</td>
                            <td>' . $d["total"] . '</td>
                            <td>' .round((( $d["total"] *100)/$sommeMontant)). ' %</td>

                           




                            </tr>
                            ';
        }
        $output .= '
        <tr>
                                <th> Totaux </th>
                                <td>' . $sommeMontant . '</td>
                                <td>100%</td>
    
                                </tr>
        ';
        $output.='</table>';
        header("Content-Type: application/xls");
        header("Content-Disposition: attachment; filename=Cumulproduit.xls");
        echo $output;
      }

}
