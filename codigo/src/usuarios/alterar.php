<?php
require_once realpath(__DIR__.'/../locais.php');
require_once realpath(__DIR__.'/banco.php');
require_once realpath(__DIR__.'/../post_seguro.php');
$id = postSeguro('id');
altereUsuario($id, $_POST['nomeUsuario'], $_POST['senha']);
vaPara("usuarios/confirmacao.php?id=$id&alterado=true");
