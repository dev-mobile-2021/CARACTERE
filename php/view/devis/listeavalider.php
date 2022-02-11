<script type="text/javascript" src="php/view/devis/statut.js"></script>
<div class="content-wrapper">
  <section class="content">
    <div class="loader loaderMessage loader-bar" data-text="Traitement en cours. Veuillez patienter" data-rounded></div>
    <section class="content-header">
      <h1>
        Devis
        <small>Liste des devis &agrave; valider</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i>Accueil</a></li>
        <li><a href="#">Devis</a></li>
        <li class="active">Liste des devis &agrave; valider</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box  box-primary">
            <div class="box-header">
              <h3 class="box-title">Liste des devis &agrave; valider</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <form action="php/controller/exportdevisavalider.php" method="post">
                  <input type="submit" name="export_excel" class="btn btn-bg btn-success " value="Exporter">
               
              </form>
              <br><br>
              <!-- <a id="btnAdddevis" data-toggle="modal" data-target="#modaldevis">
                <button class="btn btn-primary btn-rounded btn-icon left-icon"> <i class="fa fa-plus"></i> <span>Ajouter devis</span></button>
              </a><br><br> -->
              <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                <div class="row">
                  <div class="col-sm-12">
                    <table id="example1" class="table table-bordered table-hover dataTable">
                      <thead>
                        <tr role="row">
                          <th>Numéro</th>
                          <th>Objet</th>
                          <th>Auteur</th>
                          <th>Client</th>
                          <th>Montant (FCFA)</th>
                          <th>Date</th>
                          <th>Action</th>
                          <th>Etat</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                          require_once("loadListDevis.php"); 
                          loadListDevis(" AND idEtat = 1");
                        ?>
                      </tbody>
                      <tfoot>
                        <!-- <tr>
                          <th rowspan="1" colspan="1">Prénom(s)</th>
                          <th rowspan="1" colspan="1">Nom</th>
                          <th rowspan="1" colspan="1">Email</th>
                          <th rowspan="1" colspan="1">Téléphone</th>
                          <th rowspan="1" colspan="1">Profil</th>
                        </tr> -->
                      </tfoot>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
  </section>
</div>
<script type="text/javascript">

function commenter(idDevis, idDestinataire){
  $("#addCommenaire #idDevis").attr("value", idDevis);
  $("#addCommenaire #idDestinataire").attr("value", idDestinataire);
  $("#addCommenaire").modal("show");
}

