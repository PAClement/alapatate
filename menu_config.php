<?php 

    session_start();

 	/*ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);*/

    include('php/CBDD.php');
    $db = new Connection();

    if(!isset($_SESSION['isAdmin1']) || $_SESSION['isAdmin1'] != true)
	{
		header('location: https://alapatate.fr/admin_connexion');
		exit();
	}
	

?>

<!DOCTYPE html>
<html>
<head>
    <title>A LA PATATE</title>
    
    <link rel="stylesheet" type="text/css" href="css/menu_config.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <link rel="icon" href="images/logo_patate.png" />
</head>
<body>
    
    <div class="logo">
        <img src="images/logo_patate.png" class="logo--patate">
    </div>
    
	<div class="admin--title">- Gestion de la carte -</div><br> 

<!-- Ajout à la carte-->
<div class="option--title">Ajouter à la carte</div><br> 
	<form method="POST" action="php/ajout_produit.php">
		<div class="form_ajout">
			<div class="input_ajout">
				<label for="categorie">Categorie : </label>
					<select id="radio-display" name="categorie" required>
						<option value="Sauce Froide">Sauce Froide</option>
						<option value="Sauce Chaude">Sauce Chaude</option>
						<option value="Biere Pression">Biere Pression</option>
						<option value="Biere Bouteille">Biere Bouteille</option>
						<option value="Vin">Vin</option>
						<option value="Soft">Soft</option>
						<option value="Spiritueux">Spiritueux</option>
						<option value="Smoothie">Smoothie</option>
						<option value="Autres" selected>Autres</option>
					</select>
			</div>
			<div class="input_ajout">
				<input class="input_text" name="nom" placeholder="Nom" required>
				<input class="input_text" name="prix" placeholder="Prix">
				<input class="input_text" style="display :none;" id="display-biere" name="prix_50" placeholder="Prix 50cl">
				<input class="input_text" style="display :none;" id="display-bouteille" name="prix_bouteille" placeholder="Prix bouteille">
			</div>
			<div class="input_ajout">
				<textarea class="input_text" name="description" placeholder="Descritpion" rows="3" cols="30" required></textarea>
			</div>
			<div class="input_ajout">
				<button type="submit">Ajouter produit</button>
			</div>
		</div>
	</form>

<!-- Gestion de la carte-->
<div class="option--title">Modification de la carte</div><br>

<div class="modif--produit">
	<select id="categorie" onchange="SelectCategorie();">
		<option disabled selected>--Choissisez catégorie--</option>
		<option value="Sauce Froide">Sauce Froide</option>
		<option value="Sauce Chaude">Sauce Chaude</option>
		<option value="Biere Pression">Biere Pression</option>
		<option value="Biere Bouteille">Biere Bouteille</option>
		<option value="Vin">Vin</option>
		<option value="Soft">Soft</option>
		<option value="Spiritueux">Spiritueux</option>
		<option value="Smoothie">Smoothie</option>
		<option value="Autres">Autres</option>
	</select>
</div>

<br><br><br>

	<form method="POST" action="php/gestion_produit.php">
	
		<div class="wrapper-sepa" id="wrapper"></div>

		<div class="modif--produit"><button type="submit">MODIFICATION MENU</button></div>
		
	</form>
	
<br><br><br>

<!-- =============================FOOTER====================================== -->
    
    <p class="footer_information">2021 | © Copyright | A la Patate, Tous droits réservés</p>  
    <p class="footer_information">13 Place Saint Louis - Metz</p>
    
</body>
	<script>

var select = document.getElementById( 'categorie' );
var wrapper = document.querySelector( '#wrapper' );

		function SelectCategorie() {
		
			index = select.selectedIndex;
			
			var categorie = (select.options[ index ].value );
			//console.log(categorie);

			fetchcategorie(categorie);
		}

		function fetchcategorie(categorie){
			fetch(`https://alapatate.fr/php/requet.php?categorie=${categorie}`)
			.then(data => data.text())
			.then(html => {
				wrapper.innerHTML = html;
			});
		}

		$('#radio-display').change(function (){
			if(this.value == 'Biere Pression'){
				$('#display-biere').show();
			}
			else{
				$('#display-biere').hide();
			}
		});
		
		$('#radio-display').change(function (){
			if(this.value == 'Vin'){
				$('#display-bouteille').show();
			}
			else{
				$('#display-bouteille').hide();
			}
		});

	</script>
</html>














