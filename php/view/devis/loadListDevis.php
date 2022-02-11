<?php  
  function loadListDevis($conditions){
    // echo $conditions;
    // echo "SELECT * FROM vdevis WHERE idDevis IN (SELECT idDevis FROM detailsdevis) $conditions";
    if(isset($_SESSION['gestionDevisdgeneral'])){
        require_once('php/classe/classeDevis.php');
        $Devis= new Devis();
        $list = $Devis->listAllDevis($conditions);
        foreach($list as $value){
          $hasBC = $Devis->hasBC($value['idDevis']);
          $etat = "Non defini";
          switch ($value['idEtat']) {
            case 1:
              $etat = "Transmis pour validation";
              break;
            case 2:
              $etat = "Transmis pour validation client";
              break;
            case 3:
              $etat = "Valid&eacute;, en attente de BC";
              break;
            case 4:
              $etat = "BC re&ccedil;u, travaux en cours";
              break;
            case 5:
              $etat = "Livr&eacute;";
              break;
            case 8:
              $etat = "Annul&eacute;";
              break;
            case 15:
              $etat = "Comment&eacute;, en attente de correction <a href='javascript:void(0);' style='border-radius: 0;' class='btn btn-sm btn-primary' data-toggle='tooltip' onclick='voirCommentaire(".$value['idDevis'].")' title='Cliquez pour voir le commentaire'>Voir</a>";
              break;
            
            default:
              # code...
              break;
          }?>
              <tr id="<?php echo $value['idDevis'] ?>">
                  <td><?php echo $value['numeroDevis'] ?></td>
                  <td><?php echo $value['objet'] ?></td>
                  <td><?php echo $value['prenom']." ".$value['nom']; ?></td>
                  <td><?php echo $value['prenomClient']." ".$value['nomClient'] ?></td>
                  <td style="text-align:left;"><?php echo number_format($value['montantDevis'], 0, ',', ' ') ?></td>
                  <td><?php echo DateComplete3($value['dateAjout']) ?></td>
                  <td>
                    <?php if($value['idEtat'] < VALIDE_PAR_LE_CLIENT){ ?>
                      <a href="devis_modifier-<?php echo $value['idDevis'] ?>" style="float:center"><i style = "color:#000" class="fa fa-pencil" data-toggle="tooltip" title="Modifier le devis"></i> </a>
                    <?php } ?>
                    <a href="javascript:void(0)" onclick="askPrintDevis(<?php echo $value['idDevis'] ?>)" style="float:center"><i style = "color:#000" class="glyphicon glyphicon-open-file" data-toggle="tooltip" title="G&eacute;n&eacute;rer le devis client"></i> </a>
                    
                    <a href="javascript:void(0)" onclick="askPrintDevisMarge(<?php echo $value['idDevis'] ?>)" style="float:center"><i style = "color:#000" class="glyphicon glyphicon-save-file" data-toggle="tooltip" title="G&eacute;n&eacute;rer la feuille de marge"></i> </a>
                  </td>
                  <td class="text-center"><?php echo $etat; if($value['idEtat'] == LIVRE && $hasBC == true) echo ", transmis pour facturation"; else if($value['idEtat'] == LIVRE && $hasBC == false) echo ", en attente de BC" ?></td>
            
                  <td class="dropdown">
                    <button class="btn btn-sm btn-primary dropdown-toggle" type="button" data-toggle="dropdown" style="border-radius: 0;">
                    Changer d'&eacute;tat 
                      <span class="caret"></span></button>
                      <ul class="dropdown-menu" style="top: unset; left: unset; margin: unset; border-color: #000; border-radius: 0;">
                        
                          <?php if($value['idEtat'] == A_VALIDER) { ?>
                            <li><a onclick="valider(<?php echo $value['idDevis'] ?>)" href="javascript:void(0)">Valider</a></li>
                          <?php } ?>
                          <li><a onclick="commenter(<?php echo $value['idDevis'] ?>, <?php echo $value['idResponsable'] ?>)" href="javascript:void(0)">Commenter</a></li>
                      </ul>
                  </td>
              </tr>
      <?php
        }
      ?>
    <?php }else{ ?>
        <?php
        require_once('php/classe/classeDevis.php');
        $Devis= new Devis();
        $list = $Devis->listDevis2($_SESSION['gestionDevisidUser'], $conditions);
        foreach($list as $value){
          $hasBC = $Devis->hasBC($value['idDevis']);
          $etat = "Non defini";
          switch ($value['idEtat']) {
            case 1:
              $etat = "Transmis pour validation";
              break;
            case 2:
              $etat = "Transmis pour validation client";
              break;
            case 3:
              $etat = "Valid&eacute;, en attente de BC";
              break;
            case 4:
              $etat = "BC re&ccedil;u, travaux en cours";
              break;
            case 5:
              $etat = "Livr&eacute;";
              break;
            case 8:
              $etat = "Annul&eacute;";
              break;
            case 15:
              $etat = "Comment&eacute;, en attente de correction 
              <a href='javascript:void(0);' style='border-radius: 0;' class='btn btn-sm btn-success' data-toggle='tooltip' onclick='validerCorrection(".$value['idDevis'].")' title='Cliquez pour notifier que vous avez &eacute;ffectu&eacute; les corrections demand&eacute;s'>Notifier correction</a>

              <a href='javascript:void(0);' style='border-radius: 0;' class='btn btn-sm btn-primary' data-toggle='tooltip' onclick='voirCommentaire(".$value['idDevis'].")' title='Cliquez pour voir le commentaire'>Voir</a>";
              break;
              default:
              # code...
              break;
            }?>
              <tr id="<?php echo $value['idDevis'] ?>">
                  <td><?php echo $value['numeroDevis'] ?></td>
                  <td><?php echo $value['objet'] ?></td>
                  <td><?php echo $value['prenom']." ".$value['nom']; ?></td>
                  <td><?php echo $value['prenomClient']." ".$value['nomClient'] ?></td>
                  <td style="text-align:left;"><?php echo number_format($value['montantDevis'], 0, ',', ' ') ?></td>
                  <td><?php echo DateComplete3($value['dateAjout']) ?></td>
                  <td>
                    <?php if($value['idEtat'] < VALIDE_PAR_LE_CLIENT){ ?>
                      <a href="devis_modifier-<?php echo $value['idDevis'] ?>" style="float:center"><i style = "color:#000" class="fa fa-pencil" data-toggle="tooltip" title="Modifier le devis"></i> </a>
                    <?php } ?>

                    <a href="javascript:void(0)" onclick="askPrintDevis(<?php echo $value['idDevis'] ?>)" style="float:center"><i style = "color:#000" class="glyphicon glyphicon-open-file" data-toggle="tooltip" title="G&eacute;n&eacute;rer le devis client"></i> </a>
                    
                    <a href="javascript:void(0)" onclick="askPrintDevisMarge(<?php echo $value['idDevis'] ?>)" style="float:center"><i style = "color:#000" class="glyphicon glyphicon-save-file" data-toggle="tooltip" title="G&eacute;n&eacute;rer la feuille de marge"></i> </a>
                  </td>
                  <td class="text-center"><?php echo $etat; if($value['idEtat'] == LIVRE && $hasBC == true) echo ", transmis pour facturation"; else if($value['idEtat'] == LIVRE && $hasBC == false) echo ", en attente de BC" ?></td>

                  <?php if($value['idEtat'] != A_VALIDER && $value['idEtat'] != COMMENTE  && $value['idEtat'] != ANNULE){ ?>
                    <td class="dropdown">
                      <button class="btn btn-sm btn-primary dropdown-toggle" type="button" data-toggle="dropdown" style="border-radius: 0;">
                      Changer d'&eacute;tat 
                        <span class="caret"></span></button>
                        <ul class="dropdown-menu" style="top: unset; left: unset; margin: unset; border-color: #000; border-radius: 0;">
                            <?php if($value['idEtat'] < VALIDE_PAR_LE_CLIENT){ ?>
                              <li><a onclick="validationClient(<?php echo $value['idDevis'] ?>)" href="javascript:void(0)">Validation client</a></li>
                            <?php } ?>
                            <?php if($value['idEtat'] >= VALIDE_PAR_LE_CLIENT){ ?>
                              <?php if($value['idEtat'] < BC_RECU || $hasBC == false){ ?>
                                <li><a onclick="receptionBC(<?php echo $value['idDevis'] ?>)" href="javascript:void(0)">R&eacute;ception BC</a></li>
                              <?php } ?>
                              <?php if($value['idEtat'] < LIVRE){ ?>
                                <li><a onclick="livrer(<?php echo $value['idDevis'] ?>)" href="javascript:void(0)">Livrer</a></li>
                              <?php } ?>
                              <li><a onclick="annuler(<?php echo $value['idDevis'] ?>)" href="javascript:void(0)">Annuler</a></li>
                            <?php } ?>
                        </ul>
                    </td>
                  <?php }else{ ?>
                    <td class="text-center">-</td>
                  <?php } ?>
              </tr>
      <?php
        } }
  }
?>