function validerCorrection(idDevis){
    swal({   title: "Notification de correction du devis",   
    text: "&Ecirc;tes-vous s&ucirc;r de vouloir notifier la correction de ce devis maintenant ?</strong>",   
    type: "info",   
    showCancelButton: true,
    html:true,   
    confirmButtonColor: "green",   
    confirmButtonText: "Oui, Valider",   
    cancelButtonText: "Non, plus tard",   
    closeOnConfirm: false,   
    closeOnCancel: false }, 
    function(isConfirm){   
        if (isConfirm) { 
          $('.loaderMessage').addClass('is-active'); 
            $.ajax({
              type: "GET",
              url: "php/controller/devis.php?validerCorrection&idDevis="+idDevis, 
              data: $(this).serialize(),
              success: function(msg){
                  if(parseInt(msg)==1){
                      swal({ title: "Effectué !", text: "La notification de correction a &eacute;t&eacute; envoy&eacute;e avec succ&egrave;s", imageUrl: 'dist/img/icones/success.png', html: true});
                      $(document).click(function(){
                         location.reload();
                      });
                  }else{ 
                    swal({ title: "D&eacute;sol&eacute;", text: "Une erreur est survenue lors de la connexion &agrave; la base de donn&eacute;es, veuillez r&eacute;essayer plus tard", imageUrl: 'dist/img/icones/errorDb.png', html: true});
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
          swal.close();
          // window.location.href="devis_listeavalider";
            // swal({ title: "Annul&eacute;", text: "L'&eacute;l&eacute;ment n'a pas &eacute;t&eacute; supprim&eacute;", imageUrl: 'dist/img/icones/success.png', html: true});

        } 
      });
}

function validationClient(idDevis){
  $("#addValidationclient #idDevis").attr("value", idDevis);
  $("#addValidationclient").modal("show");
}

function receptionBC(idDevis){
  $("#addReceptionbc #idDevis").attr("value", idDevis);
  $("#addReceptionbc").modal("show");
}


function voirCommentaire(idDevis){
  $('.loaderMessage').addClass('is-active');
    $.ajax({
        type: "POST",
        url: "php/controller/devis.php?getComment&idDevis="+idDevis, //process to mail
        data: $(this).serialize(),
        success: function(msg){
            if(msg != ""){
                  $("#contenuCommentaire").html(msg);
                  $("#voirCommenaire").modal("show");

            }else{ 
                swal({ title: "D&eacute;sol&eacute;", text: "Une erreur est survenue lors de la connexion &agrave; la base de donn&eacute;es, veuillez r&eacute;essayer plus tard", imageUrl: 'dist/img/icones/errorDb.png', html: true});
            }
           $('.loaderMessage').removeClass('is-active');
           alert(msg);
        },
        error: function(){
            $('.loaderMessage').removeClass('is-active');
            swal({ title: "D&eacute;sol&eacute;", text: "Une erreur est survenue veuillez contacter l'administrateur", imageUrl: 'dist/img/icones/error.png', html: true});
        }
    });
  
}

function livrer(idDevis){
  

  swal({   title: "Livraison du devis",   
     text: "&Ecirc;tes-vous s&ucirc;r de vouloir livrer le devis maintenant ?</strong>",   
     type: "info",   
     showCancelButton: true,
     html:true,   
     confirmButtonColor: "green",   
     confirmButtonText: "Oui, Livrer",   
     cancelButtonText: "Non, plus tard",   
     closeOnConfirm: false,   
     closeOnCancel: false }, 
    function(isConfirm){   
        if (isConfirm) { 
          $('.loaderMessage').addClass('is-active'); 
            $.ajax({
              type: "GET",
              url: "php/controller/devis.php?livrerDevis&idDevis="+idDevis, 
              data: $(this).serialize(),
              success: function(msg){
                  if(parseInt(msg)==1){
                      swal({ title: "Effectué !", text: "La livraison a &eacute;t&eacute; effectu&eacute;e avec succ&egrave;s", imageUrl: 'dist/img/icones/success.png', html: true});
                      $(document).click(function(){
                         location.reload();
                      });
                  }else{ 
                    swal({ title: "D&eacute;sol&eacute;", text: "Une erreur est survenue lors de la connexion &agrave; la base de donn&eacute;es, veuillez r&eacute;essayer plus tard", imageUrl: 'dist/img/icones/errorDb.png', html: true});
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
          swal.close();
          // window.location.href="devis_listeavalider";
            // swal({ title: "Annul&eacute;", text: "L'&eacute;l&eacute;ment n'a pas &eacute;t&eacute; supprim&eacute;", imageUrl: 'dist/img/icones/success.png', html: true});

        } 
      });
}
function askPrintDevis(idDevis){
  

  swal({   title: "G&eacute;n&eacute;ration de document",   
     text: "Voulez-vous g&eacute;n&eacute;rer le document du devis maintenant ?</strong>",   
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
            
            $.ajax({
              type: "POST",
              url: "doc/devisCommercial.php?idDevis="+idDevis, 
              data: $(this).serialize(),
              success: function(msg){
                  if($.isNumeric(msg)){
                      $('#preloaderImpression').modal('hide');
                      swal({   
                        title: "Devis g&eacute;n&eacute;r&eacute; avec succès!",   
                        text: "<div class='row'><div class='col-sm-3'><a onclick='swal.close();' class='btn btn-default' id='closeModal'>Fermer</a></div><div class='col-sm-9' style='text-align:right;'><a class='btn btn-success' href='doc/devis/DevisCommercial_"+msg+".pdf' target='_blank'>Ouvrir le devis</a></div></div>",   
                        showConfirmButton: false,
                        html: true
                      });
                  }else{ 
                      $('#preloaderImpression').modal('hide');
                      swal("Le devis que vous essayez de créer est actuellement ouvert sur votre ordinateur. Veuillez le fermer puis reéssayer");
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
          swal.close();
          // window.location.href="devis_listeavalider";
            // swal({ title: "Annul&eacute;", text: "L'&eacute;l&eacute;ment n'a pas &eacute;t&eacute; supprim&eacute;", imageUrl: 'dist/img/icones/success.png', html: true});

        } 
      });
}

function askPrintDevisMarge(idDevis){
  

  swal({   title: "G&eacute;n&eacute;ration de document",   
     text: "Voulez-vous g&eacute;n&eacute;rer le document du devis maintenant ?</strong>",   
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
            
            $.ajax({
              type: "POST",
              url: "doc/feuilleMarge.php?idDevis="+idDevis, 
              data: $(this).serialize(),
              success: function(msg){
                  if($.isNumeric(msg)){
                      $('#preloaderImpression').modal('hide');
                      swal({   
                        title: "Devis g&eacute;n&eacute;r&eacute; avec succès!",   
                        text: "<div class='row'><div class='col-sm-3'><a onclick='swal.close();' class='btn btn-default' id='closeModal'>Fermer</a></div><div class='col-sm-9' style='text-align:right;'><a class='btn btn-success' href='doc/devis/FeuilleMarge_"+msg+".pdf' target='_blank'>Ouvrir la feuille de marge</a></div></div>",   
                        showConfirmButton: false,
                        html: true
                      });
                  }else{ 
                      $('#preloaderImpression').modal('hide');
                      swal("La feuille de marge que vous essayez de créer est actuellement ouverte sur votre ordinateur. Veuillez la fermer puis reéssayer");
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
          swal.close();
          // window.location.href="devis_listeavalider";
            // swal({ title: "Annul&eacute;", text: "L'&eacute;l&eacute;ment n'a pas &eacute;t&eacute; supprim&eacute;", imageUrl: 'dist/img/icones/success.png', html: true});

        } 
      });
}

function valider(idDevis){
  

  swal({   title: "Validation du devis",   
     text: "&Ecirc;tes-vous s&ucirc;r de vouloir valider le devis maintenant ?</strong>",   
     type: "info",   
     showCancelButton: true,
     html:true,   
     confirmButtonColor: "green",   
     confirmButtonText: "Oui, Valider",   
     cancelButtonText: "Non, plus tard",   
     closeOnConfirm: true,   
     closeOnCancel: false }, 
    function(isConfirm){   
        if (isConfirm) { 
          $('.loaderMessage').addClass('is-active'); 
            $.ajax({
              type: "GET",
              url: "php/controller/devis.php?validerDevis="+idDevis, 
              data: $(this).serialize(),
              success: function(msg){
                  if(parseInt(msg)==1){
                      swal({ title: "Effectué !", text: "La validation a &eacute;t&eacute; effectu&eacute;e avec succ&egrave;s", imageUrl: 'dist/img/icones/success.png', html: true});
                      // $(document).click(function(){
                         location.reload();
                      // });
                  }else{ 
                    swal({ title: "D&eacute;sol&eacute;", text: "Une erreur est survenue lors de la connexion &agrave; la base de donn&eacute;es, veuillez r&eacute;essayer plus tard", imageUrl: 'dist/img/icones/errorDb.png', html: true});
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
          swal.close();
          // window.location.href="devis_listeavalider";
            // swal({ title: "Annul&eacute;", text: "L'&eacute;l&eacute;ment n'a pas &eacute;t&eacute; supprim&eacute;", imageUrl: 'dist/img/icones/success.png', html: true});

        } 
      });
}

function annuler(idDevis){
    swal({   title: "Annulation de devis",   
    text: "&Ecirc;tes-vous s&ucirc;r de vouloir annuler ce devis maintenant ?</strong>",   
    type: "info",   
    showCancelButton: true,
    html:true,   
    confirmButtonColor: "green",   
    confirmButtonText: "Oui",   
    cancelButtonText: "Non, plus tard",   
    closeOnConfirm: false,   
    closeOnCancel: false }, 
    function(isConfirm){   
        if (isConfirm) { 
          $('.loaderMessage').addClass('is-active'); 
            $.ajax({
              type: "GET",
              url: "php/controller/devis.php?annuler&idDevis="+idDevis, 
              data: $(this).serialize(),
              success: function(msg){
                  if(parseInt(msg)==1){
                      swal({ title: "Effectué !", text: "Le devis a &eacute;t&eacute; annul&eacute; avec succ&egrave;s", imageUrl: 'dist/img/icones/success.png', html: true});
                      $(document).click(function(){
                         location.reload();
                      });
                  }else{ 
                    swal({ title: "D&eacute;sol&eacute;", text: "Une erreur est survenue lors de la connexion &agrave; la base de donn&eacute;es, veuillez r&eacute;essayer plus tard", imageUrl: 'dist/img/icones/errorDb.png', html: true});
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
          swal.close();
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
<div class="modal fade" id="addCommenaire">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:red;">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Ajouter un commentaire</h4>
      </div>
      <form id="monFormAddCommentaire">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="contenu">Commentaire</label>
                <textarea class="form-control materialize-textarea summernote" name="contenu" id="contenu" cols="3" rows="5"></textarea>
              </div>
            </div>      
          </div>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="addCommenaire">
          <input type="hidden" id="idDevis" name="idDevis" value="">
          <input type="hidden" id="idDestinataire" name="idDestinataire" value="">
          <input type="hidden" id="idUser" name="idUser" value="<?php echo $_SESSION['gestionDevisidUser'] ?>">
          <!-- <button type="reset" class="btn btn-default pull-left">Annuler</button> -->
          <button type="submit" class="btn btn-primary">Valider</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="addValidationclient">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:red;">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Validation client</h4>
      </div>
      <form id="monFormValidationclient">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <div class="col-md-12" style="padding-left: 0px;">
              <div class="form-group">
                <label for="nomValideur">Nom du valideur</label>
                <input type="text" class="form-control" id="nomValideur" name="nomValideur" required="required">
              </div>
            </div>

            <div class="col-md-12" style="padding-left: 0px;">
              <div class="form-group">
                <label>Date de la validation</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right datepicker" name="dateValidation">
                </div>
                <!-- /.input group -->
              </div>
              <!-- <div class="form-group">
                <label for="dateValidation">Date de la validation</label>
                <input type="text" class="form-control" id="dateValidation" name="dateValidation" required="required">
              </div> -->
            </div>
            </div>     
          </div>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="addValidationclient">
          <input type="hidden" id="idDevis" name="idDevis" value="">
          <input type="hidden" id="idUser" name="idUser" value="<?php echo $_SESSION['gestionDevisidUser'] ?>">
          <!-- <button type="reset" class="btn btn-default pull-left">Annuler</button> -->
          <button type="submit" class="btn btn-primary">Valider</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="addReceptionbc">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:red;">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">R&eacute;ception du bon de commande</h4>
      </div>
      <form id="monFormReceptionbc">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <div class="col-md-12" style="padding-left: 0px;">
              <div class="form-group">
                <label for="numBc">Num&eacute;ro du bon de commande</label>
                <input type="text" class="form-control" id="numBc" name="numBc" required="required">
              </div>
            </div>

            <div class="col-md-12" style="padding-left: 0px;">
              <div class="form-group">
                <label>Date de la r&eacute;ception du bon de commande</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right datepicker" name="dateBc">
                </div>
                <!-- /.input group -->
              </div>
              <!-- <div class="form-group">
                <label for="dateValidation">Date de la validation</label>
                <input type="text" class="form-control" id="dateValidation" name="dateValidation" required="required">
              </div> -->
            </div>
            </div>     
          </div>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="addReceptionbc">
          <input type="hidden" id="idDevis" name="idDevis" value="">
          <input type="hidden" id="idUser" name="idUser" value="<?php echo $_SESSION['gestionDevisidUser'] ?>">
          <!-- <button type="reset" class="btn btn-default pull-left">Annuler</button> -->
          <button type="submit" class="btn btn-primary">Valider</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="voirCommenaire">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:red;">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Commentaire</h4>
      </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12" id="contenuCommentaire">
              
            </div>      
          </div>
        </div>
    </div>
  </div>
</div>


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
<link href="dist/js/summernote/summernote-lite.css" rel="stylesheet">
<script src="dist/js/summernote/summernote-lite.js"></script>

<script src="dist/js/summernote/summernote-fr-FR.js"></script>
<script type="text/javascript">
  $('.summernote').summernote({
      lang: 'fr-FR',
      height: 200,
      toolbar: [
          // [groupName, [list of button]]
          ['style', ['bold', 'italic', 'underline', 'clear']],
          ['fontname', ['fontname']],
          ['font', ['strikethrough', 'superscript', 'subscript']],
          ['fontsize', ['fontsize']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['height', ['height']],
          ['insert', ['table', 'hr']],
          //['fullscreen', ['fullscreen']]

        ],

    });


  
</script>