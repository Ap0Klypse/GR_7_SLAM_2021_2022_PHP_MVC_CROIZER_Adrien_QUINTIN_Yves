<!DOCTYPE html>
<html>
    <head>
       <meta charset="utf-8">
       <link rel="stylesheet" href="style.css">
       <link rel="icon" type="image/png" href="images/logogsbcropped.jpg" />
       <title>GSB-Authentification</title>
    </head>
    <body>
        <header>
            
            <p>
                <img src="images/logogsb.jpg" alt="logo de GSB"/>
            </p>
            <h1>Bienvenue sur le site de GSB</h1>
            <p></p>
            
        </header>
        <div id="connexion">
            
        <fieldset>
            <legend><p><br /></p><h1>Connexion</h1></legend>  
            <form action="authentification.php" method="POST">
            
                
                <label><b>Nom d'utilisateur</b></label>
                <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required/>
                <p></p>

                <label><b>Mot de passe</b></label>
                <input type="password" placeholder="Entrer le mot de passe" name="password" required/>
                <P></P>
                <a href="mdpoublie.html">mot de passe oublié</a>
                <p></p>            
                <input type="submit" id='submit' value='SE CONNECTER'/>
                
        
            </form>
        </fieldset>
        </div>
        <footer>
            <p></p>
            <h4>Mentions légales</h4>
            <p></p>
            <h4>formulaire de contact</h4>
            <p></p>


        </footer>
    </body>
</html>