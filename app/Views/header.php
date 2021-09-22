

	<p>
        <img src="images/logogsb.jpg" alt="logo de GSB"/>
    </p>
    <h2>
        Bienvenue sur votre page de visiteur médical  <?php echo $_SESSION['prenom'];?>
    </h2>

			
			<form action="consulter.php" method="POST">
				<input type="submit" id="consulter" value="CONSULTER FICHES FRAIS">
			</form>
			<form action="renseigner.php" method="POST">
				<input type="submit" id="renseigner" value="RENSEIGNER FICHES FRAIS">
			</form>
			<form action="deconnexion.php" method="POST">
				<input type="submit" id="deconnexion" value="SE DECONNECTER">
			</form>