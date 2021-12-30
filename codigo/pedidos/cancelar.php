<?php
require_once realpath(__DIR__.'/../src/locais.php');
require_once realpath(__DIR__.'/../src/get_seguro.php');
$id = getSeguro('id');
if (empty($id)) {
	vaPara('pedidos/mostrar.php');
}
require_once realpath(__DIR__.'/../src/volte_para.php');
$voltePara = voltePara('pedidos/mostrar.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Cancelar Pedido</title>
		<base href="<?= base() ?>">
		<link rel="icon" type="image/png" href="img/logo.png" sizes="16x16">
		<link rel="stylesheet" type="text/css" href="css/reset.css">
		<link rel="stylesheet" type="text/css" href="css/estilo.css">
		<link rel="stylesheet" type="text/css" href="css/pedidos.css">
	</head>
	<body>
		<?php require_once realpath(__DIR__.'/../header.php'); ?>
		<main class="conteudo pedidos">
			<span class="mensagem">Deseja realmente cancelar o pedido?</span>
			<?php require_once realpath(__DIR__.'/tabela-informacoes.php'); ?>
			<form class="formulario" method="post" action="src/pedidos/cancelar.php">
				<input name="id" value="<?= $id ?>" type="hidden">
				<input value="<?= $voltePara ?>" name="voltePara" type="hidden">
				<div class="botoes">
					<button class="botao botao-1" type="submit">Sim</button>
					<a class="botao botao-2" href="<?= $voltePara ?>">Não</a>
				</div>
			</form>
		</main>
	</body>
</html>
