<script type="text/javascript" src="php/view/fournisseur/fournisseur.js"></script>

<div class="content-wrapper">
  <section class="content">
    <section class="content-header">
      <h1>
        Gestion des fournisseurs
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i></a></li>
        <li class="active">Fournisseurs</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box  box-primary">
            <div class="box-header">
              <h3 class="box-title">Liste des fournisseurs</h3>
            
            </div>
            <!-- /.box-header -->

            <div class="box-body">
              <div class="row">

                <div class="col-md-2">
                  <a id="btnAddfournisseur" data-toggle="modal" data-target="#modalfournisseur">
                    <button class="btn btn-primary btn-rounded btn-icon left-icon"> <i class="fa fa-plus"></i> <span>Ajouter fournisseur</span></button>
                  </a><br><br>
                </div>

                <div class="col-md-2">

                  <form action="php/controller/exportfournisseur.php" method="post" id="load_txt_form">
                      <input type="submit" name="export_excel" class="btn btn-bg btn-success " value="Exporter">
                   
                  </form>

                </div>
              

                <div class="col-md-5">
                 
                    <form method="post" id="load_excel_form" enctype="multipart/form-data">
                        <div class="row">
                          <div class="col-sm-8">
                          <input type="file" name="import_excel" class="btn btn-bg btn-default" />
                          </div>
                          <div class="col-sm-2">
                            <input type="submit" name="load" value="Valider" class="btn btn-bg btn-primary" />
                          </div>
                        </div>
                    </form>
                    <br />
                    <div id="excel_area"></div>
              
                </div>

                <!-- <div class="col-md-2">
                <input type="submit" class="btn btn-primary"  value="Import">
                </div> -->
              </div>
              <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                <div class="row">
                  <div class="col-sm-12">
                    <table id="example1" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example1_info">
                      <thead>
                        <tr role="row">
                          <th>Prenom & Nom</th>
                          <th>Email</th>
                          <th>Téléphone</th>
                          <th>Adresse</th>
                          <th>Actions</th>
                          <!-- <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 104px;">Action</th> -->
                        </tr>
                      </thead>
                      <tbody id="contenu">
                        <?php
                        require_once('php/classe/classeFournisseur.php');
                        $fournisseurs = new Fournisseur();
                        $list = $fournisseurs->listFournisseur();

                        foreach ($list as $value) {
                          echo '
                                <tr id="'  . $value['idFournisseur'] .  '"">
                                    <td>' . $value['prenomFournisseur'] . ' ' . $value['nomFournisseur'] . '</td>
                                    <td>' . $value['emailFournisseur'] . '</td>
                                    <td>' . $value['telephoneFournisseur'] . '</td>
                                    <td>' . $value['adresseFournisseur'] . '</td>
                            ';
                          ?>

                          <td>
                            <a href="javascript:void(0);" onclick="showUpdateFournisseur(this)" data-idFournisseur="<?php echo $value['idFournisseur']; ?>" data-nom="<?php echo $value['nomFournisseur']; ?>" data-email="<?php echo $value['emailFournisseur']; ?>" data-telephone="<?php echo $value['telephoneFournisseur']; ?>" data-adresse="<?php echo $value['adresseFournisseur']; ?>" data-pays="<?php echo $value['paysFournisseur']; ?>" data-photo="<?php echo $value['photoFournisseur']; ?>" style="margin-left:10px; float:center">
                              <i style="color:#000" class="glyphicon glyphicon-pencil" data-toggle="tooltip" title="Modifier"></i>
                            </a>

                            <a href="javascript:void(0);" onclick="supprimer(<?php echo $value['idFournisseur']; ?>)" style="margin-left:10px; float:center"><i style="color:#FF0000" class="glyphicon glyphicon-trash" data-toggle="tooltip" title="Supprimer"></i> </a>

                          </td>
                          </tr>
                        <?php  }
                        ?>
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

    <div class="modal fade" id="modalfournisseur">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:red;">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Ajouter un fournisseur</h4>
          </div>
          <form id="monForm" enctype="multipart/form-data">
            <div class="modal-body">
              <div class="row">
                <div class="col-md-6">
                  <!-- <div class="form-group"> -->
                  <!-- <label for="prenomfournisseur">Prénom</label> -->
                  <input type="hidden" class="form-control" id="prenomFournisseur" name="prenomFournisseur" placeholder="Entrer le prénom" required="required">
                  <!-- </div> -->
                  <div class="form-group">
                    <label for="nomFournisseur">Nom</label>
                    <input type="text" class="form-control" id="nomFournisseur" name="nomFournisseur" placeholder="Entrer le nom" required="required">
                  </div>
                  <!-- /.form-group -->
                  <!-- /.form-group -->
                  <div class="form-group">
                    <label for="emailFournisseur">Email</label>
                    <input type="text" class="form-control" id="emailFournisseur" name="emailFournisseur" placeholder="Entrer l'email" required="required">
                  </div>
                  <!-- /.form-group -->
                  <!-- /.form-group -->
                  <div class="form-group">
                    <label for="telephoneFournisseur">Téléphone</label>
                    <input type="text" class="form-control" id="telephoneFournisseur" name="telephoneFournisseur" placeholder="Entrer le num téléphone" required="required">
                  </div>
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                  <!-- /.form-group -->
                  <div class="form-group">
                    <label for="adresseFournisseur">Adresse</label>
                    <input type="text" class="form-control" id="adresseFournisseur" name="adresseFournisseur" placeholder="Entrer l'adresse" required="required">
                  </div>
                  <!-- /.form-group -->
                  <div class="form-group">
                    <label for="paysFournisseur">Pays</label>
                    <input type="text" class="form-control" id="paysFournisseur" name="paysFournisseur" placeholder="Entrer le pays" required="required">
                  </div>

                  <div class="form-group">
                    <label for="photoFournisseur">Photo</label>
                    <input type="file" class="form-control" id="photoFournisseur" name="photoFournisseur">
                  </div>
                  <img id="previewPhoto" style="width: 100px;" src="">
                </div>
                <!-- /.col -->
              </div>
            </div>
            <div class="modal-footer">
              <input type="hidden" name="ajouter" id="ajouter">
              <button type="reset" class="btn btn-default pull-left">Annuler</button>
              <button type="submit" class="btn btn-primary">Valider</button>
            </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="modalupdatefournisseur">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:red;">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Modifier les informations d'un fournisseur</h4>
          </div>
          <form id="monFormMod" enctype="multipart/form-data">
            <div class="modal-body">
              <div class="row">
                <div class="col-md-6">
                  <!-- <div class="form-group"> -->
                  <!-- <label for="prenomFournisseurMod">Prénom</label> -->
                  <input type="hidden" class="form-control" id="prenomFournisseurMod" name="prenomFournisseurMod" placeholder="Entrer le prénom" required="required">
                  <!-- </div> -->

                  <!-- /.form-group -->
                  <div class="form-group">
                    <label for="nomFournisseurMod">Nom</label>
                    <input type="text" class="form-control" id="nomFournisseurMod" name="nomFournisseurMod" placeholder="Entrer le nom" required="required">
                  </div>
                  <!-- /.form-group -->
                  <!-- /.form-group -->
                  <div class="form-group">
                    <label for="emailFournisseurMod">Email</label>
                    <input type="text" class="form-control" id="emailFournisseurMod" name="emailFournisseurMod" placeholder="Entrer l'email" required="required">
                  </div>
                  <!-- /.form-group -->
                  <!-- /.form-group -->
                  <div class="form-group">
                    <label for="telephoneFournisseurMod">Téléphone</label>
                    <input type="text" class="form-control" id="telephoneFournisseurMod" name="telephoneFournisseurMod" placeholder="Entrer le num téléphone" required="required">
                  </div>
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                  <!-- /.form-group -->
                  <div class="form-group">
                    <label for="adresseFournisseurMod">Adresse</label>
                    <input type="text" class="form-control" id="adresseFournisseurMod" name="adresseFournisseurMod" placeholder="Entrer l'adresse" required="required">
                  </div>
                  <!-- /.form-group -->
                  <div class="form-group">
                    <label for="paysfournisseurMod">Pays</label>
                    <input type="text" class="form-control" id="paysFournisseurMod" name="paysFournisseurMod" placeholder="Entrer le pays" required="required">
                  </div>

                  <div class="form-group">
                    <label for="photoFournisseurMod">Photo</label>
                    <input type="file" class="form-control" id="photoFournisseurMod" name="photoFournisseurMod">
                  </div>
                  <img id="previewPhoto" style="width: 100px;" src="">
                </div>
                <!-- /.col -->
              </div>
            </div>
            <div class="modal-footer">
              <input type="hidden" name="modifier" id="modifier">
              <button type="reset" class="btn btn-default pull-left">Annuler</button>
              <button type="submit" class="btn btn-primary">Valider</button>
            </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
  </section>
