<?php
    require_once('classeConnexion.php');
    // CLASSE Fournisseur
    /** Attributs de la classe "Fournisseur" **/
    class Fournisseur {
        private $idFournisseur;
        private $prenomFournisseur;
        private $nomFournisseur;
        private $adresseFournisseur;
        private $telephoneFournisseur;
        private $emailFournisseur;
        private $paysFournisseur;
		private $photoFournisseur;
        private $dateAjout;
        private $etat;

        /** Constructeur ... **/
        public function __construct(){
            //récupération du nombre d'arguments
            $nb= func_num_args();
            // S'il n'y a pas de paramètre, on initialise les variables à une valeur nulle
            if ($nb == 0) {
                $this->idFournisseur= "";
                $this->prenomFournisseur= "";
                $this->nomFournisseur= "";
                $this->adresseFournisseur= "";
                $this->paysFournisseur= "";
                $this->telephoneFournisseur= "";
                $this->emailFournisseur= "";
                $this->photoFournisseur= "";
                $this->dateAjout= "";
                $this->etat= "";
            }
            /*Sinon s'il y a des paramètres on donne aux variables les valeurs des paramètres
    La fonction func_get_arg() recupère la valeur de l'argument à la position qui lui est donnée en paramètre*/
            if ($nb != 0) {
                $this->idFournisseur= func_get_arg(0);
                $this->prenomFournisseur= func_get_arg(1);
                $this->nomFournisseur= func_get_arg(2);
                $this->adresseFournisseur= func_get_arg(3);
                $this->paysFournisseur= func_get_arg(4);
                $this->telephoneFournisseur= func_get_arg(5);
                $this->emailFournisseur= func_get_arg(6);
                $this->photoFournisseur= func_get_arg(7);
                $this->dateAjout= func_get_arg(8);
                $this->etat= func_get_arg(9);
            }
        }
        /** Getter et Setter de l'attribut "idFournisseur" **/
        public function getIdFournisseur(){
            return $this->idFournisseur;
        }
        public function setIdFournisseur($idFournisseur){
            $this->idFournisseur = $idFournisseur;
        }
        /** Getter et Setter de l'attribut "prenomFournisseur" **/
        public function getPrenomFournisseur(){
            return $this->prenomFournisseur;
        }
        public function setPrenomFournisseur($prenomFournisseur){
            $this->prenomFournisseur = $prenomFournisseur;
        }
        /** Getter et Setter de l'attribut "nomFournisseur" **/
        public function getNomFournisseur(){
            return $this->nomFournisseur;
        }
        public function setNomFournisseur($nomFournisseur){
            $this->nomFournisseur = $nomFournisseur;
        }
        /** Getter et Setter de l'attribut "adresseFournisseur" **/
        public function getAdresseFournisseur(){
            return $this->adresseFournisseur;
        }
        public function setAdresseFournisseur($adresseFournisseur){
            $this->adresseFournisseur = $adresseFournisseur;
        }
        
        /** Getter et Setter de l'attribut "telephoneFournisseur" **/
        public function getTelephoneFournisseur(){
            return $this->telephoneFournisseur;
        }
        public function setTelephoneFournisseur($telephoneFournisseur){
            $this->telephoneFournisseur = $telephoneFournisseur;
        }
        /** Getter et Setter de l'attribut "emailFournisseur" **/
        public function getEmailFournisseur(){
            return $this->emailFournisseur;
        }
        public function setEmailFournisseur($emailFournisseur){
            $this->emailFournisseur = $emailFournisseur;
        }

         /** Getter et Setter de l'attribut "paysFournisseur" **/
         public function getPaysFournisseur(){
            return $this->paysFournisseur;
        }
        public function setPaysFournisseur($paysFournisseur){
            $this->paysFournisseur = $paysFournisseur;
        }


        	/** Getter et Setter de l'attribut "photoFournisseur" **/
		public function getPhotoFournisseur(){
			return $this->photoFournisseur;
		}
		public function setPhotoFournisseur($photoFournisseur){
			$this->photoFournisseur = $photoFournisseur;
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


        //Recherche d'un élément de la table Fournisseur**/
		public function rechercheFournisseur($id){
			$list = array();

			$requete = Connexion::Connect()->query("SELECT * FROM Fournisseur WHERE idFournisseur = \"$id\" ");

			//On récupère le résultat de la requete, on le parcours, on le met dans une variable qu'on retourne 
			foreach ($requete as $donnee){
				$list[] = $donnee;
			}
			return $list;
		}
		// Insertion des valeurs 
		/** Fonctions CRUD **/
		public function addFournisseur() {
			$requete = Connexion::Connect()->prepare('INSERT INTO fournisseur(idFournisseur, prenomFournisseur, nomFournisseur, adresseFournisseur, paysFournisseur, telephoneFournisseur, emailFournisseur, photoFournisseur, dateAjout, etat) VALUES (?, ?, ?, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP, ?)');
			$requete->bindValue(1, $this->getIdFournisseur());
			$requete->bindValue(2, $this->getPrenomFournisseur());
			$requete->bindValue(3, $this->getNomFournisseur());
			$requete->bindValue(4, $this->getAdresseFournisseur());
			$requete->bindValue(5, $this->getPaysFournisseur());
			$requete->bindValue(6, $this->getTelephoneFournisseur());
			$requete->bindValue(7, $this->getEmailFournisseur());
			$requete->bindValue(8, $this->getPhotoFournisseur());
			
            $requete->bindValue(9, $this->getEtat());
			$res = $requete->execute();
			return($res);
		}
		// Modification des valeurs
		public function updateFournisseur() {
			$requete = Connexion::Connect()->prepare('UPDATE fournisseur SET prenomFournisseur = ?, nomFournisseur = ?, adresseFournisseur = ?, paysFournisseur = ?, telephoneFournisseur = ?, emailFournisseur = ?, photoFournisseur = ?, dateAjout = CURRENT_TIMESTAMP, etat = ? WHERE idFournisseur = ? ');
			$requete->bindValue(1, $this->getPrenomFournisseur());
			$requete->bindValue(2, $this->getNomFournisseur());
			$requete->bindValue(3, $this->getAdresseFournisseur());
			$requete->bindValue(4, $this->getPaysFournisseur());
			$requete->bindValue(5, $this->getTelephoneFournisseur());
			$requete->bindValue(6, $this->getEmailFournisseur());
			$requete->bindValue(7, $this->getPhotoFournisseur());
			$requete->bindValue(8, $this->getEtat());
			$requete->bindValue(9, $this->getIdFournisseur());
			$res = $requete->execute(); 
		return($res);
        var_dump($res);

		}
		// Suppression des valeurs
		public function deleteFournisseur($code) {
			$requete = Connexion::Connect()->prepare('DELETE FROM fournisseur WHERE idFournisseur = ?');
			$requete->bindValue(1, $code);
			$res = $requete->execute();
			return($res);
		}

        public function listFournisseur(){
            $list = array();
            $requete = Connexion::Connect()->query("SELECT * FROM fournisseur");
            foreach ($requete as $donnee){
                $list[] = $donnee;
            }
        
            return $list;

        }
        
    
    
        

        

    
    }
?>
