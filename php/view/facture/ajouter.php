<script type="text/javascript" src="php/view/facture/facture.js"></script>
<div class="content-wrapper">
  <section class="content">
    <section class="content-header">
      <h1>
        Facture
        <small>Nouvelle facture</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Accueil</a></li>
        <li><a href="facture_liste"> Facture</a></li>
        <li class="active">Nouvelle facture</li>
      </ol>
    </section>

<section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Entête de la Facture</h3><br><br><span style="color:red"><em><u>Note</u> : Les champs précédés de (*) sont obligatoires</em></span>
        </div>
        <!-- /.box-header -->
          <form >
          <div class="box-body">
          <div class="row">
            <!-- col -->
            <div class="col-md-4">
              <div class="form-group">
              <label for="iduser">Responsable <span style="color:red">*</span></label>
                  <input type="text" class="form-control" id="iduser" name="iduser" placeholder="Entrer le responsable" value="<?php echo $_SESSION['gestionDevisprenom'].' '.$_SESSION['gestionDevisnom']; ?>" disabled required="required">
              </div>
              <div class="form-group">
                <label for="idclient">Client <span style="color:red">*</span></label>
                <select class="form-control select2" required="" name="idclient">
                <option value="">Choisir le client</option>
                  <?php
                    foreach($client as $val){
                        echo '<option value="'.$val->idclient.'">'.$val->prenomclient.' '.$val->nomclient.'</option>';
                    }
                  ?>                
                </select>
              </div>
              <div class="form-group">
                <label for="idagence">Agence <span style="color:red">*</span></label>
                <select class="form-control select2" required="" name="idagence">
                  <option value="">Choisir l'agence</option>
                  <?php
                    foreach($agence as $val){
                        echo '<option value="'.$val->idagence.'" selected>'.$val->agence.'</option>';
                    }
                  ?>                
                </select>
              </div>
              <div class="form-group">
                <label for="contact">Contact <span style="color:red">*</span></label>
                <input type="text" class="form-control" id="contact" name="contact" placeholder="Entrer le contact" required="required">
              </div>
              
            </div>
            <!-- /.col -->
            <!-- col -->
            <div class="col-md-4">
              
              <div class="form-group">
                <label for="objet">Marque / Produit <span style="color:red">*</span></label>
                <input type="text" class="form-control" id="objet" name="objet" placeholder="Entrer l'objet du devis" required="required">
              </div>
              <div class="form-group">
                <label for="campagne">Objet Campagne <span style="color:red">*</span></label>
                <input type="text" class="form-control" id="campagne" name="campagne" placeholder="Entrer la campagne du devis" required="required">
              </div>
              <div class="form-group">
                <label for="cdpcommande">Conditions de paiement <span style="color:red">*</span></label>
                <!-- <textarea class="form-control" name="cdpcommande" id="commentaire" cols="3" rows="5" placeholder="Entrer les conditions de paiement"></textarea> -->
                <div class="radio">
                    <label>
                      <input type="radio" name="cdpcommande" id="avant" value="Paiement avant la commande" required>
                      Paiement avant la commande
                    </label>
                </div>
                <div class="radio">
                    <label>
                      <input type="radio" name="cdpcommande" id="apres" value="Paiement au moment de la commande" required>
                      Paiement au moment de la commande
                    </label>
                </div>
                <div class="radio">
                    <label>
                      <input type="radio" name="cdpcommande" id="autre" value="Autre" required>
                      Autre
                    </label>  
                    <input type="text" class="form-control" name="autre" placeholder="Autre à préciser" value="">     
                </div>
              </div>
              <!-- <div class="form-group">
              <label for="cdplivraison">Pourcentage du paiement à la livraison (en %) <span style="color:red">*</span></label>
                  <input type="text" class="form-control" id="cdplivraison" name="cdplivraison" placeholder="Entrer le pourcentage du paiement à la livraison (en %)" required="required">
              </div> -->
            </div>
            <!-- /.col -->
            <!-- col -->
            <div class="col-md-4">
              <div class="form-group">
                <label for="tva">Type de taxe <span style="color:red">*</span></label>
                <select class="form-control select2" required="" name="tva">
                  <option value="">Choisir le type de taxe</option>               
                  <option value="HTVA" selected>HTVA</option>               
                  <!-- <option value="TTC">TTC</option> -->
                </select>
              </div>
              <div class="form-group">
                <label for="commission">Commission sur la production</label>
                <input type="number" class="form-control" id="commission" name="commission" placeholder="Entrer la commission sur la production (en %)">
              </div>
              <div class="form-group">
                <label for="commentaire">Commentaire(s)</label>
                <textarea class="form-control" name="commentaire" id="commentaire" cols="3" rows="5" placeholder="Entrer le(s) commentaire(s)"></textarea>
              </div>
            </div>
            <!-- /.col -->            
          </div>
          <div class="box-footer">
            <!-- <button type="reset" class="btn btn-danger pull-right">Réinitialiser</button> -->
            <button type="submit" class="btn btn-primary pull-right">Suivant &gt;</button>
          </div>
        </form>
          <!-- /.row -->
        </div>
        
      </div>
      <!-- /.box -->
      <!-- /.row -->
    </section>
  </section>
</div>