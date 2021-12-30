<?php
require_once realpath(__DIR__.'/../locais.php');
require_once realpath(__DIR__.'/banco.php');
require_once realpath(__DIR__.'/../formatos.php');
require_once realpath(__DIR__.'/../post_seguro.php');
$id = postSeguro('id');
altereCliente($id, $_POST['nome'], desformateTelefone($_POST['telefone']));
vaPara("clientes/confirmacao.php?id=$id&alterado=true");
