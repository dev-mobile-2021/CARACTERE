<?php
	require_once('classeConnexion.php'); 
	// CLASSE FAMILLE 
	/** Attributs de la classe "Famille" **/
	class Famille {
		private $idFamille;
		private $famille;
		private $description;
		private $idRubrique;
		private $dateAjout;
		private $etat;

		/** Constructeur ... **/
		public function __construct(){
			//récupération du nombre d'arguments
			$nb= func_num_args();
			// S'il n'y a pas de paramètre, on initialise les variables à une valeur nulle
			if ($nb == 0) {
				$this->idFamille= "";
				$this->famille= "";
				$this->description= "";
				$this->idRubrique= "";
				$this->dateAjout= "";
				$this->etat= "";
			}
			/*Sinon s'il y a des paramètres on donne aux variables les valeurs des paramètres
	La fonction func_get_arg() recupère la valeur de l'argument à la position qui lui est donnée en paramètre*/
			if ($nb != 0) {
				$this->idFamille= func_get_arg(0);
				$this->famille= func_get_arg(1);
				$this->description= func_get_arg(2);
				$this->idRubrique= func_get_arg(3);
				$this->dateAjout= func_get_arg(4);
				$this->etat= func_get_arg(5);
			}
		}
		/** Getter et Setter de l'attribut "idFamille" **/
		public function getIdFamille(){
			return $this->idFamille;
		}
		public function setIdFamille($idFamille){
			$this->idFamille = $idFamille;
		}
		/** Getter et Setter de l'attribut "famille" **/
		public function getFamille(){
			return $this->famille;
		}
		public function setFamille($famille){
			$this->famille = $famille;
		}
		/** Getter et Setter de l'attribut "description" **/
		public function getDescription(){
			return $this->description;
		}
		public function setDescription($description){
			$this->description = $description;
		}
		/** Getter et Setter de l'attribut "idRubrique" **/
		public function getIdRubrique(){
			return $this->idRubrique;
		}
		public function setIdRubrique($idRubrique){
			$this->idRubrique = $idRubrique;
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
		//Recherche d'un élément de la table Famille**/
		public function rechercheFamille($id){
			$list = array();

			$requete = Connexion::Connect()->query("SELECT * FROM famille WHERE idFamille = \"$id\" ");

			//On récupère le résultat de la requete, on le parcours, on le met dans une variable qu'on retourne 
			foreach ($requete as $donnee){
				$list[] = $donnee;
			}
			return $list;
		}
		// Insertion des valeurs 
		/** Fonctions CRUD **/
		public function addFamille() {
			$requete = Connexion::Connect()->prepare('INSERT INTO famille(idFamille, famille, description, idRubrique, etat) VALUES (?, ?, ?, ?, ?)');
			$requete->bindValue(1, $this->getIdFamille());
			$requete->bindValue(2, $this->getFamille());
			$requete->bindValue(3, $this->getDescription());
			$requete->bindValue(4, $this->getIdRubrique());
			$requete->bindValue(5, $this->getEtat());
			$res = $requete->execute();
			return($res);
		}
		// Modification des valeurs
		public function updateFamille() {
			$requete = Connexion::Connect()->prepare('UPDATE famille SET famille = ?, description = ?, idRubrique = ?, etat = ? WHERE idFamille = ? ');
			$requete->bindValue(1, $this->getFamille());
			$requete->bindValue(2, $this->getDescription());
			$requete->bindValue(3, $this->getIdRubrique());
			$requete->bindValue(4, $this->getEtat());
			$requete->bindValue(5, $this->getIdFamille());
			$res = $requete->execute(); 
			return($res);
		}
		// Suppression des valeurs
		public function deleteFamille($code) {
			$requete = Connexion::Connect()->prepare('DELETE FROM famille WHERE idFamille = ?');
			$requete->bindValue(1, $code);
			$res = $requete->execute();
			return($res);
		}
		// Liste des familles 
		public function listFamille(){
			$list = array();

			$requete = Connexion::Connect()->query('SELECT * FROM famille');

			//On récupère le résultat de la requete, on le parcours, on le met dans une variable qu'on retourne 
			foreach ($requete as $donnee) {
				$list[] = $donnee;
			}
			return $list;
		}

		public function listFamille2(){
			$list = array();

			$requete = Connexion::Connect()->query('SELECT * FROM vfamille');

			//On récupère le résultat de la requete, on le parcours, on le met dans une variable qu'on retourne 
			foreach ($requete as $donnee) {
				$list[] = $donnee;
			}
			return $list;
		}

		public function libelleExist($famille){
	        $list = array();
	        $requete = Connexion::Connect()->query("SELECT famille FROM famille WHERE famille = \"$famille\" ");
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

	    public function libelleExist2($famille, $idFamille){
	        $list = array();
	        $requete = Connexion::Connect()->query("SELECT famille FROM famille WHERE famille = \"$famille\" 
	        	AND idFamille != \"$idFamille\"
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