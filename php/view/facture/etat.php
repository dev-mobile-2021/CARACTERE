<div class="content-wrapper">
  <section class="content">
    <section class="content-header">
      <h1>
        Facture
        <small>Etat Factures</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i>Accueil</a></li>
        <li><a href="#">Facture</a></li>
        <li class="active">Etat Factures</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box  box-primary">
            <div class="box-header">
              <h3 class="box-title">Etat Factures</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

            <form action="php/controller/exportetat.php" method="post">
                  <input type="submit" name="export_excel" class="btn btn-bg btn-success " value="Exporter">
              </form>
              <br><br>
              <!-- <a id="btnAdddevis" data-toggle="modal" data-target="#modaldevis">
                <button class="btn btn-primary btn-rounded btn-icon left-icon"> <i class="fa fa-plus"></i> <span>Ajouter devis</span></button>
              </a><br><br> -->
              <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                <div class="row">
                  <div class="col-sm-12">
                    <table id="example1" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example1_info">
                      <thead>
                        <tr role="row">
                          <th>Date</th>
                          <th>Client</th>
                          <th>Libell&eacute; (Objet)</th>
                          <th>Numéro facture</th>
                          <th>Montant HT (FCFA)</th>
                          <th>Montant TTC (FCFA)</th>

                          <th>Achat HT (FCFA)</th>
                          <th>Marge (FCFA)</th>
                         
                        </tr>
                      </thead>
                      <tbody>
                         <?php  
                          require_once('php/classe/classeFacture.php');
                          $Facture= new Facture();
                          $list = $Facture->listFacture3();
                          foreach($list as $value){
                        ?>
                          <tr id="<?php echo $value['idDevis'] ?>">
                            <td><?php echo DateComplete4($value['dateFacture']) ?></td>
                            <td><?php echo $value['prenomClient']." ".$value['nomClient'] ?></td>
                            <td><?php echo $value['objet'] ?></td>
                            <td><?php echo $value['numeroFacture'] ?></td>
                            <td style="text-align:left;"><?php echo number_format($value['montantDevis'], 0, ',', ' ') ?></td>
                            <td style="text-align:left;"><?php echo number_format($value['montantDevis'] + ($value['montantDevis'] * (0.18)) + ($value['montantDevis'] * $value['taxeMunicipale']) / 100, 0, ',', ' ') ?> 

                            <td style="text-align:left;"><?php echo number_format($value['montantDevisAchat'], 0, ',', ' ') ?></td>
                            <td style="text-align:left;"><?php echo number_format(($value['montantDevis']-$value['montantDevisAchat']), 0, ',', ' ') ?></td>
                           
                          </tr>
                        <?php } ?>
                      </tbody>
                      <tfoot>
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

function askPrintFacture(idDevis){
  

  swal({   title: "G&eacute;n&eacute;ration de document",   
     text: "Voulez-vous g&eacute;n&eacute;rer le document de la facture maintenant ?</strong>",   
     type: "info",   
     showCancelButton: true,
     html:true,   
     confirmButtonColor: "green",   
     confirmButtonText: "Oui, générer",   
     cancelButtonText: "Non, Annuler",   
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
            url: "doc/factureCommercial.php?idDevis="+idDevis, 
            data: $(this).serialize(),
            success: function(msg){
                if($.isNumeric(msg)){
                    $('#preloaderImpression').modal('hide');
                    swal({   
                      title: "Fcature g&eacute;n&eacute;r&eacute;e avec succès!",   
                      text: "<div class='row'><div class='col-sm-3'><a onclick='swal.close();' class='btn btn-default' id='closeModal'>Fermer</a></div><div class='col-sm-9' style='text-align:right;'><a class='btn btn-success' href='doc/devis/FactureCommercial_"+msg+".pdf' target='_blank'>Ouvrir la facture</a></div></div>",   
                      showConfirmButton: false,
                      html: true
                    });
                }else{ 
                    $('#preloaderImpression').modal('hide');
                    swal("La facture que vous essayez de créer est actuellement ouverte sur votre ordinateur. Veuillez le fermer puis reéssayer");
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