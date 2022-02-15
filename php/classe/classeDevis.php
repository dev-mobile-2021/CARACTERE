<?php
require_once('classeConnexion.php');
// CLASSE DEVIS 
/** Attributs de la classe "Devis" **/
class Devis
{
	private $idDevis;
	private $numeroDevis;
	private $contact;
	private $objet;
	private $campagne;
	private $commissionProduction;
	private $conditionPaiement;
	private $commentaire;
	private $idResponsable;
	private $idClient;

	private $idTypetaxe;
	private $idAgence;
	private $idTypedevis;
	private $idEtat;
	private $idValideur;
	private $dateAjout;
	private $etat;
	private $idFournisseur;
	private $nomFournisseur;
	private $prenomFournisseur;





	/** Constructeur ... **/
	public function __construct()
	{
		//récupération du nombre d'arguments
		$nb = func_num_args();
		// S'il n'y a pas de paramètre, on initialise les variables à une valeur nulle
		if ($nb == 0) {
			$this->idDevis = "";
			$this->numeroDevis = "";
			$this->contact = "";
			$this->objet = "";
			$this->campagne = "";
			$this->commissionProduction = "";
			$this->conditionPaiement = "";
			$this->commentaire = "";
			$this->idResponsable = "";
			$this->idClient = "";
			$this->idTypetaxe = "";
			$this->idAgence = "";
			$this->idTypedevis = "";
			$this->idEtat = "";
			$this->idValideur = "";
			$this->dateAjout = "";
			$this->etat = "";
		}
		/*Sinon s'il y a des paramètres on donne aux variables les valeurs des paramètres
	La fonction func_get_arg() recupère la valeur de l'argument à la position qui lui est donnée en paramètre*/
		if ($nb != 0) {
			$this->idDevis = func_get_arg(0);
			$this->numeroDevis = func_get_arg(1);
			$this->contact = func_get_arg(2);
			$this->objet = func_get_arg(3);
			$this->campagne = func_get_arg(4);
			$this->commissionProduction = func_get_arg(5);
			$this->conditionPaiement = func_get_arg(6);
			$this->commentaire = func_get_arg(7);
			$this->idResponsable = func_get_arg(8);
			$this->idClient = func_get_arg(9);
			$this->idTypetaxe = func_get_arg(10);
			$this->idAgence = func_get_arg(11);
			$this->idTypedevis = func_get_arg(12);
			$this->idEtat = func_get_arg(13);
			$this->idValideur = func_get_arg(14);
			$this->dateAjout = func_get_arg(15);
			$this->etat = func_get_arg(16);
		}
	}
	/** Getter et Setter de l'attribut "idDevis" **/
	public function getIdDevis()
	{
		return $this->idDevis;
	}
	public function setIdDevis($idDevis)
	{
		$this->idDevis = $idDevis;
	}
	/** Getter et Setter de l'attribut "numeroDevis" **/
	public function getNumeroDevis()
	{
		return $this->numeroDevis;
	}
	public function setNumeroDevis($numeroDevis)
	{
		$this->numeroDevis = $numeroDevis;
	}
	/** Getter et Setter de l'attribut "contact" **/
	public function getContact()
	{
		return $this->contact;
	}
	public function setContact($contact)
	{
		$this->contact = $contact;
	}
	/** Getter et Setter de l'attribut "objet" **/
	public function getObjet()
	{
		return $this->objet;
	}
	public function setObjet($objet)
	{
		$this->objet = $objet;
	}
	/** Getter et Setter de l'attribut "campagne" **/
	public function getCampagne()
	{
		return $this->campagne;
	}
	public function setCampagne($campagne)
	{
		$this->campagne = $campagne;
	}
	/** Getter et Setter de l'attribut "commissionProduction" **/
	public function getCommissionProduction()
	{
		return $this->commissionProduction;
	}
	public function setCommissionProduction($commissionProduction)
	{
		$this->commissionProduction = $commissionProduction;
	}
	/** Getter et Setter de l'attribut "conditionPaiement" **/
	public function getConditionPaiement()
	{
		return $this->conditionPaiement;
	}
	public function setConditionPaiement($conditionPaiement)
	{
		$this->conditionPaiement = $conditionPaiement;
	}
	/** Getter et Setter de l'attribut "commentaire" **/
	public function getCommentaire()
	{
		return $this->commentaire;
	}
	public function setCommentaire($commentaire)
	{
		$this->commentaire = $commentaire;
	}
	/** Getter et Setter de l'attribut "idResponsable" **/
	public function getIdResponsable()
	{
		return $this->idResponsable;
	}
	public function setIdResponsable($idResponsable)
	{
		$this->idResponsable = $idResponsable;
	}
	/** Getter et Setter de l'attribut "idClient" **/
	public function getIdClient()
	{
		return $this->idClient;
	}
	public function setIdClient($idClient)
	{
		$this->idClient = $idClient;
	}

