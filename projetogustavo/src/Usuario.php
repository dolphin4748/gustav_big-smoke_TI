<?php

namespace Unimar\Poo;

class Usuario
{
    protected string $cpf;
    protected string $nome;
    protected string $sobrenome;
    protected string $email;
    protected string $senha;
    protected bool $logado = false; 
    protected int $identificacao;



    public function login(string $email, string $senha): bool 
    {   
        if($email == 'vodkagames@mario.com' && $senha == 'mario12345') 
        {
          
            $this->logado = true;
            $this->identificacao = 1;
            echo'Cliente logado';
            
            return true;
        }
        else if($email == 'ricagames@mario.com' && $senha == 'suvacodecobra34')
        {
          
            $this->logado = true;
            $this->identificacao = 0;
            echo'Vendedor logado';
            
            return true;
        }
        
            return false;
        
    }

    public function logout()
    {
        $this->logado = false;
        $this->identificacao = -1;
        echo('Usuario deslogado.');
    }

}



