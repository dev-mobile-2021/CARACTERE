<script type="text/javascript" src="php/view/utilisateur/utilisateur.js"></script>
<div class="container" style="background-color: white; padding: 30px; margin-top: 10px;">
  <div class="loader loaderMessage loader-bar" data-text="Envoi des donn&eacute;es en cours. Veuillez patienter" data-rounded></div>
  <div id="mail-app" class="section">
    <!--DataTables example-->
    <div class="row">
      <div class="col s12 m12 l12">
        <!-- <div class="card-panel"> -->
          <h4 class="header2">Modifier un utilisateur</h4>
          <div class="row">
            <?php
                require_once('php/classe/classeUtilisateur.php');
                $Utilisateur = new Utilisateur();
                $list = $Utilisateur->rechercheUtilisateur($opt[1]);
                foreach($list as $value){
            ?>
            <form class="col s12" id="monFormMod">
              <div class="row">
                <div class="input-field col s12 m4 l4">
                  <input value="<?php echo $value['nom'] ?>" required id="nom" name="nom" type="text">
                  <label for="nom">Nom</label>
                </div>
             
                <div class="input-field col s12 m4 l4">
                  <input value="<?php echo $value['prenom'] ?>" required id="prenom" name="prenom" type="text">
                  <label for="prenom">Pr&eacute;nom</label>
                </div>
             
                <div class="input-field col s12 m4 l4">
                  <input value="<?php echo $value['adresse'] ?>" id="adresse" name="adresse" type="text">
                  <label for="adresse">Adresse</label>
                </div>
              </div>

              <div class="row">
                <div class="input-field col s12 m4 l4">
                  <input value="<?php echo $value['email'] ?>" required id="email" name="email" type="email">
                  <label for="email">E-mail</label>
                </div>
             
                <div class="input-field col s12 m4 l4">
                  <input value="<?php echo $value['telephone'] ?>" id="telephone" name="telephone" type="text">
                  <label for="telephone">T&eacute;l&eacute;phone</label>
                </div>
             
                <div class="input-field col s12 m4 l4">
                  <input value="<?php echo $value['login'] ?>" required id="login" name="login" type="text">
                  <label for="login">Login</label>
                </div>
              </div>

              <div class="row">
                
                <div class="input-field col s12 m4 l4">
                  <select id="idRole" name="idRole" required="">
                    <?php
                      require_once('php/classe/classeRole.php');
                      $Role = new Role();
                      $list = $Role->listRole();
                      foreach($list as $value3){
                        if($value3['idRole'] == $value['idRole']){
                              echo '<option selected value="'.$value3['idRole'].'">'.$value3['libelle'].'</option>';  
                          }
                          else{
                              echo '<option value="'.$value['idRole'].'">'.$value3['libelle'].'</option>';
                          }  
                      }
                    ?>
                  </select>
                  <label>Type de compte</label>
                </div>
                <?php if($value['idStructure'] != 1){ ?>
                <div class="input-field col s12 m4 l4 idStructure">
                  <select id="idStructure" name="idStructure">
                    <?php
                      require_once('php/classe/classeStructure.php');
                      $Structure = new Structure();
                      $list = $Structure->listStructure();
                      if(!empty($list)){
                        foreach($list as $value3){
                          if($value3['idStructure'] == $value['idStructure']){
                              echo '<option selected value="'.$value3['idStructure'].'">'.$value3['nom'].'</option>';  
                          }
                          else{
                              echo '<option value="'.$value['idStructure'].'">'.$value3['nom'].'</option>';
                          }
                            
                        }
                      }else{
                        echo '<option disabled value="none">Veuillez ajouter une structure &agrave; partir du menu de droite</option>';
                      }
                     
                    ?>
                  </select>
                  <label>Structure</label>
                </div>
              <?php } ?>
              </div>
              <div class="row">
                  <div class="input-field col s12">
                    <input value="<?php echo $value['idUtilisateur'] ?>" type="hidden" name="modifier">
                    <input value="<?php echo $value['idCompte'] ?>" type="hidden" name="idCompte">
                    <button class="btn green waves-effect waves-light right" type="submit" name="action">Valider
                    </button>
                    <a class="btn mr-1 red waves-effect waves-light right" href="utilisateur_liste">Annuler
                    </a>
                  </div>
              </div>
            </form>
          <?php } ?>
          </div>
        <!-- </div> -->
      </div>
    </div>
   
  </div>
</div>
<script type="text/javascript" src="php/view/utilisateur/events.js"></script>