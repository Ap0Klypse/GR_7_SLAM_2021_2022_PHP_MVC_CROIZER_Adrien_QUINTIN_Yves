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
	$db=db_connect();
	$sql='SELECT * FROM visiteur WHERE login=? AND mdp=?';
	$resultat=$db->query($sql,[$login,$password]);
	$resultat=$resultat->getResult();
	return $resultat;

}


public function genereFraisForfait($id,$mois){
	$db=db_connect();
	$creerficher='INSERT INTO fichefrais VALUES(?,?,0,0,date("Y-d-m"),"CR")'
	$insert='INSERT INTO lignefraisforfait VALUES (?,?,'ETP',0),
													(?,?,'KM',0),
													(?,?,'NUI',0),
													(?,?,'REP',0)';
	$db->exec($creerficher,[$id,$mois]);
	$db->exec($insert,[$id,$mois,$id,$mois,$id,$mois,$id,$mois]);

}

//
public function selectFraisForfait($id,$mois){
	$db=db_connect();
	$sql='SELECT * FROM lignefraisforfait WHERE idVisiteur=? AND mois=?';
	$resultat=$db->query($sql,[$id,$mois]);
	$resultat=$resultat->getResult();
	return $resultat;
}
	

public function updateFraisForfait($id,$mois,$qetape,$qkilo,$qnuit,$qrep){
	$db=db_connect();
	$ETP='UPDATE lignefraisforfait SET quantite=? WHERE idVisiteur=? AND mois=? AND idFraisForfait="ETP"';
	$KM='UPDATE lignefraisforfait SET quantite=? WHERE idVisiteur=? AND mois=? AND idFraisForfait="KM"';
	$NUI='UPDATE lignefraisforfait SET quantite=? WHERE idVisiteur=? AND mois=? AND idFraisForfait="NUI"';
	$REP='UPDATE lignefraisforfait SET quantite=? WHERE idVisiteur=? AND mois=? AND idFraisForfait="REP"';


	$db->exec($ETP [$id,$mois,$qetape]);
	$db->exec($KM [$id,$mois,$qkilo]);
	$db->exec($NUI [$id,$mois,$qnuit]);
	$db->exec($REP [$id,$mois,$qrep]);


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
	$insert='INSERT INTO lignefraishorsforfait VALUES(?,?,?,?,?)';
	$db->exec($insert, [$id,$mois,$lib,$date,$montant]);
}

public function supprHorsForfait($id,$mois,$lib){
	$db=db_connect();
	$suppr='DELETE FROM lignefraishorsforfait WHERE idVisiteur=? AND mois=? AND lib=?';
	$db->exec($suppr, [$id,$mois,$lib]);
}

public function modifHorsForfait($id,$mois,$lib,$nouvlib,$nouvdate,$nouvmontant){
 	$db=db_connect();
	$modif='UPDATE FROM lignefraishorsforfait SET libelle=?, date=?, montant=? WHERE idVisiteur=?, mois=?, libelle=?'
 	$db->exec($modif, [$nouvlib,$nouvdate,$nouvmontant,$id,$mois,$lib]);
 }


//==========================
// Fin Code du modele
//===========================


//fin de la classe
}


?>