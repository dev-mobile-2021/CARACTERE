<?php
	require_once('classeConnexion.php'); 
	// CLASSE BON 
	/** Attributs de la classe "Bon" **/
	class Bon {
		private $idBon;
		private $numeroProforma;
		private $numeroBon;
		private $dateBon;
		private $objet;
		private $contact;
		private $notabene;
		private $delaisLivraison;
		private $conditionPaiement;
		private $pourcentagetaxe;
		private $idTypetaxe;
		private $idClient;
		private $idDevis;
		private $idResponsable;
		private $idEtat;
		private $idValideur;
		private $dateAjout;
		private $etat;

		/** Constructeur ... **/
		public function __construct(){
			//récupération du nombre d'arguments
			$nb= func_num_args();
			// S'il n'y a pas de paramètre, on initialise les variables à une valeur nulle
			if ($nb == 0) {
				$this->idBon= "";
				$this->numeroProforma= "";
				$this->numeroBon= "";
				$this->dateBon= "";
				$this->objet= "";
				$this->contact= "";
				$this->notabene= "";
				$this->delaisLivraison= "";
				$this->conditionPaiement= "";
				$this->pourcentagetaxe= "";
				$this->idTypetaxe= "";
				$this->idClient= "";
				$this->idDevis= "";
				$this->idResponsable= "";
				$this->idEtat= "";
				$this->idValideur= "";
				$this->dateAjout= "";
				$this->etat= "";
			}
			/*Sinon s'il y a des paramètres on donne aux variables les valeurs des paramètres
	La fonction func_get_arg() recupère la valeur de l'argument à la position qui lui est donnée en paramètre*/
			if ($nb != 0) {
				$this->idBon= func_get_arg(0);
				$this->numeroProforma= func_get_arg(1);
				$this->numeroBon= func_get_arg(2);
				$this->dateBon= func_get_arg(3);
				$this->objet= func_get_arg(4);
				$this->contact= func_get_arg(5);
				$this->notabene= func_get_arg(6);
				$this->delaisLivraison= func_get_arg(7);
				$this->conditionPaiement= func_get_arg(8);
				$this->pourcentagetaxe= func_get_arg(9);
				$this->idTypetaxe= func_get_arg(10);
				$this->idClient= func_get_arg(11);
				$this->idDevis= func_get_arg(12);
				$this->idResponsable= func_get_arg(13);
				$this->idEtat= func_get_arg(14);
				$this->idValideur= func_get_arg(15);
				$this->dateAjout= func_get_arg(16);
				$this->etat= func_get_arg(17);
			}
		}
		/** Getter et Setter de l'attribut "idBon" **/
		public function getIdBon(){
			return $this->idBon;
		}
		public function setIdBon($idBon){
			$this->idBon = $idBon;
		}
		/** Getter et Setter de l'attribut "numeroProforma" **/
		public function getNumeroProforma(){
			return $this->numeroProforma;
		}
		public function setNumeroProforma($numeroProforma){
			$this->numeroProforma = $numeroProforma;
		}
		/** Getter et Setter de l'attribut "numeroBon" **/
		public function getNumeroBon(){
			return $this->numeroBon;
		}
		public function setNumeroBon($numeroBon){
			$this->numeroBon = $numeroBon;
		}
		/** Getter et Setter de l'attribut "dateBon" **/
		public function getDateBon(){
			return $this->dateBon;
		}
		public function setDateBon($dateBon){
			$this->dateBon = $dateBon;
		}
		/** Getter et Setter de l'attribut "objet" **/
		public function getObjet(){
			return $this->objet;
		}
		public function setObjet($objet){
			$this->objet = $objet;
		}
		/** Getter et Setter de l'attribut "contact" **/
		public function getContact(){
			return $this->contact;
		}
		public function setContact($contact){
			$this->contact = $contact;
		}
		/** Getter et Setter de l'attribut "notabene" **/
		public function getNotabene(){
			return $this->notabene;
		}
		public function setNotabene($notabene){
			$this->notabene = $notabene;
		}
		/** Getter et Setter de l'attribut "delaisLivraison" **/
		public function getDelaisLivraison(){
			return $this->delaisLivraison;
		}
		public function setDelaisLivraison($delaisLivraison){
			$this->delaisLivraison = $delaisLivraison;
		}
		/** Getter et Setter de l'attribut "conditionPaiement" **/
		public function getConditionPaiement(){
			return $this->conditionPaiement;
		}
		public function setConditionPaiement($conditionPaiement){
			$this->conditionPaiement = $conditionPaiement;
		}
		/** Getter et Setter de l'attribut "pourcentagetaxe" **/
		public function getPourcentagetaxe(){
			return $this->pourcentagetaxe;
		}
		public function setPourcentagetaxe($pourcentagetaxe){
			$this->pourcentagetaxe = $pourcentagetaxe;
		}
		/** Getter et Setter de l'attribut "idTypetaxe" **/
		public function getIdTypetaxe(){
			return $this->idTypetaxe;
		}
		public function setIdTypetaxe($idTypetaxe){
			$this->idTypetaxe = $idTypetaxe;
		}
		/** Getter et Setter de l'attribut "idClient" **/
		public function getIdClient(){
			return $this->idClient;
		}
		public function setIdClient($idClient){
			$this->idClient = $idClient;
		}
		/** Getter et Setter de l'attribut "idDevis" **/
		public function getIdDevis(){
			return $this->idDevis;
		}
		public function setIdDevis($idDevis){
			$this->idDevis = $idDevis;
		}
		/** Getter et Setter de l'attribut "idResponsable" **/
		public function getIdResponsable(){
			return $this->idResponsable;
		}
		public function setIdResponsable($idResponsable){
			$this->idResponsable = $idResponsable;
		}
		/** Getter et Setter de l'attribut "idEtat" **/
		public function getIdEtat(){
			return $this->idEtat;
		}
		public function setIdEtat($idEtat){
			$this->idEtat = $idEtat;
		}
		/** Getter et Setter de l'attribut "idValideur" **/
		public function getIdValideur(){
			return $this->idValideur;
		}
		public function setIdValideur($idValideur){
			$this->idValideur = $idValideur;
		}
		/** Getter et Setter de l'attribut "dateAjout" **/
		public function getDateAjout(){
			return $this->dateAjout;
		}
		public function setDateAjout($dateAjout){
			$this->dateAjout = $dateAjout;
		}
		/** Getter et Setter de l'attribut "etat" **/
		public function getEtat(){
			return $this->etat;
		}
		public function setEtat($etat){
			$this->etat = $etat;
		}
		//Recherche d'un élément de la table Bon**/
		public function rechercheBon($id){
			$list = array();

			$requete = Connexion::Connect()->query("SELECT * FROM bon WHERE idBon = \"$id\" ");

			//On récupère le résultat de la requete, on le parcours, on le met dans une variable qu'on retourne 
			foreach ($requete as $donnee){
				$list[] = $donnee;
			}
			return $list;
		}
		// Insertion des valeurs 
		/** Fonctions CRUD **/
		public function addBon() {
			$db = Connexion::Connect();
				$requete = $db->prepare('INSERT INTO bon(idBon, numeroProforma, numeroBon, dateBon, objet, contact, notabene, delaisLivraison, conditionPaiement, pourcentagetaxe, idTypetaxe, idClient, idDevis, idResponsable, idEtat, idValideur, dateAjout, etat) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP, 1)');
				$requete->bindValue(1, $this->getIdBon());
				$requete->bindValue(2, $this->getNumeroProforma());
				$requete->bindValue(3, $this->getNumeroBon());
				$requete->bindValue(4, $this->getDateBon());
				$requete->bindValue(5, $this->getObjet());
				$requete->bindValue(6, $this->getContact());
				$requete->bindValue(7, $this->getNotabene());
				$requete->bindValue(8, $this->getDelaisLivraison());
				$requete->bindValue(9, $this->getConditionPaiement());
				$requete->bindValue(10, $this->getPourcentagetaxe());
				$requete->bindValue(11, $this->getIdTypetaxe());
				$requete->bindValue(12, $this->getIdClient());
				$requete->bindValue(13, $this->getIdDevis());
				$requete->bindValue(14, $this->getIdResponsable());
				$requete->bindValue(15, $this->getIdEtat());
				$requete->bindValue(16, $this->getIdValideur());
				$res = $requete->execute();
				$idBon = $db->lastInsertId();
				return($idBon);
		}

		public function ajouterProduit($idBon, $designation, $prixUnitaire, $quantite) {
			$db = Connexion::Connect();
			$requete = $db->prepare('INSERT INTO detailsbc(idDetailsbc, idBon, designation, prixUnitaire, quantite, dateAjout, etat) VALUES (?, ?, ?, ?, ?, CURRENT_TIMESTAMP, 1)');
			$requete->bindValue(1, NULL);
			$requete->bindValue(2, $idBon);
			$requete->bindValue(3, $designation);
			$requete->bindValue(4, $prixUnitaire);
			$requete->bindValue(5, $quantite);
			$res = $requete->execute();
			$idAjout = $db->lastInsertId();
			// return($res);

			$chaine = 
			'<tr id="element'.$idAjout.'">
              <td>'.$designation.'</td>
              <td>'.$prixUnitaire.'</td>
              <td>'.$quantite.'</td>
              <td class="valeurMontantAddition" data-value="'.(intval($prixUnitaire)*intval($quantite)).'">'.(intval($prixUnitaire)*intval($quantite)).'</td>
              <td><a href="javascript:void(0);" onclick="deleteProduit('.$idAjout.')" class="btn item-delete"><span class="fa fa-trash" style="color:red;"></span></a></td>
          	</tr>';

				return $res."@$".$chaine;
				  
		}
		// Modification des valeurs
		public function updateBon() {
			$db = Connexion::Connect();
			$requete = $db->prepare('UPDATE bon SET numeroProforma = ?, objet = ?, contact = ?, notabene = ?, delaisLivraison = ?, conditionPaiement = ?, pourcentagetaxe = ?, idTypetaxe = ?, idClient = ?, idDevis = ?, idResponsable = ?, idEtat = ?, idValideur = ?  WHERE idBon = ? ');
			$requete->bindValue(1, $this->getNumeroProforma());
			$requete->bindValue(2, $this->getObjet());
			$requete->bindValue(3, $this->getContact());
			$requete->bindValue(4, $this->getNotabene());
			$requete->bindValue(5, $this->getDelaisLivraison());
			$requete->bindValue(6, $this->getConditionPaiement());
			$requete->bindValue(7, $this->getPourcentagetaxe());
			$requete->bindValue(8, $this->getIdTypetaxe());
			$requete->bindValue(9, $this->getIdClient());
			$requete->bindValue(10, $this->getIdDevis());
			$requete->bindValue(11, $this->getIdResponsable());
			$requete->bindValue(12, $this->getIdEtat());
			$requete->bindValue(13, $this->getIdValideur());
			$requete->bindValue(14, $this->getIdBon());
			$res = $requete->execute(); 
			if($res == 1)
				return($this->getIdBon());
			else return $res;
		}
		// Suppression des valeurs
		

		public function deleteBon($code) {
			$requete = Connexion::Connect()->prepare('DELETE FROM bon WHERE idBon = ?');
			$requete->bindValue(1, $code);
			$res = $requete->execute();
			return($res);
		}

		public function deleteProduit($code) {
			$requete = Connexion::Connect()->prepare('DELETE FROM detailsbc WHERE idDetailsbc = ?');
			$requete->bindValue(1, $code);
			$res = $requete->execute();
			return($res);
		}

		public function validerBon($idBon, $idUser) {
			$requete = Connexion::Connect()->prepare('UPDATE bon SET idEtat = ?, idValideur = ? WHERE idBon = ? ');

			$requete->bindValue(1, 4);
			$requete->bindValue(2, $idUser);
			$requete->bindValue(3, $idBon);
			$res = $requete->execute(); 
			return($res);
		}
		// Liste des bons 
		public function listBon(){
			$list = array();

			$requete = Connexion::Connect()->query('SELECT * FROM bon');

			//On récupère le résultat de la requete, on le parcours, on le met dans une variable qu'on retourne 
			foreach ($requete as $donnee) {
				$list[] = $donnee;
			}
			return $list;
		}

		// listBonValides
		public function listBon2($idUser){
			$list = array();

			$requete = Connexion::Connect()->query("SELECT * FROM vbon WHERE idBon IN (SELECT idBon FROM detailsbc) AND idResponsable = \"$idUser\" AND idEtat = 3 ");

			//On récupère le résultat de la requete, on le parcours, on le met dans une variable qu'on retourne 
			foreach ($requete as $donnee) {
				$list[] = $donnee;
			}
			return $list;
		}

		public function listBonValides($idUser){
			$list = array();

			$requete = Connexion::Connect()->query("SELECT * FROM vbon WHERE idBon IN (SELECT idBon FROM detailsbc) AND idResponsable = \"$idUser\" AND idEtat = 4");

			//On récupère le résultat de la requete, on le parcours, on le met dans une variable qu'on retourne 
			foreach ($requete as $donnee) {
				$list[] = $donnee;
			}
			return $list;
		}
	}
?>