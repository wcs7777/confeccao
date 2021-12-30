<?php
require_once realpath(__DIR__.'/../locais.php');
require_once realpath(__DIR__.'/banco.php');
require_once realpath(__DIR__.'/../post_seguro.php');
$id = postSeguro('id');
altereTamanho($id, $_POST['valor']);
vaPara("tamanhos/confirmacao.php?id=$id&alterado=true");
