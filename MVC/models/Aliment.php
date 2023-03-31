<?php

class Aliment{
    private $nom;
    private $id;
    private $categorie;
    private $proteines;
    private $glucides;
    private $lipides;
    private $sucres;
    private $fibres;
    private $fer;
    private $magnesium;
    private $manganese;
    private $calcium;
    private $chlorure;

    public function __construct($data)
    {
        $this->setData($data);
    }

    public function setData(array $data){
        foreach($data as $key=>$value){
            $method = 'set'. ucfirst($key);
            if(method_exists($this, $method)) $this->$method($value);
        }
    }

    //SETTERS
    public function setNom($nom){
        $this->nom = $nom;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function setCategorie($categorie){
        $this->categorie = $categorie;
    }
    public function setProteines($proteines){
        $this->proteines = $proteines;
    }
    public function setGlucides ($glucides){
        $this->glucides = $glucides;
    }
    public function setLipides ($lipides){
        $this->lipides = $lipides ;
    }
    public function setSucres ($sucres){
        $this->sucres = $sucres ;
    }
    public function setFibres ($fibres){
        $this->fibres = $fibres ;
    }
    public function setFer ($fer){
        $this->fer = $fer ;
    }
    public function setMagnesium ($magnesium){
        $this->magnesium = $magnesium ;
    }
    public function setManganese ($manganese){
        $this->manganese = $manganese ;
    }
    public function setCalcium ($calcium){
        $this->calcium = $calcium ;
    }
    public function setChlorure ($chlorure){
        $this->chlorure = $chlorure ;
    }

    //GETERS
    public function getId(){
        return $this->id;
    }
    public function getNom(){
        return $this->nom;
    }

    public function getCategorie(){
        return $this->categorie;
    }

    public function getProteines(){
        return $this->proteines;
    }
}


?>