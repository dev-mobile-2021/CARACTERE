<script type="text/javascript" src="php/view/famille/famille.js"></script>

<div class="content-wrapper">
  <section class="content">
    <section class="content-header">
      <h1>
        Gestion des types de service
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i></a></li>
        <li class="active">types de service</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box  box-primary">
            <div class="box-header">
              <h3 class="box-title">Liste des types de service</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- <a id="btnAddtypeservice" data-toggle="modal" data-target="#modaltypeservice">
                <button class="btn btn-primary btn-rounded btn-icon left-icon"> <i class="fa fa-plus"></i> <span>Ajouter Type de service</span></button>
              </a> -->

              <div class="row">

                <div class="col-md-4">
                  <a id="btnAddtypeservice" data-toggle="modal" data-target="#modaltypeservice">
                    <button class="btn btn-primary btn-rounded btn-icon left-icon"> <i class="fa fa-plus"></i> <span>Ajouter Type de service</span></button>
                  </a>
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
                          <th>Service</th>
                          <th>Type de service</th>
                          <th>Description</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        require_once('php/classe/classeFamille.php');
                        $Famille = new Famille();
                        $list = $Famille->listFamille2();
                        foreach ($list as $value) {
                          echo '
                                <tr id="' . $value['idFamille'] . '"">
                                    <td>' . $value['famille'] . '</td>
                                    <td>' . $value['rubrique'] . '</td>
                                    <td>' . $value['description'] . '</td>
                                ';
                          ?>
                          <td>
                            <a href="javascript:void(0);" onclick="showUpdateRubrique(this)" data-idFamille="<?php echo $value['idFamille']; ?>" data-idRubrique="<?php echo $value['idRubrique']; ?>" data-typeService="<?php echo $value['famille']; ?>" data-description="<?php echo $value['description']; ?>" style="margin-left:10px; float:center">
                              <i style="color:#000" class="glyphicon glyphicon-pencil" data-toggle="tooltip" title="Modifier"></i>
                            </a>

                            <a href="javascript:void(0);" onclick="supprimer(<?php echo $value['idFamille']; ?>)" style="margin-left:10px; float:center"><i style="color:#FF0000" class="glyphicon glyphicon-trash" data-toggle="tooltip" title="Supprimer"></i> </a>

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

    <div class="modal fade" id="modaltypeservice">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:red;">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Ajout Type de service</h4>
          </div>
          <form id="monForm">
            <div class="modal-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Type service</label>
                    <select class="form-control select2" style="width: 100%;" required="" name="idRubrique">
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
    <!-- /.modal -->
  </section>
</div>

<div class="modal fade" id="modalupdatetypeservice">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:red;">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Modifier les informations d'un type service</h4>
      </div>
      <form id="monFormMod">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Rubrique</label>
                <select class="form-control select2" style="width: 100%;" required="" name="idRubriqueMod" id="idRubriqueMod">
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
                <label for="typeServiceMod">Type de service</label>
                <input type="text" class="form-control" id="typeServiceMod" name="typeServiceMod" placeholder="Entrer le type de service" required="required">
              </div>
              <div class="form-group">
                <label for="descriptionMod">Description</label>
                <input type="text" class="form-control" id="descriptionMod" name="descriptionMod" placeholder="Entrer la description">
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
  </div>
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
        text: "&Ecirc;tes-vous s&ucirc;r de vouloir " + verbe + " ce type service ? <br> Tous les &eacute;l&eacute;ments qui lui sont li&eacute;s seront aussi supprim&eacute;s</strong>",
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
            url: "php/controller/famille.php?supprimer=" + id, //process to mail
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
              console.log(msg);
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

  function showUpdateRubrique(elmt) {
    $("#modalupdatetypeservice #typeServiceMod").val($(elmt).attr("data-typeService"));
    $("#modalupdatetypeservice #idRubriqueMod").val($(elmt).attr("data-idRubrique"));
    $('#modalupdatetypeservice #idRubriqueMod').select2();
    $("#modalupdatetypeservice #descriptionMod").val($(elmt).attr("data-description"));
    $("#modalupdatetypeservice #modifier").val($(elmt).attr("data-idFamille"));


    $("#modalupdatetypeservice").modal("toggle");
  }

  $(document).ready(function() {
    $('#load_excel_form').on('submit', function(event) {
      event.preventDefault();
      $.ajax({
        url: "php/controller/importfamille.php",
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
</script>