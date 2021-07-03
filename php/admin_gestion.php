<?php 
       
    //Détection des erreurs

  /* ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);*/
      
    session_start();
    //Connection BDD
    
    include('CBDD.php');
    $db = new Connection();


    $identifiant=htmlspecialchars($_POST['identifiant']); // Récup de l'indentifiant
    $password = htmlspecialchars($_POST['password']); // Récup du mdp 

    
    $sql = $db->query("SELECT * FROM administration WHERE identifiant=?",array($identifiant));


            if($res=$sql->fetch() )
		       {
                    if(password_verify($password, $res['password'])){
                        
                            $_SESSION['isAdmin1'] = true ;
                            header('Location:https://alapatate.fr/menu_config');
                            exit();
                        }
                   else {
                            //SI LES IDENTIFIANTS SONT INCORRECTS
                            $_SESSION['erreur'] = "Identifiant ou Mot de passe incorrects";
                            header('Location:https://alapatate.fr/admin_connexion');
                            exit();
                   }
		       }
		       else
		       {
			       	//SI LES IDENTIFIANTS SONT INCORRECTS
					$_SESSION['erreur'] = "Identifiant ou Mot de passe incorrects";
					header('Location:https://alapatate.fr/admin_connexion');
					exit();
		       }

?>