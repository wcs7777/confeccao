<?php
require_once realpath(__DIR__.'/src/locais.php');
require_once realpath(__DIR__.'/src/restrito.php');
require_once realpath(__DIR__.'/src/sessao.php');
destruaSessao();
vaPara('entrar.php');
