

<?php
require 'models/Aliment.php';
use PHPUnit\Framework\TestCase;

final class AlimentTest extends TestCase{
    public function testCreateAliment(){
        $aliment = new Aliment(['id'=>2]);
    }
}