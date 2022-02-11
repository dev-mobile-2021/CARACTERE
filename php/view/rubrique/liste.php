<script type="text/javascript" src="php/view/rubrique/rubrique.js"></script>

<div class="content-wrapper">
  <section class="content">
    <section class="content-header">
      <h1>
        Gestion des rubriques
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i></a></li>
        <li class="active">rubriques</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box  box-primary">
            <div class="box-header">
              <h3 class="box-title">Liste des rubriques</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <a id="btnAddrubrique" data-toggle="modal" data-target="#modalrubrique">
                <button class="btn btn-primary btn-rounded btn-icon left-icon"> <i class="fa fa-plus"></i> <span>Ajouter rubrique</span></button>
              </a><br><br>
              <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                <div class="row">
                  <div class="col-sm-12">
                    <table id="example1" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example1_info">
                      <thead>
                        <tr role="row">
                          <th>Référence</th>
                          <th>Type de service</th>
                          <th>Description</th>
                          <th>Actions</th>
                          <!-- <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 104px;">Action</th> -->
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          require_once('php/classe/classeRubrique.php');
                          $Rubrique= new Rubrique();
                          $list = $Rubrique->listRubrique();
                          foreach($list as $value){
                            echo '
                                <tr id="'.$value['idRubrique'].'"">
                                    <td>'.$value['referenceRubrique'].'</td>
                                    <td>'.$value['rubrique'].'</td>
                                    <td>'.$value['description'].'</td>
                                ';
                          ?>
                            <td>
                              <a href="javascript:void(0);"
                                onclick="showUpdateRubrique(this)"
                                data-idRubrique="<?php echo $value['idRubrique']; ?>" 
                                data-rubrique="<?php echo $value['rubrique']; ?>" 
                                data-description="<?php echo $value['description']; ?>"  
                                style="margin-left:10px; float:center">
                                  <i style = "color:#000" class="glyphicon glyphicon-pencil" data-toggle="tooltip" title="Modifier"></i>
                              </a>

                              <a href="javascript:void(0);" onclick="supprimer(<?php echo $value['idRubrique']; ?>)" style="margin-left:10px; float:center"><i style = "color:#FF0000" class="glyphicon glyphicon-trash" data-toggle="tooltip" title="Supprimer"></i> </a>

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



<div class="modal fade" id="modalrubrique">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:red;">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Ajout rubrique</h4>
      </div>
      <form id="monForm">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
             <!--  <div class="form-group">
                  <label for="referenceRubrique">Référence</label>
                  <input type="text" class="form-control" id="referenceRubrique" name="referenceRubrique" placeholder="Entrer la référence" required="required">
              </div> -->
            
              <!-- /.form-group -->
              <div class="form-group">
                  <label for="rubrique">Rubrique</label>
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



  </section>
</div>

<div class="modal fade" id="modalupdaterubrique">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:red;">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Modifier les informations d'une rubrique</h4>
      </div>
      <form id="monFormMod">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                  <label for="rubriqueMod">Rubrique</label>
                  <input type="text" class="form-control" id="rubriqueMod" name="rubriqueMod" placeholder="Entrer la rubrique" required="required">
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
  function supprimer(id){
    mot = "La Suppresion";
    motSansArticle = "Suppresion";
    verbe = "Supprimer";
    verbeSp = "Supprimer";
    couleur = "red";
    swal({   title: motSansArticle,   
      text: "&Ecirc;tes-vous s&ucirc;r de vouloir "+verbe+" cette rubrique ? <br> Tous les &eacute;l&eacute;ments qui lui sont li&eacute;s seront aussi supprim&eacute;s</strong>",   
      type: "warning",   
      showCancelButton: true,
      html:true,   
      confirmButtonColor: couleur,   
      confirmButtonText: verbeSp,   
      cancelButtonText: "Annuler",   
      closeOnConfirm: false,   
      closeOnCancel: false }, 
      function(isConfirm){   
          if (isConfirm) {  
              $.ajax({
                  type: "GET",
                  url: "php/controller/rubrique.php?supprimer="+id, //process to mail
                  data: '',
                  success: function(msg){
                      if(parseInt(msg)==1){
                          swal({ title: "Effectué !", text: mot+" a &eacute;t&eacute; effectu&eacute;e avec succ&egrave;s", imageUrl: 'dist/img/icones/success.png', html: true});
                          $(document).click(function(){
                             location.reload();
                          });
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
              swal({ title: "Annul&eacute;", text: "Aucune donn&eacute;e n'a &eacute;t&eacute; supprim&eacute;e", imageUrl: 'dist/img/icones/success.png', html: true});

          } 
      });
  }

  function showUpdateRubrique(elmt){
    $("#modalupdaterubrique #rubriqueMod").val($(elmt).attr("data-rubrique"));
    $("#modalupdaterubrique #descriptionMod").val($(elmt).attr("data-description"));
    $("#modalupdaterubrique #modifier").val($(elmt).attr("data-idRubrique"));
   

    $("#modalupdaterubrique").modal("toggle");
  }
</script>