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

	//session_destroy();
	var_dump("début séssion");
	var_dump($_COOKIE);
	var_dump($_SESSION);
	var_dump($this->request->getIPAddress());
	 
	 //on teste si un utilisateur est connecté	
	 if($this->connecte())
	 {
	 	
	 	

	 	//on teste quels posts sont initiés pour trouver quel formulaire de quelle page a été soumis
	 	//consulter issu du header
	 	 if(isset($_POST['consulter'])){
	 	 	//initialement, on affiche le mois d'octobre car exemple complet (septembre cloturé...)
	 	 	$mois='October';
	 	 	$this->consulte($mois);
	 	 }

	 	 if(isset($_POST['changermois'])){
	 	 	//Id présent dans l'hidden
	 	 	$this->consulte($_POST['moisselect']);
	 	 }

	 	

	 	//renseigner (header)

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
	 	 	//Id présent dans l'hidden
	 	 	$this->modifhorsforfait($_POST['idFraisHorsForfait']);
	 	 }

	 	 if(isset($_POST['supprhorsforfait'])){
	 	 	//Id présent dans l'hidden
	 	 	$this->supprhorsforfait($_POST['idFraisHorsForfait']);
	 	 }

	 	//déconnexion(header)
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
	
	session_destroy();

	echo view('connexion' );
}

public function connecte(){
	//loged et variables set? 
	if(isset($_SESSION['loged'])&&isset($_SESSION['ticket'])&&isset($_COOKIE['ticket']))
	{
		//tickets et cookies ok? 
		if($_COOKIE['ticket']==$_SESSION['ticket']){
			
			$ticket=session_id().microtime().rand(0,9999999999);
			$ticket=hash('sha512', $ticket);
			unset($_COOKIE['ticket']);
			setcookie('ticket', $ticket, time()+(60*20));
			$_SESSION['ticket']=$ticket;
			var_dump('ticket2');
			var_dump($_SESSION);
			var_dump($_COOKIE);
			return true;
		}
		else{
			$message='session inconsitency! Possible user attack';

			log_message('alert', $message );
			$email = \Config\Services::email();
			$email->setFrom('server@example.com', );
			$email->setTo('admin@example.com');
			$email->setSubject('Session alert ');
			$email->setMessage('a log alert requires your attention:'.$message.
				' Please check log files for further information');
			$email->send();
			log_message('alert', 'email sent');
			// var_dump('échec test');
			unset($_COOKIE['ticket']);
			// var_dump('cookie détruit');
			// var_dump($_COOKIE);
			return false;
		}
		
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
        	//On met en pause pour éviter la force brute
        	sleep(2);
        	$newuser=$this->verifdata($_POST['username']);
        	$newmdp=$this->verifdata($_POST['password']);
        	$modele=  new \App\Models\Modele();
        	$result=$modele->connexion($newuser,$newmdp);

        	if(isset($result)){

        		$_SESSION['iduser']=$result->id;
				$_SESSION['prenom']=$result->prenom;
				$_SESSION['loged']='';
				


				//génération cookie
				$cookie_name="ticket";
				// On génère quelque chose d'aléatoire
				$ticket=session_id().microtime().rand(0,9999999999);
				// on hash pour avoir quelque chose de propre qui aura toujours la même forme
				$ticket=hash('sha512', $ticket);
				// On enregistre des deux cotés
				

				setcookie($cookie_name, $ticket, time()+(60*20)); 
				// Expire au bout de 20 min
				$_SESSION['ticket']=$ticket;
				var_dump('ticket1');
				var_dump($_SESSION);
				var_dump($_COOKIE);
				
				echo view('connecte');

        	}
        	else{
        		$ip=$this->request->getIPAddress();
        		log_message('warning', "failed authentication for user : {id} using password : {password} venant de l'ip: {ip}",
        		 ['id'=>$newuser, 'password'=>$newmdp, 'ip'=>$ip] );
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
 	$etape=$this->verifdata($_POST['etape']);
 	$km=$this->verifdata($_POST['km']);
 	$nuit=$this->verifdata($_POST['nuit']);
 	$repas=$this->verifdata($_POST['repas']);
 	$modele->updateFraisForfait($_SESSION['iduser'],$_SESSION['mois'],$etape,$km,$nuit,$repas);
 	$this->renseigne();
}

public function modifhorsforfait($id){

 	$modele= new \App\Models\Modele();
 	$libelle=$this->verifdata($_POST['libelle']);
 	$date=$this->verifdata($_POST['date']);
 	$montant=$this->verifdata($_POST['montant']);
 	$modele->modifHorsForfait($id,$libelle,$date,$montant);
 	$this->renseigne();
}

public function supprhorsforfait($id){
 	$modele= new \App\Models\Modele();
 	$modele->supprHorsForfait($id);
 	$this->renseigne();
}

public function ajouterhorsforfait(){
 	$modele= new \App\Models\Modele();
 	$libelle=$this->verifdata($_POST['libelle']);
 	$date=$this->verifdata($_POST['date']);
 	$montant=$this->verifdata($_POST['montant']);
 	$modele->insertHorsForfait($_SESSION['iduser'],$_SESSION['mois'],$libelle,$date,$montant);
 	$this->renseigne();
}

public function consulte($mois){
 	$modele= new \App\Models\Modele();
 	$fichesfrais=$modele->selectFicheFrais($_SESSION['iduser']);
 	$ligneff=null;
 	$lignehf=null;
 	if(isset($mois)){

 		$ligneff=$modele->selectFraisForfait($_SESSION['iduser'],$mois);
 	$lignehf=$modele->selectHorsForfait($_SESSION['iduser'],$mois);
 	}
 	 	echo view('consulter',[
 		'fichesfrais'=>$fichesfrais,
 		'ligneff'=>$ligneff,
 		'lignehf'=>$lignehf,
 	]);
 	

}



public function deconnexion(){
	session_destroy();
	unset($_COOKIE['ticket']);

 	echo view('connexion');

}

public function verifdata(String $chaine){
	$newdata = htmlspecialchars($chaine);

	$newdata = str_replace(["\n","\r",PHP_EOL],"", $newdata);
	return $newdata;
}


}



?>