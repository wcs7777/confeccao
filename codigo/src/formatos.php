<?php
require_once realpath(__DIR__.'/restrito.php');

function formatoTelefone($str) {
	return sprintf(
		'(%s) %s-%s',
		substr($str, 0, 2),
		substr($str, 2, (strlen($str) > 10)? 5 : 4),
		substr($str, -4, 4)
	);
}

function desformateTelefone($str) {
	return preg_replace(
		'/\((\d{2})\)\s+(\d{4,5})-(\d{4})/',
		"$1$2$3",
		$str
	);
}

function formatoData($str) {
	list($ano, $mes, $dia) = explode('-', $str);
	return sprintf("%02d/%02d/%04d", $dia, $mes, $ano);
}

function formatoBooleano($str) {
	return ($str)? "Sim" : "Não";
}

function formatoPreco($str, $casasReal=0) {
	list($real, $centavo) = explode('.', $str);
	if ($casasReal > 0) {
		$casasReal -= strlen($real);
	}
	$casasReal = ($casasReal < 1)? '' : str_repeat('&nbsp;', $casasReal + 1);
	return sprintf("R$ %s%s,%s", $casasReal, $real, substr($centavo, 0, 2));
}

function desformatePreco($str) {
	return preg_replace(
		'/R\$\s+(\d+),(\d{2})/',
		"$1.$2",
		$str
	);
}
