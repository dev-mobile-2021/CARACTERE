<script type="text/javascript" src="php/view/bon/bon.js"></script>

<div class="content-wrapper">
   <div class="loader loaderMessage loader-bar" data-text="Traitement en cours. Veuillez patienter" data-rounded></div>
  <section class="content">
    <section class="content-header">
      <h1>
        Bon de commande
        <small>Nouveau bon de commande</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Accueil</a></li>
        <li><a href="bon_liste"> Bon de commande</a></li>
        <li class="active">Nouveau bon de commande</li>
      </ol>
    </section>

    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Entête du Bon de commande</h3><br><br><span style="color:red"><em><u>Note</u> : Les champs précédés de (*) sont obligatoires</em></span>
        </div>
        <!-- /.box-header -->
          <form id="monForm">
          <div class="box-body">
          <div class="row">
            <!-- col -->
            <div class="col-md-4">
              <div class="form-group">
                <label for="iduser">Responsable <span style="color:red">*</span></label>
                  <input type="text" class="form-control" id="iduser" name="iduser" placeholder="Entrer le responsable" value="<?php echo $_SESSION['gestionDevisprenom'].' '.$_SESSION['gestionDevisnom']; ?>" disabled required="required">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="numeroProforma">N&deg; proforma <span style="color:red">*</span></label>
                  <input type="text" class="form-control" id="numeroProforma" name="numeroProforma" placeholder="Entrer le N&deg; proforma" value=""  required="required">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="idClient">Client <span style="color:red">*</span></label>
                <select class="form-control select2" required="" name="idClient">
                <option value="">Choisir le client</option>
                  <?php
                    require_once('php/classe/classeClient.php');
                    $Client = new Client();
                    $list = $Client->listClient();
                    if(!empty($list)){
                      foreach($list as $value){
                        echo '<option value="'.$value['idClient'].'">'.$value['prenomClient']." ".$value['nomClient'].'</option>';  
                      }
                    }
                  ?>               
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="contact">Contact <span style="color:red">*</span></label>
                <input type="text" class="form-control" id="contact" name="contact" placeholder="Entrer le contact" required="required">
              </div>
            </div>
            <!-- /.col -->
            <!-- col -->
            <div class="col-md-4">
              <div class="form-group">
                <label for="titre">Titre <span style="color:red">*</span></label>
                <input type="text" class="form-control" id="titre" name="titre" placeholder="Entrer le titre du bon" required="required">
              </div>
            </div>
             <div class="col-md-4">
              <div class="form-group">
                <label for="delaisLivraison">D&eacute;lais de livraison</label>
                <input type="text" class="form-control" id="delaisLivraison" name="delaisLivraison" placeholder="Entrer le delais de livraison">
              </div>
            </div>
          </div>
            <!-- /.col -->
            <!-- col -->
            <div class="row">

              <div class="col-md-4">
                <div class="form-group">
                  <label for="idTypetaxe">Taxe &agrave; appliquer</label>
                  <select class="form-control select2" name="idTypetaxe">
                    <option value="0">Choisir une taxe</option>
                    <?php
                      require_once('php/classe/classeTypetaxe.php');
                      $Typetaxe = new Typetaxe();
                      $list = $Typetaxe->listTypetaxe();
                      if(!empty($list)){
                        foreach($list as $value){
                          echo '<option value="'.$value['idTypetaxe'].'">'.$value['libelle'].' ('.$value['valeur'].' %)</option>';  
                        }
                      }
                    ?>                    
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="conditionPaiement">Conditions de paiement <span style="color:red">*</span></label>
                  <!-- <textarea class="form-control" name="conditionPaiement" id="commentaire" cols="3" rows="5" placeholder="Entrer les conditions de paiement"></textarea> -->
                  <div class="radio">
                      <label>
                        <input type="radio" name="conditionPaiement" id="avant" value="Paiement avant la commande" required>
                        Paiement avant la commande
                      </label>
                  </div>
                  <div class="radio">
                      <label>
                        <input type="radio" name="conditionPaiement" id="apres" value="Paiement au moment de la commande" required>
                        Paiement au moment de la commande
                      </label>
                  </div>
                  <div class="radio">
                      <label>
                        <input type="radio" name="conditionPaiement" id="autre" value="Autre" required>
                        Autre
                      </label>  
                      <input type="text" class="form-control" name="autre" placeholder="Autre à préciser" value="">     
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="notabene">Commentaire(s)</label>
                  <textarea class="form-control" name="notabene" id="notabene" cols="3" rows="5" placeholder="Entrer le(s) commentaire(s)"></textarea>
                </div>
              </div>
            </div>
            <!-- /.col -->            
          </div>
          <div class="box-footer">
            <input type="hidden" name="ajouter">
            <input type="hidden" name="idDevis" value="<?php echo $opt[1]; ?>">
            <!-- <button type="reset" class="btn btn-danger pull-right">Réinitialiser</button> -->
            <button type="submit" class="btn btn-primary pull-right">Suivant &gt;</button>
          </div>
        
        </form>
          <!-- /.row -->
        </div>
        
      <!-- </div> -->
      <!-- /.box -->
      <!-- /.row -->
    </section>



    <section class="content">
      
      <div class="box box-warning" id="parentContentBon">
        <div class="box-header">
          <h3 class="box-title">Détails du Bon de commande</h3>
        </div>
        <div class="box-boby">
          <div class="box box-default" id="formulairesServiceBon">
            
            <div class="box-body" id="newPackLigne">      
              <form id="monFormService" action="" method="post">
                <div class="row">
                  
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="designation">D&eacute;signation</label>
                      <input type="text" class="form-control" id="designation" name="designation" placeholder="Entrer la d&eacute;signation" required="required">
                    </div>
                  </div>  

                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="prixUnitaire">Prix unitaire</label>
                      <input type="number" class="form-control" id="prixUnitaire" name="prixUnitaire" placeholder="Entrer le prix unitaire" required="required">
                    </div>
                  </div>  
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="quantite">Quantit&eacute;</label>
                      <input type="number" required="" class="form-control" id="quantite" name="quantite" min="0" placeholder="Entrer la quantit&eacute;">                
                    </div>
                  </div>  
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="btnSave">&nbsp;</label>
                      <input type="hidden" name="ajouterProduit">
                      <input type="hidden" class="idBon" name="idBon">
                      <button style="margin-top: 25px;" type="submit" id="btnSave" class="btn btn-success"><i class="fa fa-save"></i> Ajouter</button>
                      <!-- <button style="margin-top: 25px; color:red;" type="button" class="btn" id="hidePack"><i class="fa fa-remove"></i></button>                 -->
                    </div>
                  </div>            
                </div>
              </form>
            </div>

          </div>
          <div class="box box-default" id="contentBon">
            <table class="table table-hover table-responsive" style="margin-top: 20px;">
              <thead>
                <tr>
                  <th>D&eacute;signation</th>
                  <th>Prix unitaire</th>
                  <th>Quantit&eacute;</th>
                  <th>Total</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody id="showdata"></tbody>
            </table>
            <div class="row">
              <div class="col-md-12" style="text-align: center;">
                <p style="font-size: 35px;">Total : <strong id="montantBon"></strong><strong>F</strong></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="content" style="display: block;" id="validerbon">
      <div class="box box-success">
        <div class="box-header">
          <div class="pull-left">
              <a href="javascript:void(0);" onclick="askPrintBon()" class="btn btn-success item-bon"><i class="fa fa-check"></i>VALIDER LE BON DE COMMANDE</a>
            </div>
        </div>
      </div>
    </section>
  </section>
