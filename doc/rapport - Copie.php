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
