<?php
session_start();



	if(empty($_POST['username']))
	{
        header('location: mauvaismdp.php');
    } 
    else 
    {
        if(empty($_POST['password'])) 
        {
            header('location: mauvaismdp.php');

        }
        else
        {
        	
        	
            //on vérifie que la connexion s'effectue correctement:
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
            
            	$reponse = $bdd->query("SELECT * FROM visiteur WHERE login = '".$_POST['username']."' AND mdp = '".$_POST['password']."'");
            	if($user=$reponse->fetch()!=null)
				{
					session_start();
					$donneesusuer=$reponse->fetch();
					$_SESSION['iduser']=$bdd->query("SELECT id FROM visiteur WHERE login = '".$_POST['username']."' AND mdp = '".$_POST['password']."'");
					$_SESSION['prenom']=$donneesusuer['prenom'];
					header('Location: connecte.php');
				}
				else
				{
					header('location: mauvaismdp.php');
				}
					
				
					;
				
				// if(mysqli_num_rows($Requete)==0){
            		// header('location: mauvaismdp.php');
            	// }
            	// else{
            		
            		// header('Location: connecte.php');
            	// }
            }
		}
	

?>