<div class="content-wrapper">
  <section class="content">
    <section class="content-header">
      <h1>
        Bon de commande
        <small>Liste des bons de commande &agrave; valider</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i>Accueil</a></li>
        <li><a href="#">Bon de commande</a></li>
        <li class="active">Liste des bons de commande &agrave; valider</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box  box-primary">
            <div class="box-header">
              <h3 class="box-title">Liste des bons de commande &agrave; valider</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- <a id="btnAddbon" data-toggle="modal" data-target="#modalbon">
                <button class="btn btn-primary btn-rounded btn-icon left-icon"> <i class="fa fa-plus"></i> <span>Ajouter bon</span></button>
              </a><br><br> -->
              <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                <div class="row">
                  <div class="col-sm-12">
                    <table id="example1" class="table table-bordered table-hover dataTable">
                      <thead>
                        <tr role="row">
                          <th>Numéro</th>
                          <th>Objet</th>
                          <th></th>
                          <th></th>
                          <th>Montant (FCFA)</th>
                          <th>Date</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                         <?php
                          require_once('php/classe/classeBon.php');
                          $Bon= new Bon();
                          $list = $Bon->listBon2($_SESSION['gestionDevisidUser']);
                          foreach($list as $value){
                            echo '
                                <tr id="'.$value['idBon'].'"">
                                    <td>'.$value['numeroBon'].'</td>
                                    <td>'.$value['objet'].'</td>
                                    <td>'.$value['prenom']." ".$value['nom'].'</td>
                                    <td>'.$value['prenomClient']." ".$value['nomClient'].'</td>
                                    <td>'.number_format($value['montantBon'], 0, ',', ' ').'</td>
                                    <td>'.DateComplete3($value['dateAjout']).'</td>
                                    <td>
                                       <a href="#" onclick="validerBon('.$value['idBon'].')" style="margin-left:10px; float:center"><i style = "color:#00a65a" class="glyphicon glyphicon-check" data-toggle="tooltip" title="Valider le bon"></i> </a>

                                      <a href="#" onclick="askPrintBon('.$value['idBon'].')" style="margin-left:10px; float:center"><i style = "color:#000" class="glyphicon glyphicon-open-file" data-toggle="tooltip" title="G&eacute;n&eacute;rer le bon de commande"></i> </a>
                                      

                                    </td>
                                </tr>
                            ';
                          }
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
  function askPrintBon(idBon){
  

  swal({   title: "G&eacute;n&eacute;ration de document",   
     text: "Voulez-vous g&eacute;n&eacute;rer le document du bon de commande maintenant ?</strong>",   
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
          swal.close();
          // window.location.href="bon_listeavalider";
            // swal({ title: "Annul&eacute;", text: "L'&eacute;l&eacute;ment n'a pas &eacute;t&eacute; supprim&eacute;", imageUrl: 'dist/img/icones/success.png', html: true});

        } 
      });
}

  function validerBon(idBon){
  

  swal({   title: "Validation du bon de commande",   
     text: "&Ecirc;tes-vous s&ucirc;r de vouloir valider le bon de commande maintenant ?</strong>",   
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
              url: "php/controller/bon.php?validerBon="+idBon, 
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
          // window.location.href="bon_listeavalider";
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