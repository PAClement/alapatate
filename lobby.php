<?php

    include('php/CBDD.php');
    $db = new Connection();

    /*ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);*/

    $var_temp = htmlspecialchars($_GET["utils"]);
	
?>
<!DOCTYPE html>
<html>
<head>
    <title>A LA PATATE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/lobby.css">
    
    <link rel="icon" href="images/logo_patate.png" />

    <script src="https://unpkg.com/scrollreveal"></script>
    
</head>
<body>
    
    <div class="logo">
        <img src="images/logo_patate.png" class="logo--patate">
    </div>

    <div class="suggest-article">
        <div class="suggest">
            <p class="suggest-title">- Nos Suggestions -</p>

            <?php
 
            $suggest_res = $db->query("SELECT * FROM `menu` WHERE suggest = ?", array('on'));

        if($var_temp == "manger"){
            while($suggest_resultat = $suggest_res->fetch()){

                if($suggest_resultat['categorie'] == 'Sauce froide' || $suggest_resultat['categorie'] == 'Sauce chaude'){

                  ?>
                  
                    <div class="name"><?= $suggest_resultat['nom'] ?></div>
        
                    <div class="ingredient"><?= $suggest_resultat['ingredients'] ?></div>   
                    
                    <div class="price"><?= $suggest_resultat['prix'] ?> €</div>

                    <div class="sepa"></div>
                    <br>

                    <?php
                }
            }
        }else{
            while($suggest_resultat = $suggest_res->fetch()){

                if($suggest_resultat['categorie'] != 'Sauce froide' && $suggest_resultat['categorie'] != 'Sauce chaude'){

                    ?>
                    <div class="name"><?= $suggest_resultat['nom'] ?></div>
        
                    <div class="ingredient"><?= $suggest_resultat['ingredients'] ?></div>   
                      
                    <?php if($suggest_resultat['categorie'] == "biere pression"): ?>
            
                        <?php if( $suggest_resultat['prix'] != ""): ?>
                         <div class="price">25cl : <?= $suggest_resultat['prix'] ?> €</div>
                        <?php endif; ?>
            
                        <?php if($suggest_resultat['prix_50'] != ""): ?>
                            <div class="price">50cl :  <?= $suggest_resultat['prix_50'] ?> €</div>
                        <?php endif; ?>
                    
                    <?php elseif($suggest_resultat['categorie'] == "vin"): ?>
                    
                        <div class="price">Verre :  <?= $suggest_resultat['prix'] ?> €</div>
            
                        <?php if($suggest_resultat['prix_bouteille'] != ""): ?>
                            <div class="price">Bouteille : <?= $suggest_resultat['prix_bouteille'] ?> €</div>
                        <?php endif; ?>
                    
                    <?php else: ?>
                    
                        <div class="price"><?= $suggest_resultat['prix'] ?> €</div>
                    
                    <?php endif; ?>
                    
                    <div class="sepa"></div>
                    <br>

                   <?php

                }
            }
        }
            ?>
        </div>
    </div>

    <?php
    
    if($var_temp == "manger"){
?>
        
        <div class="section-produit box">
            <!-- ===== SAUCE FROIDE ====== -->
            <a href="categorie/result_menu.php?category=Sauce Froide">
                <div class="headline container hvr-grow">
                <div class="image" style="background-image:url(images/categorie/saucefroide.jpg)"><img src="image1.png"/></div>
                    <div class="centered">Sauce <br> Froide</div>
                </div>
            </a>
            <!-- ===== SAUCE CHAUDE ====== -->
            <a href="categorie/result_menu.php?category=Sauce Chaude">
                <div class="headline container hvr-grow">
                <div class="image" style="background-image:url(images/categorie/saucechaude.jpeg)"><img src="image1.png"/></div>
                    <div class="centered">Sauce<br> Chaude</div>
                </div>
            </a>
        </div>
        
<?php
    }else{
?>

        
        <div class="section-produit box">
            <!-- ===== BIERE PRESSION ====== -->
            <a href="categorie/result_menu.php?category=Biere Pression">
                <div class="headline container hvr-grow">
                <div class="image" style="background-image:url(images/categorie/bierepression.jpg)"><img src="image1.png"/></div>
                    <div class="centered">Bière <br>Pression</div>
                </div>
            </a> 
            <!-- ===== BIERE BOUTEILLE ====== -->
            <a href="categorie/result_menu.php?category=Biere Bouteille">
                <div class="headline container hvr-grow">
                <div class="image" style="background-image:url(images/categorie/Bierebouteille.jpg)"><img src="image1.png"/></div>
                    <div class="centered">Bière<br> Bouteille</div>
                </div>
            </a>
            <!-- ===== VIN ====== -->
            <a href="categorie/result_menu.php?category=Vin">
                <div class="headline container hvr-grow">
                <div class="image" style="background-image:url(images/replace300300.jpg)"><img src="image1.png"/></div>
                    <div class="centered">Vin</div>
                </div>
            </a>
            <!-- ===== SOFT ====== -->
            <a href="categorie/result_menu.php?category=Soft">
                <div class="headline container hvr-grow">
                <div class="image" style="background-image:url(images/categorie/soft.jpg)"><img src="image1.png"/></div>
                    <div class="centered">Soft</div>
                </div>
            </a>
            <!-- ===== SPIRITUEUX ====== -->
            <a href="categorie/result_menu.php?category=Spiritueux">
                <div class="headline container hvr-grow">
                <div class="image" style="background-image:url(images/categorie/spiritueux.jpg)"><img src="image1.png"/></div>
                    <div class="centered">Spiritueux</div>
                </div>
            </a>
            <!-- ===== SMOOTHIE ====== -->
            <a href="categorie/result_menu.php?category=Smoothie">
                <div class="headline container hvr-grow">
                <div class="image" style="background-image:url(images/categorie/smoothie.jpg)"><img src="image1.png"/></div>
                    <div class="centered">Smoothie</div>
                </div>
            </a>
            <!-- ===== AUTRES ====== -->
            <a href="categorie/result_menu.php?category=Autres">
                <div class="headline container hvr-grow">
                <div class="image" style="background-image:url(images/categorie/Autre.jpg)"><img src="image1.png"/></div>
                    <div class="centered">Autres</div>
                </div>
            </a> 
        </div>
        
    <?php
    }
    ?>
    <br>
    <a href="index"><div class="link_back"> Retourner au menu </div></a>

    <a href="index"><div class="retour-menu headline"> Retourner au menu </div></a>

       <!-- ================== FOOTER ====================-->
		
            <p class="attention">l'abus d'alcool est dangereux pour la santé à consommer avec modération ! </p>
            <p class="copyright">2021 | © Copyright | A la Patate, Tous droits réservés</p>
            <p class="adresse">13 Place Saint Louis - Metz</p>
        <br>

</body>
<script>
    ScrollReveal().reveal('.headline');
</script>
</html>