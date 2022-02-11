<?php
  if(isset($_SESSION['gestionDevisdgeneral'])){
?>
<script type="text/javascript" src="php/view/user/user.js"></script>

<div class="content-wrapper">
  <section class="content">
    <section class="content-header">
      <h1>
        Gestion des utilisateurs
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Accueil</a></li>
        <li class="active">Utilisateurs</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box  box-primary">
            <div class="box-header">
              <h3 class="box-title">Liste des utilisateurs</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <a id="btnAdduser" data-toggle="modal" data-target="#modaluser">
                <button class="btn btn-primary btn-rounded btn-icon left-icon"> <i class="fa fa-plus"></i> <span>Ajouter utilisateur</span></button>
              </a><br><br>
              <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                <div class="row">
                  <div class="col-sm-12">
                    <table id="example1" class="table table-bordered table-hover dataTable">
                      <thead>
                        <tr role="row">
                          <th>Prénom(s)</th>
                          <th></th>
                          <th>Email</th>
                          <th>Téléphone</th>
                          <th>Profil</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          require_once('php/classe/classeUser.php');
                          $User= new User();
                          $list = $User->listUser2();
                          foreach($list as $value){
                            echo '
                                <tr id="'.$value['idUser'].'"">
                                    <td>'.$value['prenom'].'</td>
                                    <td>'.$value['nom'].'</td>
                                    <td>'.$value['email'].'</td>
                                    <td>'.$value['telephone'].'</td>
                                    <td>'.$value['profil'].'</td> ';
                            ?>
                                    
                                    <td>
                                      <a href="javascript:void(0);"
                                        onclick="showUpdateUser(this)"
                                        data-idUser="<?php echo $value['idUser']; ?>" 
                                        data-prenom="<?php echo $value['prenom']; ?>" 
                                        data-nom="<?php echo $value['nom']; ?>" 
                                        data-email="<?php echo $value['email']; ?>" 
                                        data-telephone="<?php echo $value['telephone']; ?>" 
                                        data-adresse="<?php echo $value['adresse']; ?>"  
                                        data-password="<?php echo $value['password']; ?>"  
                                        data-idRole="<?php echo $value['idRole']; ?>"  
                                        data-idAgence="<?php echo $value['idAgence']; ?>"  
                                        data-photo="<?php echo $value['photo']; ?>"  
                                        style="margin-left:10px; float:center">
                                          <i style = "color:#000" class="glyphicon glyphicon-pencil" data-toggle="tooltip" title="Modifier"></i>
                                      </a>

                                      <a href="javascript:void(0);" onclick="supprimer(<?php echo $value['idUser']; ?>)" style="margin-left:10px; float:center"><i style = "color:#FF0000" class="glyphicon glyphicon-trash" data-toggle="tooltip" title="Supprimer"></i> </a>

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

<div class="modal fade" id="modaluser">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:red;">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Ajout utilisateur</h4>
      </div>
      <form id="monForm" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                  <label for="prenom">Prénom</label>
                  <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Entrer le prénom" required="required">
              </div>
            
              <!-- /.form-group -->
              <div class="form-group">
                  <label for="nom">Nom</label>
                  <input type="text" class="form-control" id="nom" name="nom" placeholder="Entrer le nom" required="required">
              </div>
              <!-- /.form-group -->
              <!-- /.form-group -->
              <div class="form-group">
                  <label for="email">Email</label>
                  <input type="text" class="form-control" id="email" name="email" placeholder="Entrer l'email" required="required">
              </div>
              <!-- /.form-group -->
              <!-- /.form-group -->
              <div class="form-group">
                  <label for="telephone">Téléphone</label>
                  <input type="text" class="form-control" id="telephone" name="telephone" placeholder="Entrer le num téléphone" required="required">
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                  <label for="adresse">Adresse</label>
                  <input type="text" class="form-control" id="adresse" name="adresse" placeholder="Entrer l'adresse" required="required">
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <div class="form-group">
                  <label for="password">Mot de passe</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Entrer le mot de passe" required="required">
              </div>
              <div class="form-group">
                  <label for="password2">Confirmer mot de passe</label>
                  <input type="password" class="form-control" id="password2" name="password2" placeholder="Confirmer le mot de passe" required="required">
              </div>
              <div class="form-group">
                <label>Profil</label>
                <select class="form-control select2" style="width: 100%;" required="" name="idRole">
                  <?php
                    require_once('php/classe/classeRole.php');
                    $Role = new Role();
                    $list = $Role->listRole();
                    if(!empty($list)){
                      foreach($list as $value){
                        echo '<option value="'.$value['idRole'].'">'.$value['libelle'].'</option>';  
                      }
                    }
                   
                  ?>                 
                </select>
              </div>
              <div class="form-group">
                <label>Agence</label>
                <select class="form-control select2" style="width: 100%;"  name="idAgence" required="">
                  <?php
                    require_once('php/classe/classeAgence.php');
                    $Agence = new Agence();
                    $list = $Agence->listAgence();
                    if(!empty($list)){
                      foreach($list as $value){
                        echo '<option value="'.$value['idAgence'].'">'.$value['agence'].'</option>';  
                      }
                    }
                   
                  ?>           
                </select>
              </div>
              <div class="form-group">
                <label for="photo">Photo</label>
                  <input type="file" class="form-control" id="photo" name="photo">
              </div>
            </div>
            <!-- /.col -->            
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

<div class="modal fade" id="modalupdateuser">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:red;">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Modifier les informations de utilisateur</h4>
      </div>
      <form id="monFormMod" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                  <label for="prenomMod">Prénom</label>
                  <input type="text" class="form-control" id="prenomMod" name="prenomMod" placeholder="Entrer le prénom" required="required">
              </div>
            
              <div class="form-group">
                  <label for="nomMod">Nom</label>
                  <input type="text" class="form-control" id="nomMod" name="nomMod" placeholder="Entrer le nom" required="required">
              </div>
              <div class="form-group">
                  <label for="emailMod">Email</label>
                  <input type="text" class="form-control" id="emailMod" name="emailMod" placeholder="Entrer l'email" required="required">
              </div>
              <div class="form-group">
                  <label for="telephoneMod">Téléphone</label>
                  <input type="text" class="form-control" id="telephoneMod" name="telephoneMod" placeholder="Entrer le num téléphone" required="required">
              </div>
              <div class="form-group">
                  <label for="adresseMod">Adresse</label>
                  <input type="text" class="form-control" id="adresseMod" name="adresseMod" placeholder="Entrer l'adresse" required="required">
              </div>
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <div class="form-group">
                  <label for="passwordMod">Mot de passe</label>
                  <input type="password" class="form-control" id="passwordMod" name="passwordMod" placeholder="Entrer le mot de passe" required="required">
              </div>
              <div class="form-group">
                  <label for="password2Mod">Confirmer mot de passe</label>
                  <input type="password" class="form-control" id="password2Mod" name="password2Mod" placeholder="Confirmer le mot de passe" required="required">
              </div>
              <div class="form-group">
                <label>Profil</label>
                <select class="form-control select2" style="width: 100%;" required="" id="idRoleMod" name="idRoleMod">
                  <?php
                    require_once('php/classe/classeRole.php');
                    $Role = new Role();
                    $list = $Role->listRole();
                    if(!empty($list)){
                      foreach($list as $value){
                        echo '<option value="'.$value['idRole'].'">'.$value['libelle'].'</option>';  
                      }
                    }
                   
                  ?>                 
                </select>
              </div>
              <div class="form-group">
                <label>Agence</label>
                <select class="form-control select2" style="width: 100%;"  name="idAgenceMod" id="idAgenceMod" required="">
                  <?php
                    require_once('php/classe/classeAgence.php');
                    $Agence = new Agence();
                    $list = $Agence->listAgence();
                    if(!empty($list)){
                      foreach($list as $value){
                        echo '<option value="'.$value['idAgence'].'">'.$value['agence'].'</option>';  
                      }
                    }
                   
                  ?>           
                </select>
              </div>
              
              <div class="form-group">
                <label for="photoMod">Photo</label>
                  <input type="file" class="form-control" id="photoMod" name="photoMod">
              </div>
              <img id="previewPhoto" style="width: 100px;" src="">
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
  </section>
</div>

<script type="text/javascript">
  function readURL(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#modalupdateuser #previewPhoto').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$("#photoMod").change(function() {
  readURL(this);
});

  function supprimer(id){
    mot = "La Suppresion";
    motSansArticle = "Suppresion";
    verbe = "Supprimer";
    verbeSp = "Supprimer";
    couleur = "red";
    swal({   title: motSansArticle,   
      text: "&Ecirc;tes-vous s&ucirc;r de vouloir "+verbe+" cet utilisateur ?</strong>",   
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
                  url: "php/controller/user.php?supprimer="+id, //process to mail
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
                     alert(msg); 
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

  function showUpdateUser(elmt){
    $("#modalupdateuser #prenomMod").val($(elmt).attr("data-prenom"));
    $("#modalupdateuser #nomMod").val($(elmt).attr("data-nom"));
    $("#modalupdateuser #emailMod").val($(elmt).attr("data-email"));
    $("#modalupdateuser #telephoneMod").val($(elmt).attr("data-telephone"));
    $("#modalupdateuser #adresseMod").val($(elmt).attr("data-adresse"));
    $("#modalupdateuser #passwordMod").val($(elmt).attr("data-password"));
    $("#modalupdateuser #password2Mod").val($(elmt).attr("data-password"));
    $("#modalupdateuser #idRoleMod").val($(elmt).attr("data-idRole")).change();
    $("#modalupdateuser #idAgenceMod").val($(elmt).attr("data-idAgence")).change();
    $("#modalupdateuser #photoMod").attr("value", $(elmt).attr("data-photo"));
    $("#modalupdateuser #modifier").val($(elmt).attr("data-idUser"));
    $("#modalupdateuser #previewPhoto").attr("src", $(elmt).attr("data-photo"));

    $("#modalupdateuser").modal("toggle");
  }
</script>


<?php } ?>