
<?php

//import.php

include '../../vendor/autoload.php';
require_once('outil.php');
$nom;
//$bdd  = new PDO('mysql:host=localhost;dbname=htsoftdeuzcaract','root', '');

//  $bdd =new PDO("mysql:host=htsoftdeuzcaract.mysql.db;dbname=htsoftdeuzcaract", "htsoftdeuzcaract", "HTsoft2019caractere");
require_once('../classe/classeConnexion.php');

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
         echo count($data);
        $var = "";
        $sql = "INSERT INTO `contact`(nom,prenom,telephone,email,idClient,idUser,dateAjout,etat) VALUES(:nom,:prenom,:telephone,:email,:idClient,:idUser,:dateAjout,:etat)";
        $stmt = Connexion::Connect()->prepare($sql);


        foreach ($data  as $key => $value) {

            if ($key > 0) {
               
                    $stmt->execute(array('nom' => $value[0], 'prenom' => $value[1], 'telephone' => $value[2], 'email' => $value[3], 'idClient' => $value[4], 'idUser' => $value[5], 'dateAjout' => $value[6],, 'etat' => $value[7]));
                
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


