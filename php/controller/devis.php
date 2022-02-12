<?php
@session_start();
require_once('functions.php');

function matricule($table, $champs)
{
  require_once('../classe/classeConnexion.php');
  // $moisAnnee = "RFC".date("m").date("Y");
  $requete = Connexion::Connect()->query("SELECT $champs FROM $table ORDER BY $champs DESC LIMIT 0,1;");
  $result = "0";
  foreach ($requete as $donne)
    $result = $donne[0];
  if ($result == "0")
    return ("0");
  else
    return ($result);
}

function matriculeService($table, $champs)
{
  require_once('../classe/classeConnexion.php');
  $moisAnnee = "SR" . date("m") . date("Y");
  $requete = Connexion::Connect()->query("SELECT $champs FROM $table WHERE referenceService LIKE \"%$moisAnnee%\" ORDER BY $champs DESC LIMIT 0,1;");
  $result = "0";
  foreach ($requete as $donne)
    $result = $donne[0];
  if ($result == "0")
    return ("0");
  else
    return ($result);
}

function sendEmailResetPassword($sujet, $mailDestinataire, $contenu)
{
  if (mail($mailDestinataire, $sujet, $contenu)) {
    echo 1;
  } else {
    echo 0;
  }
}

if (isset($_GET['changerEtat'])) {
  require_once("../classe/classeDevis.php");
  $Id = htmlentities(htmlspecialchars($_GET['changerEtat']), ENT_SUBSTITUTE);
  $etat = htmlentities(htmlspecialchars($_GET['etat']), ENT_SUBSTITUTE);
  $str = explode("$", $Id);
  $a = 0;
  $objet = new Devis();
  foreach ($str as $ide) {
    $a = $objet->changeState($ide, $etat);
  }
  echo $a;
  // header("location: index.php");
} else if (isset($_GET['resetPassword'])) {
  require_once("../classe/classeDevis.php");
  $Id = htmlentities(htmlspecialchars($_GET['resetPassword']), ENT_SUBSTITUTE);
  $str = explode("$", $Id);
  $a = 0;
  $objet = new Devis();
  foreach ($str as $ide) {
    $a = $objet->resetPassword($ide);
  }
  $res = explode("$", $a);
  //echo $res[0];
  $sujet = "Reinitialisation de votre mot de passe Gilab MS";
  $mailDestinataire = $res[2];
  // echo $res[2];
  $contenu = "Votre nouveau mot de passe est : " . $res[1];
  sendEmailResetPassword($sujet, $mailDestinataire, $contenu);
  // header("location: index.php");
} else if (isset($_GET['supprimer'])) {
  require_once("../classe/classeDevis.php");
  $Id = htmlentities(htmlspecialchars($_GET['supprimer']), ENT_SUBSTITUTE);
  $str = explode("$", $Id);
  $a = 0;
  $objet = new Devis();
  foreach ($str as $ide) {
    $a = $objet->deleteDevis($ide);
  }
  echo $a;
  // header("location: index.php");
} else if (isset($_GET['supprimerFamille'])) {
  require_once("../classe/classeDevis.php");
  $Devis = new Devis();

  $idDevis = $_GET['idDevis'];
  $idRubrique = $_GET['idRubrique'];
  $idFamille = $_GET['idFamille'];
  $res = $Devis->deleteFamille($idDevis, $idRubrique, $idFamille);
  echo $res;
} else if (isset($_GET['supprimerTypeService'])) {
  require_once("../classe/classeDevis.php");
  $Devis = new Devis();

  $idDevis = $_GET['idDevis'];
  $idRubrique = $_GET['idRubrique'];
  $idFamille = $_GET['idFamille'];
  $idTypeservice = $_GET['idTypeservice'];
  $res = $Devis->deleteTypeServiceDevis($idDevis, $idRubrique, $idFamille, $idTypeservice);
  echo $res;
} else if (isset($_GET['supprimerService'])) {
  require_once("../classe/classeDevis.php");
  $Devis = new Devis();

  $idDevis = $_GET['idDevis'];
  $idRubrique = $_GET['idRubrique'];
  $idFamille = $_GET['idFamille'];
  $idTypeservice = $_GET['idTypeservice'];
  $idServiceMod = $_GET['idServiceMod'];
  $res = $Devis->deleteServiceDevis($idDevis, $idRubrique, $idFamille, $idTypeservice, $idServiceMod);
  if ($res == 1) {
    echo $res . "#res#";
    $listService = array();
    $requeteService = Connexion::Connect()->query("
              SELECT s.idService, s.service, d.quantite, d.prixVente, d.prixAchat
              FROM service s, typeservice t, detailsdevis d
              WHERE s.idService = d.idService
              AND t.idTypeservice = d.idTypeservice
              AND t.idTypeservice = \"$idTypeservice\"
              AND idDevis = \"$idDevis\"
                ");
    foreach ($requeteService as $donnee) {
      $listService[] = $donnee;
    }
    foreach ($listService as $valueService) {
      $idService = $valueService['idService'];
      ?>

      <div onclick="updateSavedLine(<?php echo $valueService['idService'] ?>, <?php echo intval($valueService['prixAchat']) ?>, <?php echo intval($valueService['prixVente']) ?>, <?php echo intval($valueService['quantite']) ?>, <?php echo $idDevis ?>, <?php echo $idRubrique ?>, <?php echo $idFamille ?>, <?php echo $idTypeservice ?>)" data-toggle="tooltip" title="Cliquez pour modifier" class="row ligneSousService" id="<?php echo $valueService['idService'] ?>" style="margin-left: 0px; margin-right: 0px; margin: 5px 0px 5px 0px;">
        <div class="col-md-10" style="padding-right: 0px;">
          <div class="col-md-3" style="padding-left: 0px;"><?php echo $valueService['service'] ?></div>
          <div class="col-md-3" style="padding-left: 0px; text-align:right;"><?php echo number_format(intval($valueService['prixAchat']), 0, ',', ' ') ?> F</div>
          <div class="col-md-3" style="padding-left: 0px; text-align:right;"><?php echo number_format(intval($valueService['prixVente']), 0, ',', ' ') ?> F</div>
          <div class="col-md-3" style="padding-left: 0px; text-align:right;"><?php echo intval($valueService['quantite']) ?></div>
        </div>
        <div class="col-md-2" style="padding-right: 0px;">
          <div class="col-md-12 montantSousService" data-value="<?php echo intval($valueService['prixVente']) * intval($valueService['quantite']) ?>" style="padding-left: 0px; text-align:right;"><?php echo number_format(intval($valueService['prixVente']) * intval($valueService['quantite']), 0, ',', ' ') ?> F</div>
        </div>
      </div>


    <?php }
      } else {
        echo $res . "#res#none";
      }
    } else if (isset($_GET['modifierService'])) {
      require_once("../classe/classeDevis.php");
      $Devis = new Devis();

      $idDevis = $_GET['idDevis'];
      $idRubrique = $_GET['idRubrique'];
      $idFamille = $_GET['idFamille'];
      $idTypeservice = $_GET['idTypeservice'];
      $idServiceMod = $_GET['idServiceMod'];
      $prixAchat = intval($_GET['prixAchat']);
      $prixVente = intval($_GET['prixVente']);
      $quantite = intval($_GET['quantite']);
      $res = $Devis->updateService($idDevis, $idRubrique, $idFamille, $idTypeservice, $idServiceMod, $prixAchat, $prixVente, $quantite);
      if ($res == 1) {
        $listService = array();
        $requeteService = Connexion::Connect()->query("
              SELECT s.idService, s.service, d.quantite, d.prixVente, d.prixAchat
              FROM service s, typeservice t, detailsdevis d
              WHERE s.idService = d.idService
              AND t.idTypeservice = d.idTypeservice
              AND t.idTypeservice = \"$idTypeservice\"
              AND idDevis = \"$idDevis\"
                ");
        foreach ($requeteService as $donnee) {
          $listService[] = $donnee;
        }
        foreach ($listService as $valueService) {
          $idService = $valueService['idService'];
          ?>

      <div onclick="updateSavedLine(<?php echo $valueService['idService'] ?>, <?php echo intval($valueService['prixAchat']) ?>, <?php echo intval($valueService['prixVente']) ?>, <?php echo intval($valueService['quantite']) ?>, <?php echo $idDevis ?>, <?php echo $idRubrique ?>, <?php echo $idFamille ?>, <?php echo $idTypeservice ?>)" data-toggle="tooltip" title="Cliquez pour modifier" class="row ligneSousService" id="<?php echo $valueService['idService'] ?>" style="margin-left: 0px; margin-right: 0px; margin: 5px 0px 5px 0px;">
        <div class="col-md-10" style="padding-right: 0px;">
          <div class="col-md-3" style="padding-left: 0px;"><?php echo $valueService['service'] ?></div>
          <div class="col-md-3" style="padding-left: 0px; text-align:right;"><?php echo number_format(intval($valueService['prixAchat']), 0, ',', ' ') ?> F</div>
          <div class="col-md-3" style="padding-left: 0px; text-align:right;"><?php echo number_format(intval($valueService['prixVente']), 0, ',', ' ') ?> F</div>
          <div class="col-md-3" style="padding-left: 0px; text-align:right;"><?php echo intval($valueService['quantite']) ?></div>
        </div>
        <div class="col-md-2" style="padding-right: 0px;">
          <div class="col-md-12 montantSousService" data-value="<?php echo intval($valueService['prixVente']) * intval($valueService['quantite']) ?>" style="padding-left: 0px; text-align:right;"><?php echo number_format(intval($valueService['prixVente']) * intval($valueService['quantite']), 0, ',', ' ') ?> F</div>
        </div>
      </div>


    <?php }
      } else {
        echo $res;
      }
    } else if (isset($_GET['ajouterService'])) {
      require_once("../classe/classeDevis.php");
      $Devis = new Devis();

      $idDevis = $_GET['idDevis'];
      $idRubrique = $_GET['idRubrique'];
      $idFamille = $_GET['idFamille'];
      $idTypeservice = $_GET['idTypeservice'];
      $idService = $_GET['idService'];
      $prixAchat = intval($_GET['prixAchat']);
      $prixVente = intval($_GET['prixVente']);
      $quantite = intval($_GET['quantite']);

      // $idFournisseur = $_GET['idFournisseur'];

      $res = $Devis->addServiceDevis($idDevis, $idRubrique, $idFamille, $idTypeservice, $idService,  $prixAchat, $prixVente, $quantite);
      if ($res == 1) {
        $listService = array();
        $requeteService = Connexion::Connect()->query("
              SELECT s.idService, s.service, d.quantite, d.prixVente, d.prixAchat
              FROM service s, typeservice t, detailsdevis d
              WHERE s.idService = d.idService
              AND t.idTypeservice = d.idTypeservice
              AND t.idTypeservice = \"$idTypeservice\"
              AND idDevis = \"$idDevis\"
                ");
        foreach ($requeteService as $donnee) {
          $listService[] = $donnee;
        }
        foreach ($listService as $valueService) {
          $idService = $valueService['idService'];
          ?>

      <div onclick="updateSavedLine(<?php echo $valueService['idService'] ?>, <?php echo intval($valueService['prixAchat']) ?>, <?php echo intval($valueService['prixVente']) ?>, <?php echo intval($valueService['quantite']) ?>, <?php echo $idDevis ?>, <?php echo $idRubrique ?>, <?php echo $idFamille ?>, <?php echo $idTypeservice ?>)" data-toggle="tooltip" title="Cliquez pour modifier" class="row ligneSousService" id="<?php echo $valueService['idService'] ?>" style="margin-left: 0px; margin-right: 0px; margin: 5px 0px 5px 0px;">
        <div class="col-md-10" style="padding-right: 0px;">
          <div class="col-md-3" style="padding-left: 0px;"><?php echo $valueService['service'] ?></div>
          <div class="col-md-3" style="padding-left: 0px; text-align:right;"><?php echo number_format(intval($valueService['prixAchat']), 0, ',', ' ') ?> F</div>
          <div class="col-md-3" style="padding-left: 0px; text-align:right;"><?php echo number_format(intval($valueService['prixVente']), 0, ',', ' ') ?> F</div>
          <div class="col-md-3" style="padding-left: 0px; text-align:right;"><?php echo intval($valueService['quantite']) ?></div>
        </div>
        <div class="col-md-2" style="padding-right: 0px;">
          <div class="col-md-12 montantSousService" data-value="<?php echo intval($valueService['prixVente']) * intval($valueService['quantite']) ?>" style="padding-left: 0px; text-align:right;"><?php echo number_format(intval($valueService['prixVente']) * intval($valueService['quantite']), 0, ',', ' ') ?> F</div>
        </div>
      </div>


  <?php }
    } else {
      echo $res;
    }
  } else if (isset($_GET['reloadDetailDevis'])) {
    require_once("../classe/classeDevis.php");
    $Devis = new Devis();
    $idDevis = $_GET['idDevis'];
    $idRubrique = $_GET['idRubrique'];
    $idFamille = $_GET['idFamille'];
    $idTypeservice = $_GET['idTypeservice'];

    echo "1#res#";
    $requeteRubrique = Connexion::Connect()->query("
              SELECT r.idRubrique, r.rubrique, (SELECT SUM(somme) FROM vrubrique WHERE idRubrique = r.idRubrique AND idDevis = \"$idDevis\") as total 
              FROM rubrique r 
              WHERE r.idRubrique IN(SELECT idRubrique FROM detailsdevis WHERE idDevis = \"$idDevis\")  
          ");
    foreach ($requeteRubrique as $donnee) {
      $listRubrique[] = $donnee;
    }
    ?>
  <!-- Rubrique -->
  <?php $i = 0;
    foreach ($listRubrique as $valueRubrique) { ?>
    <div class="col-md-12" id="Rubrique<?php echo $valueRubrique['idRubrique'] ?>" data-id="<?php echo $valueRubrique['idRubrique'] ?>">
      <p id="ddRubrique<?php echo $valueRubrique['idRubrique'] ?>" data-value="<?php echo $valueRubrique['total'] ?>" style="background-color: #46a1dc; color: #fff; padding: 3px;"><span><?php echo $valueRubrique['rubrique'] ?></span><strong style="float: right;" id="ddRubriqueSomme<?php echo $valueRubrique['idRubrique'] ?>"><?php echo number_format($valueRubrique['total'], 0, ',', ' ') ?> F</strong></p>

      <!-- Famille -->
      <?php
          $idRubrique = $valueRubrique['idRubrique'];
          $listFamille = array();
          $requeteFamille = Connexion::Connect()->query("
                    SELECT DISTINCT(d.idFamille), f.famille FROM detailstypeservice d, famille f 
                    WHERE d.idDevis = \"$idDevis\" AND d.idRubrique = \"$idRubrique\" AND d.idFamille = f.idFamille
                  ");
          foreach ($requeteFamille as $donnee) {
            $listFamille[] = $donnee;
          }
          ?>
      <?php foreach ($listFamille as $valueFamille) {
            $idFamille = $valueFamille['idFamille']; ?>
        <div class="col-md-12" style="padding-left:0px; padding-right:0px;" data-id="<?php echo $valueFamille['idFamille'] ?>" data-rubrique="<?php echo $valueRubrique['total'] ?>" id="Famille<?php echo $valueFamille['idFamille'] ?>">
          <p style="background-color: #a1cbe6; color: #fff; padding: 3px;">
            <a href="javascript:void(0);" onclick="supprimerFamille(<?php echo $idRubrique ?>, <?php echo $idFamille ?>)" style="margin-left:10px; margin-right:10px;"><i style="color:#FF0000" class="glyphicon glyphicon-trash optionModSup" data-toggle="tooltip" title="Supprimer"></i> </a>
            <span><?php echo $valueFamille['famille'] ?></span>
          </p>
          <!-- Type service -->
          <?php
                $idRubrique = $valueRubrique['idRubrique'];
                $idFamille = $valueFamille['idFamille'];
                $listTypeservice = array();
                $requeteTypeservice = Connexion::Connect()->query("
                        SELECT t.idTypeservice, (SELECT typeService FROM typeservice WHERE idTypeservice = t.idTypeservice) as typeService, t.hasPrice, IF(t.hasPrice = 1, (SELECT prixVente*quantite FROM detailstypeservice WHERE idTypeservice = t.idTypeservice AND idRubrique = \"$idRubrique\" AND idDevis = \"$idDevis\"), (SELECT SUM(prixVente*quantite) FROM detailsdevis WHERE idTypeservice = t.idTypeservice AND idRubrique = \"$idRubrique\" AND idDevis = \"$idDevis\")) as somme, hasComment, commentaire 
                        FROM detailstypeservice t WHERE t.idTypeservice IN(SELECT idTypeservice FROM detailsdevis WHERE idRubrique = \"$idRubrique\") AND idDevis = \"$idDevis\" AND idFamille = \"$idFamille\" 
                          ");
                foreach ($requeteTypeservice as $donnee) {
                  $listTypeservice[] = $donnee;
                }
                ?>
          <?php foreach ($listTypeservice as $valueTypeservice) {
                  $idTypeservice = $valueTypeservice['idTypeservice']; ?>

            <div id="Typeservice<?php echo $valueTypeservice['idTypeservice'] ?>" data-rubrique="<?php echo $valueRubrique['idRubrique'] ?>" data-famille="<?php echo $valueFamille['idFamille'] ?>" class="col-md-12" style="padding-right:0px; padding-left:0px;">
              <!-- <p class="typeServiceUtilise<?php echo $valueFamille['idFamille'] ?>" data-value="<?php echo $valueTypeservice['idTypeservice'] ?>">

                          <a href="javascript:void(0);" onclick="modifierTypeservice(<?php echo $idRubrique ?>, <?php echo $idFamille ?>, <?php echo $idTypeservice ?>)"><i style = "color:#000000" class="glyphicon glyphicon-pencil optionModSup" data-toggle="tooltip" title="Modifier"></i> </a>

                            <a href="javascript:void(0);" onclick="supprimerTypeservice(<?php echo $idRubrique ?>, <?php echo $idFamille ?>, <?php echo $idTypeservice ?>)" style="margin-left:10px; margin-right:10px;"><i style = "color:#FF0000" class="glyphicon glyphicon-trash optionModSup" data-toggle="tooltip" title="Supprimer"></i> </a>

                          <strong><?php echo $valueTypeservice['typeService'] ?></strong>
                          <strong class="classTotalService" data-value="<?php echo $valueTypeservice['somme'] ?>" style="float: right; padding-right: 3px;"><?php echo number_format($valueTypeservice['somme'], 0, ',', ' ') ?> F</strong>
                        </p> -->


              <!-- Services -->
              <p>
                <?php
                        $listService = array();
                        $requeteService = Connexion::Connect()->query("
                              SELECT s.idService, s.service, d.quantite, d.prixVente, d.prixAchat
                              FROM service s, typeservice t, detailsdevis d
                              WHERE s.idService = d.idService
                              AND t.idTypeservice = d.idTypeservice
                              AND t.idTypeservice = \"$idTypeservice\"
                              AND idDevis = \"$idDevis\"
                                ");
                        foreach ($requeteService as $donnee) {
                          $listService[] = $donnee;
                        }
                        foreach ($listService as $valueService) {
                          $idService = $valueService['idService'];
                          ?>
                  <p>
                    <!-- <a href="javascript:void(0);" onclick="modifierService(<?php //echo $idRubrique 
                                                                                          ?>, <?php //echo $idFamille 
                                                                                                        ?>, <?php //echo $idTypeservice 
                                                                                                                      ?>, <?php //echo $idService 
                                                                                                                                    ?>, <?php //echo $idDevis 
                                                                                                                                                  ?>, <?php //echo intval($valueService['prixAchat']) 
                                                                                                                                                                                ?>, <?php //echo intval($valueService['prixVente']) 
                                                                                                                                                                                                            ?>, <?php //echo intval($valueService['quantite']) 
                                                                                                                                                                                                                                            ?>)" style="margin-left:10px"><i style = "color:#000000" class="glyphicon glyphicon-pencil optionModSup" data-toggle="tooltip" title="Modifier"></i> </a> -->

                    <a href="javascript:void(0);" onclick="supprimerService(<?php echo $idRubrique ?>, <?php echo $idFamille ?>, <?php echo $idTypeservice ?>, <?php echo $idService ?>, <?php echo $idDevis ?>, <?php echo intval($valueService['prixAchat']) ?>, <?php echo intval($valueService['prixVente']) ?>, <?php echo intval($valueService['quantite']) ?>)" style="margin-left:30px; margin-right:10px;"><i style="color:#FF0000" class="glyphicon glyphicon-trash optionModSup" data-toggle="tooltip" title="Supprimer"></i> </a>
                    <span>
                      <?php echo $valueService['service'] ?>
                    </span>
                    <span style="float: right; padding-right: 100px;">
                      <?php echo number_format(intval($valueService['quantite']) * intval($valueService['prixVente']), 0, ',', ' '); ?> F
                    </span>
                  </p>

                <?php } ?>
              </p>
              <!-- Fon service -->
            </div>
          <?php } ?>
          <!-- Fin type service -->
        </div>
      <?php } ?>
      <!-- Fin Famille -->
    </div>
  <?php } ?>
  <!-- Fin Rubrique -->
  <?php

  } else if (isset($_GET['addTypeService'])) {
    require_once("../classe/classeDevis.php");
    $Devis = new Devis();
    $req = "";

    $idDevis = $_GET['idDevis'];
    $idRubrique = $_GET['idRubrique'];
    $idFamille = $_GET['idFamille'];
    $idTypeservice = $_GET['idTypeservice'];
    $idDetailsTypeservice = $_GET['idDetailsTypeservice'];

    $etat = 1;

    $hasComment = 2;
    $commentaire = "";
    if ($_GET['idFournisseur'] != "") {
      $hasComment = 1;
      $commentaire = $_GET['idFournisseur'];
    }
    $hasPrice = 2;
    $prixAchatTypeService = 0;
    $prixVenteTypeService = 0;
    $quantiteTypeService = 0;
    if (intval($_GET['prixVenteService']) != 0) {
      $hasPrice = 1;
      $prixAchatTypeService = $_GET['prixAchatService'];
      $prixVenteTypeService = $_GET['prixVenteService'];
      $quantiteTypeService = $_GET['quantiteService'];
    }


    $req .= "
            UPDATE  detailstypeservice SET idTypeservice = " . $idTypeservice . ", hasComment = " . $hasComment . ", commentaire = '" . $commentaire . "', hasPrice = " . $hasPrice . ", prixAchat = " . $prixAchatTypeService . ", prixVente = " . $prixVenteTypeService . ", quantite = " . $quantiteTypeService . " WHERE idRubrique = " . $idRubrique . " AND idFamille = " . $idFamille . " AND idTypeservice = " . $idTypeservice . " AND idDevis = " . $idDevis . " AND id = " . $idDetailsTypeservice . ";
        ";
    $resultatRequete = $Devis->updateTypeservice($req);
    // $resultatRequete = 1;
    if ($resultatRequete == 1) {
      echo $resultatRequete . "#res#";
      $requeteRubrique = Connexion::Connect()->query("
              SELECT r.idRubrique, r.rubrique, (SELECT SUM(somme) FROM vrubrique WHERE idRubrique = r.idRubrique AND idDevis = \"$idDevis\") as total 
              FROM rubrique r 
              WHERE r.idRubrique IN(SELECT idRubrique FROM detailsdevis WHERE idDevis = \"$idDevis\")  
          ");
      foreach ($requeteRubrique as $donnee) {
        $listRubrique[] = $donnee;
      }
      ?>
    <!-- Rubrique -->
    <?php $i = 0;
        foreach ($listRubrique as $valueRubrique) { ?>
      <div class="col-md-12" id="Rubrique<?php echo $valueRubrique['idRubrique'] ?>" data-id="<?php echo $valueRubrique['idRubrique'] ?>">
        <p id="ddRubrique<?php echo $valueRubrique['idRubrique'] ?>" data-value="<?php echo $valueRubrique['total'] ?>" style="background-color: #46a1dc; color: #fff; padding: 3px;"><span><?php echo $valueRubrique['rubrique'] ?></span><strong style="float: right;" id="ddRubriqueSomme<?php echo $valueRubrique['idRubrique'] ?>"><?php echo number_format($valueRubrique['total'], 0, ',', ' ') ?> F</strong></p>

        <!-- Famille -->
        <?php
              $idRubrique = $valueRubrique['idRubrique'];
              $listFamille = array();
              $requeteFamille = Connexion::Connect()->query("
                    SELECT DISTINCT(d.idFamille), f.famille FROM detailstypeservice d, famille f 
                    WHERE d.idDevis = \"$idDevis\" AND d.idRubrique = \"$idRubrique\" AND d.idFamille = f.idFamille
                  ");
              foreach ($requeteFamille as $donnee) {
                $listFamille[] = $donnee;
              }
              ?>
        <?php foreach ($listFamille as $valueFamille) {
                $idFamille = $valueFamille['idFamille']; ?>
          <div class="col-md-12" style="padding-left:0px; padding-right:0px;" data-id="<?php echo $valueFamille['idFamille'] ?>" data-rubrique="<?php echo $valueRubrique['total'] ?>" id="Famille<?php echo $valueFamille['idFamille'] ?>">



            <p style="background-color: #a1cbe6; color: #fff; padding: 3px;">
              <a href="javascript:void(0);" onclick="supprimerFamille(<?php echo $idRubrique ?>, <?php echo $idFamille ?>)" style="margin-left:10px; margin-right:10px;"><i style="color:#FF0000" class="glyphicon glyphicon-trash optionModSup" data-toggle="tooltip" title="Supprimer"></i> </a>
              <span><?php echo $valueFamille['famille'] ?></span>
            </p>
            <!-- Type service -->
            <?php
                    $idRubrique = $valueRubrique['idRubrique'];
                    $idFamille = $valueFamille['idFamille'];
                    $listTypeservice = array();
                    $requeteTypeservice = Connexion::Connect()->query("
                        SELECT t.idTypeservice, (SELECT typeService FROM typeservice WHERE idTypeservice = t.idTypeservice) as typeService, t.hasPrice, IF(t.hasPrice = 1, (SELECT prixVente*quantite FROM detailstypeservice WHERE idTypeservice = t.idTypeservice AND idRubrique = \"$idRubrique\" AND idDevis = \"$idDevis\"), (SELECT SUM(prixVente*quantite) FROM detailsdevis WHERE idTypeservice = t.idTypeservice AND idRubrique = \"$idRubrique\" AND idDevis = \"$idDevis\")) as somme, hasComment, commentaire 
                        FROM detailstypeservice t WHERE t.idTypeservice IN(SELECT idTypeservice FROM detailsdevis WHERE idRubrique = \"$idRubrique\") AND idDevis = \"$idDevis\" AND idFamille = \"$idFamille\" 
                          ");
                    foreach ($requeteTypeservice as $donnee) {
                      $listTypeservice[] = $donnee;
                    }
                    ?>
            <?php foreach ($listTypeservice as $valueTypeservice) {
                      $idTypeservice = $valueTypeservice['idTypeservice']; ?>

              <div id="Typeservice<?php echo $valueTypeservice['idTypeservice'] ?>" data-rubrique="<?php echo $valueRubrique['idRubrique'] ?>" data-famille="<?php echo $valueFamille['idFamille'] ?>" class="col-md-12" style="padding-right:0px; padding-left:0px;">
                <!-- <p class="typeServiceUtilise<?php echo $valueFamille['idFamille'] ?>" data-value="<?php echo $valueTypeservice['idTypeservice'] ?>">

                          <a href="javascript:void(0);" onclick="modifierTypeservice(<?php echo $idRubrique ?>, <?php echo $idFamille ?>, <?php echo $idTypeservice ?>)"><i style = "color:#000000" class="glyphicon glyphicon-pencil optionModSup" data-toggle="tooltip" title="Modifier"></i> </a>

                            <a href="javascript:void(0);" onclick="supprimerTypeservice(<?php echo $idRubrique ?>, <?php echo $idFamille ?>, <?php echo $idTypeservice ?>)" style="margin-left:10px; margin-right:10px;"><i style = "color:#FF0000" class="glyphicon glyphicon-trash optionModSup" data-toggle="tooltip" title="Supprimer"></i> </a>

                          <strong><?php echo $valueTypeservice['typeService'] ?></strong>
                          <strong class="classTotalService" data-value="<?php echo $valueTypeservice['somme'] ?>" style="float: right; padding-right: 3px;"><?php echo number_format($valueTypeservice['somme'], 0, ',', ' ') ?> F</strong>
                        </p> -->


                <!-- Services -->
                <p>
                  <?php
                            $listService = array();
                            $requeteService = Connexion::Connect()->query("
                              SELECT s.idService, s.service, d.quantite, d.prixVente, d.prixAchat
                              FROM service s, typeservice t, detailsdevis d
                              WHERE s.idService = d.idService
                              AND t.idTypeservice = d.idTypeservice
                              AND t.idTypeservice = \"$idTypeservice\"
                              AND idDevis = \"$idDevis\"
                                ");
                            foreach ($requeteService as $donnee) {
                              $listService[] = $donnee;
                            }
                            foreach ($listSerGvice as $valueService) {
                              $idService = $valueService['idService'];
                              ?>
                    <p>
                      <!-- <a href="javascript:void(0);" onclick="modifierService(<?php //echo $idRubrique 
                                                                                              ?>, <?php //echo $idFamille 
                                                                                                              ?>, <?php //echo $idTypeservice 
                                                                                                                              ?>, <?php //echo $idService 
                                                                                                                                              ?>, <?php //echo $idDevis 
                                                                                                                                                              ?>, <?php //echo intval($valueService['prixAchat']) 
                                                                                                                                                                                            ?>, <?php //echo intval($valueService['prixVente']) 
                                                                                                                                                                                                                        ?>, <?php //echo intval($valueService['quantite']) 
                                                                                                                                                                                                                                                        ?>)" style="margin-left:10px"><i style = "color:#000000" class="glyphicon glyphicon-pencil optionModSup" data-toggle="tooltip" title="Modifier"></i> </a> -->

                      <a href="javascript:void(0);" onclick="supprimerService(<?php echo $idRubrique ?>, <?php echo $idFamille ?>, <?php echo $idTypeservice ?>, <?php echo $idService ?>, <?php echo $idDevis ?>, <?php echo intval($valueService['prixAchat']) ?>, <?php echo intval($valueService['prixVente']) ?>, <?php echo intval($valueService['quantite']) ?>)" style="margin-left:30px; margin-right:10px;"><i style="color:#FF0000" class="glyphicon glyphicon-trash optionModSup" data-toggle="tooltip" title="Supprimer"></i> </a>
                      <span>
                        <?php echo $valueService['service'] ?>
                      </span>
                      <span style="float: right; padding-right: 100px;">
                        <?php echo number_format(intval($valueService['quantite']) * intval($valueService['prixVente']), 0, ',', ' '); ?> F
                      </span>
                    </p>

                  <?php } ?>
                </p>
                <!-- Fon service -->
              </div>
            <?php } ?>
            <!-- Fin type service -->
          </div>
        <?php } ?>
        <!-- Fin Famille -->
      </div>
    <?php } ?>
    <!-- Fin Rubrique -->
<?php
  } else {
    echo $resultatRequete . "#res#none";
  }
  // $res = $resultatRequete."#res#";
  // echo $res;

  // <span>Sous-service 1</span><span style="float: right; padding-right: 100px;">2500 F</span><br>
} else if (isset($_GET['addServices'])) {


  require_once("../classe/classeDevis.php");
  $Devis = new Devis();
  //echo 'Sous servi : '. $_GET['sousServices'];
  $idRubrique = $_GET['idRubrique'];
  $idFamille = $_GET['idFamille'];
  $idTypeservice = $_GET['idTypeservice'];
  $sousService = $_GET['sousServices'];
  $sousService = ltrim($sousService, '{');
  $sousService = substr($sousService, 0, -1);
  $temp = explode(",", $sousService);
  $sousServices = "";
  $req = "";

  $idDevis = $_GET['idDevis'];
  $idRubrique = $_GET['idRubrique'];
  $idFamille = $_GET['idFamille'];
  $idTypeservice = $_GET['idTypeservice'];

  require_once('../classe/classeConnexion.php');

  $idDevs = $_SESSION['idDevisZelda'];
  if(isset($_GET['idFournisseur'])){
    $infosFour = $_GET['idFournisseur'];
  $tab = explode("-", $infosFour);
  $requete = Connexion::Connect()->prepare('UPDATE devis SET idFournisseur = ?, nomFournisseur = ? WHERE idDevis = ? ');
  $requete->bindValue(1, $tab[0]);
  $requete->bindValue(2, $tab[1]);
  $requete->bindValue(3, $idDevs);
  $requete->execute();

  $etat = 1;

  $hasComment = 2;
  $commentaire = "";
  if ($_GET['idFournisseur'] != "") {
    $hasComment = 1;
    $commentaire = $_GET['idFournisseur'];
  }
  $hasPrice = 2;
  $prixAchatTypeService = 0;
  $prixVenteTypeService = 0;
  $quantiteTypeService = 0;

  if (intval($_GET['prixVenteService']) != 0) {
    $hasPrice = 1;
    $prixAchatTypeService = intval($_GET['prixAchatService']);
    $prixVenteTypeService = intval($_GET['prixVenteService']);
    $quantiteTypeService = intval($_GET['quantiteService']);
  }

  foreach ($temp as $value) {
    $idService = 0;
    $prixAchat = 0;
    $prixVente = 0;
    $quantite = 0;
    if (!empty($value)) {
      $tp = explode("@", $value);
      $tp0 = explode('":"', $tp[0]);
      $tp0 = ltrim($tp0[0], '"');
      $tp3 = substr($tp[3], 0, -1);
     // echo $tp0;
      $libelleService = $Devis->getServiceLibelle($tp0);
      // print_r($tp0);
      // $sousServices .= intval($tp0)."-".intval($tp[1])."-".intval($tp[2])."-".intval($tp3)."-----";

      $idService = intval($tp0);
      $prixAchat = intval($tp[1]);
      $prixVente = intval($tp[2]);
      $quantite = intval($tp3);
      $sousServices .= '<span>' . $libelleService . '</span><span style="float: right; padding-right: 100px;">' . number_format(intval($tp[2]) * intval($tp3), 0, ',', ' ') . ' F</span><br>';
    }

    $req .= "
                    INSERT INTO detailsdevis(idDevis, idRubrique, idFamille, idTypeservice, idService, prixAchat, prixVente, quantite, etat) 
                    VALUES('" . $idDevis . "', '" . $idRubrique . "', '" . $idFamille . "', '" . $idTypeservice . "', '" . $idService . "', '" . $prixAchat . "', '" . $prixVente . "', '" . $quantite . "', '" . $etat . "');
                ";
  }

  $req .= "
            INSERT INTO detailstypeservice(idRubrique, idFamille, idTypeservice, idDevis, hasComment, commentaire, hasPrice, prixAchat, prixVente, quantite, etat) 
            VALUES('" . $idRubrique . "', '" . $idFamille . "', '" . $idTypeservice . "', '" . $idDevis . "', '" . $hasComment . "', '" . $commentaire . "', '" . $hasPrice . "', '" . $prixAchatTypeService . "', '" . $prixVenteTypeService . "', '" . $quantiteTypeService . "', '" . $etat . "');
        ";
  // $sousServices = $sousService;
  $resultatRequete = $Devis->insertSousservices($req);
  $resultatRequete = 1;
  // $res = $resultatRequete."#res#".$sousServices."--*--".$req;
  $res = $resultatRequete . "#res#" . $sousServices;
 
  }else{
    $resultatRequete = -1;
    $res = $resultatRequete . "#res#";
  }

  echo $res;
  
  // <span>Sous-service 1</span><span style="float: right; padding-right: 100px;">2500 F</span><br>
} else if (isset($_POST['addCommenaire'])) {
  require_once("../classe/classeDevis.php");
  $Devis = new Devis();
  $idDevis = $_POST['idDevis'];
  $idUser = $_POST['idUser'];
  $idDestinataire = $_POST['idDestinataire'];
  $contenu = $_POST['contenu'];
  $res = $Devis->addCommenaire($idDevis, $idUser, $idDestinataire, $contenu);
  echo $res;
} else if (isset($_GET['getComment'])) {
  require_once("../classe/classeDevis.php");
  $Devis = new Devis();
  $idDevis = $_GET['idDevis'];
  $res = $Devis->getComment($idDevis);
  foreach ($res as $value) {
    echo "<strong>" . $value["prenom"] . " " . $value["nom"] . "</strong>";
    echo $value['contenu'];
    echo "<hr>";
  }
  // echo $res;
} else if (isset($_POST['addValidationclient'])) {
  require_once("../classe/classeDevis.php");
  $Devis = new Devis();
  $idDevis = $_POST['idDevis'];
  $idUser = $_SESSION['gestionDevisidUser'];
  $nomValideur = $_POST['nomValideur'];
  $dateValidation = $_POST['dateValidation'];
  $res = $Devis->validationClient($idDevis, $idUser, $nomValideur, $dateValidation);
  echo $res;
} else if (isset($_POST['addReceptionbc'])) {
  require_once("../classe/classeDevis.php");
  $Devis = new Devis();
  $idDevis = $_POST['idDevis'];
  $idUser = $_SESSION['gestionDevisidUser'];
  $numBc = $_POST['numBc'];
  $dateBc = $_POST['dateBc'];
  $res = $Devis->receptionbc($idDevis, $idUser, $numBc, $dateBc);
  echo $res;
} else if (isset($_GET['validerCorrection'])) {
  require_once("../classe/classeDevis.php");
  $Devis = new Devis();
  $idDevis = $_GET['idDevis'];
  $res = $Devis->validerCorrection($idDevis);
  echo $res;
} else if (isset($_GET['livrerDevis'])) {
  require_once("../classe/classeDevis.php");
  $Devis = new Devis();
  $idDevis = $_GET['idDevis'];
  $idUser = $_SESSION['gestionDevisidUser'];
  $res = $Devis->livrerDevis($idDevis, $idUser);
  echo $res;
} else if (isset($_GET['validerDevis'])) {
  require_once("../classe/classeDevis.php");
  $Id = htmlentities(htmlspecialchars($_GET['validerDevis']), ENT_SUBSTITUTE);
  $str = explode("$", $Id);
  $a = 0;
  $objet = new Devis();
  $niveau = 0;
  if (isset($_SESSION['niveau']))
    $niveau = $_SESSION['niveau'];
  foreach ($str as $ide) {
    $a = $objet->validerDevis($ide, $_SESSION['gestionDevisidUser'], $niveau);
  }
  echo $a;
  // header("location: index.php");
} else if (isset($_GET['annuler'])) {
  require_once("../classe/classeDevis.php");
  $Devis = new Devis();
  $idDevis = $_GET['idDevis'];
  $idUser = $_SESSION['gestionDevisidUser'];
  $res = $Devis->annuler($idDevis, $idUser);
  echo $res;
} else if (isset($_POST['updateNow'])) {
  if ($_POST['conditionPaiement'] == "Autre")
    $conditionPaiement = htmlentities(htmlspecialchars($_POST['autre']), ENT_SUBSTITUTE);
  else
    $conditionPaiement = htmlentities(htmlspecialchars($_POST['conditionPaiement']), ENT_SUBSTITUTE);

  if (intval($_POST['valeurRemise']) > 0)
    $hasRemise = 1;
  else
    $hasRemise = 0;
  require_once('../classe/classeDevis.php');
  $contact = htmlentities(htmlspecialchars($_POST['idContact']), ENT_SUBSTITUTE) . " #$# " . htmlentities(htmlspecialchars($_POST['telephoneContact']), ENT_SUBSTITUTE);
  $Devis = new Devis(htmlentities(htmlspecialchars($_POST['updateNow']), ENT_SUBSTITUTE), "", $contact, htmlentities(htmlspecialchars($_POST['objet']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['campagne']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['commission']), ENT_SUBSTITUTE), $conditionPaiement, htmlentities($_POST['commentaire'], ENT_SUBSTITUTE), $_SESSION['gestionDevisidUser'], htmlentities(htmlspecialchars($_POST['idClient']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['idTypetaxe']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['idAgence']), ENT_SUBSTITUTE), 0, 1, 0, "", 1);
  echo $Devis->updateDevis(htmlentities(htmlspecialchars($_POST['taxeMunicipale']), ENT_SUBSTITUTE), $hasRemise, htmlentities(htmlspecialchars($_POST['typeRemise']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['valeurRemise']), ENT_SUBSTITUTE));
} else if (isset($_POST['ajouter'])) {

  $a = matricule("devis", "numeroDevis");
  $initialePrenom = substr($_SESSION['gestionDevisprenom'], 0, 1);
  $initialeNom = substr($_SESSION['gestionDevisnom'], 0, 1);
  $initiales = $initialePrenom . $initialeNom;
  $moisAnnee = date("m") . "/" . date("y");
  if ($a != "0") {
    $str = explode(" ", $a);
    $tmp = intval($str[0]) + 1;
    $tmp = str_pad($tmp, 3, "0", STR_PAD_LEFT);
    $a = $tmp . " " . $initiales . "." . $moisAnnee;
  } else {
    $a = "001" . " " . $initiales . "." . $moisAnnee;
  }

  if ($_POST['conditionPaiement'] == "Autre")
    $conditionPaiement = htmlentities(htmlspecialchars($_POST['autre']), ENT_SUBSTITUTE);
  else
    $conditionPaiement = htmlentities(htmlspecialchars($_POST['conditionPaiement']), ENT_SUBSTITUTE);

  if (intval($_POST['valeurRemise']) > 0)
    $hasRemise = 1;
  else
    $hasRemise = 0;

  require_once('../classe/classeDevis.php');
  $contact = htmlentities(htmlspecialchars($_POST['idContact']), ENT_SUBSTITUTE) . " #$# " . htmlentities(htmlspecialchars($_POST['telephoneContact']), ENT_SUBSTITUTE);
  $Devis = new Devis(NULL, $a, $contact, htmlentities(htmlspecialchars($_POST['objet']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['campagne']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['commission']), ENT_SUBSTITUTE), $conditionPaiement, htmlentities(htmlspecialchars($_POST['commentaire']), ENT_SUBSTITUTE), $_SESSION['gestionDevisidUser'], htmlentities(htmlspecialchars($_POST['idClient']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['idTypetaxe']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['idAgence']), ENT_SUBSTITUTE), 0, 1, 0, "", 1);
  echo $Devis->addDevis(htmlentities(htmlspecialchars($_POST['taxeMunicipale']), ENT_SUBSTITUTE), $hasRemise, htmlentities(htmlspecialchars($_POST['typeRemise']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['valeurRemise']), ENT_SUBSTITUTE));
} else if (isset($_POST['modifier'])) {
  require_once('../classe/classeDevis.php');
  $Devis = new Devis();
  if ($Devis->emailExist2(htmlentities(htmlspecialchars($_POST['email']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['modifier']), ENT_SUBSTITUTE)) == false && $Devis->loginExist2(htmlentities(htmlspecialchars($_POST['login']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['modifier']), ENT_SUBSTITUTE)) == false) {
    if (isset($_POST['idStructure'])) {
      $idStructure = htmlentities(htmlspecialchars($_POST['idStructure']), ENT_SUBSTITUTE);
    } else {
      $idStructure = 1;
    }
    $Devis = new Devis();
    echo $Devis->updateDevis(htmlentities(htmlspecialchars($_POST['modifier']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['nom']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['prenom']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['email']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['adresse']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['telephone']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['login']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['idRole']), ENT_SUBSTITUTE), $idStructure, htmlentities(htmlspecialchars($_POST['idCompte']), ENT_SUBSTITUTE));
  } else if ($Devis->loginExist2(htmlentities(htmlspecialchars($_POST['login']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['modifier']), ENT_SUBSTITUTE)) == true) {
    echo 2;
  } else if ($Devis->emailExist2(htmlentities(htmlspecialchars($_POST['email']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['modifier']), ENT_SUBSTITUTE)) == true) {
    echo 3;
  }
} else if (isset($_POST['ajouterRubrique'])) {
  $a = matricule("rubrique", "referenceRubrique");
  $moisAnnee = date("m") . date("Y");
  if ($a != "0") {
    $str = explode("-", $a);
    $tmp = intval($str[1]) + 1;
    $tmp = str_pad($tmp, 3, "0", STR_PAD_LEFT);
    $a = "RF" . $moisAnnee . "-" . $tmp;
  } else {
    $a = "RF" . $moisAnnee . "-001";
  }
  // echo $a;
  require_once('../classe/classeRubrique.php');
  $Rubrique = new Rubrique();

  if ($Rubrique->libelleExist(htmlentities(htmlspecialchars($_POST['rubrique']), ENT_SUBSTITUTE)) == false) {
    $Rubrique = new Rubrique(NULL, $a, htmlentities(htmlspecialchars($_POST['rubrique']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['description']), ENT_SUBSTITUTE));
    echo $Rubrique->addRubrique();
    // alert($_POST['rubrique']);
    return ($res);
  } else {
    echo 2;
  }
} else if (isset($_POST['ajoutService'])) {
  require_once('../classe/classeFamille.php');
  $Famille = new Famille();
  if ($Famille->libelleExist(htmlentities(htmlspecialchars($_POST['typeService']), ENT_SUBSTITUTE)) == false) {
    $Famille = new Famille(NULL, htmlentities(htmlspecialchars($_POST['typeService']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['description']), ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['idRubrique']), ENT_SUBSTITUTE), "", 1);
    echo $Famille->addFamille();
  } else {
    echo 2;
  }
} else if (isset($_POST['ajouterDescriptif'])) {
  $idReturn = null;
  $a = matricule("typeservice", "referenceTypeservice");
  $moisAnnee = date("m") . date("Y");
  if ($a != "0") {
    $str = explode("-", $a);
    $tmp = intval($str[1]) + 1;
    $tmp = str_pad($tmp, 3, "0", STR_PAD_LEFT);
    $a = "TS" . $moisAnnee . "-" . $tmp;
  } else {
    $a = "TS" . $moisAnnee . "-001";
  }
  
  require_once('../classe/classeTypeservice.php');
  $Typeservice = new Typeservice();
  if ($Typeservice->libelleExist(htmlentities($_POST['typeService'], ENT_SUBSTITUTE)) == false) {
    $Typeservice = new Typeservice(NULL, $a, htmlentities($_POST['typeService'], ENT_SUBSTITUTE), htmlentities(htmlspecialchars($_POST['idFamille']), ENT_SUBSTITUTE), htmlentities($_POST['description'], ENT_SUBSTITUTE));
    $idReturn =  $Typeservice->addTypeserviceNew();
    //On l'ajoute aussi dans la table service
    if(isset($idReturn)){
      $a = matricule("service", "referenceService");
      $moisAnnee = date("m").date("Y");
      if($a != "0"){
          $str = explode("-", $a);
          $tmp = intval($str[1])+1;
          $tmp = str_pad($tmp, 3, "0", STR_PAD_LEFT);
          $a = "SR".$moisAnnee."-".$tmp;
         
      }else{
          $a="SR".$moisAnnee."-001";
      }

      require_once('../classe/classeService.php');
      $Service = new Service();
      if ($Service->libelleExist(htmlentities(htmlspecialchars($_POST['typeService']), ENT_SUBSTITUTE)) == false) {
          $Service = new Service(NULL, $a, htmlentities(htmlspecialchars($_POST['typeService']), ENT_SUBSTITUTE));
      
          $idService =  $Service->addService($idReturn);
    }
   }
    

  
    echo 1;
  
    } else {
    echo 2;
  }
  
  

} else {
  if (isset($opt)) {
    $opt = explode("-", $opt);
    $option = $opt[0];
    if ($option == "ajouter") {
      include('php/view/devis/ajouter.php');
    } else if ($option == "modifier") {
      require_once('php/classe/classeDevis.php');

      include('php/view/devis/modifier.php');
    } else if ($option == "supprimer") {
      require_once('php/classe/classeDevis.php');

      include('php/view/devis/liste.php');
    } else if ($option == "details") {
      include('php/view/devis/details.php');
    } else if ($option == "liste") {
      include('php/view/devis/liste.php');
    } else if ($option == "listeavalider") {
      include('php/view/devis/listeavalider.php');
    } else if ($option == "listeattentebc") {
      include('php/view/devis/listeattentebc.php');
    } else if ($option == "export") {
      include('php/view/devis/export.php');
    }
  } else {
    include('php/view/devis/liste.php');
  }
}
?>