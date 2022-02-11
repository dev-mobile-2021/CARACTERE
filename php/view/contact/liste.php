<script type="text/javascript" src="php/view/contact/contact.js"></script>
<?php
header('Content-Type: text/html; charset=ISO-8859-1');

?>
<div class="content-wrapper">
  <section class="content">
    <section class="content-header">
      <h1>
        Gestion des contacts
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i></a></li>
        <li class="active">contacts</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box  box-primary">
            <div class="box-header">
              <h3 class="box-title">Liste des contacts</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- <a id="btnAddcontact" data-toggle="modal" data-target="#modalcontact">
                <button class="btn btn-primary btn-rounded btn-icon left-icon"> <i class="fa fa-plus"></i> <span>Ajouter contact</span></button>
              </a> -->
              <div class="row">

                <div class="col-md-2">
                  <a id="btnAddcontact" data-toggle="modal" data-target="#modalcontact">
                    <button class="btn btn-primary btn-rounded btn-icon left-icon"> <i class="fa fa-plus"></i> <span>Ajouter contact</span></button>
                  </a><br><br>
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
                          <th>Pr&eacute;nom</th>
                          <th>T&eacute;l&eacute;phone</th>
                          <th>Email</th>
                          <th>Client</th>
                          <th>Actions</th>
                          <!-- <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 104px;">Action</th> -->
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        require_once('php/classe/classeContact.php');
                        $Contact = new Contact();
                        $list = $Contact->listContact2();
                        foreach ($list as $value) {
                          echo '
                                <tr id="' . $value['idContact'] . '"">
                                    <td>' . $value['nom'] . '</td>
                                    <td>' . $value['prenom'] . '</td>
                                    <td>' . $value['telephone'] . '</td>
                                    <td>' . $value['email'] . '</td>
                                    <td>' . $value['nomClient'] . '</td>
                            ';
                          ?>
                          <td>
                            <a href="javascript:void(0);" onclick="showUpdateContact(this)" data-idContact="<?php echo $value['idContact']; ?>" data-idClient="<?php echo $value['idClient']; ?>" data-nom="<?php echo $value['nom']; ?>" data-prenom="<?php echo $value['prenom']; ?>" data-telephone="<?php echo $value['telephone']; ?>" data-email="<?php echo $value['email']; ?>" style="margin-left:10px; float:center">
                              <i style="color:#000" class="glyphicon glyphicon-pencil" data-toggle="tooltip" title="Modifier"></i>
                            </a>

                            <a href="javascript:void(0);" onclick="supprimer(<?php echo $value['idContact']; ?>)" style="margin-left:10px; float:center"><i style="color:#FF0000" class="glyphicon glyphicon-trash" data-toggle="tooltip" title="Supprimer"></i> </a>

                          </td>
                          </tr>
                        <?php  }
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

    <div class="modal fade" id="modalcontact">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:red;">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Ajout contact</h4>
          </div>
          <form id="monForm">
            <div class="modal-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" class="form-control" id="nom" name="nom" placeholder="Entrer le nom" required="required">
                  </div>
                  <div class="form-group">
                    <label for="prenom">P&eacute;nom</label>
                    <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Entrer le p&eacute;nom" required="required">
                  </div>
                  <div class="form-group">
                    <label for="telephone">T&eacute;l&eacute;phone</label>
                    <input type="text" class="form-control" id="telephone" name="telephone" placeholder="Entrer le num&eacute;ro de t&eacute;l&eacute;phone" required="required">
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Entrer l'email">
                  </div>
                  <div class="form-group">
                    <label>Client</label>
                    <select class="form-control select2" style="width: 100%;" required="" name="idClient">
                      <?php
                      require_once('php/classe/classeClient.php');
                      $Client = new Client();
                      $list = $Client->listClient();
                      if (!empty($list)) {
                        foreach ($list as $value) {
                          echo '<option value="' . $value['idClient'] . '">' . $value['nomClient'] . '</option>';
                        }
                      }

                      ?>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <input type="hidden" name="ajouter">
              <button type="reset" class="btn btn-default pull-left">Annuler</button>
              <button type="submit" class="btn btn-primary">Valider</button>
            </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>



    <div class="modal fade" id="modalupdatecontact">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:red;">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Modifier un contact</h4>
          </div>
          <form id="monFormMod">
            <div class="modal-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="nomMod">Nom</label>
                    <input type="text" class="form-control" id="nomMod" name="nomMod" placeholder="Entrer le nom" required="required">
                  </div>
                  <div class="form-group">
                    <label for="prenomMod">P&eacute;nom</label>
                    <input type="text" class="form-control" id="prenomMod" name="prenomMod" placeholder="Entrer le p&eacute;nom" required="required">
                  </div>
                  <div class="form-group">
                    <label for="telephoneMod">T&eacute;l&eacute;phone</label>
                    <input type="text" class="form-control" id="telephoneMod" name="telephoneMod" placeholder="Entrer le num&eacute;ro de t&eacute;l&eacute;phone" required="required">
                  </div>
                  <div class="form-group">
                    <label for="emailMod">Email</label>
                    <input type="email" class="form-control" id="emailMod" name="emailMod" placeholder="Entrer l'email">
                  </div>
                  <div class="form-group">
                    <label>Client</label>
                    <select class="form-control select2" style="width: 100%;" required="" name="idClientMod" id="idClientMod">
                      <?php
                      require_once('php/classe/classeClient.php');
                      $Client = new Client();
                      $list = $Client->listClient();
                      if (!empty($list)) {
                        foreach ($list as $value) {
                          echo '<option value="' . $value['idClient'] . '">' . $value['nomClient'] . '</option>';
                        }
                      }

                      ?>
                    </select>
                  </div>
                </div>
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
  function supprimer(id) {
    mot = "La Suppresion";
    motSansArticle = "Suppresion";
    verbe = "Supprimer";
    verbeSp = "Supprimer";
    couleur = "red";
    swal({
        title: motSansArticle,
        text: "&Ecirc;tes-vous s&ucirc;r de vouloir " + verbe + " ce contact ? <br> Tous les &eacute;l&eacute;ments qui lui sont li&eacute;s seront aussi supprim&eacute;s</strong>",
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
            url: "php/controller/contact.php?supprimer=" + id, //process to mail
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

  function showUpdateContact(elmt) {
    $("#modalupdatecontact #nomMod").val($(elmt).attr("data-nom"));
    $("#modalupdatecontact #idClientMod").val($(elmt).attr("data-idClient"));
    $('#modalupdatecontact #idClientMod').select2();
    $("#modalupdatecontact #emailMod").val($(elmt).attr("data-email"));
    $("#modalupdatecontact #prenomMod").val($(elmt).attr("data-prenom"));
    $("#modalupdatecontact #telephoneMod").val($(elmt).attr("data-telephone"));
    $("#modalupdatecontact #modifier").val($(elmt).attr("data-idContact"));


    $("#modalupdatecontact").modal("toggle");
  }

  $(document).ready(function() {
    $('#load_excel_form').on('submit', function(event) {
      event.preventDefault();
      $.ajax({
        url: "php/controller/importContact.php",
        method: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function(data) {
          $('#excel_area').html(data);
          $('table').css('width', '100%');
          // location.reload();
        }
      })
    });
  });
</script>
