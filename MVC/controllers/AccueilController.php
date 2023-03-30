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

        $administreManager = new AdministreManager();


        $nbParticipants = $this->apprecieManager->getNbParticipants();
        $nbAliments = $this->apprecieManager->getNbAliments();
        $top10Aliments = $this->apprecieManager->getTop10Aliments();
        $categorieAge =  $this->classerParAge( $this->apprecieManager->getCategorieAge());
        $moyenneNutrimentsPrincipaux = $this->apprecieManager->getMoyenneNutrimentsPrincipaux();
        $moyenneNutrimentsSecondaires = $this->apprecieManager->getMoyenneNutrimentsSecondaires();
        require_once('views/View.php');
        $view = new View('Accueil', 'Accueil.css', 'Accueil', 'accueil.js');
        $view->generate(['nbParticipants'=>$nbParticipants, 'nbAliments'=>$nbAliments,'top10Aliments'=>$top10Aliments, 'categorieAge'=>$categorieAge,
        'moyenneNutrimentsPrincipaux' =>$moyenneNutrimentsPrincipaux,'moyenneNutrimentsSecondaires' =>$moyenneNutrimentsSecondaires, 'view'=>$view
        ] );
    }

    function classerParAge($data){
        $data_classe = [];
        foreach ($data as $element){
            
            if(!isset($data_classe[$element['categorie']])){
                $data_classe[$element['categorie']] = ['< 16ans' =>0, '16-25 ans'=>0, '26-40 ans'=>0, '>40 ans'=>0];
            }
            $categorie = $element['categorie'];
            $age = $element['age'];
            switch ($age) {
                case $age<16: $data_classe[$categorie]['< 16ans'] +=1; break;
                case $age>=16 && $age<=25: $data_classe[$categorie]['16-25 ans'] +=1; break;
                case $age>=26 && $age<=40: $data_classe[$categorie]['26-40 ans'] +=1; break;
                case $age>40 : $data_classe[$categorie]['>40 ans'] +=1; break;
            }
        }
        return $data_classe;
    }

    // //retourne une array des top 10 aliments et le nombre de fois ou ils ont ete choisis
    // public function getTop10Aliments(){
    //     $top10AlimentsCodesNbChoix = $this->apprecieManager->getTop10Aliments();
    //     $aliments_codes = array_keys($top10AlimentsCodesNbChoix);
    //     $aliments = $this->alimentManager->getAlimentsById($aliments_codes);
    //     $top10Aliments = [];
    //     foreach($aliments as $aliment){
    //        $top10Aliments[] = ['aliment'=>$aliment, 'nbChoix'=>$top10AlimentsCodesNbChoix[$aliment->getId()]]; 
    //     }
    //     return $top10Aliments;
    // }


}

?>
