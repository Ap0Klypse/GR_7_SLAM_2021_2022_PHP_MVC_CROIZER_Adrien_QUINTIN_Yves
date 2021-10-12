

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
		<fieldset class='centre'>
                        <p>Choisissez un mois à consulter:</p>
            
                <!-- affichage des boutons de sélection des mois, l'input hidden est nécessaire (+1 form par choix)
                pour identifier le mois dans le contrôleur -->
                <?php foreach ($fichesfrais as $key => $value) {

                    $mois=$value->mois;
                    echo"<form action='' method='POST'>
                    <input type='submit' name='changermois' value=$mois >
                    <input type='hidden' name='moisselect' value=$mois >
                    </form>
                    ";

                }

                ?>

        </fieldset>

            

        
        <div id='renseigner' class=centre>
        <fieldset class='forfait'>
                <legend class=box><h2>Frais forfaitaires</h2></legend>
                <ul>
                    <!-- pour chacune des lignes on check pour switch pour savoir quel frais il représente et l'indiquer dans le form -->
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
                        echo "<li>$nomFraisForfait : $quantite  , montant: $montant €</li> <br/>";
                    }


                    ?>
                </ul>
                
            </fieldset>
            <!-- On affiche tous les frais hors forfait-->
             <?php
          
                $numhf=1;
            foreach ($lignehf as $key => $value) {
                        

                    $date=$value->date;
                    $montant=$value->montant;
                    $libelle=$value->libelle;

                    echo "<fieldset class='horsforfait'>
                
                
                <legend><h2>Frais hors forfaits n°$numhf</h2></legend>
                
                <p> le $date   nom : $libelle   montant: $montant €</p>

                
            </fieldset>";
                   $numhf++;         
                }
            ?> 
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

