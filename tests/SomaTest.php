<?php
use PHPUnit\Framework\TestCase;

require_once './src/view/integracao/Soma.php';
class SomaTest extends TestCase{

    function testAdd(){
        $var = new Soma();
        $this->assertFalse(false, $var->add());
    }
}

?>