<?php
require_once realpath(__DIR__.'/../locais.php');
require_once realpath(__DIR__.'/banco.php');
require_once realpath(__DIR__.'/../post_seguro.php');
cancelePedido($_POST['id']);
vaPara(postSeguro('voltePara'));
