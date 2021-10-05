

<!DOCTYPE html>

					<!-- Page consultation fiche de frais de l'année HTML -->

<html>

	<head>
		<meta charset="utf-8">
		<!-- Permet la liaison HTML et CSS -->
    	<link rel="stylesheet" href="<?php echo base_url('/public/css/style.css'); ?>"/>
    	<link rel="icon" type="image/png" href="images/logogsbcropped.jpg" />
       <title>GSB-Connecté</title>
	</head>

	<body>
		<header >
			<?php include('header.php'); ?>
		</header>
		<div class=centre id="renseigner"> <!-- Conteneur fiche de frais d'un mois de l'année choisie -->
            <form action="consulter.php" method="POST">
                <h1 style="width: 500px;" >Fiche de frais du mois de <input type="month" name="mois" value="2021-09" min="2021-01" required>
                
                </h1>
                    <input class=mois type="submit" name="mois" value="changer de mois">
            </form>
            <fieldset class='forfait'>
                <legend class=box><h2>Frais forfaitaires</h2></legend>
                <ul>
                    <li>Forfait Etape : aucun<br/></li>
                    <li>Frais kilométriques : 750 km<br/></li>
                    <li>Nuitée hôtel : 9 nuits <br/></li>
                    <li>Repas restaurant : 12 repas <br/></li>
                </ul>
                
            </fieldset>
            <fieldset class=box>
                <legend><h2>Frais hors forfaits n°1</h2></legend>
                <p>Le 18/11/2013</p> <p>Repas représentation</p> <p>156 €</p>
                
            </fieldset>
            <fieldset class=box>
                <legend><h2>Frais hors forfaits n°2</h2></legend>
                <p>Le 22/11/2013</p> <p>Achat fleuriste soirée "Medilog"</p> <p>120,30 €</p>
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