	/** Getter et Setter de l'attribut "idFournisseur" **/
	// public function getIdFournisseur()
	// {
	// 	return $this->idFournisseur;
	// }
	// public function setIdFournisseur($idFournisseur)
	// {
	// 	$this->idFournisseur = $idFournisseur;
	// }
	/** Getter et Setter de l'attribut "idTypetaxe" **/
	public function getIdTypetaxe()
	{
		return $this->idTypetaxe;
	}
	public function setIdTypetaxe($idTypetaxe)
	{
		$this->idTypetaxe = $idTypetaxe;
	}
	/** Getter et Setter de l'attribut "idAgence" **/
	public function getIdAgence()
	{
		return $this->idAgence;
	}
	public function setIdAgence($idAgence)
	{
		$this->idAgence = $idAgence;
	}
	/** Getter et Setter de l'attribut "idTypedevis" **/
	public function getIdTypedevis()
	{
		return $this->idTypedevis;
	}
	public function setIdTypedevis($idTypedevis)
	{
		$this->idTypedevis = $idTypedevis;
	}
	/** Getter et Setter de l'attribut "idEtat" **/
	public function getIdEtat()
	{
		return $this->idEtat;
	}
	public function setIdEtat($idEtat)
	{
		$this->idEtat = $idEtat;
	}
	/** Getter et Setter de l'attribut "idValideur" **/
	public function getIdValideur()
	{
		return $this->idValideur;
	}
	public function setIdValideur($idValideur)
	{
		$this->idValideur = $idValideur;
	}
	/** Getter et Setter de l'attribut "dateAjout" **/
	public function getDateAjout()
	{
		return $this->dateAjout;
	}
	public function setDateAjout($dateAjout)
	{
		$this->dateAjout = $dateAjout;
	}
	/** Getter et Setter de l'attribut "etat" **/
	public function getEtat()
	{
		return $this->etat;
	}
	public function setEtat($etat)
	{
		$this->etat = $etat;
	}
	//Recherche d'un élément de la table Devis**/
	public function rechercheDevis($id)
	{
		$list = array();

		$requete = Connexion::Connect()->query("SELECT * FROM devis WHERE idDevis = \"$id\" ");

		//On récupère le résultat de la requete, on le parcours, on le met dans une variable qu'on retourne 
		foreach ($requete as $donnee) {
			$list[] = $donnee;
		}
		return $list;
	}
	// Insertion des valeurs 
	/** Fonctions CRUD **/
	public function addDevis($taxeMunicipale, $hasRemise, $typeRemise, $valeurRemise)
	{
		$db = Connexion::Connect();

		$requete = $db->prepare('INSERT INTO devis(idDevis, numeroDevis, contact, objet, campagne, commissionProduction, taxeMunicipale, hasRemise, typeRemise, valeurRemise, conditionPaiement, commentaire, idResponsable, idClient, idTypetaxe, idAgence, idTypedevis, idEtat, idValideur, dateAjout, etat) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP, 1)');
		$requete->bindValue(1, $this->getIdDevis());
		$requete->bindValue(2, $this->getNumeroDevis());
		$requete->bindValue(3, $this->getContact());
		$requete->bindValue(4, $this->getObjet());
		$requete->bindValue(5, $this->getCampagne());
		$requete->bindValue(6, $this->getCommissionProduction());
		$requete->bindValue(7, $taxeMunicipale);
		$requete->bindValue(8, $hasRemise);
		$requete->bindValue(9, $typeRemise);
		$requete->bindValue(10, $valeurRemise);
		$requete->bindValue(11, $this->getConditionPaiement());
		$requete->bindValue(12, $this->getCommentaire());
		$requete->bindValue(13, $this->getIdResponsable());
		$requete->bindValue(14, $this->getIdClient());
		$requete->bindValue(15, $this->getIdTypetaxe());
		$requete->bindValue(16, $this->getIdAgence());
		$requete->bindValue(17, $this->getIdTypedevis());
		$requete->bindValue(18, $this->getIdEtat());
		$requete->bindValue(19, $this->getIdValideur());
		$res = $requete->execute();
		$idDevis = $db->lastInsertId();

		$_SESSION['idDevisZelda'] = $idDevis;
		return ($idDevis);
	}

