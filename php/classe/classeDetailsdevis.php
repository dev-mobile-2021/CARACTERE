<?php
	require_once('classeConnexion.php'); 
	// CLASSE DETAILSDEVIS 
	/** Attributs de la classe "Detailsdevis" **/
	class Detailsdevis {
		private $idDetailsdevis;
		private $idDevis;
		private $idRubrique;
		private $idTypeservice;
		private $idService;
		private $prixAchat;
		private $prixVente;
		private $quantite;
		private $dateAjout;
		private $etat;

		/** Constructeur ... **/
		public function __construct(){
			//récupération du nombre d'arguments
			$nb= func_num_args();
			// S'il n'y a pas de paramètre, on initialise les variables à une valeur nulle
			if ($nb == 0) {
				$this->idDetailsdevis= "";
				$this->idDevis= "";
				$this->idRubrique= "";
				$this->idTypeservice= "";
				$this->idService= "";
				$this->prixAchat= "";
				$this->prixVente= "";
				$this->quantite= "";
				$this->dateAjout= "";
				$this->etat= "";
			}
			/*Sinon s'il y a des paramètres on donne aux variables les valeurs des paramètres
	La fonction func_get_arg() recupère la valeur de l'argument à la position qui lui est donnée en paramètre*/
			if ($nb != 0) {
				$this->idDetailsdevis= func_get_arg(0);
				$this->idDevis= func_get_arg(1);
				$this->idRubrique= func_get_arg(2);
				$this->idTypeservice= func_get_arg(3);
				$this->idService= func_get_arg(4);
				$this->prixAchat= func_get_arg(5);
				$this->prixVente= func_get_arg(6);
				$this->quantite= func_get_arg(7);
				$this->dateAjout= func_get_arg(8);
				$this->etat= func_get_arg(9);
			}
		}
		/** Getter et Setter de l'attribut "idDetailsdevis" **/
		public function getIdDetailsdevis(){
			return $this->idDetailsdevis;
		}
		public function setIdDetailsdevis($idDetailsdevis){
			$this->idDetailsdevis = $idDetailsdevis;
		}
		/** Getter et Setter de l'attribut "idDevis" **/
		public function getIdDevis(){
			return $this->idDevis;
		}
		public function setIdDevis($idDevis){
			$this->idDevis = $idDevis;
		}
		/** Getter et Setter de l'attribut "idRubrique" **/
		public function getIdRubrique(){
			return $this->idRubrique;
		}
		public function setIdRubrique($idRubrique){
			$this->idRubrique = $idRubrique;
		}
		/** Getter et Setter de l'attribut "idTypeservice" **/
		public function getIdTypeservice(){
			return $this->idTypeservice;
		}
		public function setIdTypeservice($idTypeservice){
			$this->idTypeservice = $idTypeservice;
		}
		/** Getter et Setter de l'attribut "idService" **/
		public function getIdService(){
			return $this->idService;
		}
		public function setIdService($idService){
			$this->idService = $idService;
		}
		/** Getter et Setter de l'attribut "prixAchat" **/
		public function getPrixAchat(){
			return $this->prixAchat;
		}
		public function setPrixAchat($prixAchat){
			$this->prixAchat = $prixAchat;
		}
		/** Getter et Setter de l'attribut "prixVente" **/
		public function getPrixVente(){
			return $this->prixVente;
		}
		public function setPrixVente($prixVente){
			$this->prixVente = $prixVente;
		}
		/** Getter et Setter de l'attribut "quantite" **/
		public function getQuantite(){
			return $this->quantite;
		}
		public function setQuantite($quantite){
			$this->quantite = $quantite;
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
		//Recherche d'un élément de la table Detailsdevis**/
		public function rechercheDetailsdevis($id){
			$list = array();

			$requete = Connexion::Connect()->query("SELECT * FROM detailsdevis WHERE idDetailsdevis = \"$id\" ");

			//On récupère le résultat de la requete, on le parcours, on le met dans une variable qu'on retourne 
			foreach ($requete as $donnee){
				$list[] = $donnee;
			}
			return $list;
		}
		// Insertion des valeurs 
		/** Fonctions CRUD **/
		public function addDetailsdevis() {
			$list = $this->rechercheDetailsdevis($this->getIdDetailsdevis());
			$res = -1;
			/**Si aucun élément n'est trouvé**/
			if(count($list) == 0){ /**Preparation de la requete d'insertion**/
				$requete = Connexion::Connect()->prepare('INSERT INTO detailsdevis(idDetailsdevis, idDevis, idRubrique, idTypeservice, idService, prixAchat, prixVente, quantite, dateAjout, etat) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
				/**La fonction bindValue associe une valeur à un paramètre**
	**Execution de la requete
	**On retourne le resultat de la requete
	**/
				$requete->bindValue(1, $this->getIdDetailsdevis());
				$requete->bindValue(2, $this->getIdDevis());
				$requete->bindValue(3, $this->getIdRubrique());
				$requete->bindValue(4, $this->getIdTypeservice());
				$requete->bindValue(5, $this->getIdService());
				$requete->bindValue(6, $this->getPrixAchat());
				$requete->bindValue(7, $this->getPrixVente());
				$requete->bindValue(8, $this->getQuantite());
				$requete->bindValue(9, $this->getDateAjout());
				$requete->bindValue(10, $this->getEtat());
				$res = $requete->execute();
			}
			return($res);
		}
		// Modification des valeurs
		public function updateDetailsdevis() {
			$list = $this->rechercheDetailsdevis($this->getIdDetailsdevis());
			$res = -1;
			/**Si un élément est trouvé**/
			if(count($list) != 0){ /**Preparation de la requete de mise à jour**/
				$requete = Connexion::Connect()->prepare('UPDATE detailsdevis SET idDevis = ?, idRubrique = ?, idTypeservice = ?, idService = ?, prixAchat = ?, prixVente = ?, quantite = ?, dateAjout = ?, etat = ? WHERE idDetailsdevis = ? ');
				/**La fonction bindValue associe une valeur à un paramètre**
	**Execution de la requete
	**On retourne le resultat de la requete
	**/
				$requete->bindValue(1, $this->getIdDevis());
				$requete->bindValue(2, $this->getIdRubrique());
				$requete->bindValue(3, $this->getIdTypeservice());
				$requete->bindValue(4, $this->getIdService());
				$requete->bindValue(5, $this->getPrixAchat());
				$requete->bindValue(6, $this->getPrixVente());
				$requete->bindValue(7, $this->getQuantite());
				$requete->bindValue(8, $this->getDateAjout());
				$requete->bindValue(9, $this->getEtat());
				$requete->bindValue(10, $this->getIdDetailsdevis());
				$res = $requete->execute(); 
			}
			return($res);
		}
		// Suppression des valeurs
		public function deleteDetailsdevis($code) {
			$list = $this->rechercheDetailsdevis($code);
			$res = -1;
			/**Si un élément est trouvé**/
			if(count($list) != 0){ /**Preparation de la requete de suppression**/
				$requete = Connexion::Connect()->prepare('DELETE FROM detailsdevis WHERE idDetailsdevis = ?');
				/**La fonction bindValue associe une valeur à un paramètre**
	**Execution de la requete
	**On retourne le resultat de la requete
	**/
				$requete->bindValue(1, $code);
				$res = $requete->execute();
			}
			return($res);
		}
		// Liste des detailsdeviss 
		public function listDetailsdevis(){
			$list = array();

			$requete = Connexion::Connect()->query('SELECT * FROM detailsdevis');

			//On récupère le résultat de la requete, on le parcours, on le met dans une variable qu'on retourne 
			foreach ($requete as $donnee) {
				$list[] = $donnee;
			}
			return $list;
		}	
	}
?>