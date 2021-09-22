<?php session_start();?>
<!DOCTYPE html>
					<!-- Page fiche de frais du mois à renseigner HTML -->
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
			<?php include('header.php');?>
		</header>
		<div id="renseigner" class=centre>	<!-- Conteneur fiche de frais du mois-->
            <h1 style="width: 500px; margin-left: auto; margin-right:auto">Fiche de frais du mois de ___ de l'année ___</h1>
            <fieldset class='forfait'>
                <form action='forfaitaire.php' method="POST">
                <legend><h2>Frais forfaitaires</h2></legend>
                <ul>	<!-- Formulaire de frais forfaitaires de type number valeur à remplir -->
                    <li><label class=width >Forfait Etape :</label> <input type="number" name="etape" value="" required/><br/></li>
                    <li><label class=width>Frais kilométriques (en km) :</label><input type="number" name="kilometres" value="750" required/><br/></li>
                    <li><label class=width > Nuitée hôtel : </label> <input type="number" name="nuitées" value="9" required/> <br/></li>
                    <li><label class=width >rapas restaurant : </label> <input type="number" name="repas" value="12" required/> <br/></li>
                </ul>

                <input type="submit" name="modifforfait" value="Modifier" >
                </form>
            </fieldset>
				<!-- frais hors forfait comprenant la date, puis l'objet et pour finir le prix de l'objet -->
            <fieldset class='horsforfait'>
                <form action='horsforfait1.php' method="POST">
				
				<legend><h2>Frais hors forfaits n°1</h2></legend>
                
                <label>Le</label><input type="date" name="date" value="2013-11-18" min="2013-01-01" required/> <label>nom</label> <input type="text" name="hf1" value="Repas représentation" required/> <label>prix</label> <input type="number" name="prixhf1" value="156" required/>
                <input type="submit" name="modifhorsforfait1" value="Modifier" >
                </form>
            </fieldset>
            <fieldset class='horsforfait'>
                <form action='horsforfait2.php' method="POST">
                
				<legend><h2>Frais hors forfaits n°2</h2></legend>
                
                <label>Le</label><input type="date" name="date" value="2013-11-22" min="2013-01-01" required/> <label>nom</label> <input type="text" name="hf2" value='Achat fleuriste soirée "Medilog"' required/> <label>prix</label> <input type="number" name="prixhf2" value="120.30" required/>
                <input type="submit" name="modifhorsforfait2" value="Modifier" >
                </form>
            </fieldset>
				<!-- Ajout d'un nouveau frais gors forfait -->
            <fieldset class="horsforfait"><legend><h2>Ajouter hors forfait</h2></legend>
                <form action="ajout.php" method="POST">
                <input class=mois type="submit" name="ajouterhf" value="Ajouter un frais hors forfait">
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