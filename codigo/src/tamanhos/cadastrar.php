<?php
require_once realpath(__DIR__.'/../locais.php');
require_once realpath(__DIR__.'/banco.php');
$id = insiraTamanho($_POST['valor']);
vaPara("tamanhos/confirmacao.php?id=$id");
