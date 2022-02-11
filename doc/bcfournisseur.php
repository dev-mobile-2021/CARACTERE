<?php
/*indique au document de ne pas afficher ce qui suit*/
	ob_start();
	session_start();
	
?>
	<style type="text/css">
	
		.forBorder {
			border: 2px solid #dc0405;
			padding: 10px 10px; 
			border-radius: 10px;
			
		}
		table{
			/*Pour aligner les infos du client et de l entreprise*/
			vertical-align: top;
			width: 100%;
			
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
	require_once('../php/classe/classeConnexion.php');

		// class Connexion{

	    //     public static function Connect(){
	    //         $conn = NULL;
	    //         try{
	    //             /*On essaie d'etablir la connexion*/
	    //             //  $conn = new PDO("mysql:host=webhoster.h-tsoft.com;dbname=c6caractere", "c6caractere", "rMANk5gwZv_U", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
		// 			//$conn = new PDO('mysql:host=localhost;dbname=htsoftdeuzcaract','root', '');
		// 			// $conn = new PDO("mysql:host=htsoftdeuzcaract.mysql.db;dbname=htsoftdeuzcaract", "htsoftdeuzcaract", "HTsoft2019caractere");

		// 			$conn = new PDO("mysql:host=htsoftdeuzcaract.mysql.db;dbname=htsoftdeuzcaract", "htsoftdeuzcaract", "HTsoft2019caractere");
		// 			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    //             } catch(PDOException $e){
	    //                 /*Si elle echoue, on recupere l'erreur et on l'affiche*/
	    //                 echo 'ERROR: ' . $e->getMessage();
	    //                 }    
	    //             return($conn);
	    //     }
	    // }


        	$idBon = 0;
		 	$list = array();
		 	if(isset($_GET['idBon'])){
		 		$idBon = $_GET['idBon'];
				$requete = Connexion::Connect()->query("SELECT * FROM vbon WHERE idBon = \"$idBon\" ");
		 	}
			

			foreach ($requete as $donnee) {
				$list[] = $donnee;
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
	<page  backtop="0mm" backleft="0mm" backright="0mm" backbottom="0mm">
	<!-- Message du bas de pagePosition recommandee par le site officiel -->
	
	<!-- 
		Informations sur le client et l'entreprise
	 -->
	 <page_footer>
        <table class="page_footer">
            <tr>
                <td style="width: 100%; text-align: right;">
                    page [[page_cu]]/[[page_nb]]
                </td>
            </tr>
        </table>
    </page_footer>
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
	</page>

<?php
/*indique au document de mettre ce qui precede dans la variable $contenu*/
	$contenu = ob_get_clean();
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
	@unlink("bon/BcFournisseur_".$idBon.".pdf");
	// $fact->Output("bon/BcFournisseur_".$idBon.".pdf", 'O');
	$fact->Output("bon/BcFournisseur_".$idBon.".pdf", 'F');
	echo (int)$idBon;

?>
