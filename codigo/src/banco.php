<?php
require_once realpath(__DIR__.'/restrito.php');

function bancoDeDados() {
	$link = mysqli_connect(
		'localhost',
		'usuario_confeccao',
		'tJ0hfzIImV4mhhJoQoF3oGL2EGctVrw5fJmdPghwRJ2AgOI1AtbWerOw1hqfcoGiR+R4J+21YqH9QTMd',
		'confeccao'
	);
	if (!$link) {
		die('Falha ao conectar: '.mysqli_connect_error());
	}
	return $link;
}

function executeQuery($query, $valores=[], $retorneId=false) {
	$link = bancoDeDados();
	$resultado = mysqli_query(
		$link,
		vsprintf($query, filtreValores($link, $valores))
	);
	if ($retorneId) {
		$id = ($resultado == true)? mysqli_insert_id($link) : false;
	}
	mysqli_close($link);
	return (!$retorneId)? $resultado : $id;
}

function selecioneDados($query, $valores=[]) {
	$resultado = executeQuery($query, $valores);
	$dados = [];
	while ($dado = mysqli_fetch_assoc($resultado)) {
		$dados[] = $dado;
	}
	return $dados;
}

function primeiroResultado($query, $valores=[]) {
	$dados = selecioneDados($query, $valores);
	return (!empty($dados))? $dados[0] : false;
}

function existe($tabela, $campo, $valor) {
	return primeiroResultado(
		"SELECT exists(SELECT 1 FROM %s WHERE %s = '%s') AS `existe`",
		[$tabela, $campo, $valor]
	)['existe'] == '1';
}

function filtreValores($link, $valores) {
	$filtrados = [];
	foreach ($valores as $valor) {
		$filtrados[] = filtreValor($link, $valor);
	}
	return $filtrados;
}

function filtreValor($link, $valor) {
	return mysqli_real_escape_string(
		$link,
		filter_var($valor, FILTER_SANITIZE_SPECIAL_CHARS)
	);
}
