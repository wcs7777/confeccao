<?php
require_once realpath(__DIR__.'/get_seguro.php');
function voltePara($default) {
	$url = getSeguro('voltePara');
	return (empty($url))? $default : $url;
}
