<?php
	require_once('classeConnexion.php'); 
	// CLASSE DETAILSBC 
	/** Attributs de la classe "Detailsbc" **/
	class Detailsbc {
		private $idDetailsbc;
		private $idBon;
		private $designation;
		private $prixUnitaire;
		private $quantite;
		private $dateAjout;
		private $etat;

		/** Constructeur ... **/
		public function __construct(){
			//récupération du nombre d'arguments
			$nb= func_num_args();
			// S'il n'y a pas de paramètre, on initialise les variables à une valeur nulle
			if ($nb == 0) {
				$this->idDetailsbc= "";
				$this->idBon= "";
				$this->designation= "";
				$this->prixUnitaire= "";
				$this->quantite= "";
				$this->dateAjout= "";
				$this->etat= "";
			}
			/*Sinon s'il y a des paramètres on donne aux variables les valeurs des paramètres
	La fonction func_get_arg() recupère la valeur de l'argument à la position qui lui est donnée en paramètre*/
			if ($nb != 0) {
				$this->idDetailsbc= func_get_arg(0);
				$this->idBon= func_get_arg(1);
				$this->designation= func_get_arg(2);
				$this->prixUnitaire= func_get_arg(3);
				$this->quantite= func_get_arg(4);
				$this->dateAjout= func_get_arg(5);
				$this->etat= func_get_arg(6);
			}
		}
		/** Getter et Setter de l'attribut "idDetailsbc" **/
		public function getIdDetailsbc(){
			return $this->idDetailsbc;
		}
		public function setIdDetailsbc($idDetailsbc){
			$this->idDetailsbc = $idDetailsbc;
		}
		/** Getter et Setter de l'attribut "idBon" **/
		public function getIdBon(){
			return $this->idBon;
		}
		public function setIdBon($idBon){
			$this->idBon = $idBon;
		}
		/** Getter et Setter de l'attribut "designation" **/
		public function getDesignation(){
			return $this->designation;
		}
		public function setDesignation($designation){
			$this->designation = $designation;
		}
		/** Getter et Setter de l'attribut "prixUnitaire" **/
		public function getPrixUnitaire(){
			return $this->prixUnitaire;
		}
		public function setPrixUnitaire($prixUnitaire){
			$this->prixUnitaire = $prixUnitaire;
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
		//Recherche d'un élément de la table Detailsbc**/
		public function rechercheDetailsbc($id){
			$list = array();

			$requete = Connexion::Connect()->query("SELECT * FROM detailsbc WHERE idDetailsbc = \"$id\" ");

			//On récupère le résultat de la requete, on le parcours, on le met dans une variable qu'on retourne 
			foreach ($requete as $donnee){
				$list[] = $donnee;
			}
			return $list;
		}
		// Insertion des valeurs 
		/** Fonctions CRUD **/
		public function addDetailsbc() {
			$list = $this->rechercheDetailsbc($this->getIdDetailsbc());
			$res = -1;
			/**Si aucun élément n'est trouvé**/
			if(count($list) == 0){ /**Preparation de la requete d'insertion**/
				$requete = Connexion::Connect()->prepare('INSERT INTO detailsbc(idDetailsbc, idBon, designation, prixUnitaire, quantite, dateAjout, etat) VALUES (?, ?, ?, ?, ?, ?, ?)');
				/**La fonction bindValue associe une valeur à un paramètre**
	**Execution de la requete
	**On retourne le resultat de la requete
	**/
				$requete->bindValue(1, $this->getIdDetailsbc());
				$requete->bindValue(2, $this->getIdBon());
				$requete->bindValue(3, $this->getDesignation());
				$requete->bindValue(4, $this->getPrixUnitaire());
				$requete->bindValue(5, $this->getQuantite());
				$requete->bindValue(6, $this->getDateAjout());
				$requete->bindValue(7, $this->getEtat());
				$res = $requete->execute();
			}
			return($res);
		}
		// Modification des valeurs
		public function updateDetailsbc() {
			$list = $this->rechercheDetailsbc($this->getIdDetailsbc());
			$res = -1;
			/**Si un élément est trouvé**/
			if(count($list) != 0){ /**Preparation de la requete de mise à jour**/
				$requete = Connexion::Connect()->prepare('UPDATE detailsbc SET idBon = ?, designation = ?, prixUnitaire = ?, quantite = ?, dateAjout = ?, etat = ? WHERE idDetailsbc = ? ');
				/**La fonction bindValue associe une valeur à un paramètre**
	**Execution de la requete
	**On retourne le resultat de la requete
	**/
				$requete->bindValue(1, $this->getIdBon());
				$requete->bindValue(2, $this->getDesignation());
				$requete->bindValue(3, $this->getPrixUnitaire());
				$requete->bindValue(4, $this->getQuantite());
				$requete->bindValue(5, $this->getDateAjout());
				$requete->bindValue(6, $this->getEtat());
				$requete->bindValue(7, $this->getIdDetailsbc());
				$res = $requete->execute(); 
			}
			return($res);
		}
		// Suppression des valeurs
		public function deleteDetailsbc($code) {
			$list = $this->rechercheDetailsbc($code);
			$res = -1;
			/**Si un élément est trouvé**/
			if(count($list) != 0){ /**Preparation de la requete de suppression**/
				$requete = Connexion::Connect()->prepare('DELETE FROM detailsbc WHERE idDetailsbc = ?');
				/**La fonction bindValue associe une valeur à un paramètre**
	**Execution de la requete
	**On retourne le resultat de la requete
	**/
				$requete->bindValue(1, $code);
				$res = $requete->execute();
			}
			return($res);
		}
		// Liste des detailsbcs 
		public function listDetailsbc(){
			$list = array();

			$requete = Connexion::Connect()->query('SELECT * FROM detailsbc');

			//On récupère le résultat de la requete, on le parcours, on le met dans une variable qu'on retourne 
			foreach ($requete as $donnee) {
				$list[] = $donnee;
			}
			return $list;
		}	
	}
?>