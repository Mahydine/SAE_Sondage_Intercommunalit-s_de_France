
<?php 

class AdministreManager extends ModelManager{
    private $administreClass;

    public function __construct()
    {
        $this->administreClass = Adminstre::class;
    }

    public function getById($id){
        echo '<pre>';
        var_dump($id);
        $sql = 'SELECT idAdministré as id, nomAdministré as nom, dateNaissAdministré as dateNaiss FROM administre WHERE idAdministré = :id';
        $req = $this->getBdd()->prepare($sql);
        $req->bindParam(':id', $id);
        $req->execute();

        
        
        $administre = new Administre($req->fetch(PDO::FETCH_ASSOC));


        echo '</pre>';
        return $administre;
    }
    
}