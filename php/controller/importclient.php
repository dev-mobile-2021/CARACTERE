<?php
 require "../../vendor/autoload.php";

use \PhpOffice\PhpSpreadsheet\Spreadsheet;
use \PhpOffice\PhpSpreadsheet\Writer\Xlsx;
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', 'Hello World !');

$writer = new Xlsx($spreadsheet);
$writer->save('hello world.xlsx');
// (A) CONNECT TO DATABASE - CHANGE SETTINGS TO YOUR OWN!

try {
  // $pdo  = new PDO("mysql:host=htsoftdeuzcaract.mysql.db;dbname=htsoftdeuzcaract", "htsoftdeuzcaract", "HTsoft2019caractere");
  //$pdo    = new PDO('mysql:host=localhost;dbname=htsoftdeuzcaract','root', '');
  require_once('../classe/classeConnexion.php');


} catch (Exception $ex) { exit($ex->getMessage()); }
 
// (B) PHPSPREADSHEET TO LOAD EXCEL FILE
require "../../vendor/autoload.php";
 $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx');
// $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

$reader->setReadDataOnly(TRUE);
 $spreadsheet = $reader->load('client.xls');
// $spreadsheet = $reader->load("test.xlsx");
$worksheet = $spreadsheet->getActiveSheet();

// (C) READ DATA + IMPORT
$sql = "INSERT INTO `client` (`nom`, `email`,`telephone`,`adresse`) VALUES (?, ?, ?, ?)";
foreach ($worksheet->getRowIterator() as $row) {
  // (C1) FETCH DATA FROM WORKSHEET
  $cellIterator = $row->getCellIterator();
  $cellIterator->setIterateOnlyExistingCells(false);
  $data = [];
  foreach ($cellIterator as $cell) { $data[] = $cell->getValue(); }

  // (C2) INSERT INTO DATABASE
  print_r($data);
  try {
    $stmt = Connexion::Connect()->prepare($sql);
    $stmt->execute($data);
    echo "OK - Client ID - {Connexion::Connect()->lastInsertId()}<br>";
  } catch (Exception $ex) { echo $ex->getMessage() . "<br>"; }
  $stmt = null;
}

// (D) CLOSE DATABASE CONNECTION
if ($stmt !== null) { $stmt = null; }
if (Connexion::Connect() !== null) {Connexion::Connect() = null; }
?>