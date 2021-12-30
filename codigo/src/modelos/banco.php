<?php
require_once realpath(__DIR__.'/../banco.php');

function insiraModelo($tipo, $preco) {
	return executeQuery(
		"INSERT INTO `modelo` (`tipo`, `preco`) VALUES ('%s', %s)",
		[$tipo, $preco],
		true
	);
}

function altereModelo($id, $tipo, $preco) {
	executeQuery(
		"UPDATE
			`modelo`
		SET
			`tipo` = '%s',
			`preco` = %s
		WHERE
			`id` = %d",
		[$tipo, $preco, $id]
	);
}

function modelo($id) {
	return primeiroResultado(
		"SELECT `tipo`, `preco` FROM `modelo` WHERE `id` = %d LIMIT 1",
		[$id]
	);
}

function modelos() {
	return selecioneDados(
		"SELECT `id`, `tipo`, `preco` FROM `modelo` ORDER BY `id`"
	);
}