	public function addServiceDevis($idDevis, $idRubrique, $idFamille, $idTypeservice, $idService, $prixAchat, $prixVente, $quantite)
	{
		$requete = Connexion::Connect()->prepare('INSERT INTO detailsdevis(idDetailsdevis, idDevis, idRubrique, idFamille, idTypeservice, idService, prixAchat, prixVente, quantite, dateAjout, etat) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP, ?)');
		$requete->bindValue(1, NULL);
		$requete->bindValue(2, $idDevis);
		$requete->bindValue(3, $idRubrique);
		$requete->bindValue(4, $idFamille);
		$requete->bindValue(5, $idTypeservice);
		$requete->bindValue(6, $idService);
		$requete->bindValue(7, $prixAchat);
		$requete->bindValue(8, $prixVente);
		$requete->bindValue(9, $quantite);
		$requete->bindValue(10, 1);
		$res = $requete->execute();
		return ($res);
	}


	// Modification des valeurs
	public function updateDevis($taxeMunicipale, $hasRemise, $typeRemise, $valeurRemise)
	{
		$requete = Connexion::Connect()->prepare('UPDATE devis SET contact = ?, objet = ?, campagne = ?, commissionProduction = ?, conditionPaiement = ?, commentaire = ?, idResponsable = ?, idClient = ?, idTypetaxe = ?, idAgence = ?, idTypedevis = ?, idEtat = ?, idValideur = ?, taxeMunicipale = ? , hasRemise = ? , typeRemise = ? , valeurRemise = ? WHERE idDevis = ? ');

		$requete->bindValue(1, $this->getContact());
		$requete->bindValue(2, $this->getObjet());
		$requete->bindValue(3, $this->getCampagne());
		$requete->bindValue(4, $this->getCommissionProduction());
		$requete->bindValue(5, $this->getConditionPaiement());
		$requete->bindValue(6, $this->getCommentaire());
		$requete->bindValue(7, $this->getIdResponsable());
		$requete->bindValue(8, $this->getIdClient());
		$requete->bindValue(9, $this->getIdTypetaxe());
		$requete->bindValue(10, $this->getIdAgence());
		$requete->bindValue(11, $this->getIdTypedevis());
		$requete->bindValue(12, $this->getIdEtat());
		$requete->bindValue(13, $this->getIdValideur());
		$requete->bindValue(14, $taxeMunicipale);
		$requete->bindValue(15, $hasRemise);
		$requete->bindValue(16, $typeRemise);
		$requete->bindValue(17, $valeurRemise);
		$requete->bindValue(18, $this->getIdDevis());
		$res = $requete->execute();
		if ($res == 1)
			return ($this->getIdDevis());
		else return $res;
	}


	public function updateService($idDevis, $idRubrique, $idFamille, $idTypeservice, $idServiceMod, $prixAchat, $prixVente, $quantite)
	{
		$requete = Connexion::Connect()->prepare('UPDATE detailsdevis SET prixAchat = ?, prixVente = ?, quantite = ? WHERE idService = ? AND idDevis = ? AND idRubrique = ? AND idFamille = ? AND idTypeservice = ? ');

		$requete->bindValue(1, $prixAchat);
		$requete->bindValue(2, $prixVente);
		$requete->bindValue(3, $quantite);
		$requete->bindValue(4, $idServiceMod);
		$requete->bindValue(5, $idDevis);
		$requete->bindValue(6, $idRubrique);
		$requete->bindValue(7, $idFamille);
		$requete->bindValue(8, $idTypeservice);
		$res = $requete->execute();
		return ($res);
	}

