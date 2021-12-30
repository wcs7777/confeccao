<?php require_once realpath(__DIR__.'/../src/locais.php'); ?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Cadastrar Cliente</title>
		<base href="<?= base() ?>">
		<link rel="icon" type="image/png" href="img/logo.png" sizes="16x16">
		<link rel="stylesheet" type="text/css" href="css/reset.css">
		<link rel="stylesheet" type="text/css" href="css/estilo.css">
		<link rel="stylesheet" type="text/css" href="css/clientes.css">
	</head>
	<body>
		<?php require_once realpath(__DIR__.'/../header.php'); ?>
		<main class="conteudo conteudo-menor clientes">
			<form class="formulario" method="post" action="src/clientes/cadastrar.php">
				<label for="nome">Nome</label>
				<input class="entrada" id="nome" name="nome" type="text" maxlength="50" autofocus required>
				<label for="telefone">Telefone</label>
				<input class="entrada" id="telefone" name="telefone" type="text" pattern="\(\d{2}\)\s\d{4,5}-\d{4}"  maxlength="15" placeholder="(11) 12345-1234" required>
				<div class="botoes">
					<button id="submit" class="botao botao-1" type="submit">Cadastrar</button>
					<a class="botao botao-2" href="clientes/mostrar.php">Cancelar</a>
				</div>
			</form>
		</main>
		<script type="text/javascript" src="js/proximo.js"></script>
		<script type="text/javascript" src="js/nome.js"></script>
		<script type="text/javascript" src="js/telefone.js"></script>
		<script type="text/javascript" src="js/formulario-clientes.js"></script>
	</body>
</html>
