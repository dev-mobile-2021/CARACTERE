<?php   
    @session_start();
    require_once("../../classe/classeConnexion.php");

    if(isset($_GET["idRubrique"]) && isset($_GET["idFamille"]) && isset($_GET["idTypeservice"]) && isset($_GET["idService"])){

    }
    else if(isset($_GET["idRubrique"]) && isset($_GET["idFamille"]) && isset($_GET["idTypeservice"])){ ?>    
            <!-- Type service -->
            <?php
              // $idRubrique = $idRubrique;
              $idRubrique = $_GET["idRubrique"];
              $idFamille = $_GET["idFamille"];
              $idDevis = $_GET["idDevis"];
              $idTypeservice = $_GET["idTypeservice"];
              $listTypeservice = array();
              $requeteTypeservice = Connexion::Connect()->query("
                SELECT t.id, t.prixAchat, t.prixVente, t.quantite, t.idTypeservice, (SELECT typeService FROM typeservice WHERE idTypeservice = t.idTypeservice) as typeService, t.hasPrice, IF(t.hasPrice = 1, (SELECT prixVente*quantite FROM detailstypeservice WHERE idTypeservice = t.idTypeservice AND idRubrique = \"$idRubrique\" AND idDevis = \"$idDevis\"), (SELECT SUM(prixVente*quantite) FROM detailsdevis WHERE idTypeservice = t.idTypeservice AND idRubrique = \"$idRubrique\" AND idDevis = \"$idDevis\")) as somme, hasComment, commentaire 
                FROM detailstypeservice t WHERE t.idTypeservice IN(SELECT idTypeservice FROM detailsdevis WHERE idRubrique = \"$idRubrique\") AND idDevis = \"$idDevis\" AND idFamille = \"$idFamille\" AND t.idTypeservice = \"$idTypeservice\"
                  ");
              foreach ($requeteTypeservice as $donnee) {
                $listTypeservice[] = $donnee;
              }
            ?>
            <?php foreach ($listTypeservice as $valueTypeservice) { $idTypeservice = $valueTypeservice['idTypeservice']; ?>
            <form id="monFormService2">
              <div id="Typeservice<?php echo $valueTypeservice['idTypeservice'] ?>" data-rubrique="<?php echo $idRubrique ?>" data-famille="<?php echo $idFamille ?>" class="col-md-12" style="padding-right:0px; padding-left:0px;">
                
                <div class="row" style="margin-left: 0px; margin-right: 0px;">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="idFournisseur">Fournisseur</label>
                      <input type="text" class="form-control" id="idFournisseur"  name="idFournisseur" placeholder="Veuillez saisir le founisseur du service" value="<?php echo $valueTypeservice['commentaire'] ?>">
                    </div>
                  </div>
                  <div class="col-md-10" style="padding-right: 0px;">
                    <div class="col-md-3" style="padding-left: 0px;">
                      <div class="form-group">
                        <label>Service</label>
                        <select onchange="serviceChange(this)" class="form-control select2" style="width: 100%;" required="" id="idTypeservice" name="idTypeservice">
                            <?php
                                require_once('../../classe/classeTypeservice.php');
                                $Typeservice = new Typeservice();
                                $list = $Typeservice->listTypeservice();
                                if(!empty($list)){
                                  foreach($list as $value){
                                    if($value['idTypeservice'] == $idTypeservice){
                                        echo  '<option selected value="'.$value['idTypeservice'].'">'.$value['typeService'].'</option>';
                                    }
                                    else{  
                                        echo '<option value="'.$value['idTypeservice'].'">'.$value['typeService'].'</option>'; 
                                    } 
                                  }
                                }
                               
                            ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-3" style="padding-left: 0px;">
                      <div class="form-group">
                        <label for="prixAchatService">Prix d'Achat</label>
                        <input type="text" class="form-control" id="prixAchatService" name="prixAchatService" value="<?php echo $valueTypeservice['prixAchat'] ?>" placeholder="Entrer le prix d'achat" required="required">
                      </div>
                    </div>  
                    <div class="col-md-3" style="padding-left: 0px;">
                      <div class="form-group">
                        <label for="prixVenteService">Prix de Vente</label>
                        <input type="number" required="" class="form-control" id="prixVenteService" name="prixVenteService" value="<?php echo $valueTypeservice['prixVente'] ?>" min="0" placeholder="Prix de Vente">                
                      </div>
                    </div>  
                    <div class="col-md-3" style="padding-left: 0px;">
                      <div class="form-group">
                        <label for="quantiteService">Quantit??</label>
                        <input type="number" required="" class="form-control" id="quantiteService" name="quantiteService" value="<?php echo $valueTypeservice['quantite'] ?>" min="1" placeholder="Quantit??">
                      </div>
                    </div>  
                  </div>
                </div>
                
                <!-- Services -->                    
                <div class="row" id="sousServicesAjoutes" style="margin-left: 0px; margin-right: 0px; border-bottom: 2px solid #000; margin: 5px 0px 5px 0px;">

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

                        <div onclick="updateSavedLine(<?php echo $valueService['idService'] ?>, <?php echo intval($valueService['prixAchat']) ?>, <?php echo intval($valueService['prixVente']) ?>, <?php echo intval($valueService['quantite']) ?>, <?php echo $idDevis ?>, <?php echo $idRubrique ?>, <?php echo $idFamille ?>, <?php echo $idTypeservice ?>)" data-toggle="tooltip" title="Cliquez pour modifier" class="row ligneSousService" id="<?php echo $valueService['idService'] ?>" style="margin-left: 0px; margin-right: 0px; margin: 5px 0px 5px 0px;">
                            <div class="col-md-10" style="padding-right: 0px;">
                                <div class="col-md-3" style="padding-left: 0px;"><?php echo $valueService['service'] ?></div>
                                <div class="col-md-3" style="padding-left: 0px; text-align:right;"><?php echo number_format(intval($valueService['prixAchat']), 0, ',', ' ') ?> F</div>
                                <div class="col-md-3" style="padding-left: 0px; text-align:right;"><?php echo number_format(intval($valueService['prixVente']), 0, ',', ' ') ?> F</div>
                                <div class="col-md-3" style="padding-left: 0px; text-align:right;"><?php echo intval($valueService['quantite']) ?></div>
                            </div>
                            <div class="col-md-2" style="padding-right: 0px;">
                                <div class="col-md-12 montantSousService" data-value="<?php echo intval($valueService['prixVente'])*intval($valueService['quantite']) ?>" style="padding-left: 0px; text-align:right;"><?php echo number_format(intval($valueService['prixVente'])*intval($valueService['quantite']), 0, ',', ' ') ?> F</div>
                            </div>
                        </div>
                    
                            
                  <?php } ?>
                </div>
                <!-- Fon service -->
                <div class="row" style="margin-left: 0px; margin-right: 0px;">
                  <div class="col-md-10" style="padding-right: 0px;">
                    <div class="col-md-3" style="padding-left: 0px;">
                      <div class="form-group">
                        <label>Descriptif</label>
                        <select class="form-control select2" style="width: 100%;" required="" id="idService" name="idService">
                          <option disabled="" selected="" value="">Choisir</option>
                          <?php
                            require_once('../../classe/classeService.php');
                            $Service = new Service();
                            $list = $Service->listServiceSansExistant($idDevis, $idTypeservice);
                            if(!empty($list)){
                              foreach($list as $value){ 
                                echo '<option class="optionSousService" value="'.$value['idService'].'">'.$value['service'].'</option>';  
                              }
                            }
                           
                          ?>                   
                        </select>
                      </div>
                    </div>
                    <div class="col-md-3" style="padding-left: 0px;">
                      <div class="form-group">
                        <label for="prixAchat">Prix d'Achat</label>
                        <input type="number" value="0" class="form-control" id="prixAchat" name="prixAchat" placeholder="Entrer le prix d'achat" required="required">
                      </div>
                    </div>  
                    <div class="col-md-3" style="padding-left: 0px;">
                      <div class="form-group">
                        <label for="prixVente">Prix de Vente</label>
                        <input type="number" value="0" required="" class="form-control" id="prixVente" name="prixVente" min="0" placeholder="Prix de Vente">                
                      </div>
                    </div>  
                    <div class="col-md-3" style="padding-left: 0px;">
                      <div class="form-group">
                        <label for="quantite">Quantit??</label>
                        <input type="number" value="0" required="" class="form-control" id="quantite" name="quantite" min="1" placeholder="Quantit??">
                      </div>
                    </div>  
                    <div class="col-md-3" style="padding-left: 0px;">
                      <div class="form-group">
                        <input type="hidden" name="ajouterService">
                        <input type="hidden" class="idDevis" name="idDevis" value="<?php echo $idDevis ?>">
                        <input type="hidden" id="sousServices" name="sousServices" value="">
                      </div>
                    </div>   
                  </div>
                  <div class="col-md-2" style="padding-left: 0px;">
                     <button style="margin-top: 25px; margin-left: 0px;" type="button" onclick="saveDetails2(<?php echo $idDevis ?>, <?php echo $idRubrique ?>, <?php echo $idFamille ?>, <?php echo $idTypeservice ?>)" id="bouttonEnregistrer2" class="btn btn-success"><i class='fa fa-save'></i> &nbsp; Enregristrer</button>
                  </div>         
                </div>
              </div>
              <?php } ?>
              <!-- Fin type service -->
                <div class="row" style="margin-left: 0px; margin-right: 0px; text-align: right;">
                      <!-- <div class="col-md-12" style=""> -->
                        <input type="hidden" id="idDetailsTypeservice" name="idDetailsTypeservice" value="<?php echo $valueTypeservice['id'] ?>">
                        <button style="margin-top: 10px;" onclick="sendAll2(<?php echo $idDevis ?>, <?php echo $idRubrique ?>, <?php echo $idFamille ?>)" type="button" class="btn btn-success"><i class="fa fa-check"></i> Terminer</button>
                      <!-- </div> -->
                </div>
            </form>
    <?php
    }
    else if(isset($_GET["idRubrique"]) && isset($_GET["idFamille"])){ ?>
        

   <?php }
    
    
?>