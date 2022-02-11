<div class="content-wrapper">
  <section class="content">
    <section class="content-header">
      <h1>
        Bon de commande
        <small>Liste des bons de commande</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i>Accueil</a></li>
        <li><a href="#">Bon de commande</a></li>
        <li class="active">Liste des bons de commande</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box  box-primary">
            <div class="box-header">
              <h3 class="box-title">Liste des bons de commande</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- <a id="btnAdddevis" data-toggle="modal" data-target="#modaldevis">
                <button class="btn btn-primary btn-rounded btn-icon left-icon"> <i class="fa fa-plus"></i> <span>Ajouter devis</span></button>
              </a><br><br> -->
              <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                <div class="row">
                  <div class="col-sm-12">
                    <table id="example1" class="table table-bordered table-hover dataTable">
                      <thead>
                        <tr role="row">
                          <th>Numéro</th>
                          <th>Objet</th>
                          <th>Auteur</th>
                          <th>Client</th>
                          <th>Montant (FCFA)</th>
                          <th>Date</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                         <?php
                          require_once('php/classe/classeBon.php');
                          $Bon= new Bon();
                          $list = $Bon->listBonValides($_SESSION['gestionDevisidUser']);
                          foreach($list as $value){
                            echo '
                                <tr id="'.$value['idBon'].'"">
                                    <td>'.$value['numeroBon'].'</td>
                                    <td>'.$value['objet'].'</td>
                                    <td>'.$value['prenom']." ".$value['nom'].'</td>
                                    <td>'.$value['prenomClient']." ".$value['nomClient'].'</td>
                                    <td>'.number_format($value['montantBon'], 0, ',', ' ').'</td>
                                    <td>'.DateComplete3($value['dateAjout']).'</td>
                                    ';
                            ?>
                                    <?php if($value['idEtat'] == 4){ ?>
                                    <td>
                                      <a href="facture_ajouter-<?php echo $value['idBon']; ?>" style="margin-left:10px; float:center"><i style = "color:#00a65a" class="glyphicon glyphicon-edit" data-toggle="tooltip" title="Faire la facture"></i> </a>
                                      
                                      <a target="_blank" href="doc/bon/BcFournisseur_<?php echo $value['idBon']; ?>.pdf" style="margin-left:10px; float:center"><i style = "color:#000" class="glyphicon glyphicon-eye-open" data-toggle="tooltip" title="Voir le bon de commande"></i> </a>

                                      
                                    </td>
                                  <?php } ?>
                                </tr>
                        <?php  } ?>
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
  </section>
</div>

