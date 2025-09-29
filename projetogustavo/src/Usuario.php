<?php

namespace Unimar\Poo;

use Unimar\Poo\Cliente;
use Unimar\Poo\Vendedor;

class Usuario
{

    protected string $cpf;
    protected string $nome;
    protected string $sobrenome;
    protected string $email;
    protected string $senha;
    public $conta;


    //Função para efetuar login ela recebe como parametros email e senha, se houver uma conta com os email e senha passados ela retornara uma classe cliente ou vendedor a depender da conta
    public function login(string $email, string $senha)
    {   
        if($email == 'cliente@gmail.com' && $senha == '12345') 
        {
            echo "Cliente logado\n";
            
            return new Cliente("111.111.111-11", "clinte", "teste", "cliente@gamil.com", "12345");
        }
        else if($email == 'vendedor@gmail.com' && $senha == '12345')
        {
          
            echo "Vendedor logado\n";
            
            return new Vendedor("111.111.111-11", "vendedor", "teste", "vendedor@gamil.com", "12345");
        }

        echo "Não foi possivel fazer login\n";
        
        return null;
        
    }

    public function logout()
    {
        echo "Usuario deslogado.\n";
        return new Usuario();
    } 

    public function getNomeCompleto(): string
    {
        return $this->nome . " " . $this->sobrenome;
    }

    public function getCpf(): string
    {
        return $this->cpf;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

}



