<?php
// $bdd  = new PDO('mysql:host=localhost;dbname=htsoftdeuzcaract', 'root', '');
require_once('../classe/classeConnexion.php');

$output = '';

//  $bdd =new PDO("mysql:host=htsoftdeuzcaract.mysql.db;dbname=htsoftdeuzcaract", "htsoftdeuzcaract", "HTsoft2019caractere");
if (isset($_POST["export_excel"])) {
  $now = new DateTime();
  $year = $now->format("Y");
  $months = 0;
  $montantTotal = 0;
  $sommeMontant = 0;
  $janvier  = 0;
  $fevrier  = 0;
  $mars  = 0;
  $avril  = 0;
  $mai  = 0;
  $juin  = 0;
  $juillet  = 0;
  $aout  = 0;
  $septembre  = 0;
  $octobre  = 0;
  $novembre  = 0;
  $decembre  = 0;
   $i = 0;
  if (isset($_POST['months'])) {
    $months = $_POST['months'];
    // var_dump($months);
  }
  // foreach($months as $key=>$month){
    if($months){
  for ($i; $i<count($months); $i++) {
    $requete = Connexion::Connect()->prepare("SELECT  nomClient,montantDevis, SUM(montantDevis) 'total' , 
  IF(MONTH(dateAjout)=1,SUM(montantDevis),'0') 'janvier' ,
    IF(MONTH(dateAjout)=2,SUM(montantDevis),'0') 'fevrier',
    IF(MONTH(dateAjout)=3,SUM(montantDevis),'0') 'mars' ,
    IF(MONTH(dateAjout)=4,SUM(montantDevis),'0') 'avril' ,
    IF(MONTH(dateAjout)=5,SUM(montantDevis),'0') 'mai' ,
    IF(MONTH(dateAjout)=6,SUM(montantDevis),'0') 'juin' ,
    IF(MONTH(dateAjout)=7,SUM(montantDevis),'0') 'juillet' ,
    IF(MONTH(dateAjout)=8,SUM(montantDevis),'0') 'aout' ,
    IF(MONTH(dateAjout)=9,SUM(montantDevis),'0') 'septembre' ,
    IF(MONTH(dateAjout)=10,SUM(montantDevis),'0') 'octobre' ,
    IF(MONTH(dateAjout)=11,SUM(montantDevis),'0') 'novembre' ,
    IF(MONTH(dateAjout)=12,SUM(montantDevis),'0') 'decembre' 
    FROM vdevis 
    WHERE YEAR(dateAjout) = \"$year\"
    AND MONTH(dateAjout)=\"$months[$i]\" 
    GROUP BY  nomclient, 'total' ");
    $requete->execute();
    $devis = $requete->fetchAll();
  }
 }
  if ($months != 0 && count($devis) > 0) {
    echo "";

  } else if ($months != 0 && count($devis) == 0) {
    echo "<p style='text-align: center'>LE MOIS CHOISIT N'A PAS DE DONNEES</p>";
  } else {
    echo "";

    $requete = Connexion::Connect()->prepare("SELECT  nomClient,montantDevis, SUM(montantDevis) 'total' , 
    IF(MONTH(dateAjout)=1,SUM(montantDevis),'0') 'janvier' ,
      IF(MONTH(dateAjout)=2,SUM(montantDevis),'0') 'fevrier',
      IF(MONTH(dateAjout)=3,SUM(montantDevis),'0') 'mars' ,
      IF(MONTH(dateAjout)=4,SUM(montantDevis),'0') 'avril' ,
      IF(MONTH(dateAjout)=5,SUM(montantDevis),'0') 'mai' ,
      IF(MONTH(dateAjout)=6,SUM(montantDevis),'0') 'juin' ,
      IF(MONTH(dateAjout)=7,SUM(montantDevis),'0') 'juillet' ,
      IF(MONTH(dateAjout)=8,SUM(montantDevis),'0') 'aout' ,
      IF(MONTH(dateAjout)=9,SUM(montantDevis),'0') 'septembre' ,
      IF(MONTH(dateAjout)=10,SUM(montantDevis),'0') 'octobre' ,
      IF(MONTH(dateAjout)=11,SUM(montantDevis),'0') 'novembre' ,
      IF(MONTH(dateAjout)=12,SUM(montantDevis),'0') 'decembre' 
      FROM vdevis 
      WHERE YEAR(dateAjout) = \"$year\"
      GROUP BY  nomclient, 'total' ");
    $requete->execute();
    $devis = $requete->fetchAll();
  }

  foreach ($devis as $key => $dv) {
    $montantTotal += $dv["total"];
    $janvier += $dv["janvier"];
    $fevrier += $dv["fevrier"];
    $mars += $dv["mars"];
    $avril += $dv["avril"];
    $mai += $dv["mai"];
    $juin += $dv["juin"];
    $juillet += $dv["juillet"];
    $aout += $dv["aout"];
    $septembre += $dv["septembre"];
    $octobre += $dv["octobre"];
    $novembre += $dv["novembre"];
    $decembre += $dv["decembre"];
  }
  $sommeMontant = $montantTotal;




  if (count($devis) > 0) {
    $output .= '
            <table id="example1" class="table table-bordered table-hover dataTable">
            <b style="text-align:center">STATISTIQUES MENSUELLES CLIENTS</b>

            <thead>
              <tr role="row">

              <th>Client</th>
                <th>Janvier</th>
                <th>Fevrier</th>
                <th>Mars</th>
                <th>Avril</th>
                <th>Mai</th>
                <th>Juin</th>
                <th>Juillet</th>
                <th>Aout</th>
                <th>Septembre</th>
                <th>Octobre</th>
                <th>Novembre</th>
                <th>Decembre</th>
                <th>Total</th>



              </tr>
             
            </thead>
            ';
    foreach ($devis as $d) {
      $output .= '
                          <tr>
                            <td>' . $d["nomClient"] . ' </td>
                            <td>' . $d["janvier"] . ' F</td>
                            <td>' . $d["fevrier"] . ' F</td>
                            <td>' . $d['mars'] . ' F</td>
                            <td>' . $d['avril'] . ' F</td>
                            <td>' . $d['mai'] . ' F</td>
                            <td>' . $d['juin'] . ' F</td>
                            <td>' . $d['juillet'] . ' F</td>
                            <td>' . $d['aout'] . ' F</td>
                            <td>' . $d['septembre'] . ' F</td>
                            <td>' . $d['octobre'] . ' F</td>
                            <td>' . $d['novembre'] . ' F</td>
                            <td>' . $d['decembre'] . ' F</td>
                            <td>' . $d["total"] . ' F</td>

                          </tr>
                         
                            ';
    }
    $output .= '
                          <tr>
                          <th>Totaux</th>
                          <td >' . $janvier . ' F</td>
                          <td >' . $fevrier . ' F</td>
                          <td >' . $mars . ' F</td>
                          <td >' . $avril . ' F</td>
                          <td >' . $mai . ' F</td>
                          <td >' . $juin . ' F</td>
                          <td >' . $juillet . ' F</td>
                          <td >' . $aout . ' F</td>
                          <td >' . $septembre . ' F</td>
                          <td >' . $octobre . ' F</td>
                          <td >' . $novembre . ' F</td>
                          <td >' . $decembre . ' F</td>
                          <td>' . $sommeMontant . ' F</td>
                          
                      </tr>';
    $output .= '</table>';
    header("Content-Type: application/xls");
    header("Content-Disposition: attachment; filename=Mensuelclient.xls");
    echo $output;
  }
}
