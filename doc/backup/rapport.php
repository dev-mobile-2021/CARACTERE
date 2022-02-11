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
		
		class Connexion{
			public static function Connect(){
				$conn = NULL;
				try{
					$conn = new PDO("mysql:host=caurissonpgoal.mysql.db;dbname=caurissonpgoal", "caurissonpgoal", "Goal123456789");
                // $conn = new PDO("mysql:host=caurissonpstt.mysql.db;dbname=caurissonpstt", "caurissonpstt", "DONTlook4");
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					} catch(PDOException $e){
						echo 'ERROR: ' . $e->getMessage();
						}    
					return($conn);
			}
		}

		$etatannuelloyersverses = 1;
		$rapportannuelsommeverseesauxtiers = 1;
		$rapportrecapitulatiftraitementsalaires = 1;
		$rapporttrimestrielleloyerverses = 1;
		$rapporttrimestrielsommeverseesauxtiers = 1;
		$rapportbulletinindividuel = 1;
		
	?>
	<!-- On cree le contenu de la page-->
	<!-- 
		*backtop: marge du haut
		*backleft: marge de gauche
		*backright: marge de droite
		*backbottom: marge du bas
		*footer="page": genere les numero de pages
	 -->

	<?php if($etatannuelloyersverses == 1){  ?>
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
		<table>
			<tr>
				<td style="width: 20%; padding-left: 10px;">
					<table>
						<tr style="text-align: center; font-size: 10px;">
							<td>
								REPUBLIQUE DU SENEGAL
							</td>
						</tr>
						<tr>
							<td style="padding-left: 35px; padding-top: -5px; padding-bottom: 5px; ">
								<div style="width: 60%; height: 1px; margin: 0px auto; border-bottom: 1px solid #000;">&nbsp;</div>
							</td>
						</tr>
						<tr style="text-align: center; font-size: 10px;">
							<td>MINISTERE DE L'ECONIMIE<br> ET DES FINANCES</td>
						</tr>
						<tr>
							<td style="padding-left: 35px; padding-top: -5px; padding-bottom: 5px; ">
								<div style="width: 60%; height: 1px; margin: 0px auto; border-bottom: 1px solid #000;">&nbsp;</div>
							</td>
						</tr>
						<tr style="text-align: center; font-size: 10px;">
							<td>DIRECTION GENERALE DES<br> IMPOTS ET DES DOMAINES</td>
						</tr>
						<tr>
							<td style="padding-left: 35px; padding-top: -5px; padding-bottom: 5px; ">
								<div style="width: 60%; height: 1px; margin: 0px auto; border-bottom: 1px solid #000;">&nbsp;</div>
							</td>
						</tr>
						<tr style="text-align: center; font-size: 10px;">
							<td>DIRECTION DES IMPOTS</td>
						</tr>
						<tr>
							<td style="padding-left: 35px; padding-top: -5px; padding-bottom: 5px; ">
								<div style="width: 60%; height: 1px; margin: 0px auto; border-bottom: 1px solid #000;">&nbsp;</div>
							</td>
						</tr>
					</table>
				</td>
				<td style="width: 70%; text-align: center; padding-top: 10px;">
					<span style='font-size: 20px; text-align: center; vertical-align:middle;'>ETAT RECAPITULATIF ANNUEL</span><br>
					<span style='font-size: 20px;'>des Sommes Vers&eacute;es en</span><br>
					<span style='font-size: 20px;'>au titre des loyers</span><br>
					<span style='font-size: 20px;'>(bureaux, hangards, maison d'habitation ect ...)</span><br>
					<span style='font-size: 20px;'>(Article 175 du Code G&eacute;n&eacute;ral des Imp&ocirc;ts)</span><br>
				</td>
				<td style="width: 9%; text-align: left; padding-top: 30px;">
					<div style='font-size: 20px; text-align: center; border: 1px solid #000;'>2019</div>
				</td>
			</tr>
		</table>
		<br>
		<table>
			<tr>
				<td style="text-align: center; width: 25%;">
					<table style="" border="0.5" cellspacing='0' cellpadding='0'>
						<tr style="">
							<td style="padding: 10px; padding-right: 30px; padding-left: 30px; padding-bottom: 80px;">TIMBRE A DATE</td>
						</tr>
					</table>
				</td>
				<td style="text-align: center; width: 75%; padding-top: 30px;">
					<table style="" border="0.5" cellspacing='0' cellpadding='0'>
						<tr style="">
							<td style="padding: 10px; padding-right: 40px; padding-left: 40px;">
								A transmettre au service des imp&ocirc;ts appuy&eacute; des bulletins individuels
								<br> le 31 Janvier (d&eacute;lais de rigueur) de chaque ann&eacute;e
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>

		<table>
			<tr>
				<td style="padding-top: 10px; width: 100%;">
					
					<table>
						<tr>
							<td>
								<span style='font-size: 12px;'>Pr&eacute;nom, Nom ou Raison sociale : <strong>Jean-Pierre PAMBOU</strong> <?php ?></span>
							</td>
						</tr>
					</table>
					<table>
						<tr>
							<td style="width: 50%">
								<span style='font-size: 12px;'>Sigle pour les soci&eacute;t&eacute;s : <strong></strong> <?php  ?></span>
							</td>
							<td style="width: 50%">
								<span style='font-size: 12px;'>Forme : <strong>Jean-Pierre PAMBOU</strong> <?php  ?></span>
							</td>
						</tr>
					</table>
					<table>
						<tr>
							<td style="width: 50%">
								<span style='font-size: 12px;'>Profession : <strong></strong> <?php  ?></span>
							</td>
							<td style="width: 50%">
								<span style='font-size: 12px;'>N° de compte <strong>123548</strong> <?php  ?></span>
								&nbsp;&nbsp;&nbsp;
								<span style='font-size: 12px; text-align: left;'>LC <strong>8</strong> <?php  ?></span>
							</td>
						</tr>
					</table>
					<table>
						<tr>
							<td style="width: 33%; text-align: left;">
								<span style='font-size: 12px;'>Adresse : <strong>46, Cit&eacute; Cercle de la vie</strong> <?php  ?></span>
							</td>
							<td style="width: 33%; text-align: left;">
								<span style='font-size: 12px;'>Rue, Av, Bd, Rte : <strong> Birago DIOP</strong> <?php  ?></span>
							</td>
							<td style="width: 33%; text-align: left;">
								<span style='font-size: 12px;'>Quatier : <strong>Sacr&eacute;-coeur 3 </strong> <?php  ?></span>
							</td>
						</tr>
					</table>
					
					<table>
						<tr>
							<td style="width: 33%; text-align: left;">
								<span style='font-size: 12px;'>Localit&eacute; : <strong>46, Cit&eacute; Cercle de la vie</strong> <?php  ?></span>
							</td>
							<td style="width: 33%; text-align: left;">
								<span style='font-size: 12px;'>B.P. : <strong> 2545</strong> <?php  ?></span>
							</td>
							<td style="width: 33%; text-align: left;">
								<span style='font-size: 12px;'>T&eacute;l : <strong>78 125 33 66 </strong> <?php  ?></span>
							</td>
						</tr>
					</table>
					<table>
						<tr>
							<td style="width: 33%; text-align: left;">
								<span style='font-size: 12px;'>Nom et adresse du comptable : <strong>46, Cit&eacute; Cercle de la vie</strong> <?php  ?></span>
							</td>
							<td style="width: 33%; text-align: left;">
								<span style='font-size: 12px;'>B.P. : <strong> 2545</strong> <?php  ?></span>
							</td>
							<td style="width: 33%; text-align: left;">
								<span style='font-size: 12px;'>T&eacute;l : <strong>78 125 33 66 </strong> <?php  ?></span>
							</td>
						</tr>
					</table>
					<table>
						<tr>
							<td style="width: 50%; text-align: left;">
								<span style='font-size: 12px;'>Exercice comptable du : <strong>01/01</strong> <?php  ?></span>
							</td>
							<td style="width: 50%; text-align: left;">
								<span style='font-size: 12px;'>au : <strong> 31/12</strong> <?php  ?></span>
								&nbsp;&nbsp; <span style='font-size: 12px;'><strong>2018</strong> <?php  ?></span>
							</td>
						</tr>
					</table>
					
					
				</td>
			</tr>
		</table>
		<table border="0.5" cellspacing='0' cellpadding='0'>
			<tr style="">
				<th style="width:20%; padding-top: 8px; padding-bottom: 8px; padding-left: 5px; text-align: center; font-size: 10px;">Adresse de l'immeuble lou&eacute;</th>
				<th style="width:30%; padding-top: 8px; padding-bottom: 8px; padding-left: 5px; text-align: center; font-size: 10px;">Nom, Pr&eacute;noms et adresse du propri&eacute;taire</th>
				<th style="width:15%; padding-top: 8px; padding-bottom: 8px; padding-left: 5px; text-align: center; font-size: 10px;">Loyer annuel pay&eacute;</th>
				<th style="width:15%; padding-top: 8px; padding-bottom: 8px; padding-left: 5px; text-align: center; font-size: 10px;">P&eacute;riode</th>
				<th style="width:20%; padding-top: 8px; padding-bottom: 8px; padding-left: 5px; text-align: center; font-size: 10px;">Usage de l'immeuble lou&eacute;</th>
			</tr>
			<tr>
				<td style="width:20%; padding-top: 8px; padding-bottom: 8px; padding-left: 5px;"><?php  ?></td>
				<td style="width:30%; padding-top: 8px; padding-bottom: 8px; padding-left: 5px;"><?php  ?></td>
				<td style="width:15%; padding-top: 8px; padding-bottom: 8px; padding-left: 5px;"><?php  ?></td>
				<td style="width:15%; padding-top: 8px; padding-bottom: 8px; padding-left: 5px;"><?php  ?></td>
				<td style="width:20%; padding-top: 8px; padding-bottom: 8px; padding-left: 5px;"><?php  ?></td>
			</tr>
		</table>

		<table style="margin-top: 5px;" border="0.5" cellspacing='0' cellpadding='0'>
			<tr style="">
				<td style="width:50%; padding-top: 8px; padding-bottom: 8px; padding-left: 5px; text-align: right;">TOTAL GENERAL OU A REPORTER</td>
				<th style="width:15%; padding-top: 8px; padding-bottom: 8px; padding-left: 5px; text-align: center; font-size: 10px;"></th>
			</tr>
		</table>
		<table style="margin-top: 5px;" border="0" cellspacing='0' cellpadding='0'>
			<tr style="">
				<td style="width:20%; border: 2px solid #000; padding-top: 8px; padding-bottom: 8px; padding-left: 5px; text-align: center;">CACHET DU DECLARANT</td>
				<td style="width:80%; padding-top: 8px; padding-bottom: 8px; padding-left: 5px;">
					<span style="display: inline-block; margin-left: 300px;"> A <strong>Dakar</strong>, le <strong>13 Juin</strong> <strong>2018</strong></span> <br> 
					<span style="display: inline-block; margin-left: 350px;">Signature</span> 
				</td>
			</tr>
		</table>

		
	</page>
<?php } ?>

<?php 
 	if($rapportannuelsommeverseesauxtiers == 1)
 		include ("rapportannuelsommeverseesauxtiers.php");
?>

<?php 
 	if($rapportrecapitulatiftraitementsalaires == 1)
 		include ("rapportrecapitulatiftraitementsalaires.php");
?>

<?php 
 	if($rapporttrimestrielleloyerverses == 1)
 		include ("rapporttrimestrielleloyerverses.php");
?>

<?php 
 	if($rapporttrimestrielsommeverseesauxtiers == 1)
 		include ("rapporttrimestrielsommeverseesauxtiers.php");
?>

<?php 
 	if($rapportbulletinindividuel == 1)
 		include ("rapportbulletinindividuel.php");
?>


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
	$idRapport = rand();
	@unlink("RapportClientGilabMS_".$idRapport.".pdf");
	$fact->Output("RapportClientGilabMS_".$idRapport.".pdf", 'O');
	// $fact->Output("RapportClientGilabMS_".$idRapport.".pdf", 'F');
	echo (int)$idRapport;

?>
