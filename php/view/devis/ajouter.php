<style type="text/css">
  .ligneSousService {
    cursor: pointer;
  }

  .ligneSousService:hover {
    background-color: #ccc;
  }

  .float {
    position: fixed;
    width: 40px;
    height: 40px;
    bottom: 30px;
    right: 10px;
    background-color: #0C9;
    color: #FFF;
    border-radius: 50px;
    text-align: center;
    box-shadow: 2px 2px 3px #999;
  }

  .my-float {
    margin-top: 7px;
  }
</style>
<script type="text/javascript" src="php/view/devis/devis.js"></script>

<div class="content-wrapper">
  <div class="loader loaderMessage loader-bar" data-text="Traitement en cours. Veuillez patienter" data-rounded></div>
  <section class="content">
    <section class="content-header">
      <h1>
        Devis
        <small>Nouveau devis</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Accueil</a></li>
        <li><a href="devis_listeavalider"> Devis</a></li>
        <li class="active">Nouveau devis</li>
      </ol>
    </section>

    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Entête du Devis</h3><br><br><span style="color:red"><em><u>Note</u> : Les champs précédés de (*) sont obligatoires</em></span>
        </div>
        <!-- /.box-header -->
        <form id="monForm">
          <div class="box-body">
            <div class="row">
              <!-- col -->
              <div class="col-md-4">
                <div class="form-group">
                  <label for="iduser">Responsable <span style="color:red">*</span></label>
                  <input type="text" class="form-control" id="iduser" name="iduser" placeholder="Entrer le responsable" value="<?php echo $_SESSION['gestionDevisprenom'] . ' ' . $_SESSION['gestionDevisnom']; ?>" disabled required="required">
                </div>
                <div class="form-group">
                  <label for="idClient">Client <span style="color:red">*</span></label>
                  <select onchange="loadContact(this);" class="form-control select2" required="" name="idClient">
                    <option value="">Choisir le client</option>
                    <?php
                    require_once('php/classe/classeClient.php');
                    $Client = new Client();
                    $list = $Client->listClient();
                    if (!empty($list)) {
                      foreach ($list as $value) {
                        echo '<option value="' . $value['idClient'] . '">' . $value['prenomClient'] . " " . $value['nomClient'] . '</option>';
                      }
                    }
                    ?>
                  </select>
                </div>
                <div class="form-group" style="display: none;">
                  <label for="idAgence">Agence <span style="color:red">*</span></label>
                  <select class="form-control select2" required="" name="idAgence">
                    <option value="">Choisir l'agence</option>
                    <?php
                    require_once('php/classe/classeAgence.php');
                    $Agence = new Agence();
                    $list = $Agence->listAgence();
                    if (!empty($list)) {
                      foreach ($list as $value) {
                        echo '<option selected value="' . $value['idAgence'] . '">' . $value['agence'] . '</option>';
                      }
                    }
                    ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="idContact">Contact <span style="color:red">*</span></label>
                  <select onchange="setTelephone();" class="form-control select2" required="" id="idContact" name="idContact">

                  </select>

                  <label for="telephoneContact">Email Contact <span style="color:red">*</span></label>
                  <input readonly="" type="text" class="form-control" id="telephoneContact" name="telephoneContact" placeholder="" required="required">
                </div>
                <!-- <div class="form-group">
                <label for="contact">Contact <span style="color:red">*</span></label>
                <input type="text" class="form-control" id="contact" name="contact" placeholder="Entrer le contact" required="required">

                
              </div> -->

              </div>
              <!-- /.col -->
              <!-- col -->
              <div class="col-md-4">

                <div class="form-group">
                  <label for="objet">Marque / Produit <span style="color:red">*</span></label>
                  <input type="text" class="form-control" id="objet" name="objet" placeholder="Entrer l'objet du devis" required="required">
                </div>
                <div class="form-group">
                  <label for="campagne">Objet Campagne <span style="color:red">*</span></label>
                  <input type="text" class="form-control" id="campagne" name="campagne" placeholder="Entrer la campagne du devis" required="required">
                </div>
                <div class="form-group">
                  <label for="conditionPaiement">Conditions de paiement <span style="color:red">*</span></label>
                  <!-- <textarea class="form-control" name="conditionPaiement" id="commentaire" cols="3" rows="5" placeholder="Entrer les conditions de paiement"></textarea> -->
                  <div class="radio">
                    <label>
                      <input type="radio" name="conditionPaiement" id="avant" value="50% &agrave; la commande, 50% &agrave; la livraison" required>
                      50% &agrave; la commande, 50% &agrave; la livraison
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="conditionPaiement" id="pendant" value="Paiement &agrave; la commande" required>
                      Paiement &agrave; la commande
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="conditionPaiement" id="habituelle" value="Habituelles" required>
                      Habituelles
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="conditionPaiement" id="contractuelles" value="Contractuelles" required>
                      Contractuelles
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="conditionPaiement" id="autre" value="Autre" required>
                      Autres
                    </label>
                    <input style="margin-top: 3px;" type="text" class="form-control" name="autre" placeholder="Autre à préciser" value="">
                  </div>
                </div>

              </div>
              <!-- /.col -->
              <!-- col -->
              <div class="col-md-4">
                <div class="form-group">
                  <label for="idTypetaxe">Type de taxe <span style="color:red">*</span></label>
                  <select class="form-control select2" required="" name="idTypetaxe">
                    <option value="">Choisir le type de taxe</option>
                    <option value="1" selected>HTVA</option>
                    <option value="2">TTC</option>

                    <!-- <option value="TTC">TTC</option> -->
                  </select>
                </div>
                <div class="form-group">
                  <label for="commission">Commission sur la production <span style="color:red">*</span></label>
                  <input type="number" min="0" class="form-control" id="commission" name="commission" placeholder="Entrer la commission sur la production (en %) " required="required">
                </div>
                <div class="form-group">
                  <label for="commission">Commission forfaitaire</label>
                  <input type="number" min="0" class="form-control" id="commissionf" name="commissionf" placeholder="Entrer la commission forfaitaire (en cfa) ">
                </div>
                <div class="form-group">
                  <label for="commentaire">Commentaire(s)</label>
                  <textarea class="form-control materialize-textarea summernote" name="commentaire" id="commentaire" cols="3" rows="1" placeholder="Entrer le(s) commentaire(s)"></textarea>
                </div>
                <div class="form-group">
                  <label for="taxeMunicipale">Taxe municipale </label>
                  <input type="number" min="0" value="0" class="form-control" id="taxeMunicipale" name="taxeMunicipale" placeholder="Entrer la Taxe municipale Dakar & R&eacute;gions">
                </div>
              </div>
              <!-- /.col -->
            </div>
            <div class="row">
              <div class="col-md-4">
                <label>Remise</label>
                <div class="radio">
                  <label>
                    <input type="radio" name="typeRemise" id="pourcentage" value="1" checked="">
                    Pourcentage
                  </label>
                  &nbsp;&nbsp;&nbsp;
                  <label>
                    <input type="radio" name="typeRemise" id="montant" value="2">
                    Montant
                  </label>

                  <div class="form-group">
                    <input type="number" min="0" value="0" class="form-control" id="valeurRemise" name="valeurRemise" placeholder="Entrer la valeur">
                  </div>
                </div>
              </div>
            </div>
            <div class="box-footer">
              <input type="hidden" name="ajouter">
              <button type="submit" class="btn btn-primary pull-right">Suivant &gt;</button>
            </div>
          </div>
        </form>
        <!-- /.row -->
      </div>

      <!-- </div> -->
      <!-- /.box -->
      <!-- /.row -->
    </section>

    <script type="text/javascript">
      $("[name=typeRemise]").on("click", function() {
        if (parseInt($(this).val()) == 1) {
          $("#valeurRemise").attr("max", 100);
        } else {
          $("#valeurRemise").removeAttr("max");
        }
      })
    </script>

    <section class="content">

      <div class="box box-warning" id="parentContentDevis">
        <!-- <div class="box box-warning" > -->

        <div class="box-header">
          <h3 class="box-title">Détails du Devis</h3>
        </div>
        <div class="box-boby">
          <div class="row" id="detailDevis" style="padding-left: 15px; padding-right: 5px;">

          </div>
          <div class="box box-default" id="formulairesServiceDevis">
            <div class="loader loaderMessage1 loader-bar" data-text="Chargement des types de service de la rubrique. Veuillez patienter" data-rounded></div>
            <div class="loader loaderMessage2 loader-bar" data-text="Chargement des services du type de service. Veuillez patienter" data-rounded></div>
            <div class="box-body" id="newServiceExistantLigne">
              <form id="monFormService" action="" method="post">
                <div class="row" style="margin-left: 0px; margin-right: 0px; padding: 20px; border:1px solid #000;">
                  <div class="col-md-12" style="">
                    <!-- <div class="col-md-3" style="display: none;">
                      <div class="form-group">
                        <label>Rubrique</label>
                        <select onchange="/*loadFamille(this);*/" class="form-control select2" style="width: 100%;" required="" id="idRubriqueold" name="idRubriqueold">
                          <option disabled="" selected="">Veuillez choisir une rubrique</option>
                          <?php
                          require_once('php/classe/classeRubrique.php');
                          $Rubrique = new Rubrique();
                          $list = $Rubrique->listRubrique();
                          if (!empty($list)) {
                            foreach ($list as $value) {
                              echo '<option value="' . $value['idRubrique'] . '">' . $value['rubrique'] . '</option>';
                            }
                          }

                          ?>
                        </select>
                      </div>
                    </div> -->
                    <input type="hidden" id="rubriqueid">
                    <input type="hidden" id="textrubriqueid">

                    <input type="hidden" id="typeserviceid">
                    <input type="hidden" id="texttypeserviceid">

                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Type service</label>
                        <a id="btnAddrubrique" data-toggle="modal" data-target="#modalrubrique">
                          <button> <i class="fa fa-plus"></i></button>
                        </a>

                        <br>
                        <select onchange="loadFamille(this);" class="form-control select2" style="width: 100%;" required="" id="idRubrique" name="idRubrique">
                          <option disabled="" selected="">Veuillez choisir un Type service</option>
                          <?php
                          require_once('php/classe/classeRubrique.php');
                          $Rubrique = new Rubrique();
                          $list = $Rubrique->listRubrique();
                          if (!empty($list)) {
                            foreach ($list as $value) {
                              echo '<option value="' . $value['idRubrique'] . '">' . $value['rubrique'] . '</option>';
                            }
                          }

                          ?>
                        </select>


                        <!-- <select onchange="loadTypeService(this);" class="form-control select2" style="width: 100%;" required="" id="idFamille" name="idFamille">
                          <option disabled="" selected="">Veuillez choisir un type service</option>
                          <?php
                          require_once('php/classe/classeFamille.php');
                          $Famille = new Famille();
                          $list = $Famille->listFamille();
                          if (!empty($list)) {
                            foreach ($list as $value) {
                              echo '<option data-rubrique="' . $value['idRubrique'] . '" value="' . $value['idFamille'] . '">' . $value['famille'] . '</option>';
                            }
                          }

                          ?>
                        </select> -->
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12" style="padding-top: 20px; padding-bottom: 20px; border:1px solid #000;">
                    <div class="row" style="margin-left: 0px; margin-right: 0px;">
                      <div class="col-md-12">
                        <!-- <div class="form-group">
                          <label for="commentaireTypeservice">Fournisseur</label>
                          <input type="text" class="form-control" id="commentaireTypeservice" name="commentaireTypeservice" placeholder="Veuillez saisir le founisseur du service" required="required">
                        </div> -->

                        <div class="form-group">
                          <label for="idFournisseur">Fournisseur</label>
                          <select class="form-control select2" id="idFournisseur" name="idFournisseur">
                            <option value="">Choisir le fournisseur</option>
                            <?php
                            require_once('php/classe/classeFournisseur.php');
                            $fournisseurs = new Fournisseur();
                            $list = $fournisseurs->listFournisseur();
                            if (!empty($list)) {
                              foreach ($list as $value) {
                                echo '<option class="optionSousService" value="' . $value['idFournisseur'] . '-' . $value['nomFournisseur'] . '-' . $value['prenomFournisseur'] . '">' . $value['nomFournisseur'] . ' '  . $value['prenomFournisseur'] . '</option>';
                              }
                            }

                            ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-10" style="padding-right: 0px;">
                        <div class="col-md-3" style="padding-left: 0px;">
                          <div class="form-group">
                            <label>Service</label>
                            <a id="btnAddtypeservice" data-toggle="modal" data-target="#modaltypeservice">
                              <button> <i class="fa fa-plus"></i></button>
                            </a>
                            <select onchange="loadTypeService(this);" class="form-control select2" style="width: 100%;" required="" id="idFamille" name="idFamille">
                              <option disabled="" selected="">Veuillez choisir un service</option>
                              <?php
                              require_once('php/classe/classeFamille.php');
                              $Famille = new Famille();
                              $list = $Famille->listFamille();
                              if (!empty($list)) {
                                foreach ($list as $value) {
                                  echo '<option data-rubrique="' . $value['idRubrique'] . '" value="' . $value['idFamille'] . '">' . $value['famille'] . '</option>';
                                }
                              }

                              ?>
                            </select>

                          </div>
                        </div>
                        <div class="col-md-3" style="padding-left: 0px;">
                          <div class="form-group">
                            <label for="prixAchatService">Prix d'Achat</label>
                            <input type="number" min="0" value="0" class="form-control" id="prixAchatService" name="prixAchatService" placeholder="Entrer le prix d'achat" required="required">
                          </div>
                        </div>
                        <div class="col-md-3" style="padding-left: 0px;">
                          <div class="form-group">
                            <label for="prixVenteService">Prix de Vente</label>
                            <input type="number" value="0" required="" class="form-control" id="prixVenteService" name="prixVenteService" min="0" placeholder="Prix de Vente">
                          </div>
                        </div>
                        <div class="col-md-3" style="padding-left: 0px;">
                          <div class="form-group">
                            <label for="quantiteService">Quantité</label>
                            <input type="number" value="1" required="" class="form-control" id="quantiteService" name="quantiteService" min="1" placeholder="Quantité">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row" id="sousServicesAjoutes" style="margin-left: 0px; margin-right: 0px; border-bottom: 2px solid #000; margin: 5px 0px 5px 0px;">

                    </div>
                    <div class="row" style="margin-left: 0px; margin-right: 0px;">
                      <div class="col-md-10" style="padding-right: 0px;">
                        <div class="col-md-3" style="padding-left: 0px;">
                          <div class="form-group">
                            <label>Descriptif</label>
                            <a id="btnAdddescriptif" data-toggle="modal" data-target="#modaldescriptif">
                              <button> <i class="fa fa-plus"></i> </button>
                            </a>
                            <select onchange="serviceChange(this)" class="form-control select2" style="width: 100%;" required="" id="idTypeservice" name="idTypeservice">

                            </select>
                            <!-- <select class="form-control select2" style="width: 100%;" required="" id="idService" name="idService">
                              <option disabled="" selected="" value="">Choisir</option>
                              <?php
                              require_once('php/classe/classeService.php');
                              $Service = new Service();
                              $list = $Service->listService();
                              if (!empty($list)) {
                                foreach ($list as $value) {
                                  echo '<option class="optionSousService" value="' . $value['idTypeservice'] . '">' . $value['typeService'] . '</option>';                                  // echo '<option class="optionSousService" value="' . $value['idService'] . '">' . $value['service'] . '</option>';
                                }
                              }

                              ?>
                            </select> -->
                          </div>
                        </div>
                        <div class="col-md-3" style="padding-left: 0px;">
                          <div class="form-group">
                            <label for="prixAchat">Prix d'Achat</label>
                            <input type="number" min="0" value="0" class="form-control" id="prixAchat" name="prixAchat" placeholder="Entrer le prix d'achat" required="required">
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
                            <label for="quantite">Quantité</label>
                            <input type="number" value="0" required="" class="form-control" id="quantite" name="quantite" min="1" placeholder="Quantité">
                          </div>
                        </div>
                        <div class="col-md-3" style="padding-left: 0px;">
                          <div class="form-group">
                            <input type="hidden" name="ajouterService">
                            <input type="hidden" class="idDevis" name="idDevis">
                            <input type="hidden" id="sousServices" name="sousServices" value="">


                            <!-- <button style="margin-top: 25px; color:red;" type="button" class="btn" id="hideService"><i class="fa fa-remove"></i></button>                 -->
                          </div>
                        </div>
                      </div>
                      <div class="col-md-2" style="padding-left: 0px;">
                        <button style="margin-top: 25px; margin-left: 0px;" type="button" onclick="saveDetails()" disabled id="bouttonEnregistrer" class="btn btn-success"> Choisissez un service</button>
                      </div>
                    </div>
                    <div class="row" style="margin-left: 0px; margin-right: 0px; text-align: right;">
                      <!-- <div class="col-md-12" style=""> -->
                      <button style="margin-top: 10px;" onclick="sendAll()" type="button" class="btn btn-success"><i class="fa fa-check"></i> Valider le service</button>
                      <!-- </div> -->
                    </div>
                  </div>

                </div>
                <div class="row" style="margin-left: 0px; margin-right: 0px; text-align: right;">
                  <!-- <div class="col-md-12" style=""> -->
                  <input type="hidden" name="currentRubrique" id="currentRubrique" value="">
                  <!-- <button style="margin-top: 10px;" type="button" class="btn btn-success"><i class="fa fa-check"></i> Valider la rubrique</button> -->
                  <!-- </div> -->
                </div>
              </form>
            </div>

          </div>
        </div>
      </div>
    </section>

    <section class="content" style="display: block;" id="validerdevis">
      <div class="box box-success">
        <div class="box-header">
          <div class="pull-left">
            <a href="javascript:void(0);" onclick="askPrintDevis()" class="btn btn-success item-devis"><i class="fa fa-check"></i>VALIDER LE DEVIS</a>
          </div>
        </div>
      </div>
    </section>
  </section>
