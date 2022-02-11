<?php
	require_once('classeConnexion.php'); 
	// CLASSE CONTACT 
	/** Attributs de la classe "Contact" **/
	class Contact {
		private $idContact;
		private $nom;
		private $prenom;
		private $telephone;
		private $email;
		private $idClient;
		private $idUser;
		private $dateAjout;
		private $etat;

		/** Constructeur ... **/
		public function __construct(){
			//récupération du nombre d'arguments
			$nb= func_num_args();
			// S'il n'y a pas de paramètre, on initialise les variables à une valeur nulle
			if ($nb == 0) {
				$this->idContact= "";
				$this->nom= "";
				$this->prenom= "";
				$this->telephone= "";
				$this->email= "";
				$this->idClient= "";
				$this->idUser= "";
				$this->dateAjout= "";
				$this->etat= "";
			}
			/*Sinon s'il y a des paramètres on donne aux variables les valeurs des paramètres
	La fonction func_get_arg() recupère la valeur de l'argument à la position qui lui est donnée en paramètre*/
			if ($nb != 0) {
				$this->idContact= func_get_arg(0);
				$this->nom= func_get_arg(1);
				$this->prenom= func_get_arg(2);
				$this->telephone= func_get_arg(3);
				$this->email= func_get_arg(4);
				$this->idClient= func_get_arg(5);
				$this->idUser= func_get_arg(6);
				$this->dateAjout= func_get_arg(7);
				$this->etat= func_get_arg(8);
			}
		}
		/** Getter et Setter de l'attribut "idContact" **/
		public function getIdContact(){
			return $this->idContact;
		}
		public function setIdContact($idContact){
			$this->idContact = $idContact;
		}
		/** Getter et Setter de l'attribut "nom" **/
		public function getNom(){
			return $this->nom;
		}
		public function setNom($nom){
			$this->nom = $nom;
		}
		/** Getter et Setter de l'attribut "prenom" **/
		public function getPrenom(){
			return $this->prenom;
		}
		public function setPrenom($prenom){
			$this->prenom = $prenom;
		}
		/** Getter et Setter de l'attribut "telephone" **/
		public function getTelephone(){
			return $this->telephone;
		}
		public function setTelephone($telephone){
			$this->telephone = $telephone;
		}
		/** Getter et Setter de l'attribut "email" **/
		public function getEmail(){
			return $this->email;
		}
		public function setEmail($email){
			$this->email = $email;
		}
		/** Getter et Setter de l'attribut "idClient" **/
		public function getIdClient(){
			return $this->idClient;
		}
		public function setIdClient($idClient){
			$this->idClient = $idClient;
		}
		/** Getter et Setter de l'attribut "idUser" **/
		public function getIdUser(){
			return $this->idUser;
		}
		public function setIdUser($idUser){
			$this->idUser = $idUser;
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
		//Recherche d'un élément de la table Contact**/
		public function rechercheContact($id){
			$list = array();

			$requete = Connexion::Connect()->query("SELECT * FROM contact WHERE idContact = \"$id\" ");

			//On récupère le résultat de la requete, on le parcours, on le met dans une variable qu'on retourne 
			foreach ($requete as $donnee){
				$list[] = $donnee;
			}
			return $list;
		}
		// Insertion des valeurs 
		/** Fonctions CRUD **/
		public function addContact() {
			$requete = Connexion::Connect()->prepare('INSERT INTO contact(idContact, nom, prenom, telephone, email, idClient, idUser, etat) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
			$requete->bindValue(1, $this->getIdContact());
			$requete->bindValue(2, $this->getNom());
			$requete->bindValue(3, $this->getPrenom());
			$requete->bindValue(4, $this->getTelephone());
			$requete->bindValue(5, $this->getEmail());
			$requete->bindValue(6, $this->getIdClient());
			$requete->bindValue(7, $this->getIdUser());
			$requete->bindValue(8, $this->getEtat());
			$res = $requete->execute();
			return($res);
		}
		// Modification des valeurs
		public function updateContact() {
			$requete = Connexion::Connect()->prepare('UPDATE contact SET nom = ?, prenom = ?, telephone = ?, email = ?, idClient = ?, idUser = ?, etat = ? WHERE idContact = ? ');
			$requete->bindValue(1, $this->getNom());
			$requete->bindValue(2, $this->getPrenom());
			$requete->bindValue(3, $this->getTelephone());
			$requete->bindValue(4, $this->getEmail());
			$requete->bindValue(5, $this->getIdClient());
			$requete->bindValue(6, $this->getIdUser());
			$requete->bindValue(7, $this->getEtat());
			$requete->bindValue(8, $this->getIdContact());
			$res = $requete->execute(); 
			return($res);
		}
		// Suppression des valeurs
		public function deleteContact($code) {
			$requete = Connexion::Connect()->prepare('DELETE FROM contact WHERE idContact = ?');
			$requete->bindValue(1, $code);
			$res = $requete->execute();
			return($res);
		}
		// Liste des contacts 
		public function listContact(){
			$list = array();

			$requete = Connexion::Connect()->query('SELECT * FROM contact');

			//On récupère le résultat de la requete, on le parcours, on le met dans une variable qu'on retourne 
			foreach ($requete as $donnee) {
				$list[] = $donnee;
			}
			return $list;
		}

		public function listContactclient($idClient){
			$list = array();

			$requete = Connexion::Connect()->query("SELECT * FROM contact WHERE idClient = \"$idClient\" ");

			//On récupère le résultat de la requete, on le parcours, on le met dans une variable qu'on retourne 
			foreach ($requete as $donnee) {
				$list[] = $donnee;
			}
			return $list;
		}


		public function listContact2(){
			$list = array();

			$requete = Connexion::Connect()->query('SELECT * FROM vcontact');

			//On récupère le résultat de la requete, on le parcours, on le met dans une variable qu'on retourne 
			foreach ($requete as $donnee) {
				$list[] = $donnee;
			}
			return $list;
		}

		public function libelleExist($telephone){
	        $list = array();
	        $requete = Connexion::Connect()->query("SELECT telephone FROM contact WHERE telephone = \"$telephone\" ");
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

	    public function libelleExist2($telephone, $idContact){
	        $list = array();
	        $requete = Connexion::Connect()->query("SELECT telephone FROM contact WHERE telephone = \"$telephone\" 
	        	AND idContact != \"$idContact\"
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