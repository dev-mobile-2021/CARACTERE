<?php
    @session_start();  
    if(!isset($_SESSION['gestionDevisconnected'])){
        header("location:index.php");
    }
    header('Content-type: text/html; charset=UTF-8');
    // header('Content-type: text/html; charset=ISO-8859-1');
    define("A_VALIDER", 1);
    define("VALIDE", 2);
    define("VALIDE_PAR_LE_CLIENT", 3);
    define("BC_RECU", 4);
    define("LIVRE", 5);
    // define("GREETING", 6);
    // define("GREETING", 7);
    define("ANNULE", 8);
    // define("GREETING", 9);
    // define("GREETING", 10);
    // define("GREETING", 11);
    // define("GREETING", 12);
    // define("GREETING", 13);
    // define("GREETING", 14);
    define("COMMENTE", 15);

?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <!-- <meta charset="utf-8"> -->
  <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Gestion Devis | Application de gestion de devis</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="bower_components/select2/dist/css/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="plugins/sw/sweetalert.css">
  <script src="plugins/sw/sweetalert.min.js"></script>
  <link href="dist/css/css-loader.css" type="text/css" rel="stylesheet">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>


<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>G</b>D</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Gestion </b>Devis</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php if(!empty($_SESSION['gestionDevisphoto'])) echo $_SESSION['gestionDevisphoto']; else echo 'dist/img/user2-160x160.png' ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $_SESSION['gestionDevisprenom']." ".$_SESSION['gestionDevisnom'] ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php if(!empty($_SESSION['gestionDevisphoto'])) echo $_SESSION['gestionDevisphoto']; else echo 'dist/img/user2-160x160.png' ?>" class="img-circle" alt="User Image">

                <p>
                  <?php echo $_SESSION['gestionDevisprenom']." ".$_SESSION['gestionDevisnom'] ?><br>
                  <?php echo $_SESSION['gestionDevisprofil'] ?>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-12 text-center">
                    <a href="#">Changer mot de passe</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="Dashboard" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="deconnexion.php" class="btn btn-default btn-flat">D&eacute;connexion</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php if(!empty($_SESSION['gestionDevisphoto'])) echo $_SESSION['gestionDevisphoto']; else echo 'dist/img/user2-160x160.png' ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['gestionDevisprenom']." ".$_SESSION['gestionDevisnom'] ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> En ligne</a>
        </div>
      </div>
      <!-- search form -->
      <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Recherche...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <?php
        $URL = $_SERVER['REQUEST_URI'];
        $URL = str_replace('/caractere/', "", $URL);
        $tableau_chemin = explode("_",$URL);
      ?>

      <?php
        require_once('php/classe/classeDevis.php');
        $Devis = new Devis();

        if(isset($_SESSION['gestionDeviscommercial'])){
          $nbDevisAValider = $Devis->nbDevisEtat($_SESSION['gestionDevisidUser'], A_VALIDER, "");
          $nbDevisAValider = count($nbDevisAValider);

          $nbDevisAttenteBC = $Devis->nbDevisEtat($_SESSION['gestionDevisidUser'], LIVRE, "AND idDevis NOT IN (SELECT idDevis FROM devisbc WHERE etat = 1)");
          $nbDevisAttenteBC = count($nbDevisAttenteBC);

        }
        else if(isset($_SESSION['gestionDevisdaf'])){
          $nbDevisBC = $Devis->nbAllDevisEtat(LIVRE, "AND idDevis IN (SELECT idDevis FROM devisbc WHERE etat = 1)");
          $nbDevisBC = count($nbDevisBC);


          $nbDevisSansBC = $Devis->nbAllDevisEtat(LIVRE, "AND idDevis NOT IN (SELECT idDevis FROM devisbc WHERE etat = 1)");
          $nbDevisSansBC = count($nbDevisSansBC);
          

        }
        else{
          $nbDevisAValider = $Devis->nbAllDevisEtat(A_VALIDER, "");
          $nbDevisAValider = count($nbDevisAValider);

        }

        
      ?>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU</li>
        <?php if(isset($_SESSION['gestionDevisdgeneral'])){ ?>
          <li class="<?php if(stristr($tableau_chemin[0], "user") !== false) echo "active bold" ?>">
            <a href="user_liste">
              <i class="fa fa-user"></i> <span>Utilisateurs</span>
              <span class="pull-right-container">
              </span>
            </a>
          </li>

          <li class="<?php if(stristr($tableau_chemin[0], "statistique") !== false) echo "active bold" ?>">
            <a href="statistique_liste">
              <i class="fa fa-bar-chart"></i> <span>Statistiques</span>
              <span class="pull-right-container">
              </span>
            </a>
          </li>
        <?php } ?>
        <!-- <li class="<?php //if(stristr($tableau_chemin[0], "role") !== false) echo "active bold" ?>">
          <a href="role_liste">
            <i class="fa fa-user"></i> <span>Roles</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li> -->
        <!-- <li class="<?php //if(stristr($tableau_chemin[0], "role") !== false) echo "active bold" ?>">
          <a href="role_privileges">
            <i class="fa fa-user"></i> <span>Privil&egrave;ges roles</span>
            <span class="pull-right-container">
            </span>
          </a>

        </li> -->
        <?php if(!isset($_SESSION['gestionDevisdaf'])){ ?>

          <li class="<?php if(stristr($tableau_chemin[0], "client") !== false) echo "active bold" ?>">
            <a href="client_liste">
              <i class="fa fa-male"></i> <span>Clients</span>
              <span class="pull-right-container">
              </span>
            </a>
          </li>
          <li class="<?php if(stristr($tableau_chemin[0], "fournisseur") !== false) echo "active bold" ?>">
            <a href="fournisseur_liste">
              <i class="fa fa-male"></i> <span>fournisseurs</span>
              <span class="pull-right-container">
              </span>
            </a>
          </li>
           <li class="<?php if(stristr($tableau_chemin[0], "contact") !== false) echo "active bold" ?>">
            <a href="contact_liste">
              <i class="fa fa-male"></i> <span>Contacts</span>
              <span class="pull-right-container">
              </span>
            </a>
          </li>
          <li class="<?php if(stristr($tableau_chemin[0], "rubrique") !== false) echo "active bold" ?>">
            <a href="rubrique_liste">
              <i class="fa fa-tags"></i> <span>Rubriques</span>
              <span class="pull-right-container">
              </span>
            </a>
          </li>
          <li class="<?php if(stristr($tableau_chemin[0], "famille") !== false) echo "active bold" ?>">
            <a href="famille_liste">
              <i class="fa fa-tags"></i> <span>Types service</span>
              <span class="pull-right-container">
              </span>
            </a>
          </li>
          <li class="treeview <?php if(stristr($tableau_chemin[0], "service") !== false) echo "active bold" ?>">
            <a href="#">
              <i class="fa fa-cloud"></i> <span>Services</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="<?php if(stristr($tableau_chemin[0], "service") !== false && stristr($tableau_chemin[0], "typeservice") !== false) echo "active bold" ?>"><a href="typeservice_liste"><i class="fa fa-circle-o"></i>Descriptifs</a></li>
              <!-- <li class="<?php if(stristr($tableau_chemin[0], "service") !== false && stristr($tableau_chemin[0], "service") !== false && stristr($tableau_chemin[0], "typeservice") == false) echo "active bold" ?>"><a href="service_liste"><i class="fa fa-circle-o"></i>Descriptifs</a></li> -->
            </ul>
          </li>
          <li class="treeview <?php if(stristr($tableau_chemin[0], "devis") !== false) echo "active bold" ?>">
            <a href="#">
              <i class="fa fa-file-text"></i> <span>Devis</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="<?php if(stristr($tableau_chemin[0], "devis") !== false && stristr($tableau_chemin[1], "liste") !== false && stristr($tableau_chemin[1], "listeavalider") == false) echo "active bold" ?>"><a href="devis_liste"><i class="fa fa-circle-o"></i><?php if(isset($_SESSION['gestionDeviscommercial'])) echo "Mes devis"; else echo "Liste Devis" ?></a></li>
              <li class="<?php if(stristr($tableau_chemin[0], "devis") !== false && stristr($tableau_chemin[1], "listeavalider") !== false) echo "active bold" ?>"><a href="devis_listeavalider"><i class="fa fa-circle-o"></i>A valider &nbsp;<span class="label pull-right" style="background-color: <?php if($nbDevisAValider == 0) echo "#3fa913"; else echo "red"; ?>; color:white"><?php echo $nbDevisAValider; ?></span></a></li>
              
              <!-- <li class="<?php //if(stristr($tableau_chemin[0], "devis") !== false && stristr($tableau_chemin[1], "listeavalider") !== false) echo "active bold" ?>">
                <a href="devis_listeavalider">
                  <i class="fa fa-circle-o"></i>
                  Attente validation client &nbsp;
                  <span class="label pull-right" style="background-color: <?php //if($nbDevis == 0) echo "#3fa913"; else echo "red"; ?>; color:white"><?php //echo $nbDevis; ?></span>
                </a>
              </li>
              
              <li class="<?php //if(stristr($tableau_chemin[0], "devis") !== false && stristr($tableau_chemin[1], "listeavalider") !== false) echo "active bold" ?>">
                <a href="devis_listeavalider">
                  <i class="fa fa-circle-o"></i>
                  Valid&eacute; par le client &nbsp;
                  <span class="label pull-right" style="background-color: <?php //if($nbDevis == 0) echo "#3fa913"; else echo "red"; ?>; color:white"><?php //echo $nbDevis; ?></span>
                </a>
              </li>
              
              <li class="<?php //if(stristr($tableau_chemin[0], "devis") !== false && stristr($tableau_chemin[1], "listeavalider") !== false) echo "active bold" ?>">
                <a href="devis_listeavalider">
                  <i class="fa fa-circle-o"></i>
                  Attente de livraison &nbsp;
                  <span class="label pull-right" style="background-color: <?php //if($nbDevis == 0) echo "#3fa913"; else echo "red"; ?>; color:white"><?php //echo $nbDevis; ?></span>
                </a>
              </li> -->
              <?php if(isset($_SESSION['gestionDeviscommercial'])){ ?>
                <li class="<?php if(stristr($tableau_chemin[0], "devis") !== false && stristr($tableau_chemin[1], "listeattentebc") !== false) echo "active bold" ?>">
                  <a href="devis_listeattentebc">
                    <i class="fa fa-circle-o"></i>
                    Livr&eacute; en attente de BC &nbsp;
                    <span class="label pull-right" style="background-color: <?php if($nbDevisAttenteBC == 0) echo "#3fa913"; else echo "red"; ?>; color:white"><?php echo $nbDevisAttenteBC; ?></span>
                  </a>
                </li>
              <?php } ?>
             <!--  <li class="<?php //if(stristr($tableau_chemin[0], "devis") !== false && stristr($tableau_chemin[1], "listeavalider") !== false) echo "active bold" ?>">
                <a href="devis_listeavalider">
                  <i class="fa fa-circle-o"></i>
                  A corriger &nbsp;
                  <span class="label pull-right" style="background-color: <?php //if($nbDevis == 0) echo "#3fa913"; else echo "red"; ?>; color:white"><?php //echo $nbDevis; ?></span>
                </a>
              </li>

              <li class="<?php //if(stristr($tableau_chemin[0], "devis") !== false && stristr($tableau_chemin[1], "listeavalider") !== false) echo "active bold" ?>">
                <a href="devis_listeavalider">
                  <i class="fa fa-circle-o"></i>
                  Livr&eacute; &nbsp;
                  <span class="label pull-right" style="background-color: <?php //if($nbDevis == 0) echo "#3fa913"; else echo "red"; ?>; color:white"><?php //echo $nbDevis; ?></span>
                </a>
              </li> -->
              
              
              
              
              <li class="<?php if(stristr($tableau_chemin[0], "devis") !== false && stristr($tableau_chemin[1], "ajouter") !== false) echo "active bold" ?>"><a href="devis_ajouter"><i class="fa fa-circle-o"></i>Nouveau devis</a></li>
            </ul>
          </li>
          <?php } ?>
        <?php if(isset($_SESSION['gestionDevisdaf'])){ ?>
          <li class="treeview <?php if(stristr($tableau_chemin[0], "facture") !== false) echo "active bold" ?>">
            <a href="#">
              <i class="fa fa-file-text"></i> <span>Factures</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="<?php if(stristr($tableau_chemin[0], "facture") !== false && stristr($tableau_chemin[1], "listeafacturerbc") !== false) echo "active bold" ?>">
                <a href="facture_listeafacturerbc"><i class="fa fa-circle-o"></i>
                  A facturer (Avec BC) &nbsp;
                  <span class="label pull-right" style="background-color: <?php if($nbDevisBC == 0) echo "#3fa913"; else echo "red"; ?>; color:white"><?php echo $nbDevisBC; ?></span>
                </a>
              </li>
              <li class="<?php if(stristr($tableau_chemin[0], "facture") !== false && stristr($tableau_chemin[1], "listeafacturersansbc") !== false) echo "active bold" ?>">
                <a href="facture_listeafacturersansbc"><i class="fa fa-circle-o"></i>
                  A facturer (Attente BC) &nbsp;
                  <span class="label pull-right" style="background-color: <?php if($nbDevisSansBC == 0) echo "#3fa913"; else echo "red"; ?>; color:white"><?php echo $nbDevisSansBC; ?></span>
                </a>
              </li>
              
              <li class="<?php if(stristr($tableau_chemin[0], "facture") !== false && stristr($tableau_chemin[1], "listefactures") !== false) echo "active bold" ?>">
                <a href="facture_listefactures"><i class="fa fa-circle-o"></i>Mes factures</a>
              </li>

              <li class="<?php if(stristr($tableau_chemin[0], "facture") !== false && stristr($tableau_chemin[1], "etat") !== false) echo "active bold" ?>">
                <a href="facture_etat"><i class="fa fa-circle-o"></i>Etat</a>
              </li>
            </ul>
          </li>
        <?php } ?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
 
  <?php
    $tab["menu"]["Dashboard"] = 1;
    $tab["menu"]["Profile"] = 1;


    $tab["menu"]["user"]["liste"] = 1;
    $tab["menu"]["user"]["ajouter"] = 1;
    $tab["menu"]["user"]["modifier"] = 1;
    $tab["menu"]["user"]["supprimer"] = 1;
    $tab["menu"]["user"]["resetPassword"] = 1;
    
    $tab["menu"]["client"]["liste"] = 1;
    $tab["menu"]["client"]["ajouter"] = 1;
    $tab["menu"]["client"]["modifier"] = 1;
    $tab["menu"]["client"]["supprimer"] = 1;

    $tab["menu"]["fournisseur"]["liste"] = 1;
    $tab["menu"]["fournisseur"]["ajouter"] = 1;
    $tab["menu"]["fournisseur"]["modifier"] = 1;
    $tab["menu"]["fournisseur"]["supprimer"] = 1;
    
    $tab["menu"]["contact"]["liste"] = 1;
    $tab["menu"]["contact"]["ajouter"] = 1;
    $tab["menu"]["contact"]["modifier"] = 1;
    $tab["menu"]["contact"]["supprimer"] = 1;
    
    $tab["menu"]["role"]["liste"] = 1;
    $tab["menu"]["role"]["privileges"] = 1;
    $tab["menu"]["role"]["ajouter"] = 1;
    $tab["menu"]["role"]["modifier"] = 1;
    $tab["menu"]["role"]["supprimer"] = 1;
    
    $tab["menu"]["rubrique"]["liste"] = 1;
    $tab["menu"]["rubrique"]["ajouter"] = 1;
    $tab["menu"]["rubrique"]["modifier"] = 1;
    $tab["menu"]["rubrique"]["supprimer"] = 1;
    
    $tab["menu"]["service"]["liste"] = 1;
    $tab["menu"]["service"]["ajouter"] = 1;
    $tab["menu"]["service"]["modifier"] = 1;
    $tab["menu"]["service"]["supprimer"] = 1;
    
    $tab["menu"]["typeservice"]["liste"] = 1;
    $tab["menu"]["typeservice"]["ajouter"] = 1;
    $tab["menu"]["typeservice"]["modifier"] = 1;
    $tab["menu"]["typeservice"]["supprimer"] = 1;
    
    $tab["menu"]["famille"]["liste"] = 1;
    $tab["menu"]["famille"]["ajouter"] = 1;
    $tab["menu"]["famille"]["modifier"] = 1;
    $tab["menu"]["famille"]["supprimer"] = 1;
    
    $tab["menu"]["devis"]["liste"] = 1;
    $tab["menu"]["devis"]["listeavalider"] = 1;
    $tab["menu"]["devis"]["listeattentebc"] = 1;
    $tab["menu"]["devis"]["ajouter"] = 1;
    $tab["menu"]["devis"]["modifier"] = 1;
    $tab["menu"]["devis"]["supprimer"] = 1;

    $tab["menu"]["statistique"]["mensuelclient"] = 1;
    $tab["menu"]["statistique"]["cumulclient"] = 1;
    $tab["menu"]["statistique"]["analyse"] = 1;
    $tab["menu"]["statistique"]["tableaumarge"] = 1;
    $tab["menu"]["statistique"]["mensuelproduit"] = 1;
    $tab["menu"]["statistique"]["cumulproduit"] = 1;
    $tab["menu"]["statistique"]["ajouter"] = 1;
    $tab["menu"]["statistique"]["modifier"] = 1;
    $tab["menu"]["statistique"]["liste"] = 1;
    
    $tab["menu"]["bon"]["liste"] = 1;
    $tab["menu"]["bon"]["listeavalider"] = 1;
    $tab["menu"]["bon"]["ajouter"] = 1;
    $tab["menu"]["bon"]["modifier"] = 1;
    $tab["menu"]["bon"]["supprimer"] = 1;
    
    $tab["menu"]["facture"]["liste"] = 1;
    $tab["menu"]["facture"]["listeafacturerbc"] = 1;
    $tab["menu"]["facture"]["listeafacturersansbc"] = 1;
    $tab["menu"]["facture"]["listefactures"] = 1;
    $tab["menu"]["facture"]["etat"] = 1;
    $tab["menu"]["facture"]["ajouter"] = 1;
    $tab["menu"]["facture"]["modifier"] = 1;
    $tab["menu"]["facture"]["supprimer"] = 1;
    
    $tab["menu"]["societe"]["liste"] = 1;
    $tab["menu"]["societe"]["ajouter"] = 1;
    $tab["menu"]["societe"]["modifier"] = 1;
    $tab["menu"]["societe"]["supprimer"] = 1;
    
    $tab["menu"]["base"]["liste"] = 1;
    $tab["menu"]["base"]["ajouter"] = 1;
    $tab["menu"]["base"]["modifier"] = 1;
    $tab["menu"]["base"]["supprimer"] = 1;
    
    


    $URL = $_SERVER['REQUEST_URI'];
    $URL = str_replace('/caractere/', "", $URL);

    $tableau_chemin = explode("_",$URL);
    $taille = sizeof($tableau_chemin);
    // echo $tableau_chemin[0]." espave ".$tableau_chemin[1]." espave ".$taille;
    switch ($taille){
      case 1:{
            $a = !empty($tab["menu"][$tableau_chemin[0]]);
            if($a==1)
                include('php/view/home/'.$tableau_chemin[0].'.php');
            break;
      }case 2:{
            $tab1 = explode('-', $tableau_chemin[1]);
            $a = !empty($tab["menu"][$tableau_chemin[0]][$tab1[0]]);
              if($a==1){
                $opt = $tableau_chemin[1];
                include('php/controller/'.$tableau_chemin[0].'.php');
              }
            break;
      }case 3:{
          $a = !empty($tab["menu"][$tableau_chemin[0]][$tableau_chemin[1]]);

          $opt = $tableau_chemin[2];
          if($a==1){
              include('php/controller/'.$tableau_chemin[1].'.php');
          }
        break;
      }
    }
  ?>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; <?php echo date("Y"); ?> <a href="javascript:void(0);">Gestion Devis</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->


<!-- Select2 -->
<script src="bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="plugins/input-mask/jquery.inputmask.js"></script>
<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/moment/fr.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap color picker -->
<script src="bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2();

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    
    $('.datepicker').datepicker({
      autoclose: true,
      format: 'dd/mm/yyyy',
      // locale: 'fr'
    }).datepicker("setDate", new Date())

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>
<script>
  $(function () {
    $("#example1").DataTable({
      responsive: true,
      'ordering'    : false,

    });
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    });

    $("#example1_filter").css("text-align", "right");
    $("#example1_paginate").css("text-align", "right");
  })
</script>
</body>
</html>
