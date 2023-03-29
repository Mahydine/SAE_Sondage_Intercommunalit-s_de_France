<?php 
function afficherSelecteurCategories($categories, $allAlimentsByCategories){
    $html = '';
    foreach ($categories as $categorie){
        $html .= '<div id="container-aliments">';
        $html .= '<select name="aliment" onchange="ajouterAliment(this)">';
        $html .= '<option disabled selected>'. $categorie .'</option>';
        foreach($allAlimentsByCategories[$categorie] as $aliment){
            $html .= '<option value="'. $aliment[0] .'">'. $aliment[1] .'</option>';
        }
        $html .= '</select>';
        $html .= '</div>';
    }
    return $html;
} 
?>