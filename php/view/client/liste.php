<script type="text/javascript" src="php/view/client/client.js"></script>

<div class="content-wrapper">
  <section class="content">
    <section class="content-header">
      <h1>
        Gestion des clients
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i></a></li>
        <li class="active">Clients</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box  box-primary">
            <div class="box-header">
              <h3 class="box-title">Liste des clients</h3>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
              <div class="row">

                <div class="col-md-2">
                  <a id="btnAddclient" data-toggle="modal" data-target="#modalclient">
                    <button class="btn btn-primary btn-rounded btn-icon left-icon"> <i class="fa fa-plus"></i> <span>Ajouter client</span></button>
                  </a><br><br>
                </div>

                <div class="col-md-2">

                  <form action="php/controller/exportclient.php" method="post" id="load_txt_form">
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
                          <th>Nom</th>
                          <th>Email</th>
                          <th>Téléphone</th>
                          <th>Adresse</th>
                          <th>Actions</th>
                          <!-- <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 104px;">Action</th> -->
                        </tr>
                      </thead>
                      <tbody id="contenu">
                        <?php
                        require_once('php/classe/classeClient.php');
                        $Client = new Client();
                        $list = $Client->listClient();
                        foreach ($list as $value) {
                          echo '
                                <tr id="' . $value['idClient'] . '"">
                                    <td>' . $value['nomClient'] . '</td>
                                    <td>' . $value['emailClient'] . '</td>
                                    <td>' . $value['telephoneClient'] . '</td>
                                    <td>' . $value['adresseClient'] . '</td>
                            ';
                          ?>

                          <td>
                            <a href="javascript:void(0);" onclick="showUpdateClient(this)" data-idClient="<?php echo $value['idClient']; ?>" data-nom="<?php echo $value['nomClient']; ?>" data-email="<?php echo $value['emailClient']; ?>" data-telephone="<?php echo $value['telephoneClient']; ?>" data-adresse="<?php echo $value['adresseClient']; ?>" data-pays="<?php echo $value['paysClient']; ?>" data-photo="<?php echo $value['photoClient']; ?>" style="margin-left:10px; float:center">
                              <i style="color:#000" class="glyphicon glyphicon-pencil" data-toggle="tooltip" title="Modifier"></i>
                            </a>

                            <a href="javascript:void(0);" onclick="supprimer(<?php echo $value['idClient']; ?>)" style="margin-left:10px; float:center"><i style="color:#FF0000" class="glyphicon glyphicon-trash" data-toggle="tooltip" title="Supprimer"></i> </a>

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

    <div class="modal fade" id="modalclient">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:red;">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Ajouter un client</h4>
          </div>
          <form id="monForm" enctype="multipart/form-data">
            <div class="modal-body">
              <div class="row">
                <div class="col-md-6">
                  <!-- <div class="form-group"> -->
                  <!-- <label for="prenomClient">Prénom</label> -->
                  <input type="hidden" class="form-control" id="prenomClient" name="prenomClient" placeholder="Entrer le prénom" required="required">
                  <!-- </div> -->
                  <div class="form-group">
                    <label for="nomClient">Nom</label>
                    <input type="text" class="form-control" id="nomClient" name="nomClient" placeholder="Entrer le nom" required="required">
                  </div>
                  <!-- /.form-group -->
                  <!-- /.form-group -->
                  <div class="form-group">
                    <label for="emailClient">Email</label>
                    <input type="text" class="form-control" id="emailClient" name="emailClient" placeholder="Entrer l'email" required="required">
                  </div>
                  <!-- /.form-group -->
                  <!-- /.form-group -->
                  <div class="form-group">
                    <label for="telephoneClient">Téléphone</label>
                    <input type="text" class="form-control" id="telephoneClient" name="telephoneClient" placeholder="Entrer le num téléphone" required="required">
                  </div>
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                  <!-- /.form-group -->
                  <div class="form-group">
                    <label for="adresseClient">Adresse</label>
                    <input type="text" class="form-control" id="adresseClient" name="adresseClient" placeholder="Entrer l'adresse" required="required">
                  </div>
                  <!-- /.form-group -->
                  <div class="form-group">
                    <label for="paysClient">Pays</label>
                    <input type="text" class="form-control" id="paysClient" name="paysClient" placeholder="Entrer le pays" required="required">
                  </div>

                  <div class="form-group">
                    <label for="photoClient">Photo</label>
                    <input type="file" class="form-control" id="photoClient" name="photoClient">
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

    <div class="modal fade" id="modalupdateclient">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:red;">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Modifier les informations d'un client</h4>
          </div>
          <form id="monFormMod" enctype="multipart/form-data">
            <div class="modal-body">
              <div class="row">
                <div class="col-md-6">
                  <!-- <div class="form-group"> -->
                  <!-- <label for="prenomClientMod">Prénom</label> -->
                  <input type="hidden" class="form-control" id="prenomClientMod" name="prenomClientMod" placeholder="Entrer le prénom" required="required">
                  <!-- </div> -->

                  <!-- /.form-group -->
                  <div class="form-group">
                    <label for="nomClientMod">Nom</label>
                    <input type="text" class="form-control" id="nomClientMod" name="nomClientMod" placeholder="Entrer le nom" required="required">
                  </div>
                  <!-- /.form-group -->
                  <!-- /.form-group -->
                  <div class="form-group">
                    <label for="emailClientMod">Email</label>
                    <input type="text" class="form-control" id="emailClientMod" name="emailClientMod" placeholder="Entrer l'email" required="required">
                  </div>
                  <!-- /.form-group -->
                  <!-- /.form-group -->
                  <div class="form-group">
                    <label for="telephoneClientMod">Téléphone</label>
                    <input type="text" class="form-control" id="telephoneClientMod" name="telephoneClientMod" placeholder="Entrer le num téléphone" required="required">
                  </div>
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                  <!-- /.form-group -->
                  <div class="form-group">
                    <label for="adresseClientMod">Adresse</label>
                    <input type="text" class="form-control" id="adresseClientMod" name="adresseClientMod" placeholder="Entrer l'adresse" required="required">
                  </div>
                  <!-- /.form-group -->
                  <div class="form-group">
                    <label for="paysClientMod">Pays</label>
                    <input type="text" class="form-control" id="paysClientMod" name="paysClientMod" placeholder="Entrer le pays" required="required">
                  </div>

                  <div class="form-group">
                    <label for="photoClientMod">Photo</label>
                    <input type="file" class="form-control" id="photoClientMod" name="photoClientMod">
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
        $('#modalupdateclient #previewPhoto').attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]);
    }
  }

  $("#photoClientMod").change(function() {
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
        text: "&Ecirc;tes-vous s&ucirc;r de vouloir " + verbe + " ce client ? <br> Tous les &eacute;l&eacute;ments qui lui sont li&eacute;s seront aussi supprim&eacute;s</strong>",
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
            url: "php/controller/client.php?supprimer=" + id, //process to mail
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
              alert(msg);
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

  function showUpdateClient(elmt) {
    $("#modalupdateclient #prenomClientMod").val($(elmt).attr("data-prenom"));
    $("#modalupdateclient #nomClientMod").val($(elmt).attr("data-nom"));
    $("#modalupdateclient #emailClientMod").val($(elmt).attr("data-email"));
    $("#modalupdateclient #telephoneClientMod").val($(elmt).attr("data-telephone"));
    $("#modalupdateclient #adresseClientMod").val($(elmt).attr("data-adresse"));
    $("#modalupdateclient #paysClientMod").val($(elmt).attr("data-pays"));
    $("#modalupdateclient #photoClientMod").attr("value", $(elmt).attr("data-photo"));
    $("#modalupdateclient #modifier").val($(elmt).attr("data-idClient"));
    $("#modalupdateclient #previewPhoto").attr("src", $(elmt).attr("data-photo"));

    $("#modalupdateclient").modal("toggle");
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
        url: "php/controller/import.php",
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
  //           url: "php/controller/exportclient.php", 
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