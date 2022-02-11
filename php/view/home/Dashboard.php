<div class="content-wrapper">

  <!-- Main content -->
  <section class="content">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Profil
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Accueil</a></li>
        <li><a href="#">Utilisateurs</a></li>
        <li class="active">Profil</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">

            <?php
            require_once('php/classe/classeDevis.php');
            $Devis = new Devis();
            $control = 0;
            if (isset($_SESSION['gestionDevisdcommercial']) || isset($_SESSION['gestionDevisdgeneral'])) {
              $control = 1;
              $nbDevisAValider = $Devis->nbDevisEtatValider( A_VALIDER, "");
              $nbDevisAValider = count($nbDevisAValider);

              $nbDevisAttenteBC = $Devis->nbAllDevisEtat(LIVRE, "AND idDevis NOT IN (SELECT idDevis FROM devisbc WHERE etat = 1)");
              $nbDevisAttenteBC = count($nbDevisAttenteBC);

              $nbDevisBC = $Devis->nbAllDevisEtat(LIVRE, "AND idDevis IN (SELECT idDevis FROM devisbc WHERE etat = 1)");
              $nbDevisBC = count($nbDevisBC);

              $nbDevisSansBC = $Devis->nbAllDevisEtat(LIVRE, "AND idDevis NOT IN (SELECT idDevis FROM devisbc WHERE etat = 1)");
              $nbDevisSansBC = count($nbDevisSansBC);

              $nbDevis = $Devis->nbAllDevis("");
              $nbDevis = count($nbDevis);
            }
            else {
              $nbDevisAValider = $Devis->nbAllDevisEtat(A_VALIDER, "");
              $nbDevisAValider = count($nbDevisAValider);
            }


            ?>
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?php if (!empty($_SESSION['gestionDevisphoto'])) echo $_SESSION['gestionDevisphoto'];
                                                                            else echo 'dist/img/user2-160x160.png' ?>" alt="User Image">

              <h3 class="profile-username text-center">
                <p><?php echo $_SESSION['gestionDevisprenom'] . " " . $_SESSION['gestionDevisnom'] ?></p>
              </h3>

              <p class="text-muted text-center"><?php echo $_SESSION['gestionDevisprofil'] ?></p>

              <ul class="list-group list-group-unbordered">
                <?php if (isset($_SESSION['gestionDevisdcommercial']) || isset($_SESSION['gestionDevisdgeneral']) ) { ?>
                <li class="list-group-item">
                  <b>Devis à valider</b> <a class="pull-right"><span class="label pull-right" style="background-color: <?php if (!$nbDevisAValider || $nbDevisAValider == 0) echo "#3fa913";
                                                                                                                      else echo "red"; ?>; color:white"><?php echo $nbDevisAValider; ?></span></a>
                </li>

                <li class="list-group-item">
                  <b>Devis livré, en attente BC</b> <a class="pull-right"><span class="label pull-right" style="background-color: <?php if (!$nbDevisAttenteBC || $nbDevisAttenteBC == 0) echo "#3fa913";
                                                                                                                            else echo "red"; ?>; color:white"><?php echo $nbDevisAttenteBC; ?></span></a>
                </li>
              

                <li class="list-group-item">
                  <b>Tous les devis</b> <a class="pull-right"><span class="label pull-right" style="background-color: <?php if (!$nbDevis || $nbDevis == 0) echo "#3fa913";
                                                                                                                      else echo "red"; ?>; color:white"><?php echo $nbDevis; ?></span></a>
                </li>
                <?php } ?>
              </ul>

              <!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
            </div>
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <!-- <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">About Me</h3>
            </div>

            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

              <p class="text-muted">
                B.S. in Computer Science from the University of Tennessee at Knoxville
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

              <p class="text-muted">Malibu, California</p>

              <hr>

              <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

              <p>
                <span class="label label-danger">UI Design</span>
                <span class="label label-success">Coding</span>
                <span class="label label-info">Javascript</span>
                <span class="label label-warning">PHP</span>
                <span class="label label-primary">Node.js</span>
              </p>

              <hr>

              <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
            </div>
      
          </div> -->

        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#timeline" data-toggle="tab">Activités</a></li>
              <li><a href="#settings" data-toggle="tab">Paramètres</a></li>
            </ul>
            <div class="tab-content">
              <!-- /.tab-pane -->
              <div class="tab-pane active" id="timeline">
                <!-- The timeline -->
                <ul class="timeline timeline-inverse">
                  <!-- timeline time label -->
                  <li class="time-label">
                    <span class="bg-red">
                      04 Mai 2018
                    </span>
                  </li>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-envelope bg-blue"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                      <h3 class="timeline-header">Nouvelle offre</h3>

                      <div class="timeline-body">
                        Offre n° SIR060318-0003 concernant le client Client 2 pour un montant de 3000000
                      </div>
                      <div class="timeline-footer">
                        <a class="btn btn-primary btn-sm">Voir l'offre</a>
                      </div>
                    </div>
                  </li>
                  <!-- timeline time label -->
                  <li class="time-label">
                    <span class="bg-red">
                      03 Mai 2018
                    </span>
                  </li>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-envelope bg-blue"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                      <h3 class="timeline-header">Nouvelle offre</h3>

                      <div class="timeline-body">
                        Offre n° SIR060318-0002 concernant le client Client 2 pour un montant de 3000000
                      </div>
                      <div class="timeline-footer">
                        <a class="btn btn-primary btn-sm">Voir l'offre</a>
                      </div>
                    </div>
                  </li>
                  <li>
                    <i class="fa fa-clock-o bg-gray"></i>
                  </li>
                </ul>
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="settings">
                <form class="form-horizontal">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Prénom</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" disabled id="inputName" placeholder="<?php echo $_SESSION['gestionDevisprenom'] ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Nom</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" disabled id="inputName" placeholder="<?php echo $_SESSION['gestionDevisnom'] ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" disabled id="inputEmail" placeholder="<?php echo $_SESSION['gestionDevisemail'] ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Téléphone</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" disabled id="inputName" placeholder="<?php echo $_SESSION['gestionDevistelephone'] ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Adresse</label>

                    <div class="col-sm-10">
                      <textarea class="form-control" id="inputExperience" disabled placeholder="<?php echo $_SESSION['gestionDevisadresse'] ?>"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">Role</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" disabled id="inputSkills" placeholder="<?php echo $_SESSION['gestionDevisprofil'] ?>">
                    </div>
                  </div>
                  <!-- <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                        </label>
                      </div>
                    </div>
                  </div> -->
                  <!-- <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-primary">Valider</button>
                    </div>
                  </div> -->
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </section>
  <!-- /.content -->
</div>