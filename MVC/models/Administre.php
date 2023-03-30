
<?php

class Administre{
    private $id;
    private $nom;
    private $dateNaiss;

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

    public function setId($id){
        $this->id = $id;
    }

    public function setNom($nom){
        $this->nom = $nom;
    }

    public function setDateNaiss($date){
        $this->dateNaiss= $date;
    }

    public function getDateNaiss(){
        return $this->dateNaiss;
    }

}