<?php


class ApprecieManager extends ModelManager{
    private $apprecieClass ;

    public function __construct()
    {
        $this->apprecieClass = Apprecie::class;
    }

    //renvoi le nombre de participants aux sondages
    public function getNbParticipants(){
        $sql = 'Select Count(distinct(idAdministré)) FROM apprecie';
        $nbParticipants = $this->getBdd()->query($sql)->fetch()['Count(distinct(idAdministré))'];
        return $nbParticipants;
    }

    //renvoi le nombre d'aliments differents choisis lors des sondages
    public function getNbAliments(){
        $sql ="Select Count(distinct(alim_code)) FROM apprecie";
        $nbAliments = $this->getBdd()->query($sql)->fetch()['Count(distinct(alim_code))'];
        return $nbAliments;
    }

    //renvoie l'id des 10 aliments les plus citee lors des sondages + le nombre de fois qu'ils ont ete choisis
    public function getTop10Aliments(){
        $sql ="SELECT alim_code as id_aliment, COUNT(alim_code) as nb_choix 
        FROM apprecie GROUP BY id_aliment ORDER BY nb_choix  DESC LIMIT 10";
        $alimentsEtNbChoix = $this->getBdd()->query($sql)->fetchAll();
        $topAliments =[];
        foreach($alimentsEtNbChoix as $alimentEtNbChoix){
            $topAliments[$alimentEtNbChoix['id_aliment']] = $alimentEtNbChoix['nb_choix'];
        }
        return $topAliments;
    }
}