<?php 
require 'models/Administre.php';
use PHPUnit\Framework\TestCase;

final class AdministreTest extends TestCase{

    public function testCreateAdministe(){
        $administre = new Administre(['id'=>2, "dateNaiss"=>'20/09/2003', "nom"=>"Hachigoat"]);
        $this->assertSame($administre->getId(), 2);
        $this->assertSame($administre->getDateNaiss(), '20/09/2003');
        $this->assertSame($administre->getDateNaiss(), '20/09/2003');
        
    }

}