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
		<table cellpadding="0" cellspacing="0">
			<tr>
				<td style="width: 100%; font-size: 20px; color: #68b2e2;">
					Ordre de publicit&eacute;
				</td>
			</tr>
		</table>
		<br>
		
		<table cellpadding="0" cellspacing="0">
			<tr>
				<td style="width: 40%;">
					<table cellpadding="0" cellspacing="0">
						<tr>
							<td style="width: 40%;">
								N&deg; OP
							</td>
							<td style="width: 60%; border-bottom: 1px solid #000;">
								
							</td>
						</tr>

						<tr>
							<td style="width: 40%; padding-top: 15px;">
								Client
							</td>
							<td style="width: 60%; border-bottom: 1px solid #000;">
								
							</td>
						</tr>

						<tr>
							<td style="width: 40%; padding-top: 15px;">
								N&deg; OP
							</td>
							<td style="width: 60%; border-bottom: 1px solid #000;">
								
							</td>
						</tr>

						<tr>
							<td style="width: 40%; padding-top: 15px;">
								N&deg; Dossier
							</td>
							<td style="width: 60%; border-bottom: 1px solid #000;">
								
							</td>
						</tr>

						<tr>
							<td style="width: 40%; padding-top: 15px;">
								Marque
							</td>
							<td style="width: 60%; border-bottom: 1px solid #000;">
								
							</td>
						</tr>

						<tr>
							<td style="width: 40%; padding-top: 15px;">
								Objet
							</td>
							<td style="width: 60%; border-bottom: 1px solid #000;">
								
							</td>
						</tr>

						<tr>
							<td style="width: 40%; padding-top: 15px;">
								Support m&eacute;dia
							</td>
							<td style="width: 60%; border-bottom: 1px solid #000;">
								
							</td>
						</tr>

						
					</table>
				</td>
				<td style="width: 30%; text-align: right;">
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					P&eacute;riode
				</td>
				<td style="width: 10%; text-align: right;">
					
				</td>
				<td style="width: 20%;">
					<table cellpadding="0" cellspacing="0">
						<tr>
							<td style="width: 20%; ">Date</td>
							<td style="width: 80%; border-bottom: 1px solid #000;"></td>
						</tr>
					</table>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<table cellpadding="0" cellspacing="0">
						<tr>
							<td style="width: 20%; ">Du</td>
							<td style="width: 80%; border-bottom: 1px solid #000;"></td>
						</tr>
						<tr>
							<td style="width: 20%; ">Au</td>
							<td style="width: 80%; border-bottom: 1px solid #000;"></td>
						</tr>
					</table>
				</td>

			</tr>
		</table>
		
		<br>
		<br>
		<br>

		<table cellpadding="0" cellspacing="0">
			<tr>
				<td style="width: 89%;">
					<table cellpadding="0" cellspacing="0" border="0.5">
						<tr>
							<td style="background-color: #ccc; color: #175882; text-align: center; width: 30%;">Libell&eacute;</td>
							<td style="background-color: #ccc; color: #175882; text-align: center; width: 20%;">Format</td>
							<td style="background-color: #ccc; color: #175882; text-align: center; width: 5%;">Qt&eacute;</td>
							<td style="background-color: #ccc; color: #175882; text-align: center; width: 10%;">Co&ucirc;t brut</td>
							<td style="background-color: #ccc; color: #175882; text-align: center; width: 17.5%;">Com. agence</td>
							<td style="background-color: #ccc; color: #175882; text-align: center; width: 17.5%;">Co&ucirc;t net</td>
						</tr>
						<tr>
							<td style="text-align: center; width: 30%;">&nbsp;</td>
							<td style="text-align: center; width: 20%;">&nbsp;</td>
							<td style="text-align: center; width: 5%;">&nbsp;</td>
							<td style="text-align: center; width: 10%;">&nbsp;</td>
							<td style="text-align: center; width: 17.5%;">&nbsp;</td>
							<td style="text-align: center; width: 17.5%;">&nbsp;</td>
						</tr>
						<tr>
							<td style="text-align: center; width: 30%;">&nbsp;</td>
							<td style="text-align: center; width: 20%;">&nbsp;</td>
							<td style="text-align: center; width: 5%;">&nbsp;</td>
							<td style="text-align: center; width: 10%;">&nbsp;</td>
							<td style="text-align: center; width: 17.5%;">&nbsp;</td>
							<td style="text-align: center; width: 17.5%;">&nbsp;</td>
						</tr>
						<tr>
							<td style="text-align: center; width: 30%;">&nbsp;</td>
							<td style="text-align: center; width: 20%;">&nbsp;</td>
							<td style="text-align: center; width: 5%;">&nbsp;</td>
							<td style="text-align: center; width: 10%;">&nbsp;</td>
							<td style="text-align: center; width: 17.5%;">&nbsp;</td>
							<td style="text-align: center; width: 17.5%;">&nbsp;</td>
						</tr>
						<tr>
							<td style="text-align: center; width: 30%;">&nbsp;</td>
							<td style="text-align: center; width: 20%;">&nbsp;</td>
							<td style="text-align: center; width: 5%;">&nbsp;</td>
							<td style="text-align: center; width: 10%;">&nbsp;</td>
							<td style="text-align: center; width: 17.5%;">&nbsp;</td>
							<td style="text-align: center; width: 17.5%;">&nbsp;</td>
						</tr>

					</table>
				</td>
				<td style="width: 1%;">
					
				</td>
				<td style="width: 10%;">
					<table cellpadding="0" cellspacing="0" border="0.5">
						<tr>
							<td style="background-color: #ccc; color: #175882; text-align: center; width: 100%;">Montant</td>
						</tr>
						<tr>
							<td style="text-align: center; width: 100%;">&nbsp;</td>
						</tr>
						<tr>
							<td style="text-align: center; width: 100%;">&nbsp;</td>
						</tr>
						<tr>
							<td style="text-align: center; width: 100%;">&nbsp;</td>
						</tr>
						<tr>
							<td style="text-align: center; width: 100%;">&nbsp;</td>
						</tr>

					</table>
					<table cellpadding="0" cellspacing="0">
						<tr>
							<td style="border-right: 1px solid #000; text-align: center; width: 100%;">
								&nbsp;
							</td>
						</tr>
					</table>


				</td>
			</tr>
		</table>

		<table cellpadding="0" cellspacing="0">
			<tr>
				<td style="width: 73.5%;"></td>
				<td style="width: 15.5%;">
					<table cellpadding="0" cellspacing="0">
						<tr>
							<td style="color: #68b2e2; width: 100%;">
								Net &agrave; payer
							</td>
						</tr>
						<tr>
							<td style="color: #68b2e2; width: 100%;">
								TVA 18%
							</td>
						</tr>
						<tr>
							<td style="color: #68b2e2; width: 100%;">
								Taxe municipale
							</td>
						</tr>
						<tr>
							<td style="color: #68b2e2; width: 100%;">
								Total TTC
							</td>
						</tr>
						
					</table>
				</td>
				<td style="width: 1%;">&nbsp;</td>
				<td style="width: 10%;">
					<table cellpadding="0" cellspacing="0" border="0.5">
						<tr>
							<td style="text-align: center; width: 100%;">&nbsp;</td>
						</tr>
						<tr>
							<td style="text-align: center; width: 100%;">&nbsp;</td>
						</tr>
						<tr>
							<td style="text-align: center; width: 100%;">&nbsp;</td>
						</tr>
						<tr>
							<td style="text-align: center; width: 100%;">&nbsp;</td>
						</tr>
						
					</table>
				</td>
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
