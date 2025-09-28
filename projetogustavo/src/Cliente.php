<?php

namespace Unimar\Poo;

use Unimar\Poo\Usuario;
use Unimar\Poo\Produto;

class Cliente extends Usuario
{
    
    protected $carrinho = [];

    public function __construct(string $cpf, string $nome, string $sobrenome, string $email, string $senha){
        $this->cpf = $cpf;
        $this->nome = $nome;
        $this->sobrenome = $sobrenome;
        $this->email = $email;
        $this->senha = $senha;
    }

    public function adcionarCarrinho(Produto $produto): void{
        echo "item acionado ao carrinho de compras. \n";
        $this->carrinho[] = $produto;
    }

    public function removerCarrinho(int $index) {
        echo "removendo {$this->carrinho[$index]->titulo} do carrinho.\n";
        unset($this->carrinho[$index]);
        $this->carrinho = array_values($this->carrinho);        
    }

    public function comprarCarrinho() {
        //coisas acontecem
    }

    public function listarCarrinho() {
        echo "\nitens do carrinho de compras: \n";
        foreach ($this->carrinho as $item) {
            echo "## {$item->titulo} || {$item->valor} ##\n";
        }

    } 

}



