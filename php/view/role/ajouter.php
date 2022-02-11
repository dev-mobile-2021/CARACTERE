<script type="text/javascript" src="php/view/utilisateur/utilisateur.js"></script>
<div class="container" style="background-color: white; padding: 30px; margin-top: 10px;">
  <div class="loader loaderMessage loader-bar" data-text="Envoi des donn&eacute;es en cours. Veuillez patienter" data-rounded></div>
  <div id="mail-app" class="section">
    <!--DataTables example-->
    <div class="row">
      <div class="col s12 m12 l12">
        <!-- <div class="card-panel"> -->
          <h4 class="header2">Ajouter un utilisateur</h4>
          <div class="row">
            <form class="col s12" id="monForm">
              <div class="row">
                <div class="input-field col s12 m4 l4">
                  <input required id="nom" name="nom" type="text">
                  <label for="nom">Nom</label>
                </div>
             
                <div class="input-field col s12 m4 l4">
                  <input required id="prenom" name="prenom" type="text">
                  <label for="prenom">Pr&eacute;nom</label>
                </div>
             
                <div class="input-field col s12 m4 l4">
                  <input id="adresse" name="adresse" type="text">
                  <label for="adresse">Adresse</label>
                </div>
              </div>

              <div class="row">
                <div class="input-field col s12 m4 l4">
                  <input required id="email" name="email" type="email">
                  <label for="email">E-mail</label>
                </div>
             
                <div class="input-field col s12 m4 l4">
                  <input id="telephone" name="telephone" type="text">
                  <label for="telephone">T&eacute;l&eacute;phone</label>
                </div>
             
                <div class="input-field col s12 m4 l4">
                  <input required id="login" name="login" type="text">
                  <label for="login">Login</label>
                </div>
              </div>

              <div class="row">
                <div class="input-field col s12 m4 l4">
                  <input required id="motDePasse" name="motDePasse" type="password">
                  <label for="motDePasse">Mot de passe</label>
                </div>

                <div class="input-field col s12 m4 l4">
                  <input required id="motDePasse2" name="motDePasse2" type="password">
                  <label for="motDePasse2">Confirmer mot de passe</label>
                </div>
                <div class="input-field col s12 m4 l4">
                  <select id="idRole" name="idRole" required="">
                    <?php
                      /*require_once('php/classe/classeRole.php');
                      $Role = new Role();
                      $list = $Role->listRole();
                      foreach($list as $value){
                        echo '<option value="'.$value['idRole'].'">'.$value['libelle'].'</option>';  
                      }*/
                    ?>
                  </select>
                  <label>Type de compte</label>
                </div>
                <div class="input-field col s12 m4 l4 idStructure">
                  <select id="idStructure" name="idStructure">
                    <?php
                     /* require_once('php/classe/classeStructure.php');
                      $Structure = new Structure();
                      $list = $Structure->listStructure();
                      if(!empty($list)){
                        foreach($list as $value){
                          echo '<option value="'.$value['idStructure'].'">'.$value['nom'].'</option>';  
                        }
                      }else{
                        echo '<option disabled value="none">Veuillez ajouter une structure &agrave; partir du menu de droite</option>';
                      }
                     */
                    ?>
                  </select>
                  <label>Structure</label>
                </div>
              </div>
              <div class="row">
                  <div class="input-field col s12">
                    <input type="hidden" name="ajouter">
                    <button class="btn green waves-effect waves-light right" type="submit" name="action">Valider
                    </button>
                    <a class="btn mr-1 red waves-effect waves-light right" href="#">Annuler
                    </a>
                  </div>
              </div>
            </form>
          </div>
        <!-- </div> -->
      </div>
    </div>
   
  </div>
</div>
<script type="text/javascript" src="php/view/utilisateur/events.js"></script>