<?php
require_once('../classe/classeConnexion.php');

// $bdd  = new PDO('mysql:host=localhost;dbname=htsoftdeuzcaract', 'root', '');
$output = '';


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
  $requete = Connexion::Connect()->prepare("SELECT  nomClient, SUM(montantDevis) 'total' , (montantDevis/1000)'pourcentage'
    FROM vdevis
        WHERE YEAR(dateAjout) = \"$year\"
        GROUP BY  nomclient, 'total'");
  $requete->execute();
  $devis = $requete->fetchAll();

  foreach ($devis as $key => $dv) {
    $montantTotal += $dv["total"];
  }
  $sommeMontant = $montantTotal;

  if (count($devis) > 0) {
    $output .= '
            <table id="example1" class="table table-bordered table-hover dataTable">
            <b style="text-align:center">STATISTIQUES CUMULEES CLIENTS</b><br><br>
            <thead>
              <tr role="row">

              <th>Client</th>
                <th>Total</th>
                <th>Pourcentage</th>
                


              </tr>
            </thead>
            ';
    foreach ($devis as $d) {
      $output .= '
                            <tr>
                            <td>' . $d["nomClient"] . '</td>
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

    $output .= '</table>';
    header("Content-Type: application/xls");
    header("Content-Disposition: attachment; filename=Cumulclient.xls");
    echo $output;
  }
}