</div>
<script type="text/javascript">
  $( document ).ready(function() {
    // $("#newServiceExistantLigne").hide();
    // $("#newNouveauServiceLigne").hide();
    // $("#newPackLigne").hide();
    

    // $("#formulairesServiceBon").hide();
    $("#parentContentBon").hide();
    $("#contentBon").hide();
    $("#validerbon").hide();


  });


  

function number_format (number, decimals, dec_point, thousands_sep) {
    // Strip all characters but numerical ones.
    number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
    var n = !isFinite(+number) ? 0 : +number,
        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
        sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
        dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
        s = '',
        toFixedFix = function (n, prec) {
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
function deleteProduit(id){
  swal({   title: "Suppression",   
             text: "&Ecirc;tes-vous s&ucirc;r de vouloir Supprimer ce &eacute;l&eacute;ment ?</strong>",   
             type: "warning",   
             showCancelButton: true,
             html:true,   
             confirmButtonColor: "red",   
             confirmButtonText: "Supprimer",   
             cancelButtonText: "Annuler",   
             closeOnConfirm: false,   
             closeOnCancel: false }, 
            function(isConfirm){   
                if (isConfirm) {  
                    $.ajax({
                        type: "GET",
                        url: "php/controller/bon.php?supprimerProduit="+id, //process to mail
                        data: '',
                        success: function(msg){
                            if(parseInt(msg)==1){
                                swal({ title: "Effectué !", text: "La suppression a &eacute;t&eacute; effectu&eacute;e avec succ&egrave;s", imageUrl: 'dist/img/icones/success.png', html: true});
                                //Suppression de la ligne dans tableau
                                $("#element"+id).remove()
                                //Calcul du montant total
                                var montantTotal = 0;
                                $(".valeurMontantAddition").each(function(){
                                    if(isNaN(parseInt($(this).attr('data-value'))))
                                        montantTotal = montantTotal + 0;
                                    else
                                        montantTotal = montantTotal + parseInt($(this).attr('data-value'));
                                });
                                $("#montantBon").html(number_format(montantTotal, 0, '', ' '));
                            }
                            else{ 
                                swal({ title: "D&eacute;sol&eacute;", text: "Une erreur est survenue lors de la connexion &agrave; la base de donn&eacute;es, veuillez r&eacute;essayer plus tard", imageUrl: 'dist/img/icones/errorDb.png', html: true});
                            }
                           // alert(msg); 
                        },
                        error: function(){
                            swal({ title: "D&eacute;sol&eacute;", text: "Une erreur est survenue veuillez contacter l'administrateur", imageUrl: 'dist/img/icones/error.png', html: true});                            
                        }
                        });  
                } 
                else {
                    swal({ title: "Annul&eacute;", text: "L'&eacute;l&eacute;ment n'a pas &eacute;t&eacute; supprim&eacute;", imageUrl: 'dist/img/icones/success.png', html: true});

                } 
        });
}
function askPrintBon(){
  

  swal({   title: "Bon enregistr&eacute; avec succ&egrave;s",   
             text: "Voulez-vous g&eacute;n&eacute;rer le document du bon maintenant ?</strong>",   
             type: "info",   
             showCancelButton: true,
             html:true,   
             confirmButtonColor: "green",   
             confirmButtonText: "Oui, générer",   
             cancelButtonText: "Non, plus tard",   
             closeOnConfirm: true,   
             closeOnCancel: false }, 
            function(isConfirm){   
                if (isConfirm) {  
                    $('#preloaderImpression').modal({
                      backdrop: 'static',
                      keyboard: false
                    })
                    $("#preloaderImpression").modal('show');
                    var idBon = $(".idBon").attr("value");
                    // alert(idBon);
                    $.ajax({
                      type: "POST",
                      url: "doc/bcfournisseur.php?idBon="+idBon, 
                      data: $(this).serialize(),
                      success: function(msg){
                          if($.isNumeric(msg)){
                              $('#preloaderImpression').modal('hide');
                              swal({   
                                title: "Bon créé avec succès!",   
                                text: "<div class='row'><div class='col-sm-3'><a onclick='swal.close();' class='btn btn-default' id='closeModal'>Fermer</a></div><div class='col-sm-9' style='text-align:right;'><a class='btn btn-success' href='doc/bon/BcFournisseur_"+msg+".pdf' target='_blank'>Ouvrir le bon</a></div></div>",   
                                showConfirmButton: false,
                                html: true
                              });
                          }else{ 
                              $('#preloaderImpression').modal('hide');
                              swal("Le bon que vous essayez de créer est actuellement ouvert sur votre ordinateur. Veuillez le fermer puis reéssayer");
                          }
                         // alert(msg);
                         $('.loaderMessage').removeClass('is-active');
                      },
                      error: function(){
                          $('.loaderMessage').removeClass('is-active');
                          swal({ title: "D&eacute;sol&eacute;", text: "Une erreur est survenue veuillez contacter l'administrateur", imageUrl: 'images/icones/error.png', html: true});
                      }
                  });  
                } 
                else {
                  window.location.href="bon_listeavalider";
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
