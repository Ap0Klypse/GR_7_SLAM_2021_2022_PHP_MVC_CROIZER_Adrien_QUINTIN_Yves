<?php 

function bddpdo()
{
	try
				{
				// On se connecte à MySQL
				$bdd = new PDO('mysql:host=localhost;dbname=gsbv2;charset=utf8', 'root', '');
				}
				catch(Exception $e)
				{
				// En cas d'erreur, on affiche un message et on arrête tout
				die('Erreur : '.$e->getMessage());
				}
}


	
	$bdd->exec("INSERT INTO fichefrais VALUES('".$_SESSION[iduser]."',".$mois.",0,0,".date('Y-d-m').",'CR'");
	



function renseigner(){
	bddpdo();
	$mois=date('F')
	$reponse=$bdd->query("SELECT * FROM fichefrais WHERE mois = '".$mois."' AND idVisiteur = '".$_SESSION[iduser]."'");
	$reponse->fetch();
	if ($reponse->fetch()){
		
	}
	else{
		$bdd->exec("INSERT INTO fichefrais VALUES('".$_SESSION[iduser]."',".$mois.",0,0,".date('Y-d-m').",'CR'");
		$reponse=$bdd->query("SELECT * FROM fichefrais WHERE mois = '".$mois."' AND idVisiteur = '".$_SESSION[iduser]."'");
	}
	
		
}

?>