</div>
<script type="text/javascript">
  $(document).ready(function() {
    $("#parentContentDevis").hide();
    $("#validerdevis").hide();
  });

  //Pour que le click sur la div ouvre le descrition
  $('body').on('click', '#newServiceExistant', function() {
    $('#newServiceExistantLigne').show();
    $('#newNouveauServiceLigne').hide();
    $('#newPackLigne').hide();
  });

  $('body').on('click', '#newNouveauService', function() {
    $('#newServiceExistantLigne').hide();
    $('#newNouveauServiceLigne').show();
    $('#newPackLigne').hide();
  });

  $('body').on('click', '#newPack', function() {
    $('#newServiceExistantLigne').hide();
    $('#newNouveauServiceLigne').hide();
    $('#newPackLigne').show();
  });


  $('body').on('click', '#hideService', function() {
    $('#newServiceExistantLigne').hide();
  });

  $('body').on('click', '#hideNewService', function() {
    $('#newNouveauServiceLigne').hide();
  });

  $('body').on('click', '#hidePack', function() {
    $('#newPackLigne').hide();
  });

  function number_format(number, decimals, dec_point, thousands_sep) {
    // Strip all characters but numerical ones.
    number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
    var n = !isFinite(+number) ? 0 : +number,
      prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
      sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
      dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
      s = '',
      toFixedFix = function(n, prec) {
        var k = Math.pow(10, prec);
        return '' + Math.round(n * k) / k;
      };
    // Fix for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
    if (s[0].length > 3) {
      s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '').length < prec) {
      s[1] = s[1] || '';
      s[1] += new Array(prec - s[1].length + 1).join('0');
    }
    return s.join(dec);
  }

  window.tableauSousService = {};

  function saveDetails() {
    if ($("#idTypeservice").val() == null /*|| $("#prixAchat").val().length === 0 || $("#prixVente").val().length === 0 || $("#quantite").val().length === 0*/ ) {
      // alert("remplir tout");
      swal({
        title: "Erreur",
        text: "Veuillez choisir un Descriptif",
        imageUrl: 'dist/img/icones/error.png',
        html: true
      });



    } else {
      var val = $("#sousServices").attr("value");
      var idTypeservice = $("#idTypeservice").val();
      var prixAchat = $("#prixAchat").val();
      var prixVente = $("#prixVente").val();
      var quantite = $("#quantite").val();

      var texteSousService = $("#idTypeservice :selected").text();
      // alert(texteSousService);

      //Enregistrement du sous service dans un tableau
      var toAdd = tableauSousService[idTypeservice] = idTypeservice + "+@+" + prixAchat + "+@+" + prixVente + "+@+" + quantite;
      var toAdd = JSON.stringify(tableauSousService);
      /*alert(toAdd);*/
      //Affichage du sous service
      var prixAchatTexte = number_format(prixAchat, 0, '', ' ');
      var prixVenteTexte = number_format(prixVente, 0, '', ' ');
      var quantiteTexte = number_format(quantite, 0, '', ' ');
      var totalLigne = number_format(parseInt(prixVente) * parseInt(quantite), 0, '', ' ');

      var idTypeservice = $("#typeserviceid").val();
      console.log('je cherche', idTypeservice);

      $("#sousServicesAjoutes").append('<div onclick="updateLine(' + idTypeservice + ')" data-toggle="tooltip" title="Cliquez pour modifier" class="row ligneSousService" id="id' + idTypeservice + '" style="margin-left: 0px; margin-right: 0px; margin: 5px 0px 5px 0px;"><div class="col-md-10" style="padding-right: 0px;"><div class="col-md-3" style="padding-left: 0px;">' + texteSousService + '</div><div class="col-md-3" style="padding-left: 0px; text-align:right;">' + prixAchatTexte + ' F</div><div class="col-md-3" style="padding-left: 0px; text-align:right;">' + prixVenteTexte + ' F</div><div class="col-md-3" style="padding-left: 0px; text-align:right;">' + quantiteTexte + '</div></div><div class="col-md-2" style="padding-right: 0px;"><div class="col-md-12 montantSousService" data-value="' + parseInt(prixVente) * parseInt(quantite) + '" style="padding-left: 0px; text-align:right;">' + totalLigne + ' F</div></div></div>');
      $(".ligneSousService").tooltip();
      //Desactivation du sous service dans la liste
      $("#idTypeservice :selected").attr("disabled", true);
      $('#idTypeservice').prop('selectedIndex', 0);
      $('#idTypeservice').select2();

      //Reitialisation des champs

      $("#idTypeservice").val('');
      $("#prixAchat").val('');
      $("#prixVente").val('');
      $("#quantite").val('');

      // alert(toAdd);
      $("#sousServices").attr("value", toAdd);
    }

  }

  function updateLine(id) {
    var ligne = window.tableauSousService[id];
    var valeurs = ligne.split("+@+");
    setTimeout(function() {
      $('#idTypeserviceMod').val(valeurs[0]).trigger('change');
    }, 500);

    // $("#monFormUpdateLine #idTypeserviceMod").val(valeurs[0]).change();
    $("#monFormUpdateLine #prixAchat").val(valeurs[1]);
    $("#monFormUpdateLine #prixVente").val(valeurs[2]);
    $("#monFormUpdateLine #quantite").val(valeurs[3]);
    $("#monFormUpdateLine #oldIdSousService").attr("value", valeurs[0]);

    $("#updateLine").modal('show');
  }

  function saveDetailsUpdate() {
    var id = $("#oldIdSousService").attr("value");
    if ($("#monFormUpdateLine #idTypeserviceMod").val() == null /*|| $("#prixAchat").val().length === 0 || $("#prixVente").val().length === 0 || $("#quantite").val().length === 0*/ ) {
      swal({
        title: "Erreur",
        text: "Veuillez choisir un descriptif",
        imageUrl: 'dist/img/icones/error.png',
        html: true
      });
      // alert("remplir tout");
    } else {
      var val = $("#sousServices").attr("value");
      var idTypeserviceMod = $("#monFormUpdateLine #idTypeserviceMod").val();
      var prixAchat = $("#monFormUpdateLine #prixAchat").val();
      var prixVente = $("#monFormUpdateLine #prixVente").val();
      var quantite = $("#monFormUpdateLine #quantite").val();

      var texteSousService = $("#monFormUpdateLine #idTypeserviceMod :selected").text();
      // alert(texteSousService);

      //suppression du sous service
      delete window.tableauSousService[id];
      $("#id" + id).remove();

      //Enregistrement du sous service dans un tableau
      var toAdd = tableauSousService[idTypeserviceMod] = idTypeserviceMod + "+@+" + prixAchat + "+@+" + prixVente + "+@+" + quantite;
      var toAdd = JSON.stringify(tableauSousService);
      /*alert(toAdd);*/
      //Affichage du sous service
      var prixAchatTexte = number_format(prixAchat, 0, '', ' ');
      var prixVenteTexte = number_format(prixVente, 0, '', ' ');
      var quantiteTexte = number_format(quantite, 0, '', ' ');
      var totalLigne = number_format(parseInt(prixVente) * parseInt(quantite), 0, '', ' ');

      $("#sousServicesAjoutes").append('<div onclick="updateLine(' + idTypeserviceMod + ')" data-toggle="tooltip" title="Cliquez pour modifier1" class="row ligneSousService" id="id' + idTypeserviceMod + '" style="margin-left: 0px; margin-right: 0px; margin: 5px 0px 5px 0px;"><div class="col-md-10" style="padding-right: 0px;"><div class="col-md-3" style="padding-left: 0px;">' + texteSousService + '</div><div class="col-md-3" style="padding-left: 0px; text-align:right;">' + prixAchatTexte + ' F</div><div class="col-md-3" style="padding-left: 0px; text-align:right;">' + prixVenteTexte + ' F</div><div class="col-md-3" style="padding-left: 0px; text-align:right;">' + quantiteTexte + '</div></div><div class="col-md-2" style="padding-right: 0px;"><div class="col-md-12 montantSousService" data-value="' + parseInt(prixVente) * parseInt(quantite) + '" style="padding-left: 0px; text-align:right;">' + totalLigne + ' F</div></div></div>');
      $(".ligneSousService").tooltip();
      //Desactivation du sous service dans la liste
      $('#monFormUpdateLine #idTypeserviceMod').prop('selectedIndex', 0);
      $('#monFormUpdateLine #idTypeserviceMod').select2();

      //Reitialisation des champs

      $("#monFormUpdateLine #idTypeserviceMod").val('');
      $("#monFormUpdateLine #prixAchat").val('');
      $("#monFormUpdateLine #prixVente").val('');
      $("#monFormUpdateLine #quantite").val('');


      $("#sousServices").attr("value", toAdd);

      $('#updateLine').modal('hide');
    }
  }

  function hotDeleteLine() {
    var id = $("#oldIdSousService").attr("value");
    if ($("#monFormUpdateLine #idTypeserviceMod").val() == null) {
      swal({
        title: "Erreur",
        text: "Veuillez choisir un descriptif",
        imageUrl: 'dist/img/icones/error.png',
        html: true
      });
      // alert("remplir tout");
    } else {
      //suppression du sous service
      delete window.tableauSousService[id];
      $("#id" + id).remove();
      //Reitialisation des champs

      $("#monFormUpdateLine #idTypeserviceMod").val('');
      $("#monFormUpdateLine #prixAchat").val('');
      $("#monFormUpdateLine #prixVente").val('');
      $("#monFormUpdateLine #quantite").val('');
      $('#updateLine').modal('hide');

      var idFamille = $("#idFamille").val();
      var element = {
        value: idFamille
      }

      loadTypeService(element);


    }
  }

  function sendAll() {
    var totalService = 0;
    if (isNaN(parseInt($("#prixVenteService").val()) * parseInt($("#quantiteService").val())))
      totalService = 0;
    else
      totalService = (parseInt($("#prixVenteService").val()) * parseInt($("#quantiteService").val()));
    var totalSousService = 0;
    $(".montantSousService").each(function() {
      if (isNaN(parseInt($(this).attr('data-value'))))
        totalSousService = totalSousService + 0;
      else
        totalSousService = totalSousService + parseInt($(this).attr('data-value'));
    });

    // console.log("id rubrique sendAll", $('#idRubrique').val())
    // console.log("id typeservice sendAll", $('#idTypeservice').val())

    if (((totalService == totalSousService) && (totalService != 0 && totalSousService != 0)) || (totalSousService == 0 && totalService != 0) || (totalSousService != 0 && totalService == 0)) {
      var idRubrique = $('#rubriqueid').val();
      var idTypeservice = $("#typeserviceid").val();
      console.log('je cherche', idTypeservice);

      var idFamille = $('#idFamille').val();
      //  var idTypeservice = $('#idTypeservice').val();
      var idFournisseur = $('#idFournisseur').val();
      var texteTypeService = $("#typeserviceid :selected").text();
      var texteRubrique = $("#textrubriqueid").val();
      var texteFamille = $("#idFamille :selected").text();
      var commentaireTypeservice = "Aucun";
      commentaireTypeservice = $('#commentaireTypeservice').val();
      var prixAchatService = "Aucun";
      prixAchatService = $('#prixAchatService').val();
      var prixVenteService = "Aucun";
      prixVenteService = $('#prixVenteService').val();
      var quantiteService = "Aucun";
      quantiteService = $('#quantiteService').val();
      //Maitenance en cours
      var sousServices = $('#sousServices').attr("value");
      // alert(sousServices);
      var idDevis = $('.idDevis').attr("value");
      var currentRubrique = $('#currentRubrique').attr("value");

      var idtypehidden = $("#typeserviceid").val();
      console.log("rubrique famille typeservice", idRubrique, idFamille, idTypeservice, idtypehidden, "sousServices: " + sousServices)
      // if(idFournisseur && idFournisseur !== ''){
      $('.loaderMessage').addClass('is-active');
      $.ajax({
        type: "POST",
        url: "php/controller/devis.php?addServices&idRubrique=" + idRubrique + "&idFamille=" + idFamille + "&idTypeservice=" + idTypeservice + "&sousServices=" + sousServices + "&idDevis=" + idDevis + "&idFournisseur=" + idFournisseur + "&prixAchatService=" + prixAchatService + "&prixVenteService=" + prixVenteService + "&quantiteService=" + quantiteService, //process to mail

        data: $(this).serialize(),
        success: function(msg) {
          //  console.log('results : ',msg)
          var msgvals = msg.split("#res#");
          var Affiche = (msgvals[1]).substr(0, (msgvals[1]).length - 1);
          // var Affiche = substr(msgvals[1], 0, -1);

          if (parseInt(msgvals[0]) == 1) {


            var sousServicesAffiche = Affiche;
            //  $sousServicesAffiche=  substr(Affiche, 0, -1)

            // console.log("sousServicesAffiche",sousServicesAffiche);
            if ($('#Rubrique' + idRubrique).length) {

              //On recupere le total actel de la rubrique
              var totalRubriqueActu = 0;
              if (isNaN(parseInt($("#ddRubrique" + idRubrique).attr('data-value'))))
                totalRubriqueActu = 0;
              else
                totalRubriqueActu = parseInt($("#ddRubrique" + idRubrique).attr('data-value'));

              var totalAffiche = 0;
              var totalAfficheValeur = 0;
              var totalServiceAffiche = 0;
              var totalServiceAfficheValeur = 0;

              if (totalService != 0) {
                totalAffiche = number_format((parseInt(totalService) + parseInt(totalRubriqueActu)), 0, '', ' ');
                totalAfficheValeur = parseInt(totalService) + parseInt(totalRubriqueActu);

                totalServiceAffiche = number_format(parseInt(totalService), 0, '', ' ');
                totalServiceAfficheValeur = parseInt(totalService);
              } else {
                totalAffiche = number_format((parseInt(totalSousService) + parseInt(totalRubriqueActu)), 0, '', ' ');
                totalAfficheValeur = parseInt(totalSousService) + parseInt(totalRubriqueActu);

                totalServiceAffiche = number_format(parseInt(totalSousService), 0, '', ' ');
                totalServiceAfficheValeur = parseInt(totalSousService);
              }
              //mise a jour total titre
              $("#ddRubrique" + idRubrique).attr("data-value", totalAfficheValeur);
              $("#ddRubriqueSomme" + idRubrique).html(totalAffiche + " F");
              // ajout de service$2
              if (!$('#Famille' + idFamille).length) {
                $("#Rubrique" + idRubrique).append(
                  '<div class="col-md-12" style="padding-left:0px; padding-right:0px;" data-id="' + idFamille + '" data-rubrique="' + idRubrique + '" id="Famille' + idFamille + '">' +
                  '  <p style="background-color: #a1cbe6; color: #fff; padding: 3px;"><span>' + texteFamille + '</span></p>' +
                  '</div>'
                );
              }
              console.log('idTypeservice:' + idTypeservice, "idRubrique: " + idRubrique, "idFamille: " + idFamille, "idTypeservice: " + idTypeservice, "texteTypeService: " + texteTypeService, "totalServiceAffiche: " + totalServiceAffiche);

              $("#Famille" + idFamille).append(
                '<div id="Typeservice' + idTypeservice + '" data-rubrique="' + idRubrique + '" data-famille="' + idFamille + '" class="col-md-12" style="padding-right:0px; padding-left:0px;">' +
                '<p style="float: right !important; padding-right: 0px !important; font-weight: bold;" class="typeServiceUtilise' + idFamille + '" data-value="' + idTypeservice + '"><strong>' + texteTypeService + '</strong><strong class="classTotalService" data-value="' + totalServiceAfficheValeur + '" style="float: right;padding-right: 0px;">' + totalServiceAffiche + ' F</strong></p>' +
                '<p >' +

                sousServicesAffiche +
                '</p>' +
                '</div>'
              );
            } else {

              var totalAffiche = 0;
              var totalAfficheValeur = 0;
              var totalServiceAfficheValeur = 0;

              if (totalService != 0) {
                totalAffiche = number_format(parseInt(totalService), 0, '', ' ') + " F";
                totalAfficheValeur = parseInt(totalService);

                totalServiceAffiche = number_format(parseInt(totalService), 0, '', ' ');
                totalServiceAfficheValeur = parseInt(totalService);
              } else {
                totalAffiche = number_format(parseInt(totalSousService), 0, '', ' ') + " F";
                totalAfficheValeur = parseInt(totalSousService);

                totalServiceAffiche = number_format(parseInt(totalSousService), 0, '', ' ');
                totalServiceAfficheValeur = parseInt(totalSousService);
              }
              //ajout de titre 1 
              //  totalAfficheValeur = 5000
              //texteRubrique = 'fdzkjf';

              $("#detailDevis").append(
                '<div class="col-md-12" id="Rubrique' + idRubrique + '" data-id="' + idRubrique + '">' +
                '  <p id="ddRubrique' + idRubrique + '" data-value="' + totalAfficheValeur + '" style="background-color: #46a1dc; color: #fff; padding: 3px;"><span>' + texteRubrique + '</span><strong style="float: right;" id="ddRubriqueSomme' + idRubrique + '">' + totalAffiche + '</strong></p>' +
                '</div>'
              );
              $("#Rubrique" + idRubrique).append(
                '<div class="col-md-12" style="padding-left:0px; padding-right:0px;" data-id="' + idFamille + '" data-rubrique="' + idRubrique + '" id="Famille' + idFamille + '">' +
                '  <p style="background-color: #a1cbe6; color: #fff; padding: 3px;"><span>' + texteFamille + '</span></p>' +
                '</div>'
              );


              // ajout de service
              /*$("#Famille"+idFamille).append(
                '<div class="col-md-12" style="padding-right:0px; padding-left:0px;">'
                  +'<p style="font-size:18px;"><strong>'+commentaireTypeservice+'</strong></p>'
                  +'<p class="typeServiceUtilise'+idFamille+'" data-value="'+idTypeservice+'"><strong>'+texteTypeService+'</strong><strong style="float: right; padding-right: 3px;">'+totalServiceAffiche+' F</strong></p>'
                  +'<p>'
                    +sousServicesAffiche
                  +'</p>'
                +'</div>'
              );*/
              console.log('idTypeservice:' + idTypeservice, "idRubrique: " + idRubrique, "idFamille: " + idFamille, "idTypeservice: " + idTypeservice, "texteTypeService: " + texteTypeService, "totalServiceAffiche: " + totalServiceAffiche, "Sous service : " + sousServicesAffiche);

              $("#Famille" + idFamille).append(
                '<div id="Typeservice' + idTypeservice + '" data-rubrique="' + idRubrique + '" data-famille="' + idFamille + '" class="col-md-12" style="padding-right:0px; padding-left:0px;">' +
                '<p style="float: right !important; padding-right: 0px !important; font-weight: bold;" class="typeServiceUtilise' + idFamille + '" data-value="' + idTypeservice + '"><strong>' + texteTypeService + '</strong><strong class="classTotalService"  style="float: right; padding-right: 0px;"></strong></p>' +
                '<p>' +
                sousServicesAffiche +
                '</p>' +
                '</div>'
              );
              //mise a jour de la valeur de la rubrique actuelle
              // $('#currentRubrique').attr('value', idRubrique);
            }

            //On efface la liste de sous services mis au dessus du formulaire d'ajout des sous services et le commantaire
            $("#sousServicesAjoutes").html("");
            $("#commentaireTypeservice").val('');
            $("#idFournisseur").val('');

            $("#prixAchatService").val('');
            $("#prixVenteService").val('');
            $("#quantiteService").val('');

            // on active les tooltips pour les bouttons de modification et suppression
            $(".optionModSup").tooltip();


            //On reinitiallilse les variables contenant les sousServices
            window.tableauSousService = {}
            $("#sousServices").attr("value", "");
            //Reactivation des Descriptifs prealablement desactives
            $(".optionSousService").each(function() {
              $(this).attr("disabled", false);
            });
            $('#idTypeservice').prop('selectedIndex', 0);
            $('#idTypeservice').select2();
            //Desactivation du service
            $("#idTypeservice :selected").attr("disabled", true);
            $('#idTypeservice').prop('selectedIndex', 0);
            $('#idTypeservice').select2();
            //desaction du boutton de validation pour forcer le choix du service
            $("#bouttonEnregistrer").attr("disabled", true);
            $("#bouttonEnregistrer").html("Choisissez un service");
            //On affiche le boutton de validation du devis
            $("#validerdevis").show();

            //On affiche le boutton de basculemen en mode edition
            $("#bouttonEdition").css("display", "block");


          } else if (parseInt(msgvals[0]) == 2) {
            swal({
              title: "Erreur",
              text: "Ce role existe d&eacute;j&agrave; ",
              imageUrl: 'dist/img/icones/error.png',
              html: true
            });
          } else if (parseInt(msgvals[0]) == -1) {
            swal({
              title: "Erreur",
              text: "Veuillez choisir le fournisseur ",
              imageUrl: 'dist/img/icones/error.png',
              html: true
            });
          } else {
            swal({
              title: "D&eacute;sol&eacute;",
              text: "Une erreur est survenue lors de la connexion &agrave; la base de donn&eacute;es, veuillez r&eacute;essayer plus tard",
              imageUrl: 'dist/img/icones/errorDb.png',
              html: true
            });
          }
          // alert(msgvals[1]);

          // alert("Valeur renvoyee :"+msgvals[0]+"contenu : "+msgvals[1]+"idRubrique="+idRubrique+"&idTypeservice="+idTypeservice);
          $('.loaderMessage').removeClass('is-active');
        },
        error: function() {
          $('.loaderMessage').removeClass('is-active');
          swal({
            title: "D&eacute;sol&eacute;",
            text: "Une erreur est survenue veuillez contacter l'administrateur",
            imageUrl: 'dist/img/icones/error.png',
            html: true
          });
        }
      });

      // }else{
      //     swal({
      //         title: "D&eacute;sol&eacute;",
      //         text: "Veuillez choisir un fournisseur svp !",
      //         imageUrl: 'dist/img/icones/error.png',
      //         html: true
      //       });
      //   }





      // alert("ok ------ Rubrique : "+idRubrique+" service : "+idTypeservice+" sousServices : "+sousServices);

    } else if (totalService == 0 && totalSousService == 0) {
      swal({
        title: "Erreur",
        text: "Vous devez remplir au moins le montant du service ou d'un de ses Descriptifs",
        imageUrl: 'dist/img/icones/error.png',
        html: true
      });
      // alert("Remplir au moins le montant  d'un service ou des sous service");
    } else {
      swal({
        title: "Erreur",
        text: "Le prix du service ne correspond pas &agrve; la sommes des prix de ses Descriptifs<br> Prix du service : " + totalService + " <br> Total des Descriptifs : " + totalSousService,
        imageUrl: 'dist/img/icones/error.png',
        html: true
      });
      // alert("NOn ok"+" totalService : "+totalService+" totalSousService : "+totalSousService);
    }
  }

  function serviceChange(elmt) {

    var idTypeservice = elmt.value;
    $('#typeserviceid').val(idTypeservice);
    $('#texttypeserviceid').val($("#idTypeservice :selected").text());
    $("#textdescriptifid").val($("#idTypeservice :selected").text());
    console.log("id type service loadTypeService", idTypeservice, $('#typeserviceid').val())

    if (parseInt(elmt.value) != 0) {
      $("#bouttonEnregistrer").attr("disabled", false);
      $("#bouttonEnregistrer").html("<i class='fa fa-save'></i> &nbsp; Enregristrer");
    } else {
      $("#bouttonEnregistrer").attr("disabled", true);
      $("#bouttonEnregistrer").html("Choisissez un service");
    }
  }

  function loadTypeService(elmt, idForm = 'newServiceExistantLigne', property = 'idTypeservice') {
    //SElection de la rubrique
    // $("#idRubrique").val($("#idFamille :selected").attr("data-rubrique"));
    // $('#idRubrique').select2();
    // $('#idRubrique option:not(:selected)').prop('disabled', true);



    $('.loaderMessage1').addClass('is-active');
    var idFamille = elmt.value;

    //On selectionne les type service de la rubrique deja prensent dans le devis pour les desactiver
    var typeServiceUtilises = "";
    $(".typeServiceUtilise" + idFamille).each(function() {
      typeServiceUtilises += $(this).attr('data-value') + ",";
    });

    var ur = "php/view/devis/fillList.php?idFamille=" + idFamille + "&typeServiceUtilises=" + typeServiceUtilises;
    $.ajax({
      url: ur,
      data: '',
      error: function(msg) {
        alert("Connexion impossible");
        $('.loaderMessage1').removeClass('is-active');
      },
      success: function(sg) {
        // alert(sg);
        if (sg != "") {
          $('#newServiceExistantLigne #idTypeservice').html(sg);
          $('#monFormUpdateLine #idTypeserviceMod').html(sg);
          $('#' + idForm + ' #' + property).html(sg);
          $("#bouttonEnregistrer").attr("disabled", true);
          $("#bouttonEnregistrer").html("Choisissez un service");
        } else {
          $('#newServiceExistantLigne #idTypeservice').html("");
          $('#monFormUpdateLine #idTypeserviceMod').html("");
          $("#bouttonEnregistrer").attr("disabled", true);
          $("#bouttonEnregistrer").html("Choisissez un service");
        }

        $('.loaderMessage1').removeClass('is-active');
      }
    });

    $('.loaderMessage1').removeClass('is-active');
  }

  function loadFamille(elmt) {

    $('.loaderMessage1').addClass('is-active');

    var idRubrique = elmt.value;
    $('#rubriqueid').val(idRubrique);

    $('#textrubriqueid').val($("#idRubrique :selected").text());
    console.log("id rubrique loadfamille", idRubrique, $('#rubriqueid').val())

    var ur = "php/view/devis/fillList.php?idRubrique=" + idRubrique;
    $.ajax({
      url: ur,
      data: '',
      error: function(msg) {
        alert("Connexion impossible");
        $('.loaderMessage1').removeClass('is-active');
      },
      success: function(sg) {
        //  alert(sg);
        if (sg != "") {
          $('#newServiceExistantLigne #idFamille').html(sg);
          $("#bouttonEnregistrer").attr("disabled", true);
          $("#bouttonEnregistrer").html("Choisissez un service");
        } else {
          $('#newServiceExistantLigne #idFamille').html("");
          $("#bouttonEnregistrer").attr("disabled", true);
          $("#bouttonEnregistrer").html("Choisissez un service");
        }

        $('.loaderMessage1').removeClass('is-active');
      }
    });

    $('.loaderMessage1').removeClass('is-active');
  }

  function loadContact(elmt) {
    $('.loaderMessage1').addClass('is-active');
    var idClient = elmt.value;

    var ur = "php/view/devis/fillList.php?idClient=" + idClient;
    $.ajax({
      url: ur,
      data: '',
      error: function(msg) {
        alert("Connexion impossible");
        $('.loaderMessage1').removeClass('is-active');
      },
      success: function(sg) {
        // alert(sg);
        if (sg != "") {
          $('#idContact').html(sg);
        } else {
          $('#idContact').html("");
        }

        $('.loaderMessage1').removeClass('is-active');
      }
    });

    $('.loaderMessage1').removeClass('is-active');
  }

  function setTelephone() {
    $("#telephoneContact").val($("#idContact :selected").attr("data-telephone"));
  }




  function deleteService(id) {
    swal({
        title: "Suppression",
        text: "&Ecirc;tes-vous s&ucirc;r de vouloir Supprimer ce &eacute;l&eacute;ment ?</strong>",
        type: "warning",
        showCancelButton: true,
        html: true,
        confirmButtonColor: "red",
        confirmButtonText: "Supprimer",
        cancelButtonText: "Annuler",
        closeOnConfirm: false,
        closeOnCancel: false
      },
      function(isConfirm) {
        if (isConfirm) {
          $.ajax({
            type: "GET",
            url: "php/controller/devis.php?supprimerService=" + id, //process to mail
            data: '',
            success: function(msg) {
              if (parseInt(msg) == 1) {
                swal({
                  title: "Effectué !",
                  text: "La suppression a &eacute;t&eacute; effectu&eacute;e avec succ&egrave;s",
                  imageUrl: 'dist/img/icones/success.png',
                  html: true
                });
                //Suppression de la ligne dans tableau
                $("#element" + id).remove()
                //Calcul du montant total
                var montantTotal = 0;
                $(".valeurMontantAddition").each(function() {
                  if (isNaN(parseInt($(this).attr('data-value'))))
                    montantTotal = montantTotal + 0;
                  else
                    montantTotal = montantTotal + parseInt($(this).attr('data-value'));
                });
                $("#montantDevis").html(number_format(montantTotal, 0, '', ' '));
              } else {
                swal({
                  title: "D&eacute;sol&eacute;",
                  text: "Une erreur est survenue lors de la connexion &agrave; la base de donn&eacute;es, veuillez r&eacute;essayer plus tard",
                  imageUrl: 'dist/img/icones/errorDb.png',
                  html: true
                });
              }
              // alert(msg);
            },
            error: function() {
              swal({
                title: "D&eacute;sol&eacute;",
                text: "Une erreur est survenue veuillez contacter l'administrateur",
                imageUrl: 'dist/img/icones/error.png',
                html: true
              });
            }
          });
        } else {
          swal({
            title: "Annul&eacute;",
            text: "L'&eacute;l&eacute;ment n'a pas &eacute;t&eacute; supprim&eacute;",
            imageUrl: 'dist/img/icones/success.png',
            html: true
          });

        }
      });
  }

  function askPrintDevis() {


    swal({
        title: "Devis enregistr&eacute; avec succ&egrave;s",
        text: "Voulez-vous g&eacute;n&eacute;rer le document du devis maintenant ?</strong>",
        type: "info",
        showCancelButton: true,
        html: true,
        confirmButtonColor: "green",
        confirmButtonText: "Oui, générer",
        cancelButtonText: "Non, plus tard",
        closeOnConfirm: true,
        closeOnCancel: false
      },
      function(isConfirm) {
        if (isConfirm) {
          $('#preloaderImpression').modal({
            backdrop: 'static',
            keyboard: false
          });
          $("#preloaderImpression").modal('show');
          var idDevis = $(".idDevis").attr("value");
          // alert(idDevis);
          $.ajax({
            type: "POST",
            url: "doc/devisCommercial.php?idDevis=" + idDevis,
            data: $(this).serialize(),
            success: function(msg) {
              if ($.isNumeric(msg)) {
                $('#preloaderImpression').modal('hide');
                swal({
                  title: "Devis créé avec succès!",
                  text: "<div class='row'><div class='col-sm-3'><a onclick='swal.close();' class='btn btn-default' id='closeModal'>Fermer</a></div><div class='col-sm-9' style='text-align:right;'><a class='btn btn-success' href='doc/devis/DevisCommercial_" + msg + ".pdf' target='_blank'>Ouvrir le devis</a></div></div>",
                  showConfirmButton: false,
                  html: true
                });
              } else {
                $('#preloaderImpression').modal('hide');
                swal("Le devis que vous essayez de créer est actuellement ouvert sur votre ordinateur. Veuillez le fermer puis reéssayer");
              }
              //  alert(msg);
              $('.loaderMessage').removeClass('is-active');
            },
            error: function() {
              $('.loaderMessage').removeClass('is-active');
              swal({
                title: "D&eacute;sol&eacute;",
                text: "Une erreur est survenue veuillez contacter l'administrateur",
                imageUrl: 'images/icones/error.png',
                html: true
              });
            }
          });
        } else {
          window.location.href = "devis_listeavalider";
          // swal({ title: "Annul&eacute;", text: "L'&eacute;l&eacute;ment n'a pas &eacute;t&eacute; supprim&eacute;", imageUrl: 'dist/img/icones/success.png', html: true});

        }
      });
  }
