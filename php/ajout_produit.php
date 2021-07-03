<?php 
       
    //Détection des erreurs

    /*ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);*/
      

    //Connection BDD
    
    include('CBDD.php');
    $db = new Connection();
    
    
    //Création des variables pour la bdd

    $categorie = htmlspecialchars($_POST['categorie']); // Récup de la categorie
    $nom = htmlspecialchars($_POST['nom']); // Récup du nom   
    $ingredients = htmlspecialchars($_POST['description']); // Récup des ingredients   
    $prix = htmlspecialchars($_POST['prix']); // Récup du prix
    $prix_50 = htmlspecialchars($_POST['prix_50']); // Récup du prix des 50cl
    $prix_bouteille = htmlspecialchars($_POST['prix_bouteille']); // Récup du prix bouteille vin
    
    
    // Insertion des variables dans la bdd 

    $db->query("INSERT INTO `menu` (`categorie` , `nom` , `ingredients` , `prix` , `prix_50`, `prix_bouteille`) VALUES ( ? , ? , ? , ? , ? , ? )", array($categorie,$nom,$ingredients,$prix,$prix_50,$prix_bouteille));
                        
    //locate page du menu
    
    header('Location:https://alapatate.fr/menu_config');

?>