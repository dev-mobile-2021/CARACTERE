<?php
	require_once('classeConnexion.php'); 
	// CLASSE SERVICE 
	/** Attributs de la classe "Service" **/
	class Service {
		private $idService;
		private $referenceService;
		private $service;

		/** Constructeur ... **/
		public function __construct(){
			//récupération du nombre d'arguments
			$nb= func_num_args();
			// S'il n'y a pas de paramètre, on initialise les variables à une valeur nulle
			if ($nb == 0) {
				$this->idService= "";
				$this->referenceService= "";
				$this->service= "";
			}
			/*Sinon s'il y a des paramètres on donne aux variables les valeurs des paramètres
	La fonction func_get_arg() recupère la valeur de l'argument à la position qui lui est donnée en paramètre*/
			if ($nb != 0) {
				$this->idService= func_get_arg(0);
				$this->referenceService= func_get_arg(1);
				$this->service= func_get_arg(2);
			}
		}
		/** Getter et Setter de l'attribut "idService" **/
		public function getIdService(){
			return $this->idService;
		}
		public function setIdService($idService){
			$this->idService = $idService;
		}
		/** Getter et Setter de l'attribut "referenceService" **/
		public function getReferenceService(){
			return $this->referenceService;
		}
		public function setReferenceService($referenceService){
			$this->referenceService = $referenceService;
		}
		/** Getter et Setter de l'attribut "service" **/
		public function getService(){
			return $this->service;
		}
		public function setService($service){
			$this->service = $service;
		}
		//Recherche d'un élément de la table Service**/
		public function rechercheService($id){
			$list = array();

			$requete = Connexion::Connect()->query("SELECT * FROM service WHERE idService = \"$id\" ");

			//On récupère le résultat de la requete, on le parcours, on le met dans une variable qu'on retourne 
			foreach ($requete as $donnee){
				$list[] = $donnee;
			}
			return $list;
		}
		// Insertion des valeurs 
		/** Fonctions CRUD **/
		public function addService() {

			$db = Connexion::Connect();
			$requete = $db->prepare('INSERT INTO service(idService, referenceService, service) VALUES (?, ?, ?)');
			$requete->bindValue(1, $this->getIdService());
			$requete->bindValue(2, $this->getReferenceService());
			$requete->bindValue(3, $this->getService());
			$res = $requete->execute();
			$idService = $db->lastInsertId();
			
			return($res);
		}
		// Modification des valeurs
		public function updateService() {
			$requete = Connexion::Connect()->prepare('UPDATE service SET service = ? WHERE idService = ? ');
			$requete->bindValue(1, $this->getService());
			$requete->bindValue(2, $this->getIdService());
			$res = $requete->execute(); 
			return($res);
		}
		// Suppression des valeurs
		public function deleteService($code) {
			$requete = Connexion::Connect()->prepare('DELETE FROM service WHERE idService = ?');
			$requete->bindValue(1, $code);
			$res = $requete->execute();
			return($res);
		}
		// Liste des services 
		public function listService(){
			$list = array();

			$requete = Connexion::Connect()->query('SELECT * FROM service');

			//On récupère le résultat de la requete, on le parcours, on le met dans une variable qu'on retourne 
			foreach ($requete as $donnee) {
				$list[] = $donnee;
			}
			return $list;
		}

		public function listServiceSansExistant($idDevis, $idTypeservice){
			$list = array();

			$requete = Connexion::Connect()->query("SELECT * FROM service WHERE idService NOT IN (SELECT s.idService
                      FROM service s, typeservice t, detailsdevis d
                      WHERE s.idService = d.idService
                      AND t.idTypeservice = d.idTypeservice
                      AND t.idTypeservice = \"$idTypeservice\"
                      AND idDevis = \"$idDevis\")");

			//On récupère le résultat de la requete, on le parcours, on le met dans une variable qu'on retourne 
			foreach ($requete as $donnee) {
				$list[] = $donnee;
			}
			return $list;
		}

		public function listService2(){
			$list = array();

			$requete = Connexion::Connect()->query('SELECT * FROM vservice');

			//On récupère le résultat de la requete, on le parcours, on le met dans une variable qu'on retourne 
			foreach ($requete as $donnee) {
				$list[] = $donnee;
			}
			return $list;
		}	


		public function libelleExist($service){
	        $list = array();
	        $requete = Connexion::Connect()->query("SELECT service FROM service WHERE service = \"$service\" ");
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

	    public function libelleExist2($service, $idService){
	        $list = array();
	        $requete = Connexion::Connect()->query("SELECT service FROM service WHERE service = \"$service\" 
	        	AND idService != \"$idService\"
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