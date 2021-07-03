<?php 
       
    //Détection des erreurs

    /*ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);*/
      

    //Connection BDD
    
    include('CBDD.php');
    $db = new Connection();

    $categorie = htmlspecialchars($_GET["categorie"]);
    $html = '';
 
    $result = $db->query("SELECT * FROM menu WHERE categorie = ?", array($categorie)); 

    while($res = $result->fetch()){
    $html .= '
    <ul>
        <li> ';

    $html.='<div class="gestion_contain_input">';

    $html.='<input type="hidden" name="'.$res['id'].'__id1" value="'.$res['id'].'">';

    $html.='<label>';
    $html.='<input class="input-mobil-contain" id="'.$res['id'].'__check1" name="'.$res['id'].'__check1" type="checkbox" class="input_text">Supprimer ce produit';
    $html.='</label>';

    $html.='<input class="input_text_gestion input-mobil-contain" name="'.$res['id'].'__name1" value="'.$res['nom'].'" required>';
    $html.='<textarea class="textarea-mobil input_text_gestion input-mobil-contain" name="'.$res['id'].'__ingredient1" placeholder="Ingrédients">'.$res['ingredients'].'</textarea>';

    $html.='<input class="input_text_gestion input-mobil-contain" name="'.$res['id'].'__prix1" value="'.$res['prix'].'" placeholder="Prix">';
    $html.='<input class="input_text_gestion input-mobil-contain" name="'.$res['id'].'__prix_50" value="'.$res['prix_50'].'" placeholder="Prix Bière 50cl">';
    $html.='<input class="input_text_gestion input-mobil-contain" name="'.$res['id'].'__prix_bouteille" value="'.$res['prix_bouteille'].'" placeholder="Prix Bouteille Vin">';

    
    if($res['suggest'] == 'on'){
        $html.='<label>';
        $html.='<input id="'.$res['id'].'__suggest1" class="input-mobil-contain" name="'.$res['id'].'__suggest1" type="checkbox" class="input_text" checked>Ajouter à la Suggestion';
        $html.='</label>';
    }else{
        $html.='<label>';
        $html.='<input id="'.$res['id'].'__suggest1" class="input-mobil-contain" name="'.$res['id'].'__suggest1" type="checkbox" class="input_text">Ajouter à la Suggestion';
        $html.='</label>';
    }

    $html .='<div class="input-s-mobil"></div>';

    $html.='</div>';
    $html .='
                </li>
            </ul>   
            ';
    }

    echo $html;
    
    return $html;
?>