

	<p>
        <img src="images/logogsb.jpg" alt="logo de GSB"/>
    </p>
    <h2>
        Bienvenue sur votre page de visiteur médical  <?php echo $_SESSION['prenom'];?>
    </h2>

			
			<form action="" method="POST">
				
				<button class=bouton type="submit"  name='consulter' />CONSULTER FICHES FRAIS</button>
			</form>
			<form action="" method="POST">
				
				<button class=bouton type="submit"  name='renseigner' />RENSEIGNER FICHES FRAIS</button>
			</form>
			<form action="" method="POST">
				
				<button class=bouton type="submit"  name='deconnexion' />SE DECONNECTER</button>
			</form>