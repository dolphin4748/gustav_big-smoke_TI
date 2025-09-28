<?php

require_once 'vendor/autoload.php';

use Unimar\Poo\Usuario;
use Unimar\Poo\Cliente;
use Unimar\Poo\Vendedor;
use Unimar\Poo\Produto;

//$email = readline('Digite seu e-mail ');
//$senha = readline('Digite sua senha ');

$Usuario = new Usuario(); //a variavel usuario foi criada para poder alocar a classe usuario para que assim podemos usa-la. toda vez que usamos o new, estamos alocando na memória uma classe nova, se usarmos o new usuario ele não irá utilizar o mesmo usuário.
$Usuario = $Usuario->login("cliente@gmail.com", "12345"); // essa parte em especifico, é justamente para fazer o a função login funcionar.

$vendedor = new Usuario(); 
$vendedor = $Usuario->login("vendedor@gmail.com", "12345");

$Usuario->conta->depositar(1000);

$vendedor->adcionarEstoque("Red Dead Redemption 2", 10, 250.00);
$vendedor->adcionarEstoque("Dark Souls III", 15, 180.00);
$vendedor->adcionarEstoque("God of War", 5, 300.00);
$vendedor->adcionarEstoque("Hollow Knight", 20, 80.00);
$vendedor->adcionarEstoque("Cyberpunk 2077", 8, 220.00);
$vendedor->adcionarEstoque("Sekiro: Shadows Die Twice", 12, 200.00);
$vendedor->adcionarEstoque("Battlefield 6", 7, 150.00);
$vendedor->adcionarEstoque("The Witcher 3: Wild Hunt", 9, 190.00);

$Usuario->adcionarCarrinho($vendedor->getEstoque()[1], 1);

$Usuario->listarCarrinho();

$Usuario->comprarCarrinho();
