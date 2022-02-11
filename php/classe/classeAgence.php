<?php
	require_once('classeConnexion.php'); 
	// CLASSE AGENCE 
	/** Attributs de la classe "Agence" **/
	class Agence {
		private $idAgence;
		private $agence;
		private $siege;
		private $tel;
		private $fax;
		private $email;
		private $site;
		private $ninea;
		private $rc;
		private $logo;
		private $devisPiedconcl;
		private $devisPiednta;
		private $dateAjout;
		private $etat;

		/** Constructeur ... **/
		public function __construct(){
			//récupération du nombre d'arguments
			$nb= func_num_args();
			// S'il n'y a pas de paramètre, on initialise les variables à une valeur nulle
			if ($nb == 0) {
				$this->idAgence= "";
				$this->agence= "";
				$this->siege= "";
				$this->tel= "";
				$this->fax= "";
				$this->email= "";
				$this->site= "";
				$this->ninea= "";
				$this->rc= "";
				$this->logo= "";
				$this->devisPiedconcl= "";
				$this->devisPiednta= "";
				$this->dateAjout= "";
				$this->etat= "";
			}
			/*Sinon s'il y a des paramètres on donne aux variables les valeurs des paramètres
	La fonction func_get_arg() recupère la valeur de l'argument à la position qui lui est donnée en paramètre*/
			if ($nb != 0) {
				$this->idAgence= func_get_arg(0);
				$this->agence= func_get_arg(1);
				$this->siege= func_get_arg(2);
				$this->tel= func_get_arg(3);
				$this->fax= func_get_arg(4);
				$this->email= func_get_arg(5);
				$this->site= func_get_arg(6);
				$this->ninea= func_get_arg(7);
				$this->rc= func_get_arg(8);
				$this->logo= func_get_arg(9);
				$this->devisPiedconcl= func_get_arg(10);
				$this->devisPiednta= func_get_arg(11);
				$this->dateAjout= func_get_arg(12);
				$this->etat= func_get_arg(13);
			}
		}
		/** Getter et Setter de l'attribut "idAgence" **/
		public function getIdAgence(){
			return $this->idAgence;
		}
		public function setIdAgence($idAgence){
			$this->idAgence = $idAgence;
		}
		/** Getter et Setter de l'attribut "agence" **/
		public function getAgence(){
			return $this->agence;
		}
		public function setAgence($agence){
			$this->agence = $agence;
		}
		/** Getter et Setter de l'attribut "siege" **/
		public function getSiege(){
			return $this->siege;
		}
		public function setSiege($siege){
			$this->siege = $siege;
		}
		/** Getter et Setter de l'attribut "tel" **/
		public function getTel(){
			return $this->tel;
		}
		public function setTel($tel){
			$this->tel = $tel;
		}
		/** Getter et Setter de l'attribut "fax" **/
		public function getFax(){
			return $this->fax;
		}
		public function setFax($fax){
			$this->fax = $fax;
		}
		/** Getter et Setter de l'attribut "email" **/
		public function getEmail(){
			return $this->email;
		}
		public function setEmail($email){
			$this->email = $email;
		}
		/** Getter et Setter de l'attribut "site" **/
		public function getSite(){
			return $this->site;
		}
		public function setSite($site){
			$this->site = $site;
		}
		/** Getter et Setter de l'attribut "ninea" **/
		public function getNinea(){
			return $this->ninea;
		}
		public function setNinea($ninea){
			$this->ninea = $ninea;
		}
		/** Getter et Setter de l'attribut "rc" **/
		public function getRc(){
			return $this->rc;
		}
		public function setRc($rc){
			$this->rc = $rc;
		}
		/** Getter et Setter de l'attribut "logo" **/
		public function getLogo(){
			return $this->logo;
		}
		public function setLogo($logo){
			$this->logo = $logo;
		}
		/** Getter et Setter de l'attribut "devisPiedconcl" **/
		public function getDevisPiedconcl(){
			return $this->devisPiedconcl;
		}
		public function setDevisPiedconcl($devisPiedconcl){
			$this->devisPiedconcl = $devisPiedconcl;
		}
		/** Getter et Setter de l'attribut "devisPiednta" **/
		public function getDevisPiednta(){
			return $this->devisPiednta;
		}
		public function setDevisPiednta($devisPiednta){
			$this->devisPiednta = $devisPiednta;
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
		//Recherche d'un élément de la table Agence**/
		public function rechercheAgence($id){
			$list = array();

			$requete = Connexion::Connect()->query("SELECT * FROM agence WHERE idAgence = \"$id\" ");

			//On récupère le résultat de la requete, on le parcours, on le met dans une variable qu'on retourne 
			foreach ($requete as $donnee){
				$list[] = $donnee;
			}
			return $list;
		}
		// Insertion des valeurs 
		/** Fonctions CRUD **/
		public function addAgence() {
			$list = $this->rechercheAgence($this->getIdAgence());
			$res = -1;
			/**Si aucun élément n'est trouvé**/
			if(count($list) == 0){ /**Preparation de la requete d'insertion**/
				$requete = Connexion::Connect()->prepare('INSERT INTO agence(idAgence, agence, siege, tel, fax, email, site, ninea, rc, logo, devisPiedconcl, devisPiednta, dateAjout, etat) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
				/**La fonction bindValue associe une valeur à un paramètre**
	**Execution de la requete
	**On retourne le resultat de la requete
	**/
				$requete->bindValue(1, $this->getIdAgence());
				$requete->bindValue(2, $this->getAgence());
				$requete->bindValue(3, $this->getSiege());
				$requete->bindValue(4, $this->getTel());
				$requete->bindValue(5, $this->getFax());
				$requete->bindValue(6, $this->getEmail());
				$requete->bindValue(7, $this->getSite());
				$requete->bindValue(8, $this->getNinea());
				$requete->bindValue(9, $this->getRc());
				$requete->bindValue(10, $this->getLogo());
				$requete->bindValue(11, $this->getDevisPiedconcl());
				$requete->bindValue(12, $this->getDevisPiednta());
				$requete->bindValue(13, $this->getDateAjout());
				$requete->bindValue(14, $this->getEtat());
				$res = $requete->execute();
			}
			return($res);
		}
		// Modification des valeurs
		public function updateAgence() {
			$list = $this->rechercheAgence($this->getIdAgence());
			$res = -1;
			/**Si un élément est trouvé**/
			if(count($list) != 0){ /**Preparation de la requete de mise à jour**/
				$requete = Connexion::Connect()->prepare('UPDATE agence SET agence = ?, siege = ?, tel = ?, fax = ?, email = ?, site = ?, ninea = ?, rc = ?, logo = ?, devisPiedconcl = ?, devisPiednta = ?, dateAjout = ?, etat = ? WHERE idAgence = ? ');
				/**La fonction bindValue associe une valeur à un paramètre**
	**Execution de la requete
	**On retourne le resultat de la requete
	**/
				$requete->bindValue(1, $this->getAgence());
				$requete->bindValue(2, $this->getSiege());
				$requete->bindValue(3, $this->getTel());
				$requete->bindValue(4, $this->getFax());
				$requete->bindValue(5, $this->getEmail());
				$requete->bindValue(6, $this->getSite());
				$requete->bindValue(7, $this->getNinea());
				$requete->bindValue(8, $this->getRc());
				$requete->bindValue(9, $this->getLogo());
				$requete->bindValue(10, $this->getDevisPiedconcl());
				$requete->bindValue(11, $this->getDevisPiednta());
				$requete->bindValue(12, $this->getDateAjout());
				$requete->bindValue(13, $this->getEtat());
				$requete->bindValue(14, $this->getIdAgence());
				$res = $requete->execute(); 
			}
			return($res);
		}
		// Suppression des valeurs
		public function deleteAgence($code) {
			$list = $this->rechercheAgence($code);
			$res = -1;
			/**Si un élément est trouvé**/
			if(count($list) != 0){ /**Preparation de la requete de suppression**/
				$requete = Connexion::Connect()->prepare('DELETE FROM agence WHERE idAgence = ?');
				/**La fonction bindValue associe une valeur à un paramètre**
	**Execution de la requete
	**On retourne le resultat de la requete
	**/
				$requete->bindValue(1, $code);
				$res = $requete->execute();
			}
			return($res);
		}
		// Liste des agences 
		public function listAgence(){
			$list = array();

			$requete = Connexion::Connect()->query('SELECT * FROM agence');

			//On récupère le résultat de la requete, on le parcours, on le met dans une variable qu'on retourne 
			foreach ($requete as $donnee) {
				$list[] = $donnee;
			}
			return $list;
		}	
	}
?>