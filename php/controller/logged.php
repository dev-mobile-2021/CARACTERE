<?php
	session_start();
	require_once('../classe/classeUser.php');
	$User = new User();


	if($User->isLogged($_POST['email'], $_POST['password']) == true /*&& $User->isActivated($_POST['email'], $_POST['password']) == true*/){
		$infos = $User->detailsUser($_POST['email'], sha1($_POST['password']));


		$_SESSION['gestionDevisconnected'] = true;
		switch ($infos[0]['idRole']){
          	case 1:{
                $_SESSION['gestionDeviscommercial'] = true;
                echo 1;
                break;
          	}case 2:{
                $_SESSION['gestionDevisdgeneral'] = true;
                $_SESSION['niveau'] = 1;
                echo 2;
                break;
          	}case 3:{
              	$_SESSION['gestionDevisdcommercial'] = true;
              	echo 3;
            	break;
          	}case 4:{
              	$_SESSION['gestionDevisdaf'] = true;
              	echo 4;
            	break;
          	}case 5:{
              	$_SESSION['gestionDevisdclientele'] = true;
              	echo 5;
            	break;
          	}case 6:{
              	$_SESSION['gestionDevischefgroupe'] = true;
              	echo 6;
            	break;
          	}case 7:{
              	$_SESSION['gestionDevischefpub'] = true;
              	echo 7;
            	break;
          	}case 8:{
              	$_SESSION['gestionDevisresponsablemedia'] = true;
              	echo 8;
            	break;
          	}case 9:{
				//echo var_dump($_SESSION);
              	$_SESSION['gestionDevismedia'] = true; 
              	echo 9;
            	break;
          	}case 10:{
              	$_SESSION['gestionDevisresponsabledigital'] = true;
              	echo 10;
            	break;
          	}case 11:{
              	$_SESSION['gestionDevischefpubdigital'] = true;
              	echo 11;
            	break;
          	}case 12:{
              	$_SESSION['gestionDevischefgroupedigital'] = true;
              	echo 12;
            	break;
          	}
        }

		$_SESSION['gestionDevisidUser'] = $infos[0]['idUser'];
		$_SESSION['gestionDevisemail'] = $infos[0]['email'];
		$_SESSION['gestionDevispassword'] = $infos[0]['password'];
		$_SESSION['gestionDevisprenom'] = $infos[0]['prenom'];
		$_SESSION['gestionDevisnom'] = $infos[0]['nom'];
		$_SESSION['gestionDevistelephone'] = $infos[0]['telephone'];
		$_SESSION['gestionDevisadresse'] = $infos[0]['adresse'];
		$_SESSION['gestionDevisidRole'] = $infos[0]['idRole'];
		$_SESSION['gestionDevisidAgence'] = $infos[0]['idAgence'];
		$_SESSION['gestionDevisphoto'] = $infos[0]['photo'];
        $_SESSION['gestionDevisprofil'] = $infos[0]['profil'];
		// echo 1;
	}
	else {
		echo 0;
	}
	
		// echo 1;
		// $_SESSION['gestionDevisidCompte'] = 1;
		// $_SESSION['gestionDevislogin'] = "koro";
		// $_SESSION['gestionDevispassword'] = "";
		// $_SESSION['gestionDevisidUser'] = 1;
		// $_SESSION['gestionDevisidRole'] = 1;
		// $_SESSION['gestionDevisidStructure'] = 1;
		// $_SESSION['gestionDevisetat'] = 1;
		// $_SESSION['gestionDevisnom'] = "Nom";
		// $_SESSION['gestionDevisprenom'] = "Prenom";
		// $_SESSION['gestionDevisemail'] = "email@site.com";
		// $_SESSION['gestionDevisadresse'] = "Mon adresse";
		// $_SESSION['gestionDevistelephone'] = "";
		// $_SESSION['gestionDevisphoto'] = "";
		// $_SESSION['gestionDevisprofile'] = "";
		// $_SESSION['gestionDevisetatCompte'] = 1;
		// $_SESSION['gestionDevisisRegistered'] = 1;
		// $_SESSION['gestionDeviscommercial'] = true;
		// $_SESSION['gestionDevisconnected'] = true;
	
	
?>
















