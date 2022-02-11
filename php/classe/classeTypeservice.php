<?php
	require_once('classeConnexion.php'); 
	// CLASSE TYPESERVICE 
	/** Attributs de la classe "Typeservice" **/
	class Typeservice {
		private $idTypeservice;
		private $referenceTypeservice;
		private $typeService;
		private $idFamille;
		private $description;

		/** Constructeur ... **/
		public function __construct(){
			//récupération du nombre d'arguments
			$nb= func_num_args();
			// S'il n'y a pas de paramètre, on initialise les variables à une valeur nulle
			if ($nb == 0) {
				$this->idTypeservice= "";
				$this->referenceTypeservice= "";
				$this->typeService= "";
				$this->idFamille= "";
				$this->description= "";
			}
			/*Sinon s'il y a des paramètres on donne aux variables les valeurs des paramètres
	La fonction func_get_arg() recupère la valeur de l'argument à la position qui lui est donnée en paramètre*/
			if ($nb != 0) {
				$this->idTypeservice= func_get_arg(0);
				$this->referenceTypeservice= func_get_arg(1);
				$this->typeService= func_get_arg(2);
				$this->idFamille= func_get_arg(3);
				$this->description= func_get_arg(4);
			}
		}
		/** Getter et Setter de l'attribut "idTypeservice" **/
		public function getIdTypeservice(){
			return $this->idTypeservice;
		}
		public function setIdTypeservice($idTypeservice){
			$this->idTypeservice = $idTypeservice;
		}
		/** Getter et Setter de l'attribut "referenceTypeservice" **/
		public function getReferenceTypeservice(){
			return $this->referenceTypeservice;
		}
		public function setReferenceTypeservice($referenceTypeservice){
			$this->referenceTypeservice = $referenceTypeservice;
		}
		/** Getter et Setter de l'attribut "typeService" **/
		public function getTypeService(){
			return $this->typeService;
		}
		public function setTypeService($typeService){
			$this->typeService = $typeService;
		}
		/** Getter et Setter de l'attribut "idFamille" **/
		public function getIdRubrique(){
			return $this->idFamille;
		}
		public function setIdRubrique($idFamille){
			$this->idFamille = $idFamille;
		}
		/** Getter et Setter de l'attribut "description" **/
		public function getDescription(){
			return $this->description;
		}
		public function setDescription($description){
			$this->description = $description;
		}
		//Recherche d'un élément de la table Typeservice**/
		public function rechercheTypeservice($id){
			$list = array();

			$requete = Connexion::Connect()->query("SELECT * FROM typeservice WHERE idTypeservice = \"$id\" ");

			//On récupère le résultat de la requete, on le parcours, on le met dans une variable qu'on retourne 
			foreach ($requete as $donnee){
				$list[] = $donnee;
			}
			return $list;
		}
		// Insertion des valeurs 
		/** Fonctions CRUD **/
		public function addTypeservice() {
			$requete = Connexion::Connect()->prepare('INSERT INTO typeservice(idTypeservice, referenceTypeservice, typeService, idFamille, description) VALUES (?, ?, ?, ?, ?)');
			$requete->bindValue(1, $this->getIdTypeservice());
			$requete->bindValue(2, $this->getReferenceTypeservice());
			$requete->bindValue(3, $this->getTypeService());
			$requete->bindValue(4, $this->getIdRubrique());
			$requete->bindValue(5, $this->getDescription());
			$res = $requete->execute();
			return($res);
		}
		// Modification des valeurs
		public function updateTypeservice() {
			$requete = Connexion::Connect()->prepare('UPDATE typeservice SET typeService = ?, idFamille = ?, description = ? WHERE idTypeservice = ? ');
			$requete->bindValue(1, $this->getTypeService());
			$requete->bindValue(2, $this->getIdRubrique());
			$requete->bindValue(3, $this->getDescription());
			$requete->bindValue(4, $this->getIdTypeservice());
			$res = $requete->execute(); 
			return($res);
		}
		// Suppression des valeurs
		public function deleteTypeservice($code) {
			$requete = Connexion::Connect()->prepare('DELETE FROM typeservice WHERE idTypeservice = ?');
			$requete->bindValue(1, $code);
			$res = $requete->execute();
			return($res);
		}
		// Liste des typeservices 
		public function listTypeservice(){
			$list = array();

			$requete = Connexion::Connect()->query('SELECT * FROM typeservice');

			//On récupère le résultat de la requete, on le parcours, on le met dans une variable qu'on retourne 
			foreach ($requete as $donnee) {
				$list[] = $donnee;
			}
			return $list;
		}

		public function listTypeservice2(){
			$list = array();

			$requete = Connexion::Connect()->query('SELECT * FROM vtypeservice');

			//On récupère le résultat de la requete, on le parcours, on le met dans une variable qu'on retourne 
			foreach ($requete as $donnee) {
				$list[] = $donnee;
			}
			return $list;
		}

		public function libelleExist($typeService){
	        $list = array();
	        $requete = Connexion::Connect()->query("SELECT typeService FROM typeservice WHERE typeService = \"$typeService\" ");
	        /*On parcours le résultat*/
	        foreach ($requete as $donnee){
	            $list[] = $donnee;
			}
			 if(count($list) != 0){
	            return true;
	        }
	         else
	            return false;    
	    }

	    public function libelleExist2($typeService, $idTypeservice){
	        $list = array();
	        $requete = Connexion::Connect()->query("SELECT typeService FROM typeservice WHERE typeService = \"$typeService\" 
	        	AND idTypeservice != \"$idTypeservice\"
	        ");
	        /*On parcours le résultat*/
	        foreach ($requete as $donnee){
	            $list[] = $donnee;
			}
			 if(count($list) != 0){
	            return true;
	        }
	         else
	            return false;    
	    }	
	}
?>