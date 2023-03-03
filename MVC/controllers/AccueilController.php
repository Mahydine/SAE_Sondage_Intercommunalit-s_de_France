<?php 

class AccueilController{
    private $alimentManager ;
    private $apprecieManager;

    public function __construct($url)
    {
        $this->alimentManager = new AlimentManager();
        $this->apprecieManager = new ApprecieManager();
        if(!empty($url[0]) && count($url)>1){
            throw new Exception('Page introuvable');
        }else{
            $this->afficher();
        }
    }

    public function afficher(){
        $nbParticipants = $this->apprecieManager->getNbParticipants();
        $nbAliments = $this->apprecieManager->getNbAliments();
        $top10Aliments = $this->getTop10Aliments();
        require('views/View.php');
        $view = new View('Accueil', 'Accueil.css', 'Accueil');
        $view->generate(['nbParticipants'=>$nbParticipants, 'nbAliments'=>$nbAliments,'top10Aliments'=>$top10Aliments] );
    }

    //retourne une array des top 10 aliments et le nombre de fois ou ils ont ete choisis
    public function getTop10Aliments(){
        $top10AlimentsCodesNbChoix = $this->apprecieManager->getTop10Aliments();
        $aliments_codes = array_keys($top10AlimentsCodesNbChoix);
        $aliments = $this->alimentManager->getAlimentsById($aliments_codes);
        $top10Aliments = [];
        foreach($aliments as $aliment){
           $top10Aliments[] = ['aliment'=>$aliment, 'nbChoix'=>$top10AlimentsCodesNbChoix[$aliment->getId()]]; 
        }
        return $top10Aliments;
    }


}

?>
