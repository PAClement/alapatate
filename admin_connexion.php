<?php 
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>A LA PATATE</title>
			
    <link rel="stylesheet" type="text/css" href="css/admin_connexion.css">
    <link rel="icon" href="images/logo_patate.png" />
</head>
<body>

    <div class="logo">
        <img src="images/logo_patate.png" class="logo--patate">
    </div>
    
    <div class="admin--title">Connexion à votre espace d'administration !</div>
    
    <?php
			if(isset($_SESSION['erreur']))
			{
				echo '<p class="message-erreur">'.$_SESSION['erreur'].'</p>';
				unset($_SESSION['erreur']);
			}
    ?>
    
   <form action="php/admin_gestion.php" method="post">
        <div class="formulaire--connexion">
            <div class="input-connexion">
                <input class="inputcss" type="text"  name="identifiant" placeholder="Identifiant" required> 
                <br><br>

                <br><br>
                <input class="inputcss" type="password"  name="password" placeholder="Mot de passe" required>
                <br><br><br><br>


                <input type="submit" class="btn btn-2 btn-2a" value="Se Connecter">
            </div>
        </div>
    </form>

        <div class="footer">
            <p class="copyright">2020 | Copyright | A la Patate, Tous droits réservés</p>
        </div>
        
</body>
</html>














