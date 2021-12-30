<?php
require_once realpath(__DIR__.'/../locais.php');
require_once realpath(__DIR__.'/banco.php');
$id = insiraUsuario($_POST['nomeUsuario'], $_POST['senha']);
vaPara("usuarios/confirmacao.php?id=$id");
