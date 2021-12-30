<?php
require_once realpath(__DIR__.'/../locais.php');
require_once realpath(__DIR__.'/banco.php');
require_once realpath(__DIR__.'/../post_seguro.php');
entregaPedido($_POST['id'], !$_POST['foiEntregue']);
vaPara(postSeguro('voltePara'));
