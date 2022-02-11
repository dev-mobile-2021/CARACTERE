<?php
// Load the database configuration file
//  $bdd = new PDO("mysql:host=htsoftdeuzcaract.mysql.db;dbname=htsoftdeuzcaract", "htsoftdeuzcaract", "HTsoft2019caractere");
//$bdd    = new PDO('mysql:host=localhost;dbname=htsoftdeuzcaract','root', '');
require_once('../classe/classeConnexion.php');
                                                                                        
$uploadfile = $_FILES['importSubmit']['tmp_name'];

require('../../PHPExcel/Classes/PHPExcel.php');
require_once('../../PHPExcel/Classes/PHPExcel/IOFactory.php');

$objExcel = PHPExcel_IOFactory::load($uploadfile);
foreach($objExcel->getWorksheetIterator() as $worksheet)
{
	$highestrow=$worksheet->getHighestRow();

	for($row=0;$row<=$highestrow;$row++)
	{
		$nomClient=$worksheet->getCellByColumnAndRow(0,$row)->getValue();
		$emailClient=$worksheet->getCellByColumnAndRow(1,$row)->getValue();
        $telephoneClient=$worksheet->getCellByColumnAndRow(2,$row)->getValue();
		$adresseClient=$worksheet->getCellByColumnAndRow(3,$row)->getValue();


		if($emailClient !== '')
		{
			$insertqry="INSERT INTO `client`( 'nomClient','emailClient','telephoneClient','adresseClient') VALUES ('$nomClient','$emailClient','$telephoneClient','$adresseClient)";
			$insertres=Connexion::Connect()->query($insertqry);
		}
	}
}
header('Location: ../../caractere/client_liste');
// include('../../caractere/client_liste');

?>