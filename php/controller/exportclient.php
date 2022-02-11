<?php

//$bdd  = new PDO('mysql:host=localhost;dbname=htsoftdeuzcaract','root', '');

  // $bdd =new PDO("mysql:host=htsoftdeuzcaract.mysql.db;dbname=htsoftdeuzcaract", "htsoftdeuzcaract", "HTsoft2019caractere");
  require_once('../classe/classeConnexion.php');

  if (isset($_POST["export_excel"])) {
  $requete = Connexion::Connect()->prepare("SELECT * FROM client");
  $requete->execute();
  $devis = $requete->fetchAll();

  $nom = time() . '.txt';
  $lien =  dirname(dirname(dirname(__FILE__))) . '/fichiersExport/' . $nom;
  $ligne = "";
 if (count($devis) > 0) {
  foreach ($devis as $value) {
    $ligne = "" . $value['idClient'] . "\t" . $value['nomClient'] . "\t" . $value['emailClient'] . "\t" . $value['telephoneClient'] . "\t" . $value['adresseClient'] . "\t\n";
    
    $myfile = file_put_contents($lien, $ligne . PHP_EOL, FILE_APPEND | LOCK_EX);
    header("Content-Type: text/plain");
    header("Content-Disposition: attachment; filename=client.txt");
   
    echo html_entity_decode($ligne);
  }
 
}

//   if (count($devis) > 0) {
//     $output .= '
//         <table id="example1" class="table table-bordered table-hover dataTable">
//         <thead>
//           <tr role="row">

//           <th>NuméroClient</th>
//             <th>Nom</th>
//             <th>Email</th>
//             <th>Télèphone</th>
//             <th>Adresse</th>

//           </tr>
//         </thead>
//         ';
//     foreach ($devis as $d) {
//       $output .= '
//                         <tr>
//                         <td>' . $d["idClient"] . '</td>
//                         <td>' . $d["nomClient"] . '</td>
//                         <td>' . $d["emailClient"] . '</td>
//                         <td>' . $d["telephoneClient"] . '</td>
//                         <td>' . $d['adresseClient'] . '</td>



//                         </tr>
//                         ';
//     }
//     $output .= '</table>';
//     header("Content-Type: text/plain");
//     header("Content-Disposition: attachment; filename=client.txt");
   
//     echo $output;
//   }

 }
