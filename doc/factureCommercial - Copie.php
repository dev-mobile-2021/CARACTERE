<?php
/*indique au document de ne pas afficher ce qui suit*/
	// header('Content-type: text/html; charset=UTF-8');
	// header('Content-type: text/html; charset=utf-8_general_ci');

	ob_start();
	session_start();
	require_once("functions/nuts.php");
	
?>
	<style type="text/css">

		.forBorder {
			border: 2px solid #dc0405;
			padding: 10px 10px; 
			border-radius: 10px;
			
		}
		table{
			font-size: 12px;
			/*Pour aligner les infos du client et de l entreprise*/
			vertical-align: top;
			width: 76%;
			
		}
		.addPadding{
			margin-left: 90px;
			margin-right: 90px;
		}
		.noPaddingRight{
			margin-right: 0px;
		}


		#l75{
			width: 65%;
			/*background-color: red;*/
		}
		#l25{
			width: 30%;
			/*background-color: blue;*/
		}
		#dateDev{
			text-align: right;
			vertical-align: middle;
			width: 100%;
		}
		h1{
			padding:0;
		}
		.contentFact{
			border-collapse: collapse;
		}
		.contentFact2{
			border-collapse: collapse;
		}
		.contentFact td{
			border:1px solid #000;
			padding: 1mm 1mm;
		}
		.contentFact th{
			color: #000;
			font-weight: normal;
			border: 1px solid #000;
			padding: 0.4mm;
		}
		.contentFact2 td{
			border-bottom:1px solid #000;
			padding: 3mm 1mm;
		}
		.contentFact2 th{
			color: #000;
			font-weight: normal;
			padding: 0.4mm;
		}
		.nobord{
			border:none;
		}
		.total{
			padding: 3mm;
			background:rgb(120, 120, 120);
			color: #FFF;
		}
		#foot{
			margin-top: 0px;
			text-align: center;
			border-top: 2px solid #000;
		}
		.rouge{
			background-color: #f3b6b7;
		}
		.input{
			border-radius: 7px; 
			text-align: center; 
			display: inline-block; 
			border: 1px solid #000; 
			padding: 5px;
		}

		
	</style>
	<?php
		require_once("functions.php");
		function decodeCaractere($texte){
    $entities_correction= htmlentities( $texte, ENT_COMPAT, 'UTF-8');
    return htmlentities( $entities_correction, ENT_COMPAT, 'UTF-8');
}
		class Connexion{

	        public static function Connect(){
	            $conn = NULL;
	            try{
	                /*On essaie d'etablir la connexion*/
	                $conn = new PDO("mysql:host=htsoftdeuzcaract.mysql.db;dbname=htsoftdeuzcaract", "htsoftdeuzcaract", "HTsoft2019caractere", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
					// $conn = new PDO('mysql:host=localhost;dbname=htsoftdeuzcaract','root', '');
					// $conn = new PDO('mysql:host=localhost;dbname=htsoftdeuzcaract','root', '');

					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	                } catch(PDOException $e){
	                    /*Si elle echoue, on recupere l'erreur et on l'affiche*/
	                    echo 'ERROR: ' . $e->getMessage();
	                    }    
	                return($conn);
	        }
	    }


        	$idDevis = 0;
		 	$list = array();
		 	$listRubrique = array();
		 	
		 	$listService = array();
		 	// echo $_GET['idDevis'];
		 	if(isset($_GET['idDevis'])){
		 		$idDevis = $_GET['idDevis'];
				$requete = Connexion::Connect()->query("SELECT * FROM vdevis WHERE idDevis = \"$idDevis\" ");

				$requeteRubrique = Connexion::Connect()->query("
						SELECT r.idRubrique, r.rubrique, (SELECT SUM(somme) FROM vrubrique WHERE idRubrique = r.idRubrique AND idDevis = \"$idDevis\") as total 
						FROM rubrique r 
						WHERE r.idRubrique IN(SELECT idRubrique FROM detailsdevis WHERE idDevis = \"$idDevis\")  
				");

				
				$requeteService = Connexion::Connect()->query("SELECT * FROM detailsdevis WHERE idDevis = \"$idDevis\" ");
		 	}
			

			foreach ($requete as $donnee) {
				$list[] = $donnee;
			}

			foreach ($requeteRubrique as $donnee) {
				$listRubrique[] = $donnee;
			}
			
			
			foreach ($requeteService as $donnee) {
				$listService[] = $donnee;
			}
			
		
	?>
	<!-- On cree le contenu de la page-->
	<!-- 
		*backtop: marge du haut
		*backleft: marge de gauche
		*backright: marge de droite
		*backbottom: marge du bas
		*footer="page": genere les numero de pages
	 -->

	<!-- Pour definir l'oriantaion de la page :  orientation="landscape" -->
	<page  backtop="0mm" backleft="0mm" backright="0mm" backbottom="20mm" style="/*font-family: freeserif*/">
	<!-- Message du bas de pagePosition recommandee par le site officiel -->
	
	<!-- 
		Informations sur le client et l'entreprise
	 -->
	 <page_footer>
        <table class="page_footer" style="width: 100%;">
            <tr>
                <td style="width: 100%; font-size: 9px; color: #4f1d17; font-weight: bold;">
                   Caract??re S??n??gal SARL
                </td>
            </tr>
            <tr>
            	<td style="width: 100%; color: #4f1d17; font-size: 9px; padding-top: 10px; padding-bottom: 10px; border-top: 3px solid #26c0c9; border-bottom: 3px solid #26c0c9; font-weight: bold;">
                   T(221) 33 820 91 37/39 . F(221) 33 820 91 39 . caractere@caratereconseil.com . www.caratereconseil.com<br>
					BP. 28 613 M??dina - Dakar . Routes des Almadies (Carrefour BICIS/UBA) . NINEA N?? 0022464282 2G2 . RC N?? 03 B 24 20
                </td>
            </tr>
        </table>
    </page_footer>
    	<?php foreach ($list as $value) { ?>
    		<table style="width: 88%;">
				<tr>
					<td style="width: 50%; text-align: left; font-weight: bold;">
						<img style="width: 30%;" src="img/logocaractere.png">
					</td>
				</tr>
				<tr>
					<td style=" padding-left: 25px; width: 50%; text-align: left; font-weight: bold; color: #4e2017; font-size: 15px;">
						Caract&egrave;re
					</td>
					<td style=" width: 50%; text-align: right;">
						&nbsp;
					</td>
				</tr>
				<tr>
					<td style=" padding-left: 25px; width: 50%; text-align: left; font-weight: lighter; font-size: 9px; color: #4e2017;">
						AGENCE CONSEIL EN COMMUNICATION
					</td>
				</tr>
			</table>
			<br>
			<table style="width: 76%;" class="addPadding">
				<tr>
					<td style="width: 100%; text-align: right; font-size: 12px; border-bottom: 2px solid #000; padding-bottom: 15px; padding-right: 20px;">
						Dakar, le <?php echo DateComplete($value['dateAjout']) ?>
					</td>
				</tr>

				<tr>
					<td style="width: 100%; text-align: right;">&nbsp;</td>
				</tr>
			</table>

			<table style="width: 76%; font-size: 12px;" class="addPadding">
				<tr>
					<td style="width: 45%;">
						FACTURE : 
					</td>
					<td style="width: 20%;">

					</td>
					<td style="width: 35%; text-align: center;">
						CLIENT :
					</td>
				</tr>
			</table>
				
			<table style="width: 76%; font-size: 12px;" class="addPadding">
				<tr>
					<td style="width: 45%; border: 2px solid #6d6c6c; border-radius: 10px; padding: 10px;">
						<table style="font-size: 12px;">
							<tr>
								<td style="padding-bottom: 5px;">NUMERO :</td>
							</tr>
							<tr>
								<td style="padding-bottom: 5px;">VOS REF : BC N&deg;</td>
							</tr>
							<tr>
								<td>NOS REF : Devis n&deg;</td>
							</tr>
							
						</table>

					</td>
					<td style="width: 20%;">

					</td>
					<td style="width: 35%; border: 2px solid #6d6c6c; border-radius: 10px; padding: 10px;">
						<table style="font-size: 12px; width: 100%;">
							<tr style="">
								<td style="width: 100%; vertical-align: middle; text-align: center; padding-bottom: 5px;">
									<strong><?php echo $value['prenomClient']?> <?php echo $value['nomClient']?></strong><br>
									<?php echo $value['adresseClient']?>		
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			<br>
			<table style="width: 84.5%;" class="addPadding">
				<tr>
					<td style="padding-top: 5px; padding-bottom: 5px; min-width: 40%; text-align: left; font-weight: bold; background-color: #26c0c9; color: #ffffff;">A l'atention de  : <?php $t = explode(' #$# ', $value['contact']); echo $t[0] ?> </td>
				</tr>
			</table>
			<table style="width: 76%;" class="addPadding">
				<tr>
					<td style="width: 100%; border-bottom: 1px solid #000;">&nbsp;</td>
				</tr>
				<tr>
					<td style="width: 100%; border-top: 1px solid #000;">&nbsp;</td>
				</tr>
			</table>
			
			<table style="width: 76%; font-size: 12px;" class="addPadding">
				<tr>
					<td style="width: 100%; border: 2px solid #6d6c6c; border-radius: 10px; padding: 10px;">
						<table style="font-size: 12px; width: 100%;">
							<tr style="">
								<td style="width: 100%; vertical-align: middle; text-align: center; padding-bottom: 5px;">
									<strong><?php echo html_entity_decode(decodeCaractere($value['campagne']))?></strong><br>
									<strong><?php echo html_entity_decode(decodeCaractere($value['objet']))?></strong>		
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		
		<br>
		<br>
		<?php $i = 0; foreach ($listRubrique as $valueRubrique) { ?>
		<table class="addPadding" cellpadding="0" cellspacing="0" >
			<tr style="background-color: #26c0c9; color: #ffffff;">
				<td style="padding: 5px; width: 85%; font-weight: bold;"><?php echo html_entity_decode(decodeCaractere($valueRubrique['rubrique']))?></td>
				<td style="padding: 5px; width: 15%; text-align: right;"><?php echo number_format($valueRubrique['total'], 0, ',', ' ') ?> F</td>
			</tr>
		</table>
		<?php
			$idRubrique = $valueRubrique['idRubrique'];
			$listFamille = array();
			$requeteFamille = Connexion::Connect()->query("
				SELECT DISTINCT(d.idFamille), f.famille FROM detailstypeservice d, famille f 
				WHERE d.idDevis = \"$idDevis\" AND d.idRubrique = \"$idRubrique\" AND d.idFamille = f.idFamille
			");
			foreach ($requeteFamille as $donnee) {
				$listFamille[] = $donnee;
			}
		?>
		<?php foreach ($listFamille as $valueFamille) { ?>
			<table class="addPadding" cellpadding="0" cellspacing="0" style="margin-top: 5px;">
				<tr style="background-color: #a1cbe6; color: #ffffff;">
					<td style="padding: 5px; width: 100%; font-weight: bold;"><?php echo html_entity_decode(decodeCaractere($valueFamille['famille']))?></td>
				</tr>
			</table>
			<?php
				$idRubrique = $valueRubrique['idRubrique'];
				$idFamille = $valueFamille['idFamille'];
				$listTypeservice = array();
				$requeteTypeservice = Connexion::Connect()->query("
					SELECT t.idTypeservice, (SELECT typeService FROM typeservice WHERE idTypeservice = t.idTypeservice) as typeService, t.hasPrice, IF(t.hasPrice = 1, (SELECT prixVente*quantite FROM detailstypeservice WHERE idTypeservice = t.idTypeservice AND idRubrique = \"$idRubrique\" AND idDevis = \"$idDevis\"), (SELECT SUM(prixVente*quantite) FROM detailsdevis WHERE idTypeservice = t.idTypeservice AND idRubrique = \"$idRubrique\" AND idDevis = \"$idDevis\")) as somme, hasComment, commentaire 
					FROM detailstypeservice t WHERE t.idTypeservice IN(SELECT idTypeservice FROM detailsdevis WHERE idRubrique = \"$idRubrique\") AND idDevis = \"$idDevis\" AND idFamille = \"$idFamille\" 
						");
				foreach ($requeteTypeservice as $donnee) {
					$listTypeservice[] = $donnee;
				}
			?>
			<?php foreach ($listTypeservice as $valueTypeservice) { ?>
				<table class="addPadding" cellpadding="0" cellspacing="0">
					<tr>
						<td style="padding: 5px; width: 60%;">
							<?php  
								if($valueTypeservice['hasComment'] == 1)
									echo "<strong style='font-size:10px;'>".html_entity_decode(decodeCaractere($valueTypeservice['commentaire']))."</strong><br>"; 
								echo "<strong>".html_entity_decode(decodeCaractere(str_replace("&quot;", '"', $valueTypeservice['typeService'])))."</strong><br>"; 
								$idTypeservice = $valueTypeservice['idTypeservice'];
							?>

							
						</td>
						<td style="padding: 5px; width: 15%; text-align: right;">

						</td>
						<td style="padding: 5px; width: 25%; text-align: right; font-weight: bold;">
							<?php echo number_format($valueTypeservice['somme'], 0, ',', ' ') ?> F
						</td>
					</tr>
					<?php 
						$listService = array();
						$requeteService = Connexion::Connect()->query("
							SELECT s.idService, s.service, d.quantite, d.prixVente
							FROM service s, typeservice t, detailsdevis d
							WHERE s.idService = d.idService
							AND t.idTypeservice = d.idTypeservice
							AND t.idTypeservice = \"$idTypeservice\"
							AND idDevis = \"$idDevis\"
							  ");
						foreach ($requeteService as $donnee) {
							$listService[] = $donnee;
						}
						foreach ($listService as $valueService) { 
					?>
					<tr>
						<td style="padding: 5px; width: 60%;">
							<?php echo html_entity_decode(decodeCaractere($valueService['service']))?>
						</td>
						<td style="padding: 5px; width: 15%; text-align: right;">
							<?php  if($valueService['quantite']*$valueService['prixVente'] != 0) echo number_format($valueService['quantite']*$valueService['prixVente'], 0, ',', ' ')." F" ?> 
						</td>
						<td style="padding: 5px; width: 25%; text-align: right;">

						</td>
					</tr>
					<?php } ?>
				</table>
			
			<?php } ?>
		<?php } ?>


		<?php $i++; } ?>
		<br>
		<br>
		<table class="">
			<tr>
				<td style="width: 20%;">
					
				</td>
				<td style="width: 80%;">
					

					
					
				</td>
			</tr>
		</table>
		<br>
		<table class="addPadding" cellpadding="0" cellspacing="0">
			<tr>
				<td style="width: 30%; vertical-align: bottom; padding-top: 40px;">
					 
				</td>
				<td style="width: 20%;">
				</td>
				<td style="width: 50%;">
					<table style="width: 100%;" cellpadding="0" cellspacing="0">
						<tr style="font-weight: bold; background-color: #3c1712; color: #fff;">
							<td style="padding: 5px; width: 75%;">
								Montant HTVA
							</td>
							<td style="padding: 5px; width: 25%; text-align: center;">
								<?php echo number_format($value['montantDevis'], 0, ',', ' ') ?> F
							</td>
						</tr>

						<tr>
							<td style="padding: 5px; width: 75%;">
								Commission <?php echo $value['commissionProduction'] ?>% sur la production
							</td>
							<td style="padding: 5px; width: 25%; text-align: center;">
								0F
							</td>
						</tr>

						<tr style=" background-color: #3c1712; color: #fff;">
							<td style="padding: 5px; width: 75%;">
								TOTAL HTVA
							</td>
							<td style="padding: 5px; width: 25%; text-align: center;">
								<?php echo number_format($value['montantDevis'], 0, ',', ' ') ?> F
							</td>
						</tr>
						<tr>
							<td style="padding: 5px; width: 75%;">
								Remise
							</td>
							<td style="padding: 5px; width: 25%; text-align: center;">
								<?php //echo number_format($value['montantDevis'], 0, ',', ' ') ?> F
							</td>
						</tr>

						<tr>
							<td style="padding: 5px; width: 75%;">
								TVA 18% 
							</td>
							<td style="padding: 5px; width: 25%; text-align: center;">
								<?php echo number_format(($value['montantDevis'] * (0.18)), 0, ',', ' ') ?> F
							</td>
						</tr>
						<tr style="color: #fff; background-color: #3c1712;">
							<td style="padding: 5px; width: 75%;">
								TOTAL TTC
							</td>
							<td style="padding: 5px; width: 25%; text-align: center;">
								<?php echo number_format(($value['montantDevis'] + $value['montantDevis'] * (0.18)), 0, ',', ' ') ?> F
							</td>
						</tr>
						<tr style="">
							<td style="padding: 5px; width: 75%;">&nbsp;
							</td>
							<td style="padding: 5px; width: 25%; text-align: center;">
							</td>
						</tr>
						<tr style="color: #fff; background-color: #3c1712;">
							<td style="padding: 5px; width: 75%;">
								NET A VOTRE DEBIT
							</td>
							<td style="padding: 5px; width: 25%; text-align: center;">
								<?php echo number_format(($value['montantDevis'] + $value['montantDevis'] * (0.18)), 0, ',', ' ') ?> F
							</td>
						</tr>
						
					</table>
				</td>
			</tr>
		</table>
		<br>
		<table class="addPadding" cellpadding="0" cellspacing="0">
			<tr>
				<td style="width: 50%;">
					<span style="text-decoration: underline;">
						Arr&ecirc;t&eacute; la pr&eacute;sente Facture &agrave; la somme de
					</span>	<br>
					<?php
						$obj = new nuts(($value['montantDevis'] + $value['montantDevis'] * (0.18)), "EUR");
						$text = $obj->convert("fr-FR");
						$nb = $obj->getFormated(" ", ",");
						echo "<strong>".$text."</strong>";
					?>
				</td>
				<td style="width: 20%;">
				</td>
				<td style="width: 30%;">
					<span style="text-decoration: underline;">La comptabilit&eacute;</span>					
				</td>
			</tr>
		</table>

		
		<br>
		<br>
		<br>
		<table class="addPadding" cellpadding="0" cellspacing="0">
			<tr>
				<td>
					<span style="text-decoration: underline;">Conditions de paiement</span> : <br><br>
					<?php echo html_entity_decode(decodeCaractere($value['conditionPaiement'])) ?>
				</td>
			</tr>
		</table>
		
		<?php } ?>
	</page>

<?php
/*indique au document de mettre ce qui precede dans la variable $contenu*/
	$contenu = ob_get_clean();
	// $contenu = utf8_decode($contenu);
	// $contenu = nl2br($contenu);
	// echo $contenu;
	require_once("html2pdf/html2pdf.class.php");
	/*
	*HTML2PDF prend 3 parametres
	*1-L'oriantaion Portrait(P) ou Paysage (L)
	*2-Le format du document (A4, A3...)
	*3-La langue
	*/
	$fact = new HTML2PDF('P', 'A4', 'fr');
	$fact->AddFont('times', '', '/_tcpdf_5.0.002/fonts/times.php');  // Pour Comic Sans MS

	//setDisplayMode permet de specidier le mode d4affichage de la page (page entiere, ...)
	$fact->pdf->setDisplayMode("fullpage");
	//on ecrit le contenu dans la page
	$fact->writeHTML($contenu);
	//on affiche le document
	//$idCommande = "appro";
	//ob_get_clean();
	//$fact->Output('factureClient_'.$idCommande.'.pdf');
	// $idDossier =1;
	// $idRapport = rand();
	@unlink("devis/FactureCommercial_".$idDevis.".pdf");
	// $fact->Output("devis/FactureCommercial_".$idDevis.".pdf", 'F');
	$fact->Output("devis/FactureCommercial_".$idDevis.".pdf", 'O');
	echo (int)$idDevis;

?>
