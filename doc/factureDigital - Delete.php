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
		
		/*class Connexion{
			public static function Connect(){
				$conn = NULL;
				try{
					$conn = new PDO();
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					} catch(PDOException $e){
						echo 'ERROR: ' . $e->getMessage();
						}    
					return($conn);
			}
		}*/
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
		<table>
			<tr>
				<td style="width: 50%; text-align: left; font-weight: bold;">
					<img style="width: 30%;" src="img/logo.png">
				</td>
			</tr>
			<tr>
				<td style=" padding-left: 25px; width: 50%; text-align: left; font-weight: bold; color: #4e2017; font-size: 15px;">
					Caract&egrave;re
				</td>
				<td style=" width: 50%; text-align: right;">
					Dakar, le 01/08/2018
				</td>
			</tr>
			<tr>
				<td style=" padding-left: 25px; width: 50%; text-align: left; font-weight: lighter; font-size: 10px; color: #4e2017;">
					AGENCE CONSEIL EN COMMUNICATION
				</td>
			</tr>
		</table>
		<br>
		<br>
		<table cellpadding="0" cellspacing="0">
			<tr>
				
				<td style=" width: 100%; text-align: right;">
					ORANGE, Siege VDN
				</td>
			</tr>
		</table>
		
		<table cellpadding="0" cellspacing="0">
			<tr>
				<td style="background-color: #24bfc8; width: 50%; color: #fff;">
					FACTURE N&deg;
				</td>
			</tr>
		</table>
		<table cellpadding="0" cellspacing="0">
			<tr>
				<td style="width: 50%;">
					NOS REF : (N&deg; de devis)
				</td>
			</tr>
		</table>
		<table cellpadding="0" cellspacing="0">
			<tr>
				<td style="width: 50%;">
					VOS REF : (N&deg; du BC)
				</td>
			</tr>
		</table>
		<br>
		<br>
		<table cellpadding="0" cellspacing="0">
			<tr>
				<td style="width: 100%; text-align: center; text-decoration: underline;">Offres CAN Orange</td>
			</tr>
		</table>
		
		<br>
		<br>
		<table cellpadding="0" cellspacing="0">
			<tr>
				<td style="padding: 5px; width: 35%; font-weight: bold; text-decoration: underline;">RUBRIQUES </td>
				<td style="padding: 5px; width: 25%; font-weight: bold; text-decoration: underline;">Prix unitaire </td>
				<td style="padding: 5px; width: 15%; font-weight: bold; text-decoration: underline;">Quantit&eacute; </td>
				<td style="padding: 5px; width: 25%; font-weight: bold; text-decoration: underline; text-align: right; padding-right: 20px;">MONTANT </td>
			</tr>

			<tr style="background-color: #9cc2db; color: #fff;">
				<td style="padding: 5px; width: 35%; font-weight: bold;">PRODUCTION 
				</td>
				<td style="padding: 5px; width: 25%; font-weight: bold;"></td>
				<td style="padding: 5px; width: 15%; font-weight: bold;"></td>
				<td style="padding: 5px; width: 25%; font-weight: bold; text-align: right;">1 000 F </td>
			</tr>

			<tr>
				<td style="padding: 5px; width: 35%;">
					<strong>Conception,développement et déploiement dispositif LIVE WALL</strong>  <br>
					Mise en place du dispositif Développement de la page HUB
					Intégration Déploiement
				</td>
				<td style="padding: 5px; width: 25%; font-weight: bold;">1 000 F </td>
				<td style="padding: 5px; width: 15%; font-weight: bold;">1 </td>
				<td style="padding: 5px; width: 25%; font-weight: bold; text-align: right; padding-right: 20px;">1 000 F </td>
			</tr>

			<tr style="background-color: #9cc2db; color: #fff;">
				<td style="padding: 5px; width: 35%; font-weight: bold;">ACHAT MEDIA 
				</td>
				<td style="padding: 5px; width: 25%; font-weight: bold;"></td>
				<td style="padding: 5px; width: 15%; font-weight: bold;"></td>
				<td style="padding: 5px; width: 25%; font-weight: bold; text-align: right;">260 060 F </td>
			</tr>

			<tr style="color: #46a1dc;">
				<td style="padding: 5px; width: 35%; font-weight: bold;"> Promotion offres 
				</td>
				<td style="padding: 5px; width: 25%; font-weight: bold;"></td>
				<td style="padding: 5px; width: 15%; font-weight: bold;"></td>
				<td style="padding: 5px; width: 25%; font-weight: bold; text-align: right;"></td>
			</tr>

			<tr>
				<td style="padding: 5px; width: 35%; font-weight: bold;"> 14 Millions de lions 
				</td>
				<td style="padding: 5px; width: 25%; font-weight: bold;"></td>
				<td style="padding: 5px; width: 15%; font-weight: bold;"></td>
				<td style="padding: 5px; width: 25%; font-weight: bold; text-align: right;"></td>
			</tr>

			<tr>
				<td style="padding: 5px; width: 35%;">Facebook 
				</td>
				<td style="padding: 5px; width: 25%;">10 F</td>
				<td style="padding: 5px; width: 15%;"> 5 000</td>
				<td style="padding: 5px; width: 25%; text-align: right;">50 000 F</td>
			</tr>

			<tr>
				<td style="padding: 5px; width: 35%;">Youtube 
				</td>
				<td style="padding: 5px; width: 25%;">10 F</td>
				<td style="padding: 5px; width: 15%;"> 2 000</td>
				<td style="padding: 5px; width: 25%; text-align: right;">20 000 F</td>
			</tr>

			<tr>
				<td style="padding: 5px; width: 35%; font-weight: bold;"> 4G Gratuite 
				</td>
				<td style="padding: 5px; width: 25%; font-weight: bold;"></td>
				<td style="padding: 5px; width: 15%; font-weight: bold;"></td>
				<td style="padding: 5px; width: 25%; font-weight: bold; text-align: right;"></td>
			</tr>

			<tr>
				<td style="padding: 5px; width: 35%;">Facebook 
				</td>
				<td style="padding: 5px; width: 25%;">10 F</td>
				<td style="padding: 5px; width: 15%;"> 7 000</td>
				<td style="padding: 5px; width: 25%; text-align: right;">70 000 F</td>
			</tr>

			<tr>
				<td style="padding: 5px; width: 35%;">Youtube 
				</td>
				<td style="padding: 5px; width: 25%;">10 F</td>
				<td style="padding: 5px; width: 15%;"> 7 000</td>
				<td style="padding: 5px; width: 25%; text-align: right;">70 000 F</td>
			</tr>

			<tr>
				<td style="padding: 5px; width: 35%; font-weight: bold;"> Cr&eacute;dit 500 F 
				</td>
				<td style="padding: 5px; width: 25%; font-weight: bold;"></td>
				<td style="padding: 5px; width: 15%; font-weight: bold;"></td>
				<td style="padding: 5px; width: 25%; font-weight: bold; text-align: right;"></td>
			</tr>

			<tr>
				<td style="padding: 5px; width: 35%;">Perfect Audience 
				</td>
				<td style="padding: 5px; width: 25%;">10 F</td>
				<td style="padding: 5px; width: 15%;"> 5 000</td>
				<td style="padding: 5px; width: 25%; text-align: right;">50 000 F</td>
			</tr>

			<tr>
				<td style="padding: 5px; width: 35%;">Senepeople 
				</td>
				<td style="padding: 5px; width: 25%;">10 F</td>
				<td style="padding: 5px; width: 15%;"> 3</td>
				<td style="padding: 5px; width: 25%; text-align: right;">30 F</td>
			</tr>
			
			<tr>
				<td style="padding: 5px; width: 35%;">Dakaractu 
				</td>
				<td style="padding: 5px; width: 25%;">10 F</td>
				<td style="padding: 5px; width: 15%;"> 3</td>
				<td style="padding: 5px; width: 25%; text-align: right;">30 F</td>
			</tr>
		</table>
		
		<br>
		<br>
		<br>
		<table cellpadding="0" cellspacing="0">
			<tr>
				<td style="padding: 5px; width: 60%;"> 
				</td>
				<td style="padding: 5px; width: 15%;">Montant HT</td>
				<td style="padding: 5px; width: 25%; text-align: right;">261 060 F</td>
			</tr>
		</table>

		<table cellpadding="0" cellspacing="0">
			<tr>
				<td style="padding: 5px; width: 60%;"> <span style="text-decoration: underline;"></span> 
				</td>
				<td style="padding: 5px; width: 40%;">Commission 15 % sur la production</td>
			</tr>
		</table>

		<table cellpadding="0" cellspacing="0">
			<tr>
				<td style="padding: 5px; width: 60%; background-color: #fff;"> 
				</td>
				<td style="padding: 5px; width: 15%;">TOTAL HT</td>
				<td style="padding: 5px; width: 25%; text-align: right;">261 060 F</td>
			</tr>
			<tr>
				<td style="padding: 5px; width: 60%;"> 
				</td>
				<td style="padding: 5px; width: 15%;">TVA 18%</td>
				<td style="padding: 5px; width: 25%; text-align: right;">46 991 F</td>
			</tr>
			<tr style="background-color: #3c1712; color: #fff;">
				<td style="padding: 5px; width: 60%; background-color: #fff;"> 
				</td>
				<td style="padding: 5px; width: 15%;">TOTAL TTC</td>
				<td style="padding: 5px; width: 25%; text-align: right;">308 051 F</td>
			</tr>
			<tr>
				<td style="padding: 5px; width: 60%;"> 
				</td>
				<td style="font-style: italic; padding: 5px; width: 15%;">ACOMPTE</td>
				<td style="padding: 5px; width: 25%; text-align: right; color: #0f18a6;">150 000 F</td>
			</tr>
			

		</table>
		
		
		<table cellpadding="0" cellspacing="0">
			<tr style="background-color: #3c1712; color: #fff;">
				<td style="padding: 5px; width: 60%; background-color: #fff;"> 
				</td>
				<td style="padding: 5px; width: 25%;">NET A VOTRE DEBIT</td>
				<td style="padding: 5px; width: 15%; text-align: right;">158 051 F</td>
			</tr>
		</table>
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
	$idRapport = rand();
	@unlink("RapportClientGilabMS_".$idRapport.".pdf");
	$fact->Output("RapportClientGilabMS_".$idRapport.".pdf", 'O');
	// $fact->Output("RapportClientGilabMS_".$idRapport.".pdf", 'F');
	echo (int)$idRapport;

?>
