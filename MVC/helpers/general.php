<?php
//cette class sert a stocker des fonctions qui traitent des donnee de la base de donnee sondages pour en renvoyer d'autres utilisables
class General{
    public function getMoyenneArray(array $array){
        $diviser= function($nombre, $diviseur){
            return $nombre/$diviseur;
        };
    
        $result = [];
        foreach($array as $element){
            foreach($element as $key=>$element2){
                if(!isset($result[$key])) $result[$key] = $element2;
                else $result[$key] += $element2;
            }
        }
        $moyennes = array_map($diviser, $result, array_fill(0, count($result), count($array)));
        $result = array_combine(array_keys($result), $moyennes);
        return $result;
    }

    public function stringToFloatArray(array $array){
        foreach($array as $key=>$element){
            //on remplace les virgules par des poitns et les '< ' par le vide pour permettre la conversion en float
            $element = str_replace([',', '< '], ['.', ''], $element);
            $array[$key] = floatval($element);
        }

        return $array;
    }
}


?>