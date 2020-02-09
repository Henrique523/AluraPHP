<?php

require_once 'src/Conta.php';

$primeiraConta = new Conta('123.456.789-10', 'Henrique');
$primeiraConta->depositar(500);
$primeiraConta->sacar(300);

echo $primeiraConta->recuperaSaldo() . PHP_EOL;
echo $primeiraConta->recuperaCpfTitular() . PHP_EOL;
echo $primeiraConta->recuperaNomeTitular() . PHP_EOL;

$segundaConta = new Conta('789.345.302-23', 'Gustavo');
var_dump($segundaConta);

echo Conta::$recuperarNumeroDeContas . PHP_EOL;
