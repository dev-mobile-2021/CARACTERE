<?php
	require_once('classeConnexion.php'); 
	// CLASSE RUBRIQUE 
	/** Attributs de la classe "Rubrique" **/
	class Rubrique {
		private $idRubrique;
		private $referenceRubrique;
		private $rubrique;
		private $description;

		/** Constructeur ... **/
		public function __construct(){
			//récupération du nombre d'arguments
			$nb= func_num_args();
			// S'il n'y a pas de paramètre, on initialise les variables à une valeur nulle
			if ($nb == 0) {
				$this->idRubrique= "";
				$this->referenceRubrique= "";
				$this->rubrique= "";
				$this->description= "";
			}
			/*Sinon s'il y a des paramètres on donne aux variables les valeurs des paramètres
	La fonction func_get_arg() recupère la valeur de l'argument à la position qui lui est donnée en paramètre*/
			if ($nb != 0) {
				$this->idRubrique= func_get_arg(0);
				$this->referenceRubrique= func_get_arg(1);
				$this->rubrique= func_get_arg(2);
				$this->description= func_get_arg(3);
			}
		}
		/** Getter et Setter de l'attribut "idRubrique" **/
		public function getIdRubrique(){
			return $this->idRubrique;
		}
		public function setIdRubrique($idRubrique){
			$this->idRubrique = $idRubrique;
		}
		/** Getter et Setter de l'attribut "referenceRubrique" **/
		public function getReferenceRubrique(){
			return $this->referenceRubrique;
		}
		public function setReferenceRubrique($referenceRubrique){
			$this->referenceRubrique = $referenceRubrique;
		}
		/** Getter et Setter de l'attribut "rubrique" **/
		public function getRubrique(){
			return $this->rubrique;
		}
		public function setRubrique($rubrique){
			$this->rubrique = $rubrique;
		}
		/** Getter et Setter de l'attribut "description" **/
		public function getDescription(){
			return $this->description;
		}
		public function setDescription($description){
			$this->description = $description;
		}
		//Recherche d'un élément de la table Rubrique**/
		public function rechercheRubrique($id){
			$list = array();

			$requete = Connexion::Connect()->query("SELECT * FROM rubrique WHERE idRubrique = \"$id\" ");

			//On récupère le résultat de la requete, on le parcours, on le met dans une variable qu'on retourne 
			foreach ($requete as $donnee){
				$list[] = $donnee;
			}
			return $list;
		}
		// Insertion des valeurs 
		/** Fonctions CRUD **/
		public function addRubrique() {
			$requete = Connexion::Connect()->prepare('INSERT INTO rubrique(idRubrique, referenceRubrique, rubrique, description) VALUES (?, ?, ?, ?)');
			$requete->bindValue(1, $this->getIdRubrique());
			$requete->bindValue(2, $this->getReferenceRubrique());
			$requete->bindValue(3, $this->getRubrique());
			$requete->bindValue(4, $this->getDescription());
			$res = $requete->execute();
			return($res);
		}
		// Modification des valeurs
		public function updateRubrique() {
			$requete = Connexion::Connect()->prepare('UPDATE rubrique SET rubrique = ?, description = ? WHERE idRubrique = ? ');
			$requete->bindValue(1, $this->getRubrique());
			$requete->bindValue(2, $this->getDescription());
			$requete->bindValue(3, $this->getIdRubrique());
			$res = $requete->execute(); 
			return($res);
		}
		// Suppression des valeurs
		public function deleteRubrique($code) {
			$requete = Connexion::Connect()->prepare('DELETE FROM rubrique WHERE idRubrique = ?');
			$requete->bindValue(1, $code);
			$res = $requete->execute();
			return($res);
		}
		// Liste des rubriques 
		public function listRubrique(){
			$list = array();

			
			// $requete = Connexion::Connect()->query('SELECT * FROM rubrique');
			
			$requete = Connexion::Connect()->query('SELECT * FROM `rubrique` ORDER BY rubrique ASC');
			

			//On récupère le résultat de la requete, on le parcours, on le met dans une variable qu'on retourne 
			foreach ($requete as $donnee) {
				$list[] = $donnee;
			}
			return $list;
		}

		public function libelleExist($rubrique){
	        $list = array();
	        $requete = Connexion::Connect()->query("SELECT rubrique FROM rubrique WHERE rubrique = \"$rubrique\" ");
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

	    public function libelleExist2($rubrique, $idRubrique){
	        $list = array();
	        $requete = Connexion::Connect()->query("SELECT rubrique FROM rubrique WHERE rubrique = \"$rubrique\" 
	        	AND idRubrique != \"$idRubrique\"
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