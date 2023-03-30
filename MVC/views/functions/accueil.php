<?php 

function afficher_aliments(array $aliments, $view){
    $cpt = 1;

    $html = "";
    foreach ($aliments as $key=>$aliment){
        $html .='<div class="row">
                    <span>
        ';
        switch($cpt){
            case $cpt===1 : $html .= '<img src="'.$view->img('top1.svg').'" />'; break;
            case $cpt==2 : $html .= '<img src="'.$view->img('top2.svg').'" />'; break;
            case $cpt==3 : $html .= '<img src="'.$view->img('top3.svg').'" />'; break;
        };
        $html .= $aliment['aliment']->getNom();
        $html .= "</span>
                 <span>";
        $html .= 'Apprécié '. $aliment['nbChoix']. ' fois.';
        $html .= '</span>
             </div>';
        $cpt+=1;
    }
    return $html;    
    
}
