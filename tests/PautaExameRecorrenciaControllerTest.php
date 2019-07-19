<?php

require_once './src/controller/PautaRecorrenciaCtr.php';
require_once './src/dbconf/db.php';
require_once './src/dbconf/conexion.php';
require_once './src/dbconf/getConection.php';

use PHPUnit\Framework\TestCase;
use MetaModels\Test\Contao\Database;


class PautaExameRecorrenciaControllerTest extends TestCase{

/**
 * @covers PautaExameRecorrenciaController::read
 */
    public function testRead(){
        $perc = new PautaExameRecorrenciaController();
       // $this->assertEquals(false, $perc->read(-1));
       // $this->assertEquals(true, $perc->read(1));
    }
        
    
    
}


?>