<?php
    /*Permet de se connecter avec la base de données*/
    class Connexion{

        public static function Connect(){
            $conn = NULL;
            try{
                /*On essaie d'etablir la connexion*/
                // 
                // $conn = new PDO("mysql:host=localhost;dbname=caractere", "root", "", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
                //$conn = new PDO('mysql:host=localhost;dbname=htsoftdeuzcaract','root', '');
                // $conn = new PDO('mysql:host=localhost;dbname=htsoftdeuzcaract','root', '');
                 $conn = new PDO('mysql:host=localhost;dbname=htsoftdeuzcaract','root', '');
                // $conn = new PDO("mysql:host=htsoftdeuzcaract.mysql.db;dbname=htsoftdeuzcaract", "htsoftdeuzcaract", "HTsoft2019caractere" , array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                } catch(PDOException $e){
                    /*Si elle echoue, on recupere l'erreur et on l'affiche*/
                    echo 'ERROR: ' . $e->getMessage();
                    }    
                return($conn);
        }
    }
    ?>