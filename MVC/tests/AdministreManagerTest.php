
<?php

use PHPUnit\Framework\TestCase;

require 'models/ModelManager.php';
require 'models/AdministreManager.php';

final class AdministreManagerTest extends TestCase{
    public function testStub(): void
    {
    $mockPDOStatement = $this->getMockBuilder(\PDOStatement::class)
        ->disableOriginalConstructor()
        ->getMock();
    $mockPDOStatement->expects($this->once())
        ->method('fetch')
        ->willReturn(['id' => 1, 'nom' => 'Jean', 'dateNaiss' => '2000-01-01']);

    // Création du mock pour la classe PDO
    $mockPDO = $this->getMockBuilder(\PDO::class)
        ->disableOriginalConstructor()
        ->getMock();
    $mockPDO->expects($this->once())
        ->method('prepare')
        ->willReturn($mockPDOStatement);

    // Création du mock pour la classe AdministreManager
    $mockManager = $this->getMockBuilder(AdministreManager::class)
        ->disableOriginalConstructor()
        ->onlyMethods(['getBdd'])
        ->getMock();
    $mockManager->expects($this->once())
        ->method('getBdd')
        ->willReturn($mockPDO);

    // Appel de la méthode getById avec le mockManager
    $administre = $mockManager->getById(1);

    // Vérification des résultats
    $this->assertEquals(1, $administre->getId());
    $this->assertEquals('Jean', $administre->getNom());
    $this->assertEquals('2000-01-01', $administre->getDateNaiss());
    }

    
}