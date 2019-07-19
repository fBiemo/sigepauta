<?php
/**
 * Created by IntelliJ IDEA.
 * User: Biemos
 * Date: 7/6/2019
 * Time: 3:58 PM
 */
use PHPUnit\Framework\TestCase;
require_once './src/view/integracao/functions/FuncoesIntegracao.php';

class IntragrationFunctionsTest extends TestCase{
    /**
     * @var FuncoesIntegracao
     */
    private $fucInt;

    /**
     * IntragrationFunctionsTest constructor.
     */
    public function __construct(){
        $this->fucInt = new FuncoesIntegracao();
        parent::__construct();
    }
    public function testInstanceFuncoesIntragacao(){
        $this->assertInstanceOf(FuncoesIntegracao::class, $this->fucInt);
    }

    /**
     * @covers FuncoesIntegracao::buscarDadosNoEsiraEstudante
     */
    function testBuscarDadosNoEsiraEstudante(){

        $data= $this->fucInt->buscarDadosNoEsiraEstudante();
        $this->assertEquals(665, count($data));
    }
    /**
     * @covers FuncoesIntegracao::buscarDadosNoEsiraDisciplina
     */
    function testBuscarDadosNoEsiraDisciplina(){
        $la = new FuncoesIntegracao();
        $data= $la->buscarDadosNoEsiraDisciplina();
        $this->assertEquals(379, count($data));
    }
    /**
     * @covers FuncoesIntegracao::buscarDadosNoEsiraCurso
     */
    function testBscarDadosNoEsiraCurso(){
        $la = new FuncoesIntegracao();
        $data= $la->buscarDadosNoEsiraCurso();
        $this->assertEquals(5, count($data));
    }
    /**
     * @covers FuncoesIntegracao::buscarDadosNoEsiraInscricao
     */
    function testBuscarDadosNoEsiraInscricao(){

        $la = new FuncoesIntegracao();
        $data= $la->buscarDadosNoEsiraInscricao();
        $this->assertEquals(15746, count($data));
    }
    /**
     * @covers FuncoesIntegracao::listaDeAlunos
     */
    public  function testListaDeAlunos(){

        $la = new FuncoesIntegracao();
        $this->assertEquals(684, $la->listaDeAlunos());
    }
    /**
     * @covers FuncoesIntegracao::listaDeDisciplinas
     */
    function testListaDeDisciplinas(){
        $ld = new FuncoesIntegracao();
        $this->assertEquals(20, $ld->listaDeDisciplinas());
    }

    /**
     * @covers FuncoesIntegracao::listaDeCursos
     */

    function testListaDeCursos(){
        $lc = new FuncoesIntegracao();
        $this->assertEquals(11, $lc->listaDeCursos());
    }

    /**
     * @covers FuncoesIntegracao::listaDeInscricoes
     */

    function testListaDeInscricoes() {
        $li = new FuncoesIntegracao();
        $this->assertEquals(54, $li->listaDeInscricoes());
    }
}
