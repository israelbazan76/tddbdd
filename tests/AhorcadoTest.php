<?php

namespace Tests;
use \GH\Ahorcado;

final class AhorcadoTest extends \PHPUnit\Framework\TestCase {

    private $ahorcado;
    protected function setUp(){
        $this->ahorcado = new Ahorcado();
    }

    public function test01ClaseExiste() {
        $this->assertTrue(class_exists('\GH\Ahorcado'));
    }

    public function test02Mostrar(){
      $x = $this->ahorcado->mostrar();
      $this->assertEquals('',$x);
    }

    public function test03Palabra(){
        $x = $this->ahorcado->setPalabra('hola');
        $this->assertTrue($x);
    }

    public function test04MostrarGuionesSegunPalabra(){
        $x = $this->ahorcado->setPalabra('hola');
        $resultado = $this->ahorcado->mostrar();

        $this->assertEquals('____',$resultado);
    }

    public function test05JugarLetra()
    {
        $x = $this->ahorcado->jugarLetra('a');
        $this->assertTrue($x);
    }

    public function test06MostrarLetra(){
        $this->ahorcado->setPalabra('hola');
        $this->ahorcado->jugarLetra('a');
        $resultado = $this->ahorcado->mostrar();
        $this->assertEquals('___a',$resultado);
    }

    public function test07MostrarLetras(){
        $this->ahorcado->setPalabra('hola');
        $this->ahorcado->jugarLetra('a');
        $this->ahorcado->jugarLetra('h');

        $resultado = $this->ahorcado->mostrar();
        $this->assertEquals('h__a',$resultado);
    }

    public function test08NoMostrarLetra(){
        $this->ahorcado->setPalabra('hola');
        $this->ahorcado->jugarLetra('e');
        
        $resultado = $this->ahorcado->mostrar();
        $this->assertEquals('____',$resultado);
    }

    public function test09seguirJugando(){
        
        $resultado = $this->ahorcado->seguirJugando();
        
        $this->assertTrue($resultado);
    }
    public function test10NoSeguirJugando(){
        $this->ahorcado->setPalabra('hola');
        $this->ahorcado->jugarLetra('e');
        $this->ahorcado->jugarLetra('m');
        $this->ahorcado->jugarLetra('p');
        $this->ahorcado->jugarLetra('y');
        $this->ahorcado->jugarLetra('z');
        $resultado = $this->ahorcado->seguirJugando();
        
        $this->assertFalse($resultado);
    }

    public function test10Ganamos(){
        $this->ahorcado->setPalabra('hola');
        $this->ahorcado->jugarLetra('h');
        $this->ahorcado->jugarLetra('o');
        $this->ahorcado->jugarLetra('l');
        $this->ahorcado->jugarLetra('a');
        
        $resultado = $this->ahorcado->ganamos();
        
        $this->assertTrue($resultado);
    }
    public function test11NoGanamosTodavia(){
        $this->ahorcado->setPalabra('hola');
        $this->ahorcado->jugarLetra('h');
        $this->ahorcado->jugarLetra('o');
        $this->ahorcado->jugarLetra('l');
        
        
        $resultado = $this->ahorcado->ganamos();
        
        $this->assertFalse($resultado);
    }

    public function test12Perdimos(){
        $this->ahorcado->setPalabra('hola');
        $this->ahorcado->jugarLetra('x');
        $this->ahorcado->jugarLetra('e');
        $this->ahorcado->jugarLetra('u');
        $this->ahorcado->jugarLetra('y');
        $this->ahorcado->jugarLetra('z');
        
        $resultado = $this->ahorcado->perdimos();
        
        $this->assertTrue($resultado);
    }
    
    public function test12NoPerdimosTodavia(){
        $this->ahorcado->setPalabra('hola');
        $this->ahorcado->jugarLetra('x');
        
        $resultado = $this->ahorcado->perdimos();
        
        $this->assertFalse($resultado);
    }

}