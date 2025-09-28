<?php

namespace Unimar\Poo;

class Produto
{
    
    public string $titulo;
    public float $valor;

    public function __construct(string $titulo, float $valor){
        $this->titulo = $titulo;
        $this->valor = $valor;
    }

}



