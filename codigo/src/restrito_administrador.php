<?php
require_once realpath(__DIR__.'/locais.php');
require_once realpath(__DIR__.'/restrito.php');
if (!eAdministrador()) {
	vaPara('entrar.php');
}
