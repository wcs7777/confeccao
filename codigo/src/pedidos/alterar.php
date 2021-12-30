<?php
require_once realpath(__DIR__.'/../locais.php');
require_once realpath(__DIR__.'/banco.php');
require_once realpath(__DIR__.'/../post_seguro.php');
$id = postSeguro('id');
alterePedido(
	$id,
	$_POST['idCliente'],
	$_POST['previsaoEntrega'],
	$_POST['itens']
);
vaPara(
	"pedidos/confirmacao.php?id=$id&alterado=true&voltePara="
	.postSeguro('voltePara')
);