	public function validerDevis($idDevis, $idUser, $niveau)
	{
		$db = Connexion::Connect();
		try {
			$db->beginTransaction();
			$requete = $db->prepare('UPDATE devis SET idEtat = ?, idValideur = ? WHERE idDevis = ?');
			$requete->bindValue(1, 2);
			$requete->bindValue(2, $idUser);
			$requete->bindValue(3, $idDevis);
			$res = $requete->execute();

			$requete1 = $db->prepare('UPDATE devisvalideresponsable SET etat = 0 WHERE idDevis = ?');
			$requete1->bindValue(1, $idDevis);
			$res1 = $requete1->execute();

			$requete2 = $db->prepare('INSERT INTO devisvalideresponsable(idDevisvalideresponsable, idDevis, idUser, niveau, etat) VALUES(?, ?, ?, ?, ?)');
			$requete2->bindValue(1, NULL);
			$requete2->bindValue(2, $idDevis);
			$requete2->bindValue(3, $idUser);
			$requete2->bindValue(4, $niveau);
			$requete2->bindValue(5, 1);
			$res2 = $requete2->execute();

			$db->commit();
			return $res2;
		} catch (Exception $e) {
			$db->rollBack();
			echo "Failed: " . $e->getMessage();
		}
	}

	public function validationClient($idDevis, $idUser, $nomValideur, $dateValidation)
	{
		$db = Connexion::Connect();
		try {
			$db->beginTransaction();
			$requete = $db->prepare('UPDATE devis SET idEtat = ?, idValideur = ? WHERE idDevis = ?');
			$requete->bindValue(1, 3);
			$requete->bindValue(2, $idUser);
			$requete->bindValue(3, $idDevis);
			$res = $requete->execute();

			$requete1 = $db->prepare('UPDATE devisvalideclient SET etat = 0 WHERE idDevis = ?');
			$requete1->bindValue(1, $idDevis);
			$res1 = $requete1->execute();

			$requete2 = $db->prepare('INSERT INTO devisvalideclient(idDevisvalideclient, idDevis, idUser, nomValideur, dateValidation, etat) VALUES(?, ?, ?, ?, ?, ?)');
			$requete2->bindValue(1, NULL);
			$requete2->bindValue(2, $idDevis);
			$requete2->bindValue(3, $idUser);
			$requete2->bindValue(4, $nomValideur);
			$requete2->bindValue(5, $dateValidation);
			$requete2->bindValue(6, 1);
			$res2 = $requete2->execute();

			$db->commit();
			return $res2;
		} catch (Exception $e) {
			$db->rollBack();
			echo "Failed: " . $e->getMessage();
		}
	}
	public function hasBC($idDevis)
	{
		$list = array();
		$requete = Connexion::Connect()->query("SELECT idDevis FROM devisbc WHERE idDevis = \"$idDevis\" AND etat = 1 
				");
		/*On parcours le résultat*/
		foreach ($requete as $donnee) {
			$list[] = $donnee;
		}
		/*Si la taille du taille du tableau est différente de 0, l'user est donc conecté. on revoie true*/
		if (count($list) != 0) {
			return true;
		}
		/*Sinon on renvoi false*/ else
			return false;
	}
	public function receptionbc($idDevis, $idUser, $numBc, $dateBc)
	{
		$db = Connexion::Connect();
		try {
			$db->beginTransaction();
			$requete = $db->prepare('UPDATE devis SET idEtat = IF(idEtat <> 5,?,5), idValideur = ? WHERE idDevis = ?');
			$requete->bindValue(1, 4);
			$requete->bindValue(2, $idUser);
			$requete->bindValue(3, $idDevis);
			$res = $requete->execute();

			$requete1 = $db->prepare('UPDATE devisbc SET etat = 0 WHERE idDevis = ?');
			$requete1->bindValue(1, $idDevis);
			$res1 = $requete1->execute();

			$requete2 = $db->prepare('INSERT INTO devisbc(idDevisbc, idDevis, idUser, numBc, dateBc, etat) VALUES(?, ?, ?, ?, ?, ?)');
			$requete2->bindValue(1, NULL);
			$requete2->bindValue(2, $idDevis);
			$requete2->bindValue(3, $idUser);
			$requete2->bindValue(4, $numBc);
			$requete2->bindValue(5, $dateBc);
			$requete2->bindValue(6, 1);
			$res2 = $requete2->execute();

			$db->commit();
			return $res2;
		} catch (Exception $e) {
			$db->rollBack();
			echo "Failed: " . $e->getMessage();
		}
	}
	// Suppression des valeurs
	public function deleteDevis($code)
	{
		$requete = Connexion::Connect()->prepare('DELETE FROM devis WHERE idDevis = ?');
		$requete->bindValue(1, $code);
		$res = $requete->execute();
		return ($res);
	}

	public function deleteServiceDevis($idDevis, $idRubrique, $idFamille, $idTypeservice, $idServiceMod)
	{
		$requete = Connexion::Connect()->prepare('DELETE FROM detailsdevis WHERE idService = ? AND idDevis = ? AND idRubrique = ? AND idFamille = ? AND idTypeservice = ?');
		$requete->bindValue(1, $idServiceMod);
		$requete->bindValue(2, $idDevis);
		$requete->bindValue(3, $idRubrique);
		$requete->bindValue(4, $idFamille);
		$requete->bindValue(5, $idTypeservice);
		$res = $requete->execute();
		return ($res);
	}

	public function deleteTypeServiceDevis($idDevis, $idRubrique, $idFamille, $idTypeservice)
	{
		$requete = Connexion::Connect()->prepare('DELETE FROM detailstypeservice WHERE idDevis = ? AND idRubrique = ? AND idFamille = ? AND idTypeservice = ?');
		$requete->bindValue(1, $idDevis);
		$requete->bindValue(2, $idRubrique);
		$requete->bindValue(3, $idFamille);
		$requete->bindValue(4, $idTypeservice);
		$res = $requete->execute();
		return ($res);
	}

	public function deleteFamille($idDevis, $idRubrique, $idFamille=null,$idTypeservice=null)
	{
		//echo "Params:". $idDevis ." " .$idRubrique;
		$requete = Connexion::Connect()->prepare('DELETE FROM detailsdevis WHERE idDevis = ? AND idRubrique = ?');
		
		$requete->bindValue(1, $idDevis);
		$requete->bindValue(2, $idRubrique);
		$res = $requete->execute();

		$requete1 = Connexion::Connect()->prepare('DELETE FROM detailstypeservice WHERE idDevis = ? AND idRubrique = ?');
		
		$requete1->bindValue(1, $idDevis);
		$requete1->bindValue(2, $idRubrique);
		$res1 = $requete1->execute();
		return ($res);
	}
	// Liste des deviss 
	public function listDevis()
	{
		$list = array();

		$requete = Connexion::Connect()->query("SELECT * FROM devis WHERE idDevis IN (SELECT idDevis FROM detailsdevis)
		");

		//On récupère le résultat de la requete, on le parcours, on le met dans une variable qu'on retourne 
		foreach ($requete as $donnee) {
			$list[] = $donnee;
		}
		return $list;
	}

	public function listDevis2($idUser, $conditions)
	{
		$list = array();
		$sql = "SELECT * FROM vdevis WHERE idDevis IN (SELECT idDevis FROM detailsdevis) AND idResponsable = \"$idUser\"
		   ORDER BY idDevis DESC
		     " . $conditions;
		$requete = Connexion::Connect()->query($sql);

		//On récupère le résultat de la requete, on le parcours, on le met dans une variable qu'on retourne 
		foreach ($requete as $donnee) {
			$list[] = $donnee;
		}
		// ksort($list);

		return $list;
	}

	public function listAllDevis($conditions)
	{
		$list = array();
		$sql = ("SELECT * FROM vdevis
		WHERE idDevis IN (SELECT idDevis FROM detailsdevis) 
		" . $conditions . " ORDER BY idDevis DESC");

		$requete = Connexion::Connect()->query($sql);

		//On récupère le résultat de la requete, on le parcours, on le met dans une variable qu'on retourne 
		foreach ($requete as $donnee) {
			$list[] = $donnee;
		}
		// ksort($list);
		return $list;
	}

	public function listDevisFacturation($idEtat, $conditions)
	{
		$list = array();
		$requete = Connexion::Connect()->query("SELECT * FROM vdevis2 WHERE idDevis IN (SELECT idDevis FROM detailsdevis) AND idDevis NOT IN (SELECT idDevis FROM facture) AND idEtat = $idEtat 
		" . $conditions);

		//On récupère le résultat de la requete, on le parcours, on le met dans une variable qu'on retourne 
		foreach ($requete as $donnee) {
			$list[] = $donnee;
		}
		return $list;
	}

	public function listDevisValides($idUser)
	{
		$list = array();

		$requete = Connexion::Connect()->query("SELECT * FROM vdevis WHERE idDevis IN (SELECT idDevis FROM detailsdevis) AND idResponsable = \"$idUser\" AND idEtat = 2 AND idDevis NOT IN (SELECT idDevis FROM bon) 

		");

		//On récupère le résultat de la requete, on le parcours, on le met dans une variable qu'on retourne 
		foreach ($requete as $donnee) {
			$list[] = $donnee;
		}
		return $list;
	}

	public function nbDevisEtat($idUser, $idEtat, $conditions)
	{
		$list = array();

		$requete = Connexion::Connect()->query("SELECT * FROM vdevis WHERE idDevis IN (SELECT idDevis FROM detailsdevis) AND idResponsable = \"$idUser\" AND idEtat = $idEtat " . $conditions);

		//On récupère le résultat de la requete, on le parcours, on le met dans une variable qu'on retourne 
		foreach ($requete as $donnee) {
			$list[] = $donnee;
		}
		return $list;
	}

	public function nbDevisEtatValider($idEtat, $conditions)
	{
		$list = array();

		$requete = Connexion::Connect()->query("SELECT * FROM vdevis WHERE idDevis IN (SELECT idDevis FROM detailsdevis)  AND idEtat = $idEtat " . $conditions);

		//On récupère le résultat de la requete, on le parcours, on le met dans une variable qu'on retourne 
		foreach ($requete as $donnee) {
			$list[] = $donnee;
		}
		return $list;
	}

	public function nbDevisEtatBc($idEtat, $conditions)
	{
		$list = array();

		$requete = Connexion::Connect()->query("SELECT * FROM vdevis WHERE idDevis IN (SELECT idDevis FROM detailsdevis)  AND idEtat = $idEtat " . $conditions);

		//On récupère le résultat de la requete, on le parcours, on le met dans une variable qu'on retourne 
		foreach ($requete as $donnee) {
			$list[] = $donnee;
		}
		return $list;
	}

	public function nbAllDevisEtat($idEtat, $conditions)
	{
		$list = array();

		$requete = Connexion::Connect()->query("SELECT * FROM vdevis WHERE idDevis IN (SELECT idDevis FROM detailsdevis) AND idDevis NOT IN (SELECT idDevis FROM facture) AND idEtat = $idEtat " . $conditions);

		//On récupère le résultat de la requete, on le parcours, on le met dans une variable qu'on retourne 
		foreach ($requete as $donnee) {
			$list[] = $donnee;
		}
		return $list;
	}

	public function nbAllDevis($conditions)
	{
		$list = array();

		$requete = Connexion::Connect()->query("SELECT * FROM vdevis WHERE idDevis IN (SELECT idDevis FROM detailsdevis) " . $conditions);

		//On récupère le résultat de la requete, on le parcours, on le met dans une variable qu'on retourne 
		foreach ($requete as $donnee) {
			$list[] = $donnee;
		}
		return $list;
	}


	public function getServiceLibelle($idService)
	{
		$list = array();
		$requete = Connexion::Connect()->query("SELECT service FROM service WHERE idService = \"$idService\" ");
		/*On parcours le résultat*/
		foreach ($requete as $donnee) {
			$list[] = $donnee;
			foreach ($list as $value) {
				$val = $value['service'];
			}
		}
		if(!isset($list) || count($list) <= 0){
			$requete = Connexion::Connect()->query("SELECT typeService FROM typeservice WHERE idTypeservice = \"$idService\" ");
			/*On parcours le résultat*/
			foreach ($requete as $donnee) {
				$list[] = $donnee;
			}
			foreach ($list as $value) {
				$val = $value['typeService'];
			}
		}

		
		if (count($list) != 0) {
			return $val;
		} else
			return false;
	}

	public function insertSousservices($req)
	{
		$requete = Connexion::Connect()->prepare($req);
		$res = $requete->execute();
		return ($res);
	}

	public function updateTypeservice($req)
	{
		$requete = Connexion::Connect()->prepare($req);
		$res = $requete->execute();
		return ($res);
	}

	public function addCommenaire($idDevis, $idUser, $idDestinataire, $contenu)
	{
		$requete = Connexion::Connect()->prepare('INSERT INTO deviscommente(idDeviscommente, idDevis, idUser, idDestinataire, contenu, etat) VALUES (?, ?, ?, ?, ?, ?); UPDATE devis SET idEtat = 15 WHERE idDevis = ?');
		$requete->bindValue(1, NULL);
		$requete->bindValue(2, $idDevis);
		$requete->bindValue(3, $idUser);
		$requete->bindValue(4, $idDestinataire);
		$requete->bindValue(5, $contenu);
		$requete->bindValue(6, 1);

		$requete->bindValue(7, $idDevis);

		$res = $requete->execute();
		return ($res);
	}

	public function getComment($idDevis)
	{
		$list = array();

		$requete = Connexion::Connect()->query("SELECT * FROM vdeviscommente WHERE idDevis = \"$idDevis\" AND etat = 1");

		//On récupère le résultat de la requete, on le parcours, on le met dans une variable qu'on retourne 
		foreach ($requete as $donnee) {
			$list[] = $donnee;
		}
		return $list;
	}

	public function validerCorrection($idDevis)
	{
		$requete = Connexion::Connect()->prepare('UPDATE devis SET idEtat = 1 WHERE idDevis = ?; UPDATE deviscommente SET etat = 0 WHERE idDevis = ?');
		$requete->bindValue(1, $idDevis);
		$requete->bindValue(2, $idDevis);

		$res = $requete->execute();
		return ($res);
	}

	public function livrerDevis($idDevis, $idUser)
	{
		$db = Connexion::Connect();
		try {
			$db->beginTransaction();
			$requete = $db->prepare('UPDATE devis SET idEtat = ?, idValideur = ? WHERE idDevis = ?');
			$requete->bindValue(1, 5);
			$requete->bindValue(2, $idUser);
			$requete->bindValue(3, $idDevis);
			$res = $requete->execute();

			$requete1 = $db->prepare('UPDATE devislivre SET etat = 0 WHERE idDevis = ?');
			$requete1->bindValue(1, $idDevis);
			$res1 = $requete1->execute();

			$requete2 = $db->prepare('INSERT INTO devislivre(idDevislivre, idDevis, idUser, etat) VALUES(?, ?, ?, ?)');
			$requete2->bindValue(1, NULL);
			$requete2->bindValue(2, $idDevis);
			$requete2->bindValue(3, $idUser);
			$requete2->bindValue(4, 1);
			$res2 = $requete2->execute();

			$db->commit();
			return $res2;
		} catch (Exception $e) {
			$db->rollBack();
			echo "Failed: " . $e->getMessage();
		}
	}

	public function annuler($idDevis, $idUser)
	{
		$db = Connexion::Connect();
		try {
			$db->beginTransaction();
			$requete = $db->prepare('UPDATE devis SET idEtat = ? WHERE idDevis = ?');
			$requete->bindValue(1, 8);
			$requete->bindValue(2, $idDevis);
			$res = $requete->execute();

			$requete2 = $db->prepare('INSERT INTO devisannule(idDevisannule, idDevis, idUser) VALUES(?, ?, ?)');
			$requete2->bindValue(1, NULL);
			$requete2->bindValue(2, $idDevis);
			$requete2->bindValue(3, $idUser);
			$res2 = $requete2->execute();

			$db->commit();
			return $res2;
		} catch (Exception $e) {
			$db->rollBack();
			echo "Failed: " . $e->getMessage();
		}
	}
}
