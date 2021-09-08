<!DOCTYPE html>
					<!-- Page d'accueil HTML -->
<html>

	<head>
		<meta charset="utf-8">
		<!-- Permet la liaison HTML et CSS -->
    	<link rel="stylesheet" href="style.css"/>
    	<link rel="icon" type="image/png" href="images/logogsbcropped.jpg" />
       <title>GSB-Connecté</title>
	</head>

	<body>
		<header >
			<p>
                <img src="images/logogsb.jpg" alt="logo de GSB"/>

            </p>
            <h2> 
                
                
                Bienvenue sur votre page de visiteur médical _____
            </h2>
            <form action="visiteur.php" method="POST">
				<!-- Bouton qui permet de ce déconnecter d'accéder à renseigner/consulter -->
            	<input type="button" name="renseigner" value="Renseigner fiche de frais" >
            	<input type="button" name="consulter" value="Consulter fiche de frais" >
            	<input type="button" name="deco" value="Se déconnecter" >
            </form>
		</header>
		
		<footer>	<!-- Bas de page regroupant mentions légales et formulaire de contacte -->
            <p></p>
        	<h4>Mentions légales</h4>
        	<p></p>
        	<h4>formulaire de contact</h4>
        	<p></p>

        </footer>
	</body>
	
</html>