<?php require_once realpath(__DIR__.'/../src/locais.php'); ?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Informações do Pedido</title>
		<base href="<?= base() ?>">
		<link rel="icon" type="image/png" href="img/logo.png" sizes="16x16">
		<link rel="stylesheet" type="text/css" href="css/reset.css">
		<link rel="stylesheet" type="text/css" href="css/estilo.css">
		<link rel="stylesheet" type="text/css" href="css/pedidos.css">
	</head>
	<body>
		<?php require_once realpath(__DIR__.'/../header.php'); ?>
		<main class="conteudo pedidos">
			<?php
			require_once realpath(__DIR__.'/tabela-informacoes.php');
			require_once realpath(__DIR__.'/../src/volte_para.php');
			$voltePara = voltePara('pedidos/mostrar.php');
			?>
			<div class="botoes">
				<a class="botao botao-1" href="<?= $voltePara ?>">Voltar</a>
				<a class="botao botao-2" href="pedidos/alterar.php?id=<?= $id ?>&voltePara=<?= $voltePara ?>">Alterar</a>
			</div>
		</main>
	</body>
</html>
