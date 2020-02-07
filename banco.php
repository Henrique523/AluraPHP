<?php

require_once 'src/Conta.php';

$primeiraConta = new Conta();
$primeiraConta->depositar(500);
$primeiraConta->sacar(300);

$primeiraConta->defineCpfTitular('123.456.789-10');
$primeiaConta->defineNomeTitular('Henrique');


echo $primeiraConta->recuperaSaldo();
echo $primeiraConta->recuperaCpfTitular();
echo $primeiraConta->recuperaNomeTitular();