<?php

class AlimentManager extends ModelManager{
    private $alimentClass ;

    public function __construct()
    {
        $this->alimentClass = Aliment::class;
    }

    // public function getAlimentById($Ids){
    //     $aliments= [];
    //     foreach($Ids as $id){
    //         $sql = 'SELECT alim_code as id, alim_nom_fr as nom, alim_ssgrp_nom_fr as categorie, Protéines__N_x_625__g_100_g_ as proteines, Glucides__g_100_g_ as Glucides,
    //         Lipides__g_100_g_ as lipides, Sucres__g_100_g_ as sucres, Fibres_alimentaires__g_100_g_ as fibres, Fer__mg_100_g_ as fer, Magnésium__mg_100_g_ as magnesium,
    //         Manganèse__mg_100_g_ as manganese, Calcium__mg_100_g_ as calcium, Chlorure__mg_100_g_ as chlorure FROM Aliment WHERE alim_code = :alim_code';
    //         $req = $this->getBdd()->prepare($sql);
    //         $req->bindParam(':alim_code', $id);
    //         $req->execute();
    //         $aliments[]= new $this->alimentClass($req->fetch(PDO::FETCH_ASSOC));
    //     }
    //     return $aliments;
    // }

    public function getAlimentById($id){
        $sql = 'SELECT alim_code as id, alim_nom_fr as nom, alim_ssgrp_nom_fr as categorie, Protéines__N_x_625__g_100_g_ as proteines, Glucides__g_100_g_ as Glucides,
                Lipides__g_100_g_ as lipides, Sucres__g_100_g_ as sucres, Fibres_alimentaires__g_100_g_ as fibres, Fer__mg_100_g_ as fer, Magnésium__mg_100_g_ as magnesium,
                Manganèse__mg_100_g_ as manganese, Calcium__mg_100_g_ as calcium, Chlorure__mg_100_g_ as chlorure FROM Aliments WHERE alim_code = :alim_code';
        $req = $this->getBdd()->prepare($sql);
        $req->bindParam(':alim_code', $id);
        $req->execute();
        $aliment =  new $this->alimentClass($req->fetch(PDO::FETCH_ASSOC));
        return $aliment;
    }

}