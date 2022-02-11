<?php
	require_once('classeConnexion.php'); 
	// CLASSE FACTURE 
	/** Attributs de la classe "Facture" **/
	class Facture {
		private $idFacture;
		private $numeroFacture;
		private $destinataire;
		private $dateFacture;
		private $accompte;
		private $idDevis;
		private $idResponsable;

		/** Constructeur ... **/
		public function __construct(){
			//récupération du nombre d'arguments
			$nb= func_num_args();
			// S'il n'y a pas de paramètre, on initialise les variables à une valeur nulle
			if ($nb == 0) {
				$this->idFacture= "";
				$this->numeroFacture= "";
				$this->destinataire= "";
				$this->dateFacture= "";
				$this->accompte= "";
				$this->idDevis= "";
				$this->idResponsable= "";
			}
			/*Sinon s'il y a des paramètres on donne aux variables les valeurs des paramètres
	La fonction func_get_arg() recupère la valeur de l'argument à la position qui lui est donnée en paramètre*/
			if ($nb != 0) {
				$this->idFacture= func_get_arg(0);
				$this->numeroFacture= func_get_arg(1);
				$this->destinataire= func_get_arg(2);
				$this->dateFacture= func_get_arg(3);
				$this->accompte= func_get_arg(4);
				$this->idDevis= func_get_arg(5);
				$this->idResponsable= func_get_arg(6);
			}
		}
		/** Getter et Setter de l'attribut "idFacture" **/
		public function getIdFacture(){
			return $this->idFacture;
		}
		public function setIdFacture($idFacture){
			$this->idFacture = $idFacture;
		}
		/** Getter et Setter de l'attribut "numeroFacture" **/
		public function getNumeroFacture(){
			return $this->numeroFacture;
		}
		public function setNumeroFacture($numeroFacture){
			$this->numeroFacture = $numeroFacture;
		}
		/** Getter et Setter de l'attribut "destinataire" **/
		public function getDestinataire(){
			return $this->destinataire;
		}
		public function setDestinataire($destinataire){
			$this->destinataire = $destinataire;
		}
		/** Getter et Setter de l'attribut "dateFacture" **/
		public function getDateFacture(){
			return $this->dateFacture;
		}
		public function setDateFacture($dateFacture){
			$this->dateFacture = $dateFacture;
		}
		/** Getter et Setter de l'attribut "accompte" **/
		public function getAccompte(){
			return $this->accompte;
		}
		public function setAccompte($accompte){
			$this->accompte = $accompte;
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
		//Recherche d'un élément de la table Facture**/
		public function rechercheFacture($id){
			$list = array();

			$requete = Connexion::Connect()->query("SELECT * FROM facture WHERE idFacture = \"$id\" ");

			//On récupère le résultat de la requete, on le parcours, on le met dans une variable qu'on retourne 
			foreach ($requete as $donnee){
				$list[] = $donnee;
			}
			return $list;
		}
		// Insertion des valeurs 
		/** Fonctions CRUD **/
		public function addFacture() {
			$requete = Connexion::Connect()->prepare('INSERT INTO facture(idFacture, numeroFacture, destinataire, dateFacture, accompte, idDevis, idResponsable) VALUES (?, ?, ?, ?, ?, ?, ?)');
			$requete->bindValue(1, $this->getIdFacture());
			$requete->bindValue(2, $this->getNumeroFacture());
			$requete->bindValue(3, $this->getDestinataire());
			$requete->bindValue(4, $this->getDateFacture());
			$requete->bindValue(5, $this->getAccompte());
			$requete->bindValue(6, $this->getIdDevis());
			$requete->bindValue(7, $this->getIdResponsable());
			$res = $requete->execute();
			return($res);
		}
		// Modification des valeurs
		public function updateFacture() {
			$requete = Connexion::Connect()->prepare('UPDATE facture SET numeroFacture = ?, destinataire = ?, dateFacture = ?, accompte = ?, idDevis = ?, idResponsable = ? WHERE idFacture = ? ');
			$requete->bindValue(1, $this->getNumeroFacture());
			$requete->bindValue(2, $this->getDestinataire());
			$requete->bindValue(3, $this->getDateFacture());
			$requete->bindValue(4, $this->getAccompte());
			$requete->bindValue(5, $this->getIdDevis());
			$requete->bindValue(6, $this->getIdResponsable());
			$requete->bindValue(7, $this->getIdFacture());
			$res = $requete->execute(); 
			return($res);
		}
		// Suppression des valeurs
		public function deleteFacture($code) {
			$requete = Connexion::Connect()->prepare('DELETE FROM facture WHERE idFacture = ?');
			$requete->bindValue(1, $code);
			$res = $requete->execute();
			return($res);
		}
		// Liste des factures 
		public function listFacture(){
			$list = array();

			$requete = Connexion::Connect()->query('SELECT * FROM facture');

			//On récupère le résultat de la requete, on le parcours, on le met dans une variable qu'on retourne 
			foreach ($requete as $donnee) {
				$list[] = $donnee;
			}
			return $list;
		}

		public function listFacture2(){
			$list = array();
			$requete = Connexion::Connect()->query("SELECT * FROM vdevis2 WHERE idDevis IN (SELECT idDevis FROM facture)");

			//On récupère le résultat de la requete, on le parcours, on le met dans une variable qu'on retourne 
			foreach ($requete as $donnee) {
				$list[] = $donnee;
			}
			return $list;
		}

		public function listFacture3(){
			$list = array();
			$requete = Connexion::Connect()->query("SELECT * FROM vfacture");

			//On récupère le résultat de la requete, on le parcours, on le met dans une variable qu'on retourne 
			foreach ($requete as $donnee) {
				$list[] = $donnee;
			}
			return $list;
		}	
	}
?>