<script type="text/javascript" src="php/view/role/role.js"></script>

<div class="content-wrapper">
  <section class="content">
    <section class="content-header">
      <h1>
        Gestion des privil&egrave;ges
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i></a></li>
        <li class="active">privil&egrave;ges</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box  box-primary">
            <div class="box-header">
              <h3 class="box-title">Liste des privil&egrave;ges</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <a id="btnAddrole" data-toggle="modal" data-target="#modalrole">
                <button class="btn btn-primary btn-rounded btn-icon left-icon"> <i class="fa fa-plus"></i> <span>Ajouter role</span></button>
              </a><br><br>
              <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                <div class="row">
                  <div class="col-sm-12">
                    <table id="example1" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example1_info">
                      <thead>
                        <tr role="row">
                          <th>Role</th>
                          <!-- <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 104px;">Action</th> -->
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          require_once('php/classe/classeRole.php');
                          $Role= new Role();
                          $list = $Role->listRole();
                          foreach($list as $value){ ?>
                                <tr id="">
                                    <td>
                                       <form id="monForm" class="form-horizontal">
                                        <div class="modal-body">
                                          <div class="row">
                                            <div class="col-md-12">
                                              <?php echo $value['libelle'] ?>
                                            </div>
                                            <div class="col-md-12">
                                              <div class="form-group">
                                                <span class="checkbox">
                                                  <label for="libelle">
                                                    <input type="checkbox" id="libelle" name="libelle"> Tgiuj
                                                  </label>
                                                </span>
                                                <span class="checkbox">
                                                  <label for="libelle2">
                                                    <input type="checkbox" id="libelle2" name="libelle2"> Tgiuj
                                                  </label>
                                                </span>
                                                <span class="checkbox">
                                                  <label for="libelle3">
                                                    <input type="checkbox" id="libelle3" name="libelle3"> Tgiuj
                                                  </label>
                                                </span>
                                                 
                                                  
                                              </div>
                                              
                                            </div>      
                                          </div>
                                        </div>
                                        <div class="modal-footer">
                                          <input type="hidden" name="ajouter">
                                          <!-- <button type="reset" class="btn btn-default pull-left">Annuler</button> -->
                                          <button type="submit" class="btn btn-primary">Valider</button>
                                        </div>
                                      </form>
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

<div class="modal fade" id="modalrole">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:red;">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Ajout role</h4>
      </div>
      <form id="monForm">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              
            
              <!-- /.form-group -->
              <div class="form-group">
                  <label for="libelle">Role</label>
                  <input type="text" class="form-control" id="libelle" name="libelle" placeholder="Entrer le role" required="required">
              </div>
              <!-- /.form-group -->
              <!-- /.form-group -->
              
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

