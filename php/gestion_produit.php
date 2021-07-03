<?php 

	/*ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);*/

    include('CBDD.php');
    $db = new Connection();
    
    $array_main = array();

	foreach( $_POST as $name=>$value ){
	
		$item = explode('__', $name)[0];

        if(!isset($array_main[$item])){

            $array_main[$item]=[];

        }

		array_push($array_main[$item], $value);

	}	

	foreach($array_main as $key=>$array){

        if($array[1] == "on"){

        $db->query("DELETE FROM `menu` WHERE id = ? ", array($array[0]));

        }else{

        $db->query("UPDATE `menu`  SET  nom = ?, ingredients = ?,  prix = ?, prix_50 = ?, prix_bouteille = ?, suggest = ? WHERE id = ?" ,array($array[1],$array[2],$array[3],$array[4],$array[5],$array[6],$array[0]));

        }

	}

	header("location:../menu_config");
	exit();
	
?>