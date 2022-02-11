
<?php
    class Connexion{

          public static function Connect(){
              $conn = NULL;
              try{
                  /*On essaie d'etablir la connexion*/
                  $conn = new PDO("mysql:host=localhost;dbname=caractere", "root", "");
                  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                  } catch(PDOException $e){
                      /*Si elle echoue, on recupere l'erreur et on l'affiche*/
                      echo 'ERROR: ' . $e->getMessage();
                      }    
                  return($conn);
          }
      }


        
      $list = array();
      if(isset($_GET['idBon'])){
        $idBon = $_GET['idBon'];
        $requete = Connexion::Connect()->query("SELECT * FROM vbon WHERE idBon = \"$idBon\" ");
      }
      

      foreach ($requete as $donnee) {
        $list[] = $donnee;
      }
  ?>
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
              <?php foreach ($list as $value) { ?>
                <table>
                  <tr>
                    <td style="width: 100%; text-align: right; font-weight: bold;">Date : <?php echo $value['dateBon']?></td>
                  </tr>
                </table>
                <br>
                <table>
                  <tr>
                    <td style="width: 50%; text-align: left; font-weight: bold;">PROFORMA N&deg; : <?php echo $value['numeroProforma']?></td>
                    <td style="width: 50%; text-align: right; font-weight: bold;">Nom du client : <?php echo $value['prenomClient']?> <?php echo $value['nomClient']?></td>
                  </tr>
                </table>
                <br>
                <table>
                  <tr>
                    <td style="padding-bottom: 20px; width: 100%; text-align: left; font-weight: bold;">BON DE COMMANDE N &deg; : <?php echo $value['numeroBon']?></td>
                  </tr>
                  <tr>
                    <td style="padding-bottom: 20px; width: 100%; text-align: left; font-weight: bold;">CONTACT : <?php echo $value['contact']?></td>
                  </tr>
                  <tr>
                    <td style="padding-bottom: 20px; width: 100%; text-align: left; font-weight: bold;">N&deg; DEVIS CLIENT : <?php echo $value['numeroDevis']?></td>
                  </tr>


                </table>

                <br>
                <table>
                  <tr>
                    <td style="width: 100%; text-align: center;"><?php echo $value['objet']?></td>
                  </tr>
                </table>
              
                <br>

                <br>
                
                <table cellpadding="0" cellspacing="0" border="0.5">
                  <tr>
                    <td style="width: 40%;">DESIGNATION</td>
                    <td style="width: 20%;">PRIX UNITAIRE</td>
                    <td style="width: 20%;">QUANTITE</td>
                    <td style="width: 20%;">PRIX TOTAL</td>
                  </tr>
                  <?php
                    $listProduit = array();
                    $requeteProduit = Connexion::Connect()->query("SELECT * FROM detailsbc WHERE idBon = \"$idBon\" ");
                    foreach ($requeteProduit as $donnee) {
                      $listProduit[] = $donnee;
                    }
                    foreach ($listProduit as $valueProduit) {
                  ?>
                  <tr>
                    <td style="width: 40%;"><?php echo $valueProduit['designation']?></td>
                    <td style="width: 20%;"><?php echo $valueProduit['prixUnitaire']?></td>
                    <td style="width: 20%;"><?php echo $valueProduit['quantite']?></td>
                    <td style="width: 20%;"><?php echo number_format($valueProduit['quantite']*$valueProduit['prixUnitaire'], 0, ',', ' '); ?> F</td>
                  </tr>
                  <?php } ?>


                </table>
                <br>
                <br>
                <br>
                <table cellpadding="0" cellspacing="0">
                  <tr>
                    <td style="width: 40%;"></td>
                    <td style="width: 60%;">
                      <table cellpadding="0" cellspacing="0" border="0.5">
                        <tr>
                          <td style="width: 67%;">Montant BRUT</td>
                          <td style="width: 33%;"><?php echo number_format($value['montantBon'], 0, ',', ' '); ?> F</td>
                        </tr>
                        <?php 
                          $valeurTaxe = 0;
                          if($value['idTypetaxe'] != 0){
                            $idTypetaxe = $value['idTypetaxe'];
                            $listTaxe = array();
                            $requeteTaxe = Connexion::Connect()->query("SELECT * FROM typetaxe WHERE idTypetaxe = \"$idTypetaxe\" ");
                            foreach ($requeteTaxe as $donnee) {
                              $listTaxe[] = $donnee;
                            }
                            foreach ($listTaxe as $valueTaxe) {
                              $valeurTaxe = (($valueTaxe['valeur']/100) * ($value['montantBon']));
                          
                        ?>
                        <tr style="color: #ff0000;">
                          <td style="width: 67%;"><?php echo $valueTaxe['libelle'] ?> - <?php echo $valueTaxe['valeur'] ?>%</td>
                          <td style="width: 33%;"><?php echo number_format($valeurTaxe, 0, ',', ' ') ?> F</td>
                        </tr>
                        <?php }} ?>
                        <tr style="background-color: #ccc;">
                          <td style="width: 67%;">TOTAL NET </td>
                          <td style="width: 33%;"><?php echo number_format(($value['montantBon']-$valeurTaxe), 0, ',', ' ') ?> F</td>
                        </tr>

                      </table>
                    </td>
                  </tr>
                </table>
                
                <br>
                <table cellpadding="0" cellspacing="0">
                  <tr>
                    <td style="padding-bottom: 50px; width: 60%;">N.B : <br> <?php echo $value['notabene']?></td>
                  </tr>
                  <tr>
                    <td style="padding-bottom: 50px; width: 60%;">D&eacute;lais de livraison : <?php echo $value['delaisLivraison']?></td>
                  </tr>
                  <tr>
                    <td style="padding-bottom: 50px; width: 60%; text-align: right;">LA COMPTBILITE </td>
                  </tr>
                  <tr>
                    <td style="padding-bottom: 50px; width: 60%;">Conditions de paiement : <br> <?php echo $value['conditionPaiement']?></td>
                  </tr>

                </table>
                <?php } ?>
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

