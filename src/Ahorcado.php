<?php

namespace GH;

class Ahorcado {

    private $palabra;
    private $letraJugada=array();
    private $vidas = 5;
    
    public function mostrar(){
        $salida = '';
        for($i=0; $i<strlen($this->palabra) ; $i++)
        {
          if(in_array($this->palabra[$i], $this->letraJugada))
          {
            $salida .= $this->palabra[$i];
          }else{
            $salida .= '_';
          }
          
        }
        return $salida;
    }

    public function setPalabra(string $palabra){
        $this->palabra = $palabra;
        return true;
    }
    
    public function jugarLetra(string $letra){
        $this->letraJugada[] = $letra;
        return true;
    }

    public function seguirJugando(){
        $fallos = 0;
        for($i=0; $i<count($this->letraJugada) ; $i++)
        {
          if(!in_array($this->letraJugada[$i], str_split($this->palabra)))
          {
            $fallos++;
          }
          
        }       
        return ($fallos < $this->vidas);
    }
    public function ganamos(){
        $exitos = 0;
        for($i=0; $i<count($this->letraJugada) ; $i++)
        {
          if(in_array($this->letraJugada[$i], str_split($this->palabra)))
          {
            $exitos++;
          }
          
        }       
        return ($exitos == strlen($this->palabra));
    }
    public function perdimos(){
        $fallos = 0;
        for($i=0; $i<count($this->letraJugada) ; $i++)
        {
          if(!in_array($this->letraJugada[$i], str_split($this->palabra)))
          {
            $fallos++;
          }
          
        }       
        return ($fallos >= ($this->vidas));
    }
}