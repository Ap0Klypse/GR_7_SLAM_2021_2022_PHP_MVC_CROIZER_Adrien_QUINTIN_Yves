<?php
//acces au Modele parent pour l heritage
namespace App\Models;
use CodeIgniter\Model;

//=========================================================================================
//définition d'une classe Modele (meme nom que votre fichier Modele.php) 
//héritée de Modele et permettant d'utiliser les raccoucis et fonctions de CodeIgniter
//  Attention vos Fichiers et Classes Controleur et Modele doit commencer par une Majuscule 
//  et suivre par des minuscules
//=========================================================================================
class Modele extends Model {

// les valeurs "$id" représentent toujours l'id de l'utilisateur connecté
// "$mois" représente le mois en cours ou celui selectionné


public function connexion($login,$password){
//requete pour l'identification
	
//connexion à gsbv2
	$db=db_connect();

//écriture de la requète
	$sql='SELECT * FROM visiteur WHERE login=? AND mdp=?';
	
//execution de la requète et récupération des résultats
	$resultat=$db->query($sql,[$login,$password]);
	$resultat=$resultat->getResult()[0];
	return $resultat;

}



public function genereFraisForfait($id,$mois){
//lorsqu'on arrive sur la page de renseignement et que la fiche du mois courant n'existe pas,
//on l'a génère.

	$db=db_connect();

	
	$creerficher='INSERT INTO fichefrais VALUES(?,?,0,0,2021-11-09,"CR")';
	
	$insert='INSERT INTO lignefraisforfait VALUES (?,?,"ETP",0),
													(?,?,"KM",0),
													(?,?,"NUI",0),
													(?,?,"REP",0)';
	$db->query($creerficher,[$id,$mois]);
	$db->query($insert,[$id,$mois,$id,$mois,$id,$mois,$id,$mois]);

}

//Pour prendre les 4 ligne de frais forfait d'un mois et d'un utilisateur donné
public function selectFraisForfait($id,$mois){
	

	$db=db_connect();
	//requete qui vérifie l'existence d'un fichefrais du mois
	$sql='SELECT * FROM fichefrais WHERE idVisiteur=? AND mois=?';
	$existe=$db->query($sql,[$id,$mois]);
	$existe=$existe->getResult();
	
	
	//Si c'est vide: la fiche n'est pas crée, on crée la fiche et les 4 lignes de frais correspondante
	if(! isset($existe[0])){
		$this->genereFraisForfait($id,$mois);

	}

	//On recupère et on renvoit les lignes frais forfait
	$sql='SELECT * FROM lignefraisforfait WHERE idVisiteur=? AND mois=?';
	$resultat=$db->query($sql,[$id,$mois]);
	$resultat=$resultat->getResult();
	return $resultat;

}
	
//Modification des 4 ligne de frais forfait d'un mois et d'un utilisateur donné
public function updateFraisForfait($id,$mois,$qetape,$qkilo,$qnuit,$qrep){
	$db=db_connect();
	$ETP='UPDATE lignefraisforfait SET quantite=? WHERE idVisiteur=? AND mois=? AND idFraisForfait="ETP"';
	$KM='UPDATE lignefraisforfait SET quantite=? WHERE idVisiteur=? AND mois=? AND idFraisForfait="KM"';
	$NUI='UPDATE lignefraisforfait SET quantite=? WHERE idVisiteur=? AND mois=? AND idFraisForfait="NUI"';
	$REP='UPDATE lignefraisforfait SET quantite=? WHERE idVisiteur=? AND mois=? AND idFraisForfait="REP"';


	$db->query($ETP, [$qetape,$id,$mois]);
	$db->query($KM ,[$qkilo,$id,$mois]);
	$db->query($NUI, [$qnuit,$id,$mois]);
	$db->query($REP ,[$qrep,$id,$mois]);


}


public function selectHorsForfait($id,$mois){
	$db=db_connect();
	$sql='SELECT * FROM lignefraishorsforfait WHERE idVisiteur=? AND mois=?';
	$resultat=$db->query($sql, [$id,$mois]);
	$resultat= $resultat->getResult();
	return $resultat;

}


public function insertHorsForfait($id,$mois,$lib,$date,$montant){
	$db=db_connect();
	$insert='INSERT INTO lignefraishorsforfait(idVisiteur,mois,libelle,date,montant) VALUES(?,?,?,?,?)';
	$db->query($insert, [$id,$mois,$lib,$date,$montant]);
}

public function supprHorsForfait($id){
	$db=db_connect();
	$suppr='DELETE FROM lignefraishorsforfait WHERE id=?';
	$db->query($suppr, [$id]);
}

public function modifHorsForfait($id,$nouvlib,$nouvdate,$nouvmontant){
 	$db=db_connect();
	$modif='UPDATE lignefraishorsforfait SET libelle=?, date=?, montant=? WHERE id=?';
 	$db->query($modif, [$nouvlib,$nouvdate,$nouvmontant,$id]);
 }


//==========================
// Fin Code du modele
//===========================


//fin de la classe
}


?>