<!DOCTYPE html>

<html>

	<head>
		<meta charset="utf-8">
    	<link rel="stylesheet" href="style.css"/>
    	<link rel="icon" type="image/png" href="images/logogsbcropped.jpg" />
       <title>GSB-Connecté</title>
	</head>

	<body>
		<header >
			<p>
                <img src="images/logogsb.jpg" alt="logo de GSB"/>

            </p>
            <h2>Bienvenue Mr _____ sur votre page de visiteur médical</h2>
            <form action="visiteur.php" method="POST">
            	<input type="button" name="renseigner" value="Renseigner fiche de frais" >
            	<input type="button" name="consulter" value="Consulter fiche de frais" >
            	<input type="button" name="deco" value="Se déconnecter" >
            </form>
		</header>
		<div id="renseigner">
            <form action="consulter.php" method="POST"><h1>Fiche de frais du mois de <input type="month" name="mois" value="2013-11" min="2013-01" required> <input type="submit" name="mois" value="changer de mois"></h1>
            </form>
            <fieldset class='forfait'>
                <legend><h2>Frais forfaitaires</h2></legend>
                <ul>
                    <li>Forfait Etape : aucun<br/></li>
                    <li>Frais kilométriques : 750 km<br/></li>
                    <li>Nuitée hôtel : 9 nuits <br/></li>
                    <li>Repas restaurant : 12 repas <br/></li>
                </ul>
                
            </fieldset>
            <fieldset class='horsforfait'>
                <legend><h2>Frais hors forfaits n°1</h2></legend>
                <p>Le 18/11/2013</p> <p>Repas représentation</p> <p>156 €</p>
                
            </fieldset>
            <fieldset class='horsforfait'>
                <legend><h2>Frais hors forfaits n°2</h2></legend>
                <p>Le 22/11/2013</p> <p>Achat fleuriste soirée "Medilog"</p> <p>120,30 €</p>
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