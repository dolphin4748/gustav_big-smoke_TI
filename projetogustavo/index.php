<?php

require_once 'vendor/autoload.php';

use Unimar\Poo\Usuario;

$email = readline('Digite seu e-mail');
$senha = readline('Digite sua senha');

$Usuario = new Usuario(); //a variavel usuario foi criada para poder alocar a classe usuario para que assim podemos usa-la. toda vez que usamos o new, estamos alocando na memória uma classe nova, se usarmos o new usuario ele não irá utilizar o mesmo usuário.
$Usuario->login($email,$senha); // essa parte em especifico, é justamente para fazer o a função login funcionar.