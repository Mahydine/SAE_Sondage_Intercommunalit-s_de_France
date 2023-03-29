
<?php

class Apprecie{

    private $id_aliment;
    private $id_administre;


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

    public function setId_aliment($id){
        $this->id_aliment = $id;
    }
    public function setId_administre($id){
        $this->id_administre= $id;
    }

}