</script>


<style type="text/css">
  .slow-spin {
    -webkit-animation: fa-spin 0.8s infinite linear;
    animation: fa-spin 0.8s infinite linear;
    color: #000;
  }
</style>
<div id="preloaderImpression" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <div class="col s12 m4" style="text-align: center;">
          <i class="fa fa-circle-o-notch slow-spin" style="font-size:62px"></i>

        </div>
        <div class="col s12 m4" style="text-align: center;">
          Veuillez patienter. Le document est en cours de cr&eacute;ation ...
        </div>
      </div>

    </div>
  </div>
</div>


<div id="updateLine" class="modal fade" role="dialog">
  <div class="modal-dialog" style="width: 90%;">
    <div class="modal-content">
      <div class="modal-body">
        <form id="monFormUpdateLine">
          <div class="row" style="margin-left: 0px; margin-right: 0px;">
            <div class="col-md-10" style="padding-right: 0px;">
              <div class="col-md-3" style="padding-left: 0px;">
                <div class="form-group">
                  <label>Descriptif</label>
                  <select onchange="serviceChange(this)" class="form-control select2" style="width: 100%;" required="" id="idTypeserviceMod" name="idTypeserviceMod">

                  </select>
                  <!-- <select class="form-control select2" style="width: 100%;" required="" id="idServiceMod" name="idServiceMod">
                    <option disabled="" selected="" value="">Choisir un descriptif</option>
                    <?php
                    require_once('php/classe/classeService.php');
                    $Service = new Service();
                    $list = $Service->listService();
                    if (!empty($list)) {
                      foreach ($list as $value) {
                        echo '<option value="' . $value['idService'] . '">' . $value['service'] . '</option>';
                      }
                    }

                    ?>
                  </select> -->
                </div>
              </div>
              <div class="col-md-3" style="padding-left: 0px;">
                <div class="form-group">
                  <label for="prixAchat">Prix d'Achat</label>
                  <input type="number" min="0" value="0" class="form-control" id="prixAchat" name="prixAchat" placeholder="Entrer le prix d'achat" required="required">
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
                  <label for="quantite">Quantité</label>
                  <input type="number" value="1" required="" class="form-control" id="quantite" name="quantite" min="1" placeholder="Quantité">
                </div>
              </div>
            </div>
            <div class="col-md-2" style="padding-left: 0px;">
              <input type="hidden" id="oldIdSousService" name="oldIdSousService" value="">
              <button style="margin-top: 10px; margin-left: 0px;" type="button" onclick="saveDetailsUpdate()" class="btn btn-success btn-sm"> Enregistrer les modifications</button>
              <button style="margin-top: 10px; margin-left: 0px;" type="button" onclick="hotDeleteLine()" class="btn btn-danger btn-sm"> Supprimer ce descriptif</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modalrubrique">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:red;">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Ajout Type service</h4>
      </div>
      <form id="monFormRubrique">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <!--  <div class="form-group">
                  <label for="referenceRubrique">Référence</label>
                  <input type="text" class="form-control" id="referenceRubrique" name="referenceRubrique" placeholder="Entrer la référence" required="required">
              </div> -->

              <!-- /.form-group -->
              <div class="form-group">
                <label for="rubrique">Type service</label>
                <input type="text" class="form-control" id="rubrique" name="rubrique" placeholder="Entrer la rubrique" required="required">
              </div>
              <!-- /.form-group -->
              <!-- /.form-group -->
              <div class="form-group">
                <label for="description">Description</label>
                <input type="text" class="form-control" id="description" name="description" placeholder="Entrer la description">
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="ajouterRubrique">
          <button type="reset" class="btn btn-default pull-left">Annuler</button>
          <button type="submit" class="btn btn-primary">Valider</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>


