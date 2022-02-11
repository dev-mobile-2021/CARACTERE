
<?php

//import.php

include '../../vendor/autoload.php';
require_once('outil.php');
$nom;
//$bdd  = new PDO('mysql:host=localhost;dbname=htsoftdeuzcaract','root', '');
require_once('../classe/classeConnexion.php');

//  $bdd =new PDO("mysql:host=htsoftdeuzcaract.mysql.db;dbname=htsoftdeuzcaract", "htsoftdeuzcaract", "HTsoft2019caractere");
if ($_FILES["import_excel"]["name"] != '') {
    $allowed_extension = array('xls', 'csv', 'xlsx');
    $file_array = explode(".", $_FILES["import_excel"]["name"]);
    $file_extension = end($file_array);

    if (in_array($file_extension, $allowed_extension)) {
        $file_name = time() . '.' . $file_extension;
        move_uploaded_file($_FILES['import_excel']['tmp_name'], $file_name);
        $file_type = \PhpOffice\PhpSpreadsheet\IOFactory::identify($file_name);
        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($file_type);

        $spreadsheet = $reader->load($file_name);

        unlink($file_name);

        $data = $spreadsheet->getActiveSheet()->toArray();
        // echo count($data);
        $var = "";
        $sql = "INSERT INTO `client`(reference,prenomClient,nomClient,adresseClient,paysClient,telephoneClient,emailClient) VALUES(:reference,:prenomClient,:nomClient,:adresseClient,:paysClient,:telephoneClient,:emailClient)";
        // $stmt = $bdd->prepare($sql);
        Connexion::Connect()->prepare($sql);


        foreach ($data  as $key => $value) {

            if ($key > 0) {
                $searchClient = Outil::referenceAndTelephone($value[0], $value[5]);
                if (empty($searchClient)) {
                    // echo var_dump($refTelephone);

                    $stmt->execute(array('reference' => $value[0], 'prenomClient' => $value[1], 'nomClient' => $value[2], 'adresseClient' => $value[3], 'paysClient' => $value[4], 'telephoneClient' => $value[5], 'emailClient' => $value[6]));
                }
            }
        }
        $message = '<div class="alert alert-success">Importation reussit</div>';
    } else {
        $message = '<div class="alert alert-danger">Seul les fichiers .xls .csv or .xlsx sont autorisés</div>';
    }
} else {
    $message = '<div class="alert alert-danger">Choisir un fichier</div>';
}

echo $message;


?>


