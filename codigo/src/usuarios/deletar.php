<?php
require_once realpath(__DIR__.'/../locais.php');
require_once realpath(__DIR__.'/banco.php');
deleteUsuario($_POST['id']);
vaPara("usuarios/mostrar.php");
