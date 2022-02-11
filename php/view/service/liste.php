<script type="text/javascript" src="php/view/service/service.js"></script>

<div class="content-wrapper">
  <section class="content">
    <section class="content-header">
      <h1>
        Gestion des Descriptifs
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i></a>Accueil</li>
        <li class="active">Descriptifs</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box  box-primary">
            <div class="box-header">
              <h3 class="box-title">Liste des Descriptifs</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">


              <div class="row">

                <div class="col-md-4">
                  <a id="btnAddservice" data-toggle="modal" data-target="#modalservice">
                    <button class="btn btn-primary btn-rounded btn-icon left-icon"> <i class="fa fa-plus"></i> <span>Ajouter Descriptif</span></button>
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


              </div>
              <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                <div class="row">
                  <div class="col-sm-12">
                    <table id="example1" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example1_info">
                      <thead>
                        <tr role="row">
                          <th>Référence</th>
                          <th>Descriptif</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        require_once('php/classe/classeService.php');
                        $Service = new Service();
                        $list = $Service->listService();
                        foreach ($list as $value) {
                          echo  '
                                <tr id="' . $value['idService'] . '"">
                                    <td>' . $value['referenceService'] . '</td>
                                    <td>' . $value['service'] . '</td>
                                ';
                          ?>
                          <td>
                            <a href="javascript:void(0);" onclick="showUpdateRubrique(this)" data-idService="<?php echo $value['idService']; ?>" data-service="<?php echo $value['service']; ?>" style="margin-left:10px; float:center">
                              <i style="color:#000" class="glyphicon glyphicon-pencil" data-toggle="tooltip" title="Modifier"></i>
                            </a>

                            <a href="javascript:void(0);" onclick="supprimer(<?php echo $value['idService']; ?>)" style="margin-left:10px; float:center"><i style="color:#FF0000" class="glyphicon glyphicon-trash" data-toggle="tooltip" title="Supprimer"></i> </a>

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

    <div class="modal fade" id="modalservice">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:red;">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Ajout Descriptif</h4>
          </div>
          <form id="monForm">
            <div class="modal-body">
              <div class="row">
                <div class="col-md-12">
                  <!-- /.form-group -->
                  <div class="form-group">
                    <label for="nom">Descriptif</label>
                    <input type="text" autofocus="" class="form-control" id="nom" name="service" placeholder="Entrer le service" required="required">
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

<div class="modal fade" id="modalupdateservice">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:red;">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Modifier les informations d'un descriptif</h4>
      </div>
      <form id="monFormMod">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <!-- /.form-group -->
              <div class="form-group">
                <label for="serviceMod">Descriptif</label>
                <input type="text" class="form-control" id="serviceMod" name="serviceMod" placeholder="Entrer le descriptif" required="required">
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
        text: "&Ecirc;tes-vous s&ucirc;r de vouloir " + verbe + " ce descriptif ? <br> Tous les &eacute;l&eacute;ments qui lui sont li&eacute;s seront aussi supprim&eacute;s</strong>",
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
            url: "php/controller/service.php?supprimer=" + id, //process to mail
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

  function showUpdateRubrique(elmt) {
    $("#modalupdateservice #serviceMod").val($(elmt).attr("data-service"));
    $("#modalupdateservice #serviceMod").focus();
    $("#modalupdateservice #modifier").val($(elmt).attr("data-idService"));


    $("#modalupdateservice").modal("toggle");
  }

  $(document).ready(function() {
    $('#load_excel_form').on('submit', function(event) {
      event.preventDefault();
      $.ajax({
        url: "php/controller/importDescriptif.php",
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