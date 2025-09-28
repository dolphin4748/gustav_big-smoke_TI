<?php

namespace Unimar\Poo;

use Unimar\Poo\Usuario;
use Unimar\Poo\Produto;

class Vendedor extends Usuario
{
    protected $estoque = [];

    public function __construct(string $cpf, string $nome, string $sobrenome, string $email, string $senha){
        $this->cpf = $cpf;
        $this->nome = $nome;
        $this->sobrenome = $sobrenome;
        $this->email = $email;
        $this->senha = $senha;
    }

    public function adcionarEstoque(Produto $produto) {
        echo "item acionado ao estoque de produtos.\n";
        $this->estoque[] = $produto;
    }

    public function removerEstoque(int $index) {
        echo "removendo {$this->estoque[$index]->getNomeJogo()} do estoque./n";
        unset($this->estoque[$index]);
        $this->estoque = array_values($this->estoque);        
    }

    public function listarEstoque() {
        if (empty($this->estoque)){
            echo "\nnão existe nenhum item no estoque atual.\n";
        }else{
            echo "\nitens do estoque de produtos: ";
            foreach ($this->estoque as $item) {
                echo $item->exibirDetalhes();
            }
        }
    } 

    public function getEstoque(){
        return $this->estoque;
    }

}



