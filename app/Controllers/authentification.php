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
        	$Pseudo = htmlentities($_POST['username'], ENT_QUOTES, "ISO-8859-1");
        	$MotDePasse = htmlentities($_POST['password'], ENT_QUOTES, "ISO-8859-1");
        	$mysqli = mysqli_connect("localhost", "root", null, "gsbv2");
            //on vérifie que la connexion s'effectue correctement:
            if(!$mysqli)
            {
                echo "Erreur de connexion à la base de données.";
            }
            else
            {
            	$Requete = mysqli_query($mysqli,"SELECT * FROM visiteur WHERE login = '".$Pseudo."' AND mdp = '".$MotDePasse."'");
            	if(mysqli_num_rows($Requete)==0){
            		header('location: mauvaismdp.php');
            	}
            	else{
            		
            		header('Location: connecte.php');
            	}
            }
		}
	}


?> 	            

        