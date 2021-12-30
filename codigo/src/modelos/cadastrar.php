<?php
require_once realpath(__DIR__.'/../locais.php');
require_once realpath(__DIR__.'/banco.php');
require_once realpath(__DIR__.'/../formatos.php');
$id = insiraModelo($_POST['tipo'], desformatePreco($_POST['preco']));
vaPara("modelos/confirmacao.php?id=$id");
