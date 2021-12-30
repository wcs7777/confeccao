<?php require_once realpath(__DIR__.'/../src/locais.php'); ?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Cadastrar Modelo</title>
		<base href="<?= base() ?>">
		<link rel="icon" type="image/png" href="img/logo.png" sizes="16x16">
		<link rel="stylesheet" type="text/css" href="css/reset.css">
		<link rel="stylesheet" type="text/css" href="css/estilo.css">
		<link rel="stylesheet" type="text/css" href="css/modelos.css">
	</head>
	<body>
		<?php require_once realpath(__DIR__.'/../header.php'); ?>
		<main class="conteudo conteudo-menor modelos">
			<form class="formulario" method="post" action="src/modelos/cadastrar.php">
				<label for="tipo">Tipo</label>
				<input class="entrada" id="tipo" name="tipo" type="text" maxlength="20" autofocus required>
				<span class="erro invisivel" id="aviso-repetido"><span id="repetido">Tipo</span> já está cadastrado!</span>
				<label for="preco">Preço</label>
				<input class="entrada" id="preco" name="preco" type="text" pattern="R\$\s\d{1,3},\d{2}" maxlength="9" placeholder="R$ 00,00" required>
				<div class="botoes">
					<button class="botao botao-1" id="submit" type="submit">Cadastrar</button>
					<a class="botao botao-2" href="modelos/mostrar.php">Cancelar</a>
				</div>
			</form>
		</main>
		<script type="text/javascript">
			<?php require_once realpath(__DIR__.'/../src/modelos/banco.php'); ?>
			const atual = '';
			const modelos = <?= json_encode(modelos()) ?>;
		</script>
		<script type="text/javascript" src="js/existe.js"></script>
		<script type="text/javascript" src="js/proximo.js"></script>
		<script type="text/javascript" src="js/nome.js"></script>
		<script type="text/javascript" src="js/preco.js"></script>
		<script type="text/javascript" src="js/formulario-modelos.js"></script>
	</body>
</html>
