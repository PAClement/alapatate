<?php 
    include('../php/CBDD.php');
    $db = new Connection();

    /*ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);*/

    $categorie = htmlspecialchars($_GET["category"]);

?>

<!DOCTYPE html>
<html>
<head>
    <title>A LA PATATE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="result_menu.css">
    
    <link rel="icon" href="../images/logo_patate.png" />

    <script src="https://unpkg.com/scrollreveal"></script>
    
</head>
<body>
    
    <div class="logo">
        <a href="../index.php"><img src="../images/logo_patate.png" class="logo--patate"></a>
    </div>

    <?php echo'<div class="categorie-title">-'.$categorie.'-</div>'?>

    <?php 
    $result = $db->query("SELECT * FROM menu WHERE categorie = ?", array($categorie)); 
    ?>

<?php while($res = $result->fetch()): ?>

    <div class="plat">
        
        <div class="name"><?= $res['nom'] ?></div>
        
        <div class="ingredient"><?= $res['ingredients'] ?></div>   
          
        <?php if($categorie == "Biere Pression"): ?>

            <?php if( $res['prix'] != ""): ?>
             <div class="price">25cl : <?= $res['prix'] ?> €</div>
            <?php endif; ?>

            <?php if($res['prix_50'] != ""): ?>
                <div class="price">50cl :  <?= $res['prix_50'] ?> €</div>
            <?php endif; ?>
        
        <?php elseif($categorie == "Vin"): ?>
        
            <div class="price">Verre :  <?= $res['prix'] ?> €</div>

            <?php if($res['prix_bouteille'] != ""): ?>
                <div class="price">Bouteille : <?= $res['prix_bouteille'] ?> €</div>
            <?php endif; ?>
        
        <?php else: ?>
        
            <div class="price"><?= $res['prix'] ?> €</div>
        
        <?php endif; ?>
        
        <div class="sepa"></div>
        
    </div> 

<?php endwhile; ?>
        
<!-- ======================RETOURNER AU MENU=============== -->

    <?php if($categorie == "Sauce Froide" || $categorie == "Sauce Chaude"): ?>
        <a href="../lobby.php?utils=manger"><div class="link_back"> Retourner au menu </div></a>
        <a href="../lobby.php?utils=manger"><div class="retour-menu headline"> Retourner au menu</div></a>
    <?php else: ?>
        <a href="../lobby.php?utils=boire"><div class="link_back"> Retourner au menu </div></a>
        <a href="../lobby.php?utils=boire"><div class="retour-menu headline"> Retourner au menu</div></a>
    <?php endif; ?>

 <!-- ================== FOOTER ====================-->
		
    <div class="separation-happy--menu"></div>
            <p class="attention">l'abus d'alcool est dangereux pour la santé à consommer avec modération ! </p>
            <p class="copyright">2020 | © Copyright | A la Patate, Tous droits réservés</p>
            <p class="adresse">13 Place Saint Louis - Metz</p>
        <br>     
</body>
<script>
    ScrollReveal().reveal('.headline');
</script>
</html>