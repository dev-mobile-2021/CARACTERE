<?php
	require_once('classeConnexion.php'); 
	// CLASSE UTILISATEUR 
	/** Attributs de la classe "Utilisateur" **/
	class Utilisateur {
		private $idUtilisateur;
		private $nom;
		private $prenom;
		private $email;
		private $adresse;
		private $telephone;

		/** Constructeur ... **/
		public function __construct(){
			//récupération du nombre d'arguments
			$nb= func_num_args();
			// S'il n'y a pas de paramètre, on initialise les variables à une valeur nulle
			if ($nb == 0) {
				$this->idUtilisateur= "";
				$this->nom= "";
				$this->prenom= "";
				$this->email= "";
				$this->adresse= "";
				$this->telephone= "";
			}
			/*Sinon s'il y a des paramètres on donne aux variables les valeurs des paramètres
	La fonction func_get_arg() recupère la valeur de l'argument à la position qui lui est donnée en paramètre*/
			if ($nb != 0) {
				$this->idUtilisateur= func_get_arg(0);
				$this->nom= func_get_arg(1);
				$this->prenom= func_get_arg(2);
				$this->email= func_get_arg(3);
				$this->adresse= func_get_arg(4);
				$this->telephone= func_get_arg(5);
			}
		}
		/** Getter et Setter de l'attribut "idUtilisateur" **/
		public function getIdUtilisateur(){
			return $this->idUtilisateur;
		}
		public function setIdUtilisateur($idUtilisateur){
			$this->idUtilisateur = $idUtilisateur;
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
		/** Getter et Setter de l'attribut "email" **/
		public function getEmail(){
			return $this->email;
		}
		public function setEmail($email){
			$this->email = $email;
		}
		/** Getter et Setter de l'attribut "adresse" **/
		public function getAdresse(){
			return $this->adresse;
		}
		public function setAdresse($adresse){
			$this->adresse = $adresse;
		}
		/** Getter et Setter de l'attribut "telephone" **/
		public function getTelephone(){
			return $this->telephone;
		}
		public function setTelephone($telephone){
			$this->telephone = $telephone;
		}

		public function random_password( $length = 8 ) {
		    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#%^&*()_-=+;:,.?";
		    $password = substr( str_shuffle( $chars ), 0, $length );
		    return $password;
		}
		//Recherche d'un élément de la table Utilisateur**/
		public function rechercheUtilisateur($id){
			$list = array();

			$requete = Connexion::Connect()->query("SELECT * FROM vutilisateur WHERE idUtilisateur = \"$id\" ");

			//On récupère le résultat de la requete, on le parcours, on le met dans une variable qu'on retourne 
			foreach ($requete as $donnee){
				$list[] = $donnee;
			}
			return $list;
		}
		// Insertion des valeurs 
		/** Fonctions CRUD **/
		public function addUtilisateur($nom, $prenom, $email, $adresse, $telephone, $login, $motDePasse, $idRole, $idStructure) {
			$db = Connexion::Connect();
			try {  			
				$db->beginTransaction();
				$requete = $db->prepare('INSERT INTO utilisateur(idUtilisateur, nom, prenom, email, adresse, telephone) VALUES (?, ?, ?, ?, ?, ?)');
			
				$requete->bindValue(1, NULL);
				$requete->bindValue(2, $nom);
				$requete->bindValue(3, $prenom);
				$requete->bindValue(4, $email);
				$requete->bindValue(5, $adresse);
				$requete->bindValue(6, $telephone);
				$res = $requete->execute();
				$idUtilisateur = $db->lastInsertId();

				$requete1 = $db->prepare('INSERT INTO compte(idCompte, login, motDePasse, idUtilisateur, idRole, idStructure, etat) VALUES (?, ?, ?, ?, ?, ?, ?)');
				
				$requete1->bindValue(1, NULL);
				$requete1->bindValue(2, $login);
				$requete1->bindValue(3, sha1($motDePasse));
				$requete1->bindValue(4, $idUtilisateur);
				$requete1->bindValue(5, $idRole);
				$requete1->bindValue(6, $idStructure);
				$requete1->bindValue(7, 1);
				$res1 = $requete1->execute();

				$db->commit();
				return $res1;
			} catch (Exception $e) {
			  $db->rollBack();
			  echo "Failed: " . $e->getMessage();
			}
		}
		// Modification des valeurs
		public function updateUtilisateur($idUtilisateur, $nom, $prenom, $email, $adresse, $telephone, $login, $idRole, $idStructure, $idCompte) {
			$db = Connexion::Connect();
			try {  			
				$db->beginTransaction();
				$requete = $db->prepare('UPDATE utilisateur SET nom = ?, prenom = ?, email = ?, adresse = ?, telephone = ? WHERE idUtilisateur = ?');
			
				$requete->bindValue(1, $nom);
				$requete->bindValue(2, $prenom);
				$requete->bindValue(3, $email);
				$requete->bindValue(4, $adresse);
				$requete->bindValue(5, $telephone);
				$requete->bindValue(6, $idUtilisateur);
				$res = $requete->execute();

				$requete1 = $db->prepare('UPDATE compte SET login = ?, idRole = ?, idStructure = ? WHERE idCompte = ?');
				
				$requete1->bindValue(1, $login);
				$requete1->bindValue(2, $idRole);
				$requete1->bindValue(3, $idStructure);
				$requete1->bindValue(4, $idCompte);
				$res1 = $requete1->execute();

				$db->commit();
				return $res1;
			} catch (Exception $e) {
			  $db->rollBack();
			  echo "Failed: " . $e->getMessage();
			}
		}

		public function updateProfile($login, $ancienMotDePasse, $nouveauMotDePasse) {
			$db = Connexion::Connect();
			try {  			
				$db->beginTransaction();

				$requete1 = $db->prepare('UPDATE compte SET motDePasse = ? WHERE login = ? AND motDePasse = ?');
				
				$requete1->bindValue(1, sha1($nouveauMotDePasse));
				$requete1->bindValue(2, $login);
				$requete1->bindValue(3, sha1($ancienMotDePasse));
				$res1 = $requete1->execute();

				$db->commit();
				return $res1;
			} catch (Exception $e) {
			  $db->rollBack();
			  echo "Failed: " . $e->getMessage();
			}
		}


		public function changeState($id, $etat) {
			$requete = Connexion::Connect()->prepare('UPDATE compte SET etat = ? WHERE idUtilisateur = ? ');
			$requete->bindValue(1, $etat);
			$requete->bindValue(2, $id);
			$res = $requete->execute(); 
			return($res);
		}

		public function resetPassword($id) {
			$db = Connexion::Connect();
			try {  			
				$db->beginTransaction();

				$requete = Connexion::Connect()->prepare('UPDATE compte SET motDePasse = ? WHERE idUtilisateur = ? ');
				$mdp = $this->random_password(8);
				$requete->bindValue(1, sha1($mdp));
				$requete->bindValue(2, $id);
				$res = $requete->execute();


				$list = array();
	
				$requete1 = $db->query("SELECT email FROM utilisateur WHERE idUtilisateur = \"$id\" ");;
				$email = "";
				/*$requete1->bindValue(1, $id);
				$res1 = $requete1->execute();*/

				foreach ($requete1 as $donnee) {
					$list[] = $donnee;
				}

				foreach ($list as $value) {
					$email = $value['email'];
				}

				$db->commit();
				// return $res1;
				if($res == 1)
					return "1$".$mdp."$".$email;
				else
					return($res);
			} catch (Exception $e) {
			  $db->rollBack();
			  echo "Failed: " . $e->getMessage();
			}
		}
		// Suppression des valeurs
		public function deleteUtilisateur($code) {
			$requete = Connexion::Connect()->prepare('DELETE FROM utilisateur WHERE idUtilisateur = ?');
			$requete->bindValue(1, $code);
			$res = $requete->execute();
			return($res);
		}
		// Liste des utilisateurs 
		public function listUtilisateur(){
			$list = array();

			$requete = Connexion::Connect()->query('SELECT * FROM utilisateur');

			//On récupère le résultat de la requete, on le parcours, on le met dans une variable qu'on retourne 
			foreach ($requete as $donnee) {
				$list[] = $donnee;
			}
			return $list;
		}
		
		public function listUtilisateur2(){
			$list = array();

			$requete = Connexion::Connect()->query('SELECT * FROM vutilisateur');

			//On récupère le résultat de la requete, on le parcours, on le met dans une variable qu'on retourne 
			foreach ($requete as $donnee) {
				$list[] = $donnee;
			}
			return $list;
		}
		
		public function listUtilisateur3($idUtilisateur){
			$list = array();

			$requete = Connexion::Connect()->query("SELECT * FROM utilisateur WHERE idUtilisateur != \"$idUtilisateur\" ");

			//On récupère le résultat de la requete, on le parcours, on le met dans une variable qu'on retourne 
			foreach ($requete as $donnee) {
				$list[] = $donnee;
			}
			return $list;
		}

		public function emailExist($email){
	        $list = array();
	        $requete = Connexion::Connect()->query("SELECT email FROM utilisateur WHERE email = \"$email\" ");
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

	    public function emailExist2($email, $idUtilisateur){
	        $list = array();
	        $requete = Connexion::Connect()->query("SELECT email FROM utilisateur WHERE email = \"$email\" 
	        	AND idUtilisateur != \"$idUtilisateur\"
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

	    public function loginExist($login){
	        $list = array();
	        $requete = Connexion::Connect()->query("SELECT login FROM compte WHERE login = \"$login\" ");
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

	    public function loginExist2($login, $idUtilisateur){
	        $list = array();
	        $requete = Connexion::Connect()->query("SELECT login FROM compte WHERE login = \"$login\" 
	        	AND idUtilisateur != \"$idUtilisateur\"
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

	    public function isLogged($login, $mdp){
	        $list = array();
	        /*On crypte le mot de passe avant la vérification car il est crypté dan sla base de données
			*On exécute la requete
	        */
	        $mdp = sha1($mdp);
	        $requete = Connexion::Connect()->query("SELECT motDePasse FROM vutilisateur WHERE login = \"$login\" AND motDePasse = \"$mdp\" ");
	        /*On parcours le résultat*/
	        foreach ($requete as $donnee){
	            $list[] = $donnee;
			}
			/*Si la taille du taille du tableau est différente de 0, l'vutilisateur est donc conecté. on revoie true*/
	        if(count($list) != 0){
	            return true;
	        }
	        /*Sinon on renvoi false*/
	         else
	            return false;     
	    }

	    public function isActivated($login, $mdp){
	        $list = array();
	        /*On crypte le mot de passe avant la vérification car il est crypté dan sla base de données
			*On exécute la requete
	        */
	        $mdp = sha1($mdp);
	        $requete = Connexion::Connect()->query("SELECT motDePasse FROM vutilisateur WHERE login = \"$login\" AND motDePasse = \"$mdp\" AND etat = 1 ");
	        /*On parcours le résultat*/
	        foreach ($requete as $donnee){
	            $list[] = $donnee;
			}
			/*Si la taille du taille du tableau est différente de 0, l'vutilisateur est donc conecté. on revoie true*/
	        if(count($list) != 0){
	            return true;
	        }
	        /*Sinon on renvoi false*/
	         else
	            return false;     
	    }

	    public function detailsUtilisateur($login, $mdp){
			$list = array();

			$requete = Connexion::Connect()->query("SELECT * FROM vutilisateur WHERE login = \"$login\" AND motDePasse = \"$mdp\" ");

			foreach ($requete as $donnee){
				$list[] = $donnee;
			}
			return $list;
		}	
	}
?>