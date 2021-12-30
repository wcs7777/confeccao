<?php
require_once realpath(__DIR__.'/../locais.php');
require_once realpath(__DIR__.'/banco.php');
require_once realpath(__DIR__.'/../post_seguro.php');
require_once realpath(__DIR__.'/../formatos.php');
$id = postSeguro('id');
altereModelo($id, $_POST['tipo'], desformatePreco($_POST['preco']));
vaPara("modelos/confirmacao.php?id=$id&alterado=true");
