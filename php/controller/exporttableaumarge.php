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
    $requete = Connexion::Connect()->prepare("SELECT  MONTH(vf.dateAjout) 'mois', vf.dateAjout,vf.numeroFacture,vf.nomClient 'clients', v2.services 'projet', vf.montantDevis 'venteht',vf.montantDevisAchat 'achatht', (vf.montantDevis - vf.montantDevisAchat) 'margebrute',SUM(vf.montantDevisAchat) 'achathts', SUM((vf.montantDevis - vf.montantDevisAchat)) 'margebrutes',(((vf.montantDevis - vf.montantDevisAchat)/vf.montantDevis)*100) 'pourcentage',
    SUM(vf.montantDevis) 'ventehts', SUM(vf.montantDevisAchat) 'achathts', SUM((vf.montantDevis - vf.montantDevisAchat)) 'margebrutes',SUM((((vf.montantDevis - vf.montantDevisAchat)/vf.montantDevis)*100))'pourcentages'
        FROM vfacture vf, vdevis2 v2 
            WHERE YEAR(vf.dateAjout) = \"$year\" 
            GROUP BY MONTH(vf.dateAjout), vf.nomClient , v2.idDevis
            LIMIT 1");
    $requete->execute();
    $devis = $requete->fetchAll();
    if ($year !=0 && count($devis)==0) {
      echo "<p style='text-align: center'>L'ANNEE CHOISIT N'A PAS DE DONNEES</p><br>";

    }

    // foreach ($devis as $key => $dv) {
    //   $montantTotal += $dv["total"];
    //   $montantResultat += $dv["resultat"];
    // }

    $sommeMontant = $montantTotal;

      if (count($devis) > 0) {
        $output .= '
            <table id="example1" class="table table-bordered table-hover dataTable">
            <b style="text-align:center">TABLEAU DE MARGE</b>

            <thead>
              <tr role="row">

              <th>MOIS</th>
                <th>DATE</th>
                <th>N° FACTURE</th>
                <th>CLIENTS</th>
                <th>PROJET</th>
                <th>VENTE HT</th>
                <th>ACHAT HT</th>
                <th>MARGE BRUTE</th>
                <th>TAUX DE MARGE</th>




              </tr>
            </thead>
            ';
        foreach ($devis as $d) {
          $output .= '
                            <tr>
                            <td>' . $d["mois"] . '</td>
                            <td>' . $d["dateAjout"] . '</td>
                            <td>' . $d["numeroFacture"] . '</td>
                            <td>' . $d["clients"] . '</td>
                            <td>' . utf8_decode($d["projet"]) . '</td>
                            <td>' . $d["venteht"] . 'F</td>
                            <td>' . $d["achatht"] . 'F</td>
                            <td>' . $d["margebrute"] . 'F</td>
                            <td>' . round($d["pourcentage"]) . '%</td>

                            </tr>
                            <tr>
                                                    <td ></td>
                                                    <td ></td>
                                                    <td ></td>
                                                    <td ></td>
                                                    <th>Totaux</th>

                                                    <td>' . $d["ventehts"] . 'F</td>
                                                    <td>' . $d["achathts"] . 'F</td>
                                                    <td>' . $d["margebrutes"] . 'F</td>
                                                    <td>' . round($d["pourcentages"]) . '%</td>

                                                </tr>
                            ';
        }
        $output.='</table>';
        header("Content-Type: application/xls");
        header("Content-Disposition: attachment; filename=tableaumarge.xls");
        echo $output;
      }

}