<div class="modal fade" id="modaltypeservice">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:red;">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Ajout Service</h4>
      </div>
      <form id="monFormServiceType">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Type service</label>
                <select class="form-control select2" style="width: 100%;" required="" name="idRubrique" id="divmodalservice">
                  <?php
                  require_once('php/classe/classeRubrique.php');
                  $Rubrique = new Rubrique();
                  $list = $Rubrique->listRubrique();
                  if (!empty($list)) {
                    foreach ($list as $value) {
                      echo '<option value="' . $value['idRubrique'] . '">' . $value['rubrique'] . '</option>';
                    }
                  }

                  ?>
                </select>
              </div>
              <div class="form-group">
                <label for="typeService">Service</label>
                <input type="text" class="form-control" id="typeService" name="typeService" placeholder="Entrer le type de service" required="required">
              </div>
              <!-- /.form-group -->
              <!-- /.form-group -->
              <div class="form-group">
                <label for="description">Description</label>
                <input type="text" class="form-control" id="description" name="description" placeholder="Entrer la description">
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="ajoutService">
          <button type="reset" class="btn btn-default pull-left">Annuler</button>
          <button type="submit" class="btn btn-primary">Valider</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modaldescriptif">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:red;">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Ajout Descriptif</h4>
      </div>
      <form id="monFormDescriptif">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Service</label>
                <select class="form-control select2" style="width: 100%;" required="" name="idFamille" id="divmodaldescriptif">
                  <?php
                  require_once('php/classe/classeFamille.php');
                  $Famille = new Famille();
                  $list = $Famille->listFamille();
                  if (!empty($list)) {
                    foreach ($list as $value) {
                      echo '<option value="' . $value['idFamille'] . '">' . $value['famille'] . '</option>';
                    }
                  }

                  ?>
                </select>
              </div>
              <div class="form-group">
                <label for="typeService">descriptif</label>
                <input type="text" class="form-control" id="typeService" name="typeService" placeholder="Entrer le type de service" required="required">
              </div>
              <!-- /.form-group -->
              <!-- /.form-group -->
              <div class="form-group">
                <label for="description">Description</label>
                <input type="text" class="form-control" id="description" name="description" placeholder="Entrer la description">
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="ajouterDescriptif">
          <button type="reset" class="btn btn-default pull-left">Annuler</button>
          <button type="submit" class="btn btn-primary">Valider</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>


