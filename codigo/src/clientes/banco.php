<?php
require_once realpath(__DIR__.'/../banco.php');

function insiraCliente($nome, $telefone) {
	return executeQuery(
		"INSERT INTO `cliente` (`nome`, `telefone`) VALUES ('%s', '%s')",
		[$nome, $telefone],
		true
	);
}

function altereCliente($id, $nome, $telefone) {
	executeQuery(
		"UPDATE
			`cliente`
		SET
			`nome` = '%s',
			`telefone` = '%s'
		WHERE
			`id` = %d",
		[$nome, $telefone, $id]
	);
}

function cliente($id) {
	return primeiroResultado(
		"SELECT
			`nome`,
			`telefone`
		FROM
			`cliente`
		WHERE
			`id` = %d
		LIMIT
			1",
		[$id]
	);
}

function clientes() {
	return selecioneDados(
		"SELECT `id`, `nome`, `telefone` FROM `cliente` ORDER BY `id`"
	);
}
