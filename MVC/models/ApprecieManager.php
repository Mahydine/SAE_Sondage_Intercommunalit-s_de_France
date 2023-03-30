<?php
require ('helpers/general.php');

class ApprecieManager extends ModelManager{
    private $apprecieClass ;
    private $helperGeneral ;
    private $alimentManager ; 

    public function __construct()
    {
        $this->alimentManager = new AlimentManager();
        $this->apprecieClass = Apprecie::class;
        $this->helperGeneral = new General();
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
        $sql ="SELECT alim_code, COUNT(alim_code) as nb_choix 
        FROM apprecie GROUP BY alim_code ORDER BY nb_choix DESC LIMIT 10";
        $req = $this->getBdd()->query($sql);
        $alimentsEtNbChoix = [];
;
        while($data = $req->fetch(PDO::FETCH_ASSOC)){

            $aliment = $this->alimentManager->getAlimentById($data['alim_code']);
            $alimentsEtNbChoix[] = ['aliment'=>$aliment, 'nbChoix'=>$data['nb_choix']];
        }
        return $alimentsEtNbChoix;
    }

    //renvoie un tableau avec l'age d'une personne et la catgorie de l'un de ses plats preferees
    public function getCategorieAge(){
        $sql ="SELECT AL.alim_ssgrp_nom_fr as categorie, FLOOR(DATEDIFF(CURRENT_DATE(), AD.dateNaissAdministré) /365) as age
        FROM apprecie A INNER JOIN administre AD ON A.idAdministré = AD.idAdministré INNER JOIN aliments AL ON AL.alim_code = A.alim_code";
        $req = $this->getBdd()->query($sql);
        return $req->fetchAll(PDO::FETCH_ASSOC); 
    }

    public function getMoyenneNutrimentsPrincipaux(){
        $sql = "SELECT AL.Protéines__N_x_625__g_100_g_ as Proteines, AL.Glucides__g_100_g_ as Glucides, AL.Lipides__g_100_g_ as Lipides ,AL.Sucres__g_100_g_ as Sucres, AL.Fibres_alimentaires__g_100_g_ as Fibres
        FROM apprecie A INNER JOIN aliments AL ON A.alim_code = AL.alim_code";
        $req = $this->getBdd()->query($sql);
        $nutrimentsPrincipaux =[];
        while($data = $req->fetch(PDO::FETCH_ASSOC)){
            $nutrimentsPrincipaux[]= $this->helperGeneral->stringToFloatArray($data);
        }
        return $this->helperGeneral->getMoyenneArray($nutrimentsPrincipaux);
    }

    public function getMoyenneNutrimentsSecondaires(){
        $sql = "SELECT AL.Fer__mg_100_g_ as Fer, Magnésium__mg_100_g_ as Magnésium, Manganèse__mg_100_g_ as Manganèse, Calcium__mg_100_g_ as Calcium, Chlorure__mg_100_g_ as Chlorure
        FROM apprecie A INNER JOIN aliments AL ON A.alim_code = AL.alim_code";
        $req = $this->getBdd()->query($sql);
        $nutrimentsPrincipaux =[];
        while($data = $req->fetch(PDO::FETCH_ASSOC)){
            $nutrimentsPrincipaux[]= $this->helperGeneral->stringToFloatArray($data);
        }
        return $this->helperGeneral->getMoyenneArray($nutrimentsPrincipaux);
    }
    
    
}