<link href="dist/js/summernote/summernote-lite.css" rel="stylesheet">
<script src="dist/js/summernote/summernote-lite.js"></script>

<script src="dist/js/summernote/summernote-fr-FR.js"></script>
<script type="text/javascript">
  $('.summernote').summernote({
    lang: 'fr-FR',
    toolbar: [
      // [groupName, [list of button]]
      ['color', ['color']],
      ['fullscreen', ['fullscreen']]

    ],

  });
  $('#monFormRubrique').on('submit', function(e) {
    e.preventDefault();
    $('.loaderMessage').addClass('is-active');
    $.ajax({
      type: "POST",
      url: "php/controller/devis.php", //process to mail
      data: $(this).serialize(),
      success: function(msg) {
        if (parseInt(msg) == 1) {
          swal({
            title: "Effectué !",
            text: "Le type service a &eacute;t&eacute; ajout&eacute;e avec succ&egrave;s",
            imageUrl: 'dist/img/icones/success.png',
            html: true
          });
          $("#modalrubrique").modal("hide");
          var idRubrique = document.getElementById("rubrique").value;
          console.log("idrubrique ", idRubrique)
          // $("#idRubrique").append("<option value="' . $value['idRubrique'] . '">' . $value['rubrique'] . '</option>");

          if (idRubrique) {
            console.log("id rubrique ", idRubrique)
            var ur = "php/view/devis/fill.php?idRubrique=" + idRubrique;
            $.ajax({
              url: ur,
              data: '',
              error: function(msg) {
                alert("Connexion impossible");
                $('.loaderMessage1').removeClass('is-active');
              },
              success: function(sg) {
                // alert(sg);

                if (sg != "") {
                  $('#idRubrique').html(sg);

                  $('#divmodalservice').html(sg);





                } else {
                  $('#idRubrique').html("");

                }

                $('.loaderMessage1').removeClass('is-active');
              }
            });

            $('.loaderMessage1').removeClass('is-active');
          }

          $('.loaderMessage1').removeClass('is-active');


        } else if (parseInt(msg) == 2) {
          swal({
            title: "Erreur",
            text: "Cette rubrique existe d&eacute;j&agrave; ",
            imageUrl: 'dist/img/icones/error.png',
            html: true
          });
        } else {
          swal({
            title: "D&eacute;sol&eacute;",
            text: "Une erreur est survenue lors de la connexion &agrave; la base de donn&eacute;es, veuillez r&eacute;essayer plus tard",
            igmageUrl: 'dist/img/icones/errorDb.png',
            html: true
          });
        }
        // alert(msg);
        $('.loaderMessage').removeClass('is-active');
      },
      error: function() {
        $('.loaderMessage').removeClass('is-active');
        swal({
          title: "D&eacute;sol&eacute;",
          text: "Une erreur est survenue veuillez contacter l'administrateur",
          imageUrl: 'dist/img/icones/error.png',
          html: true
        });
      }
    });
  });

  $('#monFormServiceType').on('submit', function(e) {
    e.preventDefault();
    $('.loaderMessage').addClass('is-active');
    $.ajax({
      type: "POST",
      url: "php/controller/devis.php", //process to mail
      data: $(this).serialize(),
      success: function(msg) {
        if (parseInt(msg) == 1) {

          swal({
            title: "Effectué !",
            text: "Le service a &eacute;t&eacute; ajout&eacute; avec succ&egrave;s",
            imageUrl: 'dist/img/icones/success.png',
            html: true
          });
          $("#modaltypeservice").modal("hide");
          // $('.loaderMessage1').addClass('is-active');
          var idRubrique = $('#rubriqueid').val();

          if (idRubrique) {
            $('#textrubriqueid').val($("#idRubrique :selected").text());
            console.log("id rubrique loadfamille", idRubrique, $('#rubriqueid').val())
            var ur = "php/view/devis/fillList.php?idRubrique=" + idRubrique;
            $.ajax({
              url: ur,
              data: '',
              error: function(msg) {
                alert("Connexion impossible");
                $('.loaderMessage1').removeClass('is-active');
              },
              success: function(sg) {
                //  alert(sg);
                if (sg != "") {
                  $('#newServiceExistantLigne #idFamille').html(sg);
                  $('#divmodaldescriptif').html(sg);

                  $("#bouttonEnregistrer").attr("disabled", true);
                  $("#bouttonEnregistrer").html("Choisissez un service");
                } else {
                  $('#newServiceExistantLigne #idFamille').html("");
                  $("#bouttonEnregistrer").attr("disabled", true);
                  $("#bouttonEnregistrer").html("Choisissez un service");
                }

                $('.loaderMessage1').removeClass('is-active');
              }
            });

            $('.loaderMessage1').removeClass('is-active');
          }


        } else if (parseInt(msg) == 2) {
          swal({
            title: "Erreur",
            text: "Ce type de service existe d&eacute;j&agrave; ",
            imageUrl: 'dist/img/icones/error.png',
            html: true
          });
        } else {
          swal({
            title: "D&eacute;sol&eacute;",
            text: "Une erreur est survenue lors de la connexion &agrave; la base de donn&eacute;es, veuillez r&eacute;essayer plus tard",
            imageUrl: 'dist/img/icones/errorDb.png',
            html: true
          });
        }
        //  alert(msg);
        $('.loaderMessage').removeClass('is-active');
      },
      error: function() {
        $('.loaderMessage').removeClass('is-active');
        swal({
          title: "D&eacute;sol&eacute;",
          text: "Une erreur est survenue veuillez contacter l'administrateur",
          imageUrl: 'dist/img/icones/error.png',
          html: true
        });
      }
    });
  });

  $('#monFormDescriptif').on('submit', function(e) {
    e.preventDefault();
    $('.loaderMessage').addClass('is-active');
    $.ajax({
      type: "POST",
      url: "php/controller/devis.php", //process to mail
      data: $(this).serialize(),
      success: function(msg) {
        if (parseInt(msg) == 1) {
          swal({
            title: "Effectué !",
            text: "Le descriptif a &eacute;t&eacute; ajout&eacute; avec succ&egrave;s",
            imageUrl: 'dist/img/icones/success.png',
            html: true
          });
          // $('.loaderMessage1').addClass('is-active');
          var typeServiceUtilises = "";

          $("#modaldescriptif").modal("hide");

          var idFamille = $('#idFamille').val();

          console.log("idfamille:" + idFamille, "typeServiceUtilises :" + typeServiceUtilises, " typeservice:" + $("#typeserviceid").val())


          if (idFamille) {
            // $('#texttypeserviceid').val($("#idTypeservice :selected").text());
            console.log("typeServiceUtilises", typeServiceUtilises);
            var ur = "php/view/devis/fillList.php?idFamille=" + idFamille + "&typeServiceUtilises=" + typeServiceUtilises;
            $.ajax({
              url: ur,
              data: '',
              error: function(msg) {
                alert("Connexion impossible");
                $('.loaderMessage1').removeClass('is-active');
              },
              success: function(sg) {
                // alert(sg);
                if (sg != "") {
                  $('#newServiceExistantLigne #idTypeservice').html(sg);
                  $("#bouttonEnregistrer").attr("disabled", true);
                  $("#bouttonEnregistrer").html("Choisissez un service");
                } else {
                  $('#newServiceExistantLigne #idTypeservice').html("");
                  $("#bouttonEnregistrer").attr("disabled", true);
                  $("#bouttonEnregistrer").html("Choisissez un service");
                }

                $('.loaderMessage1').removeClass('is-active');
              }
            });

            $('.loaderMessage1').removeClass('is-active');
          }

        } else if (parseInt(msg) == 2) {
          swal({
            title: "Erreur",
            text: "Ce service existe d&eacute;j&agrave; ",
            imageUrl: 'dist/img/icones/error.png',
            html: true
          });
        } else {
          swal({
            title: "D&eacute;sol&eacute;",
            text: "Une erreur est survenue lors de la connexion &agrave; la base de donn&eacute;es, veuillez r&eacute;essayer plus tard",
            imageUrl: 'dist/img/icones/errorDb.png',
            html: true
          });
        }
        // alert(msg);
        $('.loaderMessage').removeClass('is-active');
      },
      error: function() {
        $('.loaderMessage').removeClass('is-active');
        swal({
          title: "D&eacute;sol&eacute;",
          text: "Une erreur est survenue veuillez contacter l'administrateur",
          imageUrl: 'dist/img/icones/error.png',
          html: true
        });
      }
    });
  });
</script>

<a href="#" class="float btn" data-toggle="tooltip" title="Basculer en mode &eacute;dition" style="display: none;" id="bouttonEdition">
  <i class="fa fa-pencil my-float"></i>
</a>