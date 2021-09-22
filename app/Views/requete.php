<?php
	
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
	
	//requete consultation
	session_start();
	if isset($_SESSION['mois'])
	{
		
	}
	else
	{
		$requete=$bdd->query('SELECT 
	}
		
?>