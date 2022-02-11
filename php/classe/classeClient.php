<?php
	require_once('classeConnexion.php'); 
	// CLASSE CLIENT 
	/** Attributs de la classe "Client" **/
	class Client {
		private $idClient;
		private $prenomClient;
		private $nomClient;
		private $adresseClient;
		private $paysClient;
		private $telephoneClient;
		private $emailClient;
		private $photoClient;
		private $dateAjout;
		private $etat;

		/** Constructeur ... **/
		public function __construct(){
			//récupération du nombre d'arguments
			$nb= func_num_args();
			// S'il n'y a pas de paramètre, on initialise les variables à une valeur nulle
			if ($nb == 0) {
				$this->idClient= "";
				$this->prenomClient= "";
				$this->nomClient= "";
				$this->adresseClient= "";
				$this->paysClient= "";
				$this->telephoneClient= "";
				$this->emailClient= "";
				$this->photoClient= "";
				$this->dateAjout= "";
				$this->etat= "";
			}
			/*Sinon s'il y a des paramètres on donne aux variables les valeurs des paramètres
	La fonction func_get_arg() recupère la valeur de l'argument à la position qui lui est donnée en paramètre*/
			if ($nb != 0) {
				$this->idClient= func_get_arg(0);
				$this->prenomClient= func_get_arg(1);
				$this->nomClient= func_get_arg(2);
				$this->adresseClient= func_get_arg(3);
				$this->paysClient= func_get_arg(4);
				$this->telephoneClient= func_get_arg(5);
				$this->emailClient= func_get_arg(6);
				$this->photoClient= func_get_arg(7);
				$this->dateAjout= func_get_arg(8);
				$this->etat= func_get_arg(9);
			}
		}
		/** Getter et Setter de l'attribut "idClient" **/
		public function getIdClient(){
			return $this->idClient;
		}
		public function setIdClient($idClient){
			$this->idClient = $idClient;
		}
		/** Getter et Setter de l'attribut "prenomClient" **/
		public function getPrenomClient(){
			return $this->prenomClient;
		}
		public function setPrenomClient($prenomClient){
			$this->prenomClient = $prenomClient;
		}
		/** Getter et Setter de l'attribut "nomClient" **/
		public function getNomClient(){
			return $this->nomClient;
		}
		public function setNomClient($nomClient){
			$this->nomClient = $nomClient;
		}
		/** Getter et Setter de l'attribut "adresseClient" **/
		public function getAdresseClient(){
			return $this->adresseClient;
		}
		public function setAdresseClient($adresseClient){
			$this->adresseClient = $adresseClient;
		}
		/** Getter et Setter de l'attribut "paysClient" **/
		public function getPaysClient(){
			return $this->paysClient;
		}
		public function setPaysClient($paysClient){
			$this->paysClient = $paysClient;
		}
		/** Getter et Setter de l'attribut "telephoneClient" **/
		public function getTelephoneClient(){
			return $this->telephoneClient;
		}
		public function setTelephoneClient($telephoneClient){
			$this->telephoneClient = $telephoneClient;
		}
		/** Getter et Setter de l'attribut "emailClient" **/
		public function getEmailClient(){
			return $this->emailClient;
		}
		public function setEmailClient($emailClient){
			$this->emailClient = $emailClient;
		}
		/** Getter et Setter de l'attribut "photoClient" **/
		public function getPhotoClient(){
			return $this->photoClient;
		}
		public function setPhotoClient($photoClient){
			$this->photoClient = $photoClient;
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
		//Recherche d'un élément de la table Client**/
		public function rechercheClient($id){
			$list = array();

			$requete = Connexion::Connect()->query("SELECT * FROM client WHERE idClient = \"$id\" ");

			//On récupère le résultat de la requete, on le parcours, on le met dans une variable qu'on retourne 
			foreach ($requete as $donnee){
				$list[] = $donnee;
			}
			return $list;
		}
		// Insertion des valeurs 
		/** Fonctions CRUD **/
		public function addClient() {
			$requete = Connexion::Connect()->prepare('INSERT INTO client(idClient, prenomClient, nomClient, adresseClient, paysClient, telephoneClient, emailClient, photoClient, dateAjout, etat) VALUES (?, ?, ?, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP, ?)');
			$requete->bindValue(1, $this->getIdClient());
			$requete->bindValue(2, $this->getPrenomClient());
			$requete->bindValue(3, $this->getNomClient());
			$requete->bindValue(4, $this->getAdresseClient());
			$requete->bindValue(5, $this->getPaysClient());
			$requete->bindValue(6, $this->getTelephoneClient());
			$requete->bindValue(7, $this->getEmailClient());
			$requete->bindValue(8, $this->getPhotoClient());
			$requete->bindValue(9, $this->getEtat());
			$res = $requete->execute();
			return($res);
		}
		// Modification des valeurs
		public function updateClient() {
			$requete = Connexion::Connect()->prepare('UPDATE client SET prenomClient = ?, nomClient = ?, adresseClient = ?, paysClient = ?, telephoneClient = ?, emailClient = ?, photoClient = ?, dateAjout = CURRENT_TIMESTAMP, etat = ? WHERE idClient = ? ');
			$requete->bindValue(1, $this->getPrenomClient());
			$requete->bindValue(2, $this->getNomClient());
			$requete->bindValue(3, $this->getAdresseClient());
			$requete->bindValue(4, $this->getPaysClient());
			$requete->bindValue(5, $this->getTelephoneClient());
			$requete->bindValue(6, $this->getEmailClient());
			$requete->bindValue(7, $this->getPhotoClient());
			$requete->bindValue(8, $this->getEtat());
			$requete->bindValue(9, $this->getIdClient());
			$res = $requete->execute(); 
		return($res);
		}
		// Suppression des valeurs
		public function deleteClient($code) {
			$requete = Connexion::Connect()->prepare('DELETE FROM client WHERE idClient = ?');
			$requete->bindValue(1, $code);
			$res = $requete->execute();
			return($res);
		}
		// Liste des clients 
		public function listClient(){
			$list = array();

			$requete = Connexion::Connect()->query('SELECT * FROM client');

			//On récupère le résultat de la requete, on le parcours, on le met dans une variable qu'on retourne 
			foreach ($requete as $donnee) {
				$list[] = $donnee;
			}
			return $list;
		}	


	
	}
?>