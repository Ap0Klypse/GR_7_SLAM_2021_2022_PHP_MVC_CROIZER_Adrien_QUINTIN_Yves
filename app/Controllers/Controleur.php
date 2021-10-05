<?php
//acces au controller parent pour l heritage
namespace App\Controllers;
use CodeIgniter\Controller;

//=========================================================================================
//définition d'une classe Controleur (meme nom que votre fichier Controleur.php) 
//héritée de Controller et permettant d'utiliser les raccoucis et fonctions de CodeIgniter
//  Attention vos Fichiers et Classes Controleur et Modele doit commencer par une Majuscule 
//  et suivre par des minuscules
//=========================================================================================

class Controleur extends Controller {

//=====================================================================
//Fonction index correspondant au Controleur frontal (ou index.php) en MVC libre
//=====================================================================
public function index(){
	
	//lancement de la session
	session_start();
	 // $_SESSION['iduser']=null;
	 // $_SESSION['prenom']=null;
	 // $_SESSION['loged']=null;
	 // $_SESSION['mois']=null;	
	 //on teste si un utilisateur est connecté	
	 if($this->connecte())
	 {
	 	//on teste quels posts sont initiés pour trouver quel formulaire de quelle page a été soumis
	 	
	 	//consulter issu du header
	 	 if(isset($_POST['consulter'])){
	 	 	$this->consulte();
	 	 }

	 	 if(isset($_POST['renseigner'])){

	 	 	$this->renseigne();
	 	 }

	 	 if(isset($_POST['modifforfait'])){
	 	 	$this->modifforfait();
	 	 }

	 	 if(isset($_POST['ajouterhorsforfait'])){
	 	 	$this->ajouterhorsforfait();
	 	 }

	 	 if(isset($_POST['modifhorsforfait'])){
	 	 	$this->modifhorsforfait($_POST['idFraisHorsForfait']);
	 	 }

	 	 if(isset($_POST['supprhorsforfait'])){
	 	 	$this->supprhorsforfait($_POST['idFraisHorsForfait']);
	 	 }

	 	if(isset($_POST['deconnexion'])){

	 	 	$this->deconnexion();
	 	 }
	 }
	 else
	 {

	 	if(isset($_POST['connexion'])){
	 		$this->authentification();

	 	}
	 	else if(isset($_POST['retourconnexion'])){
	 		$this->pageConnexion();

	 	}
	 	else {

	 		$this->pageConnexion();
	 	}
	 }






}

public function pageConnexion(){
	echo view('connexion' );
}

public function connecte(){

	if(isset($_SESSION['loged'])){
		
		return true;
	}
	else{
		return false;
	}
}

public function authentification(){
	
	if(! isset($_POST['username']))
	{
		
       echo view('mauvaismdp');
    } 
    else 
    {
        if(! isset($_POST['password'])) 
        {
            echo view('mauvaismdp');

        }
        else{

        	$modele=  new \App\Models\Modele();
        	$result=$modele->connexion($_POST['username'],$_POST['password']);

        	if(isset($result)){
        		//var_dump($result);
        		//die;
        		$_SESSION['iduser']=$result->id;
				$_SESSION['prenom']=$result->prenom;
				$_SESSION['loged']='';
				echo view('connecte');
        	}
        	else{
        		echo view('mauvaismdp');
        	}
        }

    }    	
}

 public function renseigne(){
 	//on met en variable de session le mois actuel
 	$_SESSION['mois']=date('F');
 	//récupération du modèle
 	$modele=  new \App\Models\Modele();

 	//récupération des lignes de frais forfait
 	$ligneff=$modele->selectFraisForfait($_SESSION['iduser'],$_SESSION['mois']);
 	$lignehf=$modele->selectHorsForfait($_SESSION['iduser'],$_SESSION['mois']);
 	echo view('renseigner',[
 		'ligneff'=>$ligneff,'lignehf'=>$lignehf,
 	]);

 }

 public function modifforfait(){

 	$modele= new \App\Models\Modele();
 	$modele->updateFraisForfait($_SESSION['iduser'],$_SESSION['mois'],$_POST['etape'],$_POST['km'],$_POST['nuit'],$_POST['repas']);
 	$this->renseigne();
 }

 public function modifhorsforfait($id){
 	// var_dump($_POST);
 	// die;
 	$modele= new \App\Models\Modele();

 	$modele->modifHorsForfait($id,$_POST['libelle'],$_POST['date'],$_POST['montant']);
 	$this->renseigne();
 }

 public function supprhorsforfait($id){
 	$modele= new \App\Models\Modele();
 	$modele->supprHorsForfait($id);
 	$this->renseigne();
 }

 public function ajouterhorsforfait(){
 	$modele= new \App\Models\Modele();
 	$modele->insertHorsForfait($_SESSION['iduser'],$_SESSION['mois'],$_POST['libelle'],$_POST['date'],$_POST['montant']);
 	$this->renseigne();
 }

 public function consulte(){
 	echo view('consulter');

 }

 public function deconnexion(){
	$_SESSION['iduser']=null;
	$_SESSION['prenom']=null;
	$_SESSION['loged']=null;
	var_dump('deconnecté');
 	echo view('connexion');

 }

//======================================================
// Code du controleur simple (ex fichier Controleur.php)
//======================================================

// Action 1 : Affiche la liste de tous les billets du blog
// public function accueil() {
	    //================
		//acces au modele
		//================
		// $Modele = new \App\Models\Modele();
		
	    //===============================
		//Appel d'une fonction du Modele
		//===============================	
		// $donnees = $Modele->getBillets();
		
		//=================================================================================
		//!!! Création d'un jeu de données $data sécurisé pouvant etre passé à la vue
		//!!! on créé une variable qui récupère le résultat de la requete : $getBillets();
		//=================================================================================
		// $data['resultat']=$donnees;
		
		//==========================================
		//on charge la vue correspondante
		//et on envoie le jeu de données $data à la vue
		//la vue aura acces a une variable $resultat
		//==========================================s
		// echo view('vueAccueil',$data);
// }

// Action 2 : Affiche les détails sur un billet
// public function billet($idBillet) {
		//================
		//acces au modele
		//================
		// $Modele = new \App\Models\Modele();
		
		//===============================
		//Appel d'une fonction du Modele
		//===============================	
		// $donnees = $Modele->getDetails($idBillet);
		
		//=================================================================================
		//!!! Création d'un jeu de données $data sécurisé pouvant etre passé à la vue
		//!!! on créé une variable qui récupère le résultat de la requete : $getBillets();
		//=================================================================================
		// $data['resultat']=$donnees;
  		
		//==========================================
		//on charge la vue correspondante
		//et on envoie le jeu de données $data à la vue
		//la vue aura acces a une variable $resultat
		//==========================================
  		// echo view('vueBillet',$data);
  
// }

// // Affiche une erreur
// // public function erreur($msgErreur) {
//   // echo view('vueErreur.php', $data);
// }

// //==========================
// //Fin du code du controleur simple
// //===========================

// //fin de la classe
}



?>