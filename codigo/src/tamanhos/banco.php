<?php
require_once realpath(__DIR__.'/../banco.php');

function insiraTamanho($valor) {
	return executeQuery(
		"INSERT INTO `tamanho` (`valor`) VALUES ('%s')", [$valor], true
	);
}

function altereTamanho($id, $valor) {
	executeQuery(
		"UPDATE
			`tamanho`
		SET
			`valor` = '%s'
		WHERE
			`id` = %d",
		[$valor, $id]
	);
}

function valorTamanho($id) {
	$resultado = primeiroResultado(
		"SELECT `valor` FROM `tamanho` WHERE `id`= %d LIMIT 1", [$id]
	);
	return (!empty($resultado))? $resultado['valor'] : false;
}

function tamanhos() {
	return selecioneDados(
		"SELECT `id`, `valor` FROM `tamanho` ORDER BY `id`"
	);
}
