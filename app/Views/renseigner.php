
<!DOCTYPE html>
					<!-- Page fiche de frais du mois à renseigner HTML -->
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
			<?php include('header.php');?>
		</header>
		<div id="renseigner" class=centre>	<!-- Conteneur fiche de frais du mois-->
            <h1 style="width: 500px; margin-left: auto; margin-right:auto">Fiche de frais du mois en cours</h1>
            <fieldset class='forfait'>
                <form action='' method="POST">
                <legend><h2>Frais forfaitaires</h2></legend>
                <ul>	<!-- pour chacune des lignes on check pour switch pour savoir quel frais il représente et l'indiquer dans le form -->
                    <?php foreach ($ligneff as $key => $value) {
                        switch ($value->idFraisForfait) {

                            case 'ETP':
                                $nomFraisForfait= "Forfait Etape";
                                $quantite=$value->quantite;
                                $montant=$value->quantite*110;
                                $nomInput='etape';
                                break;
                            case 'KM':
                                $nomFraisForfait= "Frais kilométriques";
                                $quantite=$value->quantite;
                                $montant=$value->quantite*1;
                                $nomInput='km';
                                break;
                            case 'NUI':
                                $nomFraisForfait= "Nuitée(s) Hôtel";
                                $quantite=$value->quantite;
                                $montant=$value->quantite*80;
                                $nomInput='nuit';
                                break;
                            case 'REP':
                                $nomFraisForfait= "Repas restaurant";
                                $quantite=$value->quantite;
                                $montant=$value->quantite*25;
                                $nomInput='repas';
                                break;
                            
                            
                            
                        }
                        echo "<li><label class=width > $nomFraisForfait :</label> <input type='number' min='0' name=$nomInput value=$quantite required/>
                                 <label class=width > montant: $montant €</label> <br/></li>";
                        
                    }

                    ?>
                    
                </ul>

                <input type="submit" name="modifforfait" value="Modifier" >
                </form>
            </fieldset>
				<!-- frais hors forfait comprenant la date, puis l'objet et pour finir le prix de l'objet 
                    On affiche chacuns des frais hors forfait, le hidden est nécessaire pour l'identifier au niveau du post
                    dans le contrôleur en cas d'update/suppr... C'est aussi pour ça que l'on a 1 formulaire par frais-->
                

            <?php 
            $numhf=1;
            foreach ($lignehf as $key => $value) {
                        

                    $date=$value->date;
                    $montant=$value->montant;
                    $libelle=$value->libelle;

                    echo "<fieldset class='horsforfait'>
                <form action='' method='POST'>
                
                <legend><h2>Frais hors forfaits n°$numhf</h2></legend>
                
                <label>Le</label><input type='date' name='date' value=$date min='2021-01-01' required/> <label>nom</label> <input type='text' name='libelle' value=$libelle required/> <label>prix</label> <input type='number' name='montant' value=$montant required/>
                <input type='submit' name='modifhorsforfait' value='Modifier' >
                <input type='submit' name='supprhorsforfait' value='Supprimer' >
                <input type='hidden' name='idFraisHorsForfait' value=$value->id >
                </form>
            </fieldset>";
                   $numhf++;         
                }
            ?> 
            

				<!-- Ajout d'un nouveau frais hors forfait -->
            <fieldset class="horsforfait"><legend><h2>Ajouter hors forfait</h2></legend>
                <form action="" method="POST">
                <label>Le</label><input type="date" name="date" value="" min="2021-01-01" required/> <label>nom</label> <input type="text" name="libelle" value='' required/> <label>montant</label> <input type="number" min='0' name="montant" value="" required/>    
                <input class=mois type="submit" name="ajouterhorsforfait" value="Ajouter un frais hors forfait">
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