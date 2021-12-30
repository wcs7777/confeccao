<?php
require_once realpath(__DIR__.'/../locais.php');
require_once realpath(__DIR__.'/banco.php');
require_once realpath(__DIR__.'/../formatos.php');
$id = insiraCliente($_POST['nome'], desformateTelefone($_POST['telefone']));
vaPara("clientes/confirmacao.php?id=$id");
