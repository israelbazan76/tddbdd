<?php

namespace Tests;
use \GH\Tateti;

final class TatetiTest extends \PHPUnit\Framework\TestCase {

    private $tateti;
    private $tablero = array(
        0 => array(
            0 => '',
            1 => '',
            2 => ''
        ),
        1 => array(
            0 => '',
            1 => '',
            2 => ''
        ),
        2 => array(
            0 => '',
            1 => '',
            2 => ''
        )
    );
    protected function setUp(){
        $this->tateti = new Tateti();
        
    }
    public function testClaseTatetiExiste() {
        $this->assertTrue(class_exists('\GH\Tateti'));
    }
    public function test01MostrarTableroVacio() {
        $resultado = $this->tateti->mostrarTablero();
        
        $this->assertEquals($this->tablero,$resultado);
    }
    
    public function test02SetearX() {
    
        $resultado = $this->tateti->setear('x',1,1);
        $this->assertTrue($resultado);
    }

    public function test03MostrarTableroConX() {
    
        $this->tateti->setear('x',1,1);
        $resultado = $this->tateti->mostrarTablero();
        $this->tablero[1][1]='x';
        $this->assertEquals($this->tablero,$resultado);
    }

    public function test04Mostrar2jugadas() {
    
        $this->tateti->setear('x',1,1);
        $this->tateti->setear('0',0,1);
        $this->tablero[1][1]='x';
        $this->tablero[0][1]='0';
          
        $resultado = $this->tateti->mostrarTablero();
        
        $this->assertEquals($this->tablero, $resultado);
    }


}