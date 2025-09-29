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
        $this->conta = new ContaCorrente($this, 0);
    }

    //Função para adcionar algum item no estoque
    public function adcionarEstoque(string $nomeJogo, int $qtd, float $preco) {
        $produto = new Produto($this, $nomeJogo, $qtd, $preco);

        echo "item acionado ao estoque de produtos.\n";
        $this->estoque[] = $produto;
    }

    //Função para remover algum item do estoque
    public function removerEstoque(int $index) {
        echo "removendo {$this->estoque[$index]->getNomeJogo()} do estoque.\n";
        unset($this->estoque[$index]);
        $this->estoque = array_values($this->estoque);        
    }

    //Função para exibir os itens no estoque
    public function listarEstoque() {
        if (empty($this->estoque)){
            echo "\nnão existe nenhum item no estoque atual.\n";
        }else{
            echo "\nitens do estoque de produtos: \n";
            foreach ($this->estoque as $item) {
                echo $item->exibirDetalhes();
            }
        }
    } 

    public function getEstoque(){
        return $this->estoque;
    }

}



