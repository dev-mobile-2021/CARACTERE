<?php
	require_once('classeConnexion.php'); 
	// CLASSE DETAILSTYPESERVICE 
	/** Attributs de la classe "Detailstypeservice" **/
	class Detailstypeservice {
		private $id;
		private $idRubrique;
		private $idTypeservice;
		private $idDevis;
		private $hasComment;
		private $commentaire;
		private $hasPrice;
		private $prixAchat;
		private $prixVente;
		private $quantite;
		private $etat;

		/** Constructeur ... **/
		public function __construct(){
			//récupération du nombre d'arguments
			$nb= func_num_args();
			// S'il n'y a pas de paramètre, on initialise les variables à une valeur nulle
			if ($nb == 0) {
				$this->id= "";
				$this->idRubrique= "";
				$this->idTypeservice= "";
				$this->idDevis= "";
				$this->hasComment= "";
				$this->commentaire= "";
				$this->hasPrice= "";
				$this->prixAchat= "";
				$this->prixVente= "";
				$this->quantite= "";
				$this->etat= "";
			}
			/*Sinon s'il y a des paramètres on donne aux variables les valeurs des paramètres
	La fonction func_get_arg() recupère la valeur de l'argument à la position qui lui est donnée en paramètre*/
			if ($nb != 0) {
				$this->id= func_get_arg(0);
				$this->idRubrique= func_get_arg(1);
				$this->idTypeservice= func_get_arg(2);
				$this->idDevis= func_get_arg(3);
				$this->hasComment= func_get_arg(4);
				$this->commentaire= func_get_arg(5);
				$this->hasPrice= func_get_arg(6);
				$this->prixAchat= func_get_arg(7);
				$this->prixVente= func_get_arg(8);
				$this->quantite= func_get_arg(9);
				$this->etat= func_get_arg(10);
			}
		}
		/** Getter et Setter de l'attribut "id" **/
		public function getId(){
			return $this->id;
		}
		public function setId($id){
			$this->id = $id;
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
		/** Getter et Setter de l'attribut "idDevis" **/
		public function getIdDevis(){
			return $this->idDevis;
		}
		public function setIdDevis($idDevis){
			$this->idDevis = $idDevis;
		}
		/** Getter et Setter de l'attribut "hasComment" **/
		public function getHasComment(){
			return $this->hasComment;
		}
		public function setHasComment($hasComment){
			$this->hasComment = $hasComment;
		}
		/** Getter et Setter de l'attribut "commentaire" **/
		public function getCommentaire(){
			return $this->commentaire;
		}
		public function setCommentaire($commentaire){
			$this->commentaire = $commentaire;
		}
		/** Getter et Setter de l'attribut "hasPrice" **/
		public function getHasPrice(){
			return $this->hasPrice;
		}
		public function setHasPrice($hasPrice){
			$this->hasPrice = $hasPrice;
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
		/** Getter et Setter de l'attribut "etat" **/
		public function getEtat(){
			return $this->etat;
		}
		public function setEtat($etat){
			$this->etat = $etat;
		}
		//Recherche d'un élément de la table Detailstypeservice**/
		public function rechercheDetailstypeservice($id){
			$list = array();

			$requete = Connexion::Connect()->query("SELECT * FROM detailstypeservice WHERE id = \"$id\" ");

			//On récupère le résultat de la requete, on le parcours, on le met dans une variable qu'on retourne 
			foreach ($requete as $donnee){
				$list[] = $donnee;
			}
			return $list;
		}
		// Insertion des valeurs 
		/** Fonctions CRUD **/
		public function addDetailstypeservice() {
			$requete = Connexion::Connect()->prepare('INSERT INTO detailstypeservice(id, idRubrique, idTypeservice, idDevis, hasComment, commentaire, hasPrice, prixAchat, prixVente, quantite, etat) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
			$requete->bindValue(1, $this->getId());
			$requete->bindValue(2, $this->getIdRubrique());
			$requete->bindValue(3, $this->getIdTypeservice());
			$requete->bindValue(4, $this->getIdDevis());
			$requete->bindValue(5, $this->getHasComment());
			$requete->bindValue(6, $this->getCommentaire());
			$requete->bindValue(7, $this->getHasPrice());
			$requete->bindValue(8, $this->getPrixAchat());
			$requete->bindValue(9, $this->getPrixVente());
			$requete->bindValue(10, $this->getQuantite());
			$requete->bindValue(11, $this->getEtat());
			$res = $requete->execute();
			return($res);
		}
		// Modification des valeurs
		public function updateDetailstypeservice() {
			$requete = Connexion::Connect()->prepare('UPDATE detailstypeservice SET idRubrique = ?, idTypeservice = ?, idDevis = ?, hasComment = ?, commentaire = ?, hasPrice = ?, prixAchat = ?, prixVente = ?, quantite = ?, etat = ? WHERE id = ? ');
			$requete->bindValue(1, $this->getIdRubrique());
			$requete->bindValue(2, $this->getIdTypeservice());
			$requete->bindValue(3, $this->getIdDevis());
			$requete->bindValue(4, $this->getHasComment());
			$requete->bindValue(5, $this->getCommentaire());
			$requete->bindValue(6, $this->getHasPrice());
			$requete->bindValue(7, $this->getPrixAchat());
			$requete->bindValue(8, $this->getPrixVente());
			$requete->bindValue(9, $this->getQuantite());
			$requete->bindValue(10, $this->getEtat());
			$requete->bindValue(11, $this->getId());
			$res = $requete->execute(); 
			return($res);
		}
		// Suppression des valeurs
		public function deleteDetailstypeservice($code) {
			$requete = Connexion::Connect()->prepare('DELETE FROM detailstypeservice WHERE id = ?');
			$requete->bindValue(1, $code);
			$res = $requete->execute();
			return($res);
		}
		// Liste des detailstypeservices 
		public function listDetailstypeservice(){
			$list = array();

			$requete = Connexion::Connect()->query('SELECT * FROM detailstypeservice');

			//On récupère le résultat de la requete, on le parcours, on le met dans une variable qu'on retourne 
			foreach ($requete as $donnee) {
				$list[] = $donnee;
			}
			return $list;
		}	
	}
?>