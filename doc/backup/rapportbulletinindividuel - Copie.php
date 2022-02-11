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
		

	?>
	<!-- On cree le contenu de la page-->
	<!-- 
		*backtop: marge du haut
		*backleft: marge de gauche
		*backright: marge de droite
		*backbottom: marge du bas
		*footer="page": genere les numero de pages
	 -->

	<?php  ?>
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
							<td>MINISTERE DE L'ECONIMIE,<br>DES FINANCES ET DU PLAN</td>
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
							<td>DIRECTION <br>DES SERVICES FISCAUX</td>
						</tr>
						<tr>
							<td style="padding-left: 35px; padding-top: -5px; padding-bottom: 5px; ">
								<div style="width: 60%; height: 1px; margin: 0px auto; border-bottom: 1px solid #000;">&nbsp;</div>
							</td>
						</tr>
					</table>
				</td>
				<td style="width: 50%; text-align: center; padding-top: 10px;">
					<span style='font-size: 20px; text-align: center; vertical-align:middle; margin-top: 30px;'>BULLETIN INDIVIDUEL</span><br>
					<span style="margin-top: 70px;">
						Inscrire les renseignements ci-dessus<br>
						en lettre majuscules d'imprimerie
					</span><br>
				</td>
				<td style="width: 30%; padding-top: 20px;">
					<table style="border: 1px solid #000; border-bottom: 0px;">
						<tr style="">
							<td style="padding-top: -10px; text-align: center; padding-left: 20px; padding-right: 20px;"><span style="background-color: #fff;">RESERVE AU SERVICE</span></td>
						</tr>
						
					</table>

					<table>
						<tr>
							<td>CENTRE </td>
							<td><strong>A B</strong></td>
						</tr>
						<tr>
							<td>INSPECTION </td>
							<td><strong>A B</strong></td>
						</tr>
						<tr>
							<td>PERCEPTION </td>
							<td><strong>A B</strong></td>
						</tr>
						<tr>
							<td>Num&eacute;ro de compte </td>
						</tr>
						<tr>
							<td><strong>596418</strong> LC <strong>5</strong></td>
						</tr>
					</table>

					<table style="border: 1px solid #000; border-top: 0px;">
						<tr style="">
							<td style="padding-bottom: -10px; text-align: center; padding-left: 20px; padding-right: 20px;"><span style="background-color: #fff; color: #fff">RESERVE AU SERVICE</span></td>
						</tr>
					</table>
				</td>
			</tr>
		</table>

		<table>
			<tr>
				<td>
					<span style='font-size: 12px;'><strong>RENSEIGNEMENTS</strong> concernant les sommes vers&eacute;es ou avantages attribu&eacute;s pendant l'ann&eacute;e <strong>2019</strong> <?php ?></span>
				</td>
			</tr>
		</table>
		<table>
			<tr>
				<td style="border: 1px solid #000; border-top: 0px; width: 60%; text-align: center;"><strong>Moustapha Abass</strong></td>
				<td style="width: 40%;">Case r&eacute;serv&eacute;e au service &nbsp;&nbsp;&nbsp;</td>
			</tr>
			<tr>
				<td style="width: 50%; text-align: center;">Nom</td>
				<td></td>
			</tr>
		</table>

		<table>
			<tr>
				<td style="border: 1px solid #000; border-top: 0px; width: 60%; text-align: center;"><strong>Prestataire</strong></td>
				<td style="width: 5%; text-align: center;"><strong>&nbsp;</strong></td>
				<td style="border: 1px solid #000; border-top: 0px; width: 35%; text-align: center;"><strong>4464545</strong></td>
			</tr>
			<tr>
				<td style="width: 60%; text-align: center;">Profession ou nature de l'emploi r&eacute;tribu&eacute;</td>
				<td style="width: 5%; text-align: center;">&nbsp;</td>
				<td style="width: 30%; text-align: center;">Matricule</td>
			</tr>
		</table>
		<table>
			<tr>
				<td style="border: 1px solid #000; border-top: 0px; width: 60%; text-align: center;"><strong>Sicap amitie 2</strong></td>
				<td style="width: 5%; text-align: center;"><strong>&nbsp;</strong></td>
				<td style="border: 1px solid #000; border-top: 0px; width: 17.5%; text-align: center;"><strong>2545</strong></td>
				<td style="border: 1px solid #000; border-top: 0px; width: 17.5%; text-align: center;"><strong>H4566</strong></td>
			</tr>
			<tr>
				<td style="width: 60%; text-align: center;">Adresse</td>
				<td style="width: 5%; text-align: center;">&nbsp;</td>
				<td style="width: 17.5%; text-align: center;">BP Employeur</td>
				<td style="width: 17.5%; text-align: center;">NINEA</td>
			</tr>
		</table>
		<br>
		<br>
		<table style="border-top: 3px solid #000; border-bottom: 3px solid #000;" cellspacing='0' cellpadding='0'>
			<tr style="">
				<th style="width:85%; padding-top: 8px; padding-bottom: 8px; padding-left: 5px; text-align: center; border-right: 2px solid #000; border-bottom: 2px solid #000;">BULLETIN INDIVIDUEL</th>
				<th style="width:15%; padding-top: 8px; padding-bottom: 8px; padding-left: 5px; text-align: center; border-bottom: 2px solid #000;"></th>
			</tr>

			<tr style="">
				<td style="width:85%; border-right: 2px solid #000; ">
					Traitements, salaires et autres r&eacute;tribution .........................................................................................................
				</td>
				<td style="width:15%;">............... 1</td>
			</tr>
			<tr style="">
				<td style="width:85%; border-right: 2px solid #000; ">
					Gratifications ......................................................................................................................................................
				</td>
				<td style="width:15%;">............... 2</td>
			</tr>
			<tr style="">
				<td style="width:85%; border-right: 2px solid #000; ">
					Indemnit&eacute;s d'expatriement .................................................................................................................................
				</td>
				<td style="width:15%;">............... 3</td>
			</tr>
			<tr style="">
				<td style="width:85%; border-right: 2px solid #000; ">
					Pensions ou rentes viagi&egrave;res .............................................................................................................................
				</td>
				<td style="width:15%;">............... 4</td>
			</tr>
			<tr style="">
				<td style="width:85%; border-right: 2px solid #000; ">
					Avantages en nature ..........................................................................................................................................
				</td>
				<td style="width:15%;">............... 5</td>
			</tr>
			<tr style="">
				<td style="width:85%; border-right: 2px solid #000; text-align: right;">
					TOTAL A (lignes 1+2+34+5) ......
				</td>
				<td style="width:15%;">............... 6</td>
			</tr>
			<tr style="">
				<td style="width:85%; border-right: 2px solid #000;">
					A d&eacute;duire
				</td>
				<td style="width:15%;"></td>
			</tr>
			<tr style="">
				<td style="width:85%; border-right: 2px solid #000; text-align: right;">
					Abbatement forfaitaire .............................................................................................................
				</td>
				<td style="width:15%;">............... 7</td>
			</tr>
			<tr style="">
				<td style="width:85%; border-right: 2px solid #000; text-align: right;">
					TOTAL B (ligne 6 -ligne 7) .........
				</td>
				<td style="width:15%;">............... 8</td>
			</tr>
			<tr style="">
				<td style="width:85%; border-right: 2px solid #000; text-align: right;">
					Retenue pour retraite de 10% du Total A ................................................................................
				</td>
				<td style="width:15%;">............... 9</td>
			</tr>
			<tr style="">
				<td style="width:85%; border-right: 2px solid #000; text-align: right;">
					TOTAL C (ligne 8 - ligne 9) ........
				</td>
				<td style="width:15%;">............... 10</td>
			</tr>
			<tr style="">
				<td style="width:85%; border-right: 2px solid #000; text-align: right;">
					Pr&eacute;l&egrave;vement de solidarit&eacute; nationale retenue ...........................................................................
				</td>
				<td style="width:15%;">............... 11</td>
			</tr>
			<tr style="">
				<td style="width:85%; border-right: 2px solid #000; text-align: right;">
					TOTAL D (ligne 10 - ligne 11) ....
				</td>
				<td style="width:15%;">............... 12</td>
			</tr>

			<tr style="">
				<td style="width:85%; border-right: 2px solid #000; text-align: center; padding-top: 10px; padding-bottom: 10px;">
					<span style="font-size: 20px;">SOMME A DECLARER A L'IRPP (ligne 12)</span><br>
					<span>(Dans le cas d'option de droit commun)</span>
				</td>
			</tr>

			<tr style="">
				<td style="width:85%; border-right: 2px solid #000; ">
					Trenti&egrave;me et autres r&eacute;mun&eacute;rations des administrateurs de soci&eacute;t&eacute; ..................................................................
				</td>
				<td style="width:15%;"> ...................... </td>
			</tr>

			<tr style="">
				<td style="width:85%; border-right: 2px solid #000; ">
					Commissions, coutages, ect vers&eacute;es &agrave; des contribuables n'ayant pas la qualit&eacute; de salari&eacute; .............................
				</td>
				<td style="width:15%;">
					<table>
						<tr>
							<td style="width:20%;">....</td>
							<td style="width:80%; border: 1px solid #000; padding: 5px; text-align: center;">121 212</td>
						</tr>
					</table>
				</td>
			</tr>

			<tr style="">
				<td style="width:85%; border-right: 2px solid #000; ">
					Honoraires, vacations et autres r&eacute;m. vers&eacute;es &agrave; des contribuables exer&ccedil;ant des professions non com. ..........
				</td>
				<td style="width:15%;">............... 1</td>
			</tr>

			<tr style="">
				<td style="width:85%; border-right: 2px solid #000; ">
					Montant des retenues effectu&eacute;es par l'employeur .............................................................................................
				</td>
				<td style="width:15%;">
					<table>
						<tr>
							<td style="width:20%;">....</td>
							<td style="width:80%; border: 1px solid #000; padding: 5px; text-align: center;">121 212</td>
						</tr>
					</table>
				</td>
			</tr>

			<tr style="">
				<td style="width:85%; border-right: 2px solid #000; ">
					P&eacute;riode pendant laquelle le logement est occup&eacute; .............................................................................................
				</td>
				<td style="width:15%;"> ...................... </td>
			</tr>

			<tr>
				<td style="width:85%; border-right: 2px solid #000; ">
					P&eacute;riode &agrave; laquelle s'appliquent les paiements, lorsqu'elle est inf&eacute;rieure &agrave; une ann&eacute;e ......................................
				</td>
				<td style="width:15%;"> ...................... </td>
			</tr>
		</table>

		<table style="padding-bottom: 15px;">
			<tr>
				<td style="width: 50%;">Renseignements fournis par : <strong>Pharmacie GUIGON</strong></td>
				<td style="width: 50%;">Profession : <strong>Commerce</strong></td>
			</tr>
		</table>
		<table style="padding-bottom: 15px;">
			<tr>
				<td>Adresse : <strong>101 avenue Lamine Gueye</strong></td>
			</tr>
		</table>
		<table style="padding-bottom: 15px;">
			<tr>
				<td style="width: 20%;">Mentions obligatoires :</td>
				<td style="width: 40%;">a)NINEA : <strong>0005468484</strong></td>
				<td style="width: 40%;">b)N° de ligne sur l'&eacute;tat r&eacute;capitulatif : <strong></strong></td>
			</tr>
		</table>

		
	</page>
<?php  ?>

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
