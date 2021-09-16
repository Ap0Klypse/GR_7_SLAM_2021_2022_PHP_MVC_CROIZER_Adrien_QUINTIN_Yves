<!DOCTYPE html>
					<!-- Page de connexion HTML -->
<html>
    <head> 
       <meta charset="utf-8">
	   <!-- Permet la liaison HTML et CSS -->
       <link rel="stylesheet" href="style.css">
       <link rel="icon" type="image/png" href="images/logogsbcropped.jpg" />
       <title>GSB-Authentification</title>
    </head>
    <body>
        <header>
            <!-- Permet d'insérer le logo -->
            <p>
                <img src="images/logogsb.jpg" alt="logo de GSB"/>
            </p>
            <h1>Bienvenue sur le site de GSB</h1>
            <p></p>
            
        </header>
        <div id="connexion">
            
        <fieldset> 	<!-- Permet de regrouper la partie connexion -->
            <p></p><h1 style="width: 151px; margin-left: 110px;">Connexion</h1>    
            <form action="authentification.php" method="POST">
            
                <!-- Renseignement sur le nom d'ulisateur -->
                <label><b>Nom d'utilisateur</b></label>
                <input class=input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required/>
                <p></p>

				<!-- Renseignement sur le mot de passe -->
                <label><b>Mot de passe</b></label>
                <input class=input type="password" placeholder="Entrer le mot de passe" name="password" required/>
                <P></P>
                <a href="mdpoublie.php">mot de passe oublié</a>
                <p></p>            
                <input class=styled type="submit" id='submit' value='SE CONNECTER'/>
                
        
            </form>
        </fieldset>
        </div>
        <footer>	<!-- Bas de page regroupant mentions légales et formulaire de contact -->
            <p></p>
            <h4>Mentions légales</h4>
            <p></p>
            <h4>formulaire de contact</h4>
            <p></p>


        </footer>
    </body>
</html>