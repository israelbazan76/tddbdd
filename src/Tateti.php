<?php

namespace GH;

class Tateti {
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
    
    public function mostrarTablero(){
        return $this->tablero;
    }
    public function setear(string $ficha,int $a,int $b){
        $this->tablero[$a][$b]=$ficha;
        return true;
    }
}