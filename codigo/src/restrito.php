<?php
require_once realpath(__DIR__.'/locais.php');
require_once realpath(__DIR__.'/sessao.php');
if (!estaCredenciado()) {
	vaPara('entrar.php');
}
