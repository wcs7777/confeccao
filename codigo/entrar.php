<?php require_once realpath(__DIR__.'/src/locais.php'); ?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Entrar</title>
		<base href="<?= base() ?>">
		<link rel="icon" type="image/png" href="img/logo.png" sizes="16x16">
		<link rel="stylesheet" type="text/css" href="css/reset.css">
		<link rel="stylesheet" type="text/css" href="css/estilo.css">
		<link rel="stylesheet" type="text/css" href="css/entrar.css">
	</head>
	<body>
		<main class="conteudo conteudo-menor">
			<form class="formulario" method="post" action="src/usuarios/entrar.php">
				<?php
				require_once realpath(__DIR__.'/src/get_seguro.php');
				$nomeUsuario = getSeguro('nomeUsuario');
				$classeErro = empty($nomeUsuario)? 'esconder' : '';
				?>
				<span class="erro <?= $classeErro ?>">Usuário e/ou senha inválido(s)!</span>
				<label for="nomeUsuario">Usuário</label>
				<input class="entrada" id="nomeUsuario" name="nomeUsuario" type="text" value="<?= $nomeUsuario ?>"maxlength="50" required>
				<label for="senha">Senha</label>
				<input class="entrada" id="senha" name="senha" type="password" maxlength="30" required>
				<button id="submit" class="botao" type="submit">Entrar</button>
			</form>
		</main>
		<script type="text/javascript" src="js/proximo.js"></script>
		<script type="text/javascript" src="js/formulario-entrar.js"></script>
	</body>
</html>
