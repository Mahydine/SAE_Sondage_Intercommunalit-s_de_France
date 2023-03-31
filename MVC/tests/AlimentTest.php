

<?php
require 'models/Aliment.php';
use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertSame;

final class AlimentTest extends TestCase{
    public function testCreateAliment(){
        $aliment = new Aliment(['id'=>1, 'nom'=>"banane", "categorie"=>"fruit", "proteines"=>1]);

        assertSame($aliment->getId(), 1);
        assertSame($aliment->getNom(), "banane");
        assertSame($aliment->getProteines(),1);
        assertSame($aliment->getCategorie(), 'fruit');
    }
}