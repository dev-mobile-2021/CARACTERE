<?php

//$bdd  = new PDO('mysql:host=localhost;dbname=htsoftdeuzcaract','root', '');

// $bdd =new PDO("mysql:host=htsoftdeuzcaract.mysql.db;dbname=htsoftdeuzcaract", "htsoftdeuzcaract", "HTsoft2019caractere");
require_once('../classe/classeConnexion.php');

if (isset($_POST["export_excel"])) {
  $requete = Connexion::Connect()->prepare("SELECT * FROM fournisseur");
  $requete->execute();
  $devis = $requete->fetchAll();

  $nom = time() . '.txt';
  $lien =  dirname(dirname(dirname(__FILE__))) . '/fichiersExport/' . $nom;
  $ligne = "";
 if (count($devis) > 0) {
  foreach ($devis as $value) {
    $ligne = "" . $value['idFournisseur'] . "\t" . $value['nomFournisseur'] . "\t" . $value['emailFournisseur'] . "\t" . $value['telephoneFournisseur'] . "\t" . $value['adresseFournisseur'] . "\t\n";
    
    $myfile = file_put_contents($lien, $ligne . PHP_EOL, FILE_APPEND | LOCK_EX);
    header("Content-Type: text/plain");
    header("Content-Disposition: attachment; filename=fournisseur.txt");
   
    echo html_entity_decode($ligne);
  }
 
}

//   if (count($devis) > 0) {
//     $output .= '
//         <table id="example1" class="table table-bordered table-hover dataTable">
//         <thead>
//           <tr role="row">

//           <th>NuméroFournisseur</th>
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
//                         <td>' . $d["idFournisseur"] . '</td>
//                         <td>' . $d["nomFournisseur"] . '</td>
//                         <td>' . $d["emailFournisseur"] . '</td>
//                         <td>' . $d["telephoneFournisseur"] . '</td>
//                         <td>' . $d['adresseFournisseur'] . '</td>



//                         </tr>
//                         ';
//     }
//     $output .= '</table>';
//     header("Content-Type: text/plain");
//     header("Content-Disposition: attachment; filename=Fournisseur.txt");
   
//     echo $output;
//   }

 }
