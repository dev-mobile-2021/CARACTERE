<?php
	require_once('classeConnexion.php'); 
	// CLASSE TYPETAXE 
	/** Attributs de la classe "Typetaxe" **/
	class Typetaxe {
		private $idTypetaxe;
		private $libelle;
		private $valeur;
		private $dateAjout;
		private $etat;

		/** Constructeur ... **/
		public function __construct(){
			//récupération du nombre d'arguments
			$nb= func_num_args();
			// S'il n'y a pas de paramètre, on initialise les variables à une valeur nulle
			if ($nb == 0) {
				$this->idTypetaxe= "";
				$this->libelle= "";
				$this->valeur= "";
				$this->dateAjout= "";
				$this->etat= "";
			}
			/*Sinon s'il y a des paramètres on donne aux variables les valeurs des paramètres
	La fonction func_get_arg() recupère la valeur de l'argument à la position qui lui est donnée en paramètre*/
			if ($nb != 0) {
				$this->idTypetaxe= func_get_arg(0);
				$this->libelle= func_get_arg(1);
				$this->valeur= func_get_arg(2);
				$this->dateAjout= func_get_arg(3);
				$this->etat= func_get_arg(4);
			}
		}
		/** Getter et Setter de l'attribut "idTypetaxe" **/
		public function getIdTypetaxe(){
			return $this->idTypetaxe;
		}
		public function setIdTypetaxe($idTypetaxe){
			$this->idTypetaxe = $idTypetaxe;
		}
		/** Getter et Setter de l'attribut "libelle" **/
		public function getLibelle(){
			return $this->libelle;
		}
		public function setLibelle($libelle){
			$this->libelle = $libelle;
		}
		/** Getter et Setter de l'attribut "valeur" **/
		public function getValeur(){
			return $this->valeur;
		}
		public function setValeur($valeur){
			$this->valeur = $valeur;
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
		//Recherche d'un élément de la table Typetaxe**/
		public function rechercheTypetaxe($id){
			$list = array();

			$requete = Connexion::Connect()->query("SELECT * FROM typetaxe WHERE idTypetaxe = \"$id\" ");

			//On récupère le résultat de la requete, on le parcours, on le met dans une variable qu'on retourne 
			foreach ($requete as $donnee){
				$list[] = $donnee;
			}
			return $list;
		}
		// Insertion des valeurs 
		/** Fonctions CRUD **/
		public function addTypetaxe() {
			$list = $this->rechercheTypetaxe($this->getIdTypetaxe());
			$res = -1;
			/**Si aucun élément n'est trouvé**/
			if(count($list) == 0){ /**Preparation de la requete d'insertion**/
				$requete = Connexion::Connect()->prepare('INSERT INTO typetaxe(idTypetaxe, libelle, valeur, dateAjout, etat) VALUES (?, ?, ?, ?, ?)');
				/**La fonction bindValue associe une valeur à un paramètre**
	**Execution de la requete
	**On retourne le resultat de la requete
	**/
				$requete->bindValue(1, $this->getIdTypetaxe());
				$requete->bindValue(2, $this->getLibelle());
				$requete->bindValue(3, $this->getValeur());
				$requete->bindValue(4, $this->getDateAjout());
				$requete->bindValue(5, $this->getEtat());
				$res = $requete->execute();
			}
			return($res);
		}
		// Modification des valeurs
		public function updateTypetaxe() {
			$list = $this->rechercheTypetaxe($this->getIdTypetaxe());
			$res = -1;
			/**Si un élément est trouvé**/
			if(count($list) != 0){ /**Preparation de la requete de mise à jour**/
				$requete = Connexion::Connect()->prepare('UPDATE typetaxe SET libelle = ?, valeur = ?, dateAjout = ?, etat = ? WHERE idTypetaxe = ? ');
				/**La fonction bindValue associe une valeur à un paramètre**
	**Execution de la requete
	**On retourne le resultat de la requete
	**/
				$requete->bindValue(1, $this->getLibelle());
				$requete->bindValue(2, $this->getValeur());
				$requete->bindValue(3, $this->getDateAjout());
				$requete->bindValue(4, $this->getEtat());
				$requete->bindValue(5, $this->getIdTypetaxe());
				$res = $requete->execute(); 
			}
			return($res);
		}
		// Suppression des valeurs
		public function deleteTypetaxe($code) {
			$list = $this->rechercheTypetaxe($code);
			$res = -1;
			/**Si un élément est trouvé**/
			if(count($list) != 0){ /**Preparation de la requete de suppression**/
				$requete = Connexion::Connect()->prepare('DELETE FROM typetaxe WHERE idTypetaxe = ?');
				/**La fonction bindValue associe une valeur à un paramètre**
	**Execution de la requete
	**On retourne le resultat de la requete
	**/
				$requete->bindValue(1, $code);
				$res = $requete->execute();
			}
			return($res);
		}
		// Liste des typetaxes 
		public function listTypetaxe(){
			$list = array();

			$requete = Connexion::Connect()->query('SELECT * FROM typetaxe');

			//On récupère le résultat de la requete, on le parcours, on le met dans une variable qu'on retourne 
			foreach ($requete as $donnee) {
				$list[] = $donnee;
			}
			return $list;
		}	
	}
?>