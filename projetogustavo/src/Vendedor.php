<?php

namespace Unimar\Poo;

use Unimar\Poo\Usuario;
use Unimar\Poo\Produto;

class Vendedor extends Usuario
{
    protected $stoque = [];

    public function __construct(string $cpf, string $nome, string $sobrenome, string $email, string $senha){
        $this->cpf = $cpf;
        $this->nome = $nome;
        $this->sobrenome = $sobrenome;
        $this->email = $email;
        $this->senha = $senha;
    }

    public function adcionarStoque(Produto $produto) {
        echo "item acionado ao stoque de produtos.\n";
        $this->stoque[] = $produto;
    }

    public function removerStoque() {
        //coisas acontecem
    }

    public function listarStoque() {
        echo "\nitens do stoque de produtos: ";
        foreach ($this->stoque as $item) {
            echo "\n## {$item->titulo} || {$item->valor} ##";
        }

    } 

}



