<?php
	require_once('classeConnexion.php'); 
	// CLASSE ROLE 
	/** Attributs de la classe "Role" **/
	class Role {
		private $idRole;
		private $libelle;

		/** Constructeur ... **/
		public function __construct(){
			//récupération du nombre d'arguments
			$nb= func_num_args();
			// S'il n'y a pas de paramètre, on initialise les variables à une valeur nulle
			if ($nb == 0) {
				$this->idRole= "";
				$this->libelle= "";
			}
			/*Sinon s'il y a des paramètres on donne aux variables les valeurs des paramètres
	La fonction func_get_arg() recupère la valeur de l'argument à la position qui lui est donnée en paramètre*/
			if ($nb != 0) {
				$this->idRole= func_get_arg(0);
				$this->libelle= func_get_arg(1);
			}
		}
		/** Getter et Setter de l'attribut "idRole" **/
		public function getIdRole(){
			return $this->idRole;
		}
		public function setIdRole($idRole){
			$this->idRole = $idRole;
		}
		/** Getter et Setter de l'attribut "libelle" **/
		public function getLibelle(){
			return $this->libelle;
		}
		public function setLibelle($libelle){
			$this->libelle = $libelle;
		}
		//Recherche d'un élément de la table Role**/
		public function rechercheRole($id){
			$list = array();

			$requete = Connexion::Connect()->query("SELECT * FROM role WHERE idRole = \"$id\" ");

			//On récupère le résultat de la requete, on le parcours, on le met dans une variable qu'on retourne 
			foreach ($requete as $donnee){
				$list[] = $donnee;
			}
			return $list;
		}
		// Insertion des valeurs 
		/** Fonctions CRUD **/
		public function addRole() {
			$list = $this->rechercheRole($this->getIdRole());
			$res = -1;
			/**Si aucun élément n'est trouvé**/
			if(count($list) == 0){ /**Preparation de la requete d'insertion**/
				$requete = Connexion::Connect()->prepare('INSERT INTO role(idRole, libelle) VALUES (?, ?)');
				/**La fonction bindValue associe une valeur à un paramètre**
	**Execution de la requete
	**On retourne le resultat de la requete
	**/
				$requete->bindValue(1, $this->getIdRole());
				$requete->bindValue(2, $this->getLibelle());
				$res = $requete->execute();
			}
			return($res);
		}
		// Modification des valeurs
		public function updateRole() {
			$list = $this->rechercheRole($this->getIdRole());
			$res = -1;
			/**Si un élément est trouvé**/
			if(count($list) != 0){ /**Preparation de la requete de mise à jour**/
				$requete = Connexion::Connect()->prepare('UPDATE role SET libelle = ? WHERE idRole = ? ');
				/**La fonction bindValue associe une valeur à un paramètre**
	**Execution de la requete
	**On retourne le resultat de la requete
	**/
				$requete->bindValue(1, $this->getLibelle());
				$requete->bindValue(2, $this->getIdRole());
				$res = $requete->execute(); 
			}
			return($res);
		}
		// Suppression des valeurs
		public function deleteRole($code) {
			$list = $this->rechercheRole($code);
			$res = -1;
			/**Si un élément est trouvé**/
			if(count($list) != 0){ /**Preparation de la requete de suppression**/
				$requete = Connexion::Connect()->prepare('DELETE FROM role WHERE idRole = ?');
				/**La fonction bindValue associe une valeur à un paramètre**
	**Execution de la requete
	**On retourne le resultat de la requete
	**/
				$requete->bindValue(1, $code);
				$res = $requete->execute();
			}
			return($res);
		}
		// Liste des roles 
		public function listRole(){
			$list = array();

			$requete = Connexion::Connect()->query('SELECT * FROM role');

			//On récupère le résultat de la requete, on le parcours, on le met dans une variable qu'on retourne 
			foreach ($requete as $donnee) {
				$list[] = $donnee;
			}
			return $list;
		}

		public function libelleExist($libelle){
	        $list = array();
	        $requete = Connexion::Connect()->query("SELECT libelle FROM role WHERE libelle = \"$libelle\" ");
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

	    public function libelleExist2($libelle, $idRole){
	        $list = array();
	        $requete = Connexion::Connect()->query("SELECT libelle FROM role WHERE libelle = \"$libelle\" 
	        	AND idRole != \"$idRole\"
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