<?php
require_once realpath(__DIR__.'/../locais.php');
require_once realpath(__DIR__.'/../sessao.php');

inicieSessao();
$_SESSION['verifique'] = session_id();
$_POST['verifique'] = session_id();
if (credenciaisValidas()) {
	vaPara('index.php');
} else {
	require_once realpath(__DIR__.'/../post_seguro.php');
	$nomeUsuario = postSeguro('nomeUsuario');
	vaPara("entrar.php?nomeUsuario=$nomeUsuario");
}
