<?php
require_once realpath(__DIR__.'/../restrito_administrador.php');
require_once realpath(__DIR__.'/../banco.php');

function insiraUsuario($nomeUsuario, $senha) {
	return executeQuery(
		"INSERT INTO
			`usuario` (`nomeUsuario`, `senha`)
		VALUES
			('%s', '%s')",
		[$nomeUsuario, password_hash($senha, PASSWORD_DEFAULT)],
		true
	);
}

function altereUsuario($id, $nomeUsuario, $senha) {
	executeQuery(
		"UPDATE
			`usuario`
		SET
			`nomeUsuario` = '%s',
			`senha` = '%s'
		WHERE
			`id` = %d",
		[$nomeUsuario, password_hash($senha, PASSWORD_DEFAULT), $id]
	);
}

function deleteUsuario($id) {
	if ($id != 1) {
		executeQuery("DELETE FROM `usuario` WHERE `id` = %d", [$id]);
	}
}

function sessaoUsuario($nomeUsuario) {
	return primeiroResultado(
		"SELECT
			`id`,
			`senha`
		FROM
			`usuario`
		WHERE
			BINARY `nomeUsuario` = '%s'
		LIMIT
			1",
		[$nomeUsuario]
	);
}

function nomeUsuario($id) {
	$resultado = primeiroResultado(
		"SELECT `nomeUsuario` FROM `usuario` WHERE `id` = %d LIMIT 1", [$id]
	);
	return (!empty($resultado))? $resultado['nomeUsuario'] : false;
}

function usuarios() {
	return selecioneDados(
		"SELECT `id`, `nomeUsuario` FROM `usuario` ORDER BY `id`"
	);
}