</div>

<script type="text/javascript">
  function readURL(input) {

    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function(e) {
        $('#modalupdatefournisseur #previewPhoto').attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]);
    }
  }

  $("#photoFourniseurMod").change(function() {
    readURL(this);
  });

  function supprimer(id) {
    mot = "La Suppresion";
    motSansArticle = "Suppresion";
    verbe = "Supprimer";
    verbeSp = "Supprimer";
    couleur = "red";
    swal({
        title: motSansArticle,
        text: "&Ecirc;tes-vous s&ucirc;r de vouloir " + verbe + " ce fournisseur ? <br> Tous les &eacute;l&eacute;ments qui lui sont li&eacute;s seront aussi supprim&eacute;s</strong>",
        type: "warning",
        showCancelButton: true,
        html: true,
        confirmButtonColor: couleur,
        confirmButtonText: verbeSp,
        cancelButtonText: "Annuler",
        closeOnConfirm: false,
        closeOnCancel: false
      },
      function(isConfirm) {
        if (isConfirm) {
          $.ajax({
            type: "GET",
            url: "php/controller/fournisseur.php?supprimer=" + id, //process to mail
            data: '',
            success: function(msg) {
              if (parseInt(msg) == 1) {
                swal({
                  title: "Effectué !",
                  text: mot + " a &eacute;t&eacute; effectu&eacute;e avec succ&egrave;s",
                  imageUrl: 'dist/img/icones/success.png',
                  html: true
                });
                $(document).click(function() {
                  location.reload();
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
            text: "Aucune donn&eacute;e n'a &eacute;t&eacute; supprim&eacute;e",
            imageUrl: 'dist/img/icones/success.png',
            html: true
          });

        }
      });
  }

  function showUpdateFournisseur(elmt) {
    $("#modalupdatefournisseur #prenomFournisseurMod").val($(elmt).attr("data-prenom"));
    $("#modalupdatefournisseur #nomFournisseurMod").val($(elmt).attr("data-nom"));
    $("#modalupdatefournisseur #emailFournisseurMod").val($(elmt).attr("data-email"));
    $("#modalupdatefournisseur #telephoneFournisseurMod").val($(elmt).attr("data-telephone"));
    $("#modalupdatefournisseur #adresseFournisseurMod").val($(elmt).attr("data-adresse"));
    $("#modalupdatefournisseur #paysFournisseurMod").val($(elmt).attr("data-pays"));
    $("#modalupdatefournisseur #photoFournisseurMod").attr("value", $(elmt).attr("data-photo"));
    $("#modalupdatefournisseur #modifier").val($(elmt).attr("data-idFournisseur"));
    $("#modalupdatefournisseur #previewPhoto").attr("src", $(elmt).attr("data-photo"));

    $("#modalupdatefournisseur").modal("toggle");
  }


  function formToggle(ID) {
    var element = document.getElementById(ID);
    if (element.style.display === "none") {
      element.style.display = "block";
    } else {
      element.style.display = "none";
    }
  }

  $(document).ready(function() {
    $('#load_excel_form').on('submit', function(event) {
      event.preventDefault();
      $.ajax({
        url: "php/controller/importfournisseur.php",
        method: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function(data) {
          $('#excel_area').html(data);
          $('table').css('width', '100%');
           location.reload();
        }
      })
    });
  });


  // $('#load_txt_form').on('submit', function(e) {
  //   e.preventDefault();
  //   $('.loaderMessage').addClass('is-active');
  //     $.ajax({
  //           type: "POST",
  //           url: "php/controller/exportfournisseur.php",
  //           data: "",
  //           mimeType: "multipart/form-data",
  //           contentType: false,
  //           cache: false,
  //           processData: false,
  //           success: function(msg){
  //             var contenu = msg.split("#$#");
  //               if($.isNumeric(contenu[0])){
  //                 if(contenu[1] != ""){
  //                   $("#contenu").html(contenu[1]);
  //                   $('.tooltipped').tooltip();
  //                   $("#pdcfound").css("display", "block");
  //                   $("#nopdc").css("display", "none");
  //                 }else{
  //                   $("#pdcfound").css("display", "none");
  //                   $("#nopdc").css("display", "block");
  //                 }
  //               }else{
  //                   swal({ title: "D&eacute;sol&eacute;", text: "Une erreur est survenue lors de la connexion &agrave; la base de donn&eacute;es, veuillez r&eacute;essayer plus tard", imageUrl: 'images/icones/errorDb.png', html: true});
  //               }
  //              console.log(msg);
  //              $('.loaderMessage').removeClass('is-active');
  //           },
  //           error: function(){
  //               $('.loaderMessage').removeClass('is-active');
  //               swal({ title: "D&eacute;sol&eacute;", text: "Une erreur est survenue veuillez contacter l'administrateur", imageUrl: 'images/icones/error.png', html: true});
  //           }
  //         });
  //   });
  // });
</script>
