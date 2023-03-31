
<?php

use PHPUnit\Framework\TestCase;

require_once 'models/ModelManager.php';
require 'models/SondageManager.php';

final class SondageManagerTest extends TestCase
{
    public function testGetCategoriesAliments()
    {
       
        $mockPDOStatement = $this->getMockBuilder(PDOStatement::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['execute', 'fetch'])
            ->getMock();
        $mockPDOStatement->expects($this->once())
            ->method('execute');
        $mockPDOStatement->expects($this->exactly(3))
            ->method('fetch')
            ->willReturnOnConsecutiveCalls(
                ['alim_grp_nom_fr' => 'Categorie 1'],
                ['alim_grp_nom_fr' => 'Categorie 2'],
                false
            );

        
        $mockPDO = $this->getMockBuilder(PDO::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['prepare'])
            ->getMock();
        $mockPDO->expects($this->once())
            ->method('prepare')
            ->willReturn($mockPDOStatement);

      
        $mockSondageManager = $this->getMockBuilder(SondageManager::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['getBdd'])
            ->getMock();
        $mockSondageManager->expects($this->once())
            ->method('getBdd')
            ->willReturn($mockPDO);


        $result = $mockSondageManager->getCategoriesAliments();
        $this->assertCount(2, $result);
        $this->assertEquals('Categorie 1', $result[0]);
        $this->assertEquals('Categorie 2', $result[1]);
    }


    
    public function testGetAlimentsNameAndIdByCategorie(){
        $categorie = 'Categorie 1';


        $mockPDOStatement = $this->getMockBuilder(PDOStatement::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['execute', 'fetch'])
            ->getMock();
        $mockPDOStatement->expects($this->once())
            ->method('execute')
            ->with([$categorie]);
        $mockPDOStatement->expects($this->exactly(3))
            ->method('fetch')
            ->willReturnOnConsecutiveCalls(
                ['alim_code' => 1, 'alim_nom_fr' => 'Aliment 1'],
                ['alim_code' => 2, 'alim_nom_fr' => 'Aliment 2'],
                false
            );


        $mockPDO = $this->getMockBuilder(PDO::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['prepare'])
            ->getMock();
        $mockPDO->expects($this->once())
            ->method('prepare')
            ->willReturn($mockPDOStatement);


        $mockSondageManager = $this->getMockBuilder(SondageManager::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['getBdd'])
            ->getMock();
        $mockSondageManager->expects($this->once())
            ->method('getBdd')
            ->willReturn($mockPDO);


        $result = $mockSondageManager->getAlimentsNameAndIdByCategorie($categorie);
        $this->assertCount(2, $result);
        $this->assertEquals([1, 'Aliment 1'], $result[0]);
        $this->assertEquals([2, 'Aliment 2'], $result[1]);
    }

    public function testGetBooleanSondageDejaEffectue()
    {
        $nom = 'Dupont';
        $prenom = 'Pierre';
        $adresse = '10 rue des Lilas';
    

        $mockPDOStatement = $this->getMockBuilder(PDOStatement::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['execute', 'rowCount', 'bindParam'])
            ->getMock();
        $mockPDOStatement->expects($this->once())
            ->method('execute');
        $mockPDOStatement->expects($this->once())
            ->method('rowCount')
            ->willReturn(0);
        $mockPDOStatement->expects($this->exactly(3))
            ->method('bindParam');
    

        $mockPDO = $this->getMockBuilder(PDO::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['prepare'])
            ->getMock();
        $mockPDO->expects($this->once())
            ->method('prepare')
            ->willReturn($mockPDOStatement);
    

        $mockSondageManager = $this->getMockBuilder(SondageManager::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['getBdd'])
            ->getMock();
        $mockSondageManager->expects($this->once())
            ->method('getBdd')
            ->willReturn($mockPDO);
    

        $result = $mockSondageManager->getBooleanSondageDejaEffectue($nom, $prenom, $adresse);
        $this->assertTrue($result);
    }

    public function testSetNewAdministe()
{
    $nom = 'Dupont';
    $prenom = 'Pierre';
    $dateNaiss = '2000-01-01';
    $adresse = '10 rue des Lilas';
    $codePostal = '75000';
    $ville = 'Paris';
    $numTel = '0612345678';


    $mockPDOStatement = $this->getMockBuilder(PDOStatement::class)
        ->disableOriginalConstructor()
        ->onlyMethods(['execute', 'bindParam'])
        ->getMock();
    $mockPDOStatement->expects($this->once())
        ->method('execute');
    $mockPDOStatement->expects($this->any())
        ->method('bindParam');


    $mockPDO = $this->getMockBuilder(PDO::class)
        ->disableOriginalConstructor()
        ->onlyMethods(['prepare'])
        ->getMock();
    $mockPDO->expects($this->once())
        ->method('prepare')
        ->willReturn($mockPDOStatement);


    $mockSondageManager = $this->getMockBuilder(SondageManager::class)
        ->disableOriginalConstructor()
        ->onlyMethods(['getBdd'])
        ->getMock();
    $mockSondageManager->expects($this->once())
        ->method('getBdd')
        ->willReturn($mockPDO);


    $this->expectNotToPerformAssertions();
    $mockSondageManager->setNewAdministe($nom, $prenom, $dateNaiss, $adresse, $codePostal, $ville, $numTel);
}
   

}