<?php
	require_once('classeConnexion.php'); 
	// CLASSE USER 
	/** Attributs de la classe "User" **/
	class User {
		private $idUser;
		private $email;
		private $password;
		private $prenom;
		private $nom;
		private $telephone;
		private $adresse;
		private $idRole;
		private $idAgence;
		private $photo;

		/** Constructeur ... **/
		public function __construct(){
			//récupération du nombre d'arguments
			$nb= func_num_args();
			// S'il n'y a pas de paramètre, on initialise les variables à une valeur nulle
			if ($nb == 0) {
				$this->idUser= "";
				$this->email= "";
				$this->password= "";
				$this->prenom= "";
				$this->nom= "";
				$this->telephone= "";
				$this->adresse= "";
				$this->idRole= "";
				$this->idAgence= "";
				$this->photo= "";
			}
			/*Sinon s'il y a des paramètres on donne aux variables les valeurs des paramètres
	La fonction func_get_arg() recupère la valeur de l'argument à la position qui lui est donnée en paramètre*/
			if ($nb != 0) {
				$this->idUser= func_get_arg(0);
				$this->email= func_get_arg(1);
				$this->password= func_get_arg(2);
				$this->prenom= func_get_arg(3);
				$this->nom= func_get_arg(4);
				$this->telephone= func_get_arg(5);
				$this->adresse= func_get_arg(6);
				$this->idRole= func_get_arg(7);
				$this->idAgence= func_get_arg(8);
				$this->photo= func_get_arg(9);
			}
		}
		/** Getter et Setter de l'attribut "idUser" **/
		public function getIdUser(){
			return $this->idUser;
		}
		public function setIdUser($idUser){
			$this->idUser = $idUser;
		}
		/** Getter et Setter de l'attribut "email" **/
		public function getEmail(){
			return $this->email;
		}
		public function setEmail($email){
			$this->email = $email;
		}
		/** Getter et Setter de l'attribut "password" **/
		public function getPassword(){
			return $this->password;
		}
		public function setPassword($password){
			$this->password = $password;
		}
		/** Getter et Setter de l'attribut "prenom" **/
		public function getPrenom(){
			return $this->prenom;
		}
		public function setPrenom($prenom){
			$this->prenom = $prenom;
		}
		/** Getter et Setter de l'attribut "nom" **/
		public function getNom(){
			return $this->nom;
		}
		public function setNom($nom){
			$this->nom = $nom;
		}
		/** Getter et Setter de l'attribut "telephone" **/
		public function getTelephone(){
			return $this->telephone;
		}
		public function setTelephone($telephone){
			$this->telephone = $telephone;
		}
		/** Getter et Setter de l'attribut "adresse" **/
		public function getAdresse(){
			return $this->adresse;
		}
		public function setAdresse($adresse){
			$this->adresse = $adresse;
		}
		/** Getter et Setter de l'attribut "idRole" **/
		public function getIdRole(){
			return $this->idRole;
		}
		public function setIdRole($idRole){
			$this->idRole = $idRole;
		}
		/** Getter et Setter de l'attribut "idAgence" **/
		public function getIdAgence(){
			return $this->idAgence;
		}
		public function setIdAgence($idAgence){
			$this->idAgence = $idAgence;
		}
		/** Getter et Setter de l'attribut "photo" **/
		public function getPhoto(){
			return $this->photo;
		}
		public function setPhoto($photo){
			$this->photo = $photo;
		}
		//Recherche d'un élément de la table User**/

		public function is_sha1($str) {
		    return (bool) preg_match('/^[0-9a-f]{40}$/i', $str);
		}
		public function rechercheUser($id){
			$list = array();

			$requete = Connexion::Connect()->query("SELECT * FROM user WHERE idUser = \"$id\" ");

			//On récupère le résultat de la requete, on le parcours, on le met dans une variable qu'on retourne 
			foreach ($requete as $donnee){
				$list[] = $donnee;
			}
			return $list;
		}
		// Insertion des valeurs 
		/** Fonctions CRUD **/
		public function addUser() {
			$requete = Connexion::Connect()->prepare('INSERT INTO user(idUser, email, password, prenom, nom, telephone, adresse, idRole, idAgence, photo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
			$requete->bindValue(1, $this->getIdUser());
			$requete->bindValue(2, $this->getEmail());
			$requete->bindValue(3, sha1($this->getPassword()));
			$requete->bindValue(4, $this->getPrenom());
			$requete->bindValue(5, $this->getNom());
			$requete->bindValue(6, $this->getTelephone());
			$requete->bindValue(7, $this->getAdresse());
			$requete->bindValue(8, $this->getIdRole());
			$requete->bindValue(9, $this->getIdAgence());
			$requete->bindValue(10, $this->getPhoto());
			$res = $requete->execute();
			return($res);
		}
		// Modification des valeurs
		public function updateUser() {
			if($this->is_sha1($this->getPassword()))
				$password = $this->getPassword();
			else
				$password = sha1($this->getPassword());
			$requete = Connexion::Connect()->prepare('UPDATE user SET email = ?, password = ?, prenom = ?, nom = ?, telephone = ?, adresse = ?, idRole = ?, idAgence = ?, photo = ? WHERE idUser = ? ');
			$requete->bindValue(1, $this->getEmail());
			$requete->bindValue(2, $password);
			$requete->bindValue(3, $this->getPrenom());
			$requete->bindValue(4, $this->getNom());
			$requete->bindValue(5, $this->getTelephone());
			$requete->bindValue(6, $this->getAdresse());
			$requete->bindValue(7, $this->getIdRole());
			$requete->bindValue(8, $this->getIdAgence());
			$requete->bindValue(9, $this->getPhoto());
			$requete->bindValue(10, $this->getIdUser());
			$res = $requete->execute(); 
			return($res);
		}
		// Suppression des valeurs
		public function deleteUser($code) {
			$requete = Connexion::Connect()->prepare('DELETE FROM user WHERE idUser = ?');
			$requete->bindValue(1, $code);
			$res = $requete->execute();
			return($res);
		}
		// Liste des users 
		public function listUser(){
			$list = array();

			$requete = Connexion::Connect()->query('SELECT * FROM user');

			//On récupère le résultat de la requete, on le parcours, on le met dans une variable qu'on retourne 
			foreach ($requete as $donnee) {
				$list[] = $donnee;
			}
			return $list;
		}
		
		public function listUser2(){
			$list = array();

			$requete = Connexion::Connect()->query('SELECT * FROM vuser');

			//On récupère le résultat de la requete, on le parcours, on le met dans une variable qu'on retourne 
			foreach ($requete as $donnee) {
				$list[] = $donnee;
			}
			return $list;
		}

		public function emailExist($email){
	        $list = array();
	        $requete = Connexion::Connect()->query("SELECT email FROM user WHERE email = \"$email\" ");
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

	    public function emailExist2($email, $idUser){
	        $list = array();
	        $requete = Connexion::Connect()->query("SELECT email FROM user WHERE email = \"$email\" 
	        	AND idUser != \"$idUser\"
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

	    public function isLogged($email, $mdp){
	        $list = array();
	        /*On crypte le mot de passe avant la vérification car il est crypté dan sla base de données
			*On exécute la requete
	        */
	        $mdp = sha1($mdp);
	        $requete = Connexion::Connect()->query("SELECT password FROM user WHERE email = \"$email\" AND password = \"$mdp\" ");
	        /*On parcours le résultat*/
	        foreach ($requete as $donnee){
	            $list[] = $donnee;
			}
			/*Si la taille du taille du tableau est différente de 0, l'user est donc conecté. on revoie true*/
	        if(count($list) != 0){
	            return true;
	        }
	        /*Sinon on renvoi false*/
	         else
	            return false;     
	    }

	    public function isActivated($email, $mdp){
	        $list = array();
	        /*On crypte le mot de passe avant la vérification car il est crypté dan sla base de données
			*On exécute la requete
	        */
	        $mdp = sha1($mdp);
	        $requete = Connexion::Connect()->query("SELECT password FROM user WHERE email = \"$email\" AND password = \"$mdp\" AND etat = 1 ");
	        /*On parcours le résultat*/
	        foreach ($requete as $donnee){
	            $list[] = $donnee;
			}
	        if(count($list) != 0){
	            return true;
	        }
	        /*Sinon on renvoi false*/
	         else
	            return false;     
	    }

	    public function detailsUser($email, $mdp){
			$list = array();

			$requete = Connexion::Connect()->query("SELECT * FROM vuser WHERE email = \"$email\" AND password = \"$mdp\" ");

			foreach ($requete as $donnee){
				$list[] = $donnee;
			}
			return $list;
		}	
	}
?>