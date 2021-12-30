<?php
function restrinja() {
	require_once realpath(__DIR__.'/restrito.php');
}

function inicieSessao() {
	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}
}

function estaCredenciado() {
	inicieSessao();
	return isset($_SESSION['usuario']);
}

function eAdministrador() {
	inicieSessao();
	return ($_SESSION['usuario'] == 1);
}

function credenciaisValidas() {
	inicieSessao();
	$verifique = (
		isset($_SESSION['verifique']) &&
		$_SESSION['verifique'] == session_id() &&
		isset($_POST['nomeUsuario'])  &&
		isset($_POST['senha'])
	);
	if (!$verifique) {
		return false;
	}
	/* Permissão temporária */
	$_SESSION['usuario'] = 1;
	require_once realpath(__DIR__.'/usuarios/banco.php');
	$usuario = sessaoUsuario($_POST['nomeUsuario']);
	$valido = (
		!empty($usuario) &&
		password_verify($_POST['senha'], $usuario['senha'])
	);
	if ($valido) {
		configureSessao($usuario['id']);
	} else {
		destruaSessao();
	}
	return $valido;
}

function configureSessao($id) {
	restrinja();
	inicieSessao();
	destruaSessao(); /* limpar sessão */
	inicieSessao();
	$_SESSION['usuario'] = $id;
}

function destruaSessao() {
	restrinja();
	inicieSessao();
	$_SESSION = array();
	session_destroy();
}
