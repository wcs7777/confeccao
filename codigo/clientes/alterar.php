<?php
require_once realpath(__DIR__.'/../src/locais.php');
require_once realpath(__DIR__.'/../src/clientes/banco.php');
require_once realpath(__DIR__.'/../src/formatos.php');
require_once realpath(__DIR__.'/../src/get_seguro.php');
$id = getSeguro('id');
if (!empty($id) && existe('cliente', 'id', $id)) {
	$cliente = cliente($id);
} else {
	vaPara('clientes/mostrar.php');
}
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Alterar Cliente</title>
		<base href="<?= base() ?>">
		<link rel="icon" type="image/png" href="img/logo.png" sizes="16x16">
		<link rel="stylesheet" type="text/css" href="css/reset.css">
		<link rel="stylesheet" type="text/css" href="css/estilo.css">
		<link rel="stylesheet" type="text/css" href="css/clientes.css">
	</head>
	<body>
		<?php require_once realpath(__DIR__.'/../header.php'); ?>
		<main class="conteudo conteudo-menor clientes">
			<form class="formulario" method="post" action="src/clientes/alterar.php">
				<label for="nome">Nome</label>
				<input value="<?= $cliente['nome'] ?>" class="entrada" id="nome" name="nome" type="text" maxlength="50" required>
				<label for="telefone">Telefone</label>
				<input value="<?= formatoTelefone($cliente['telefone']) ?>"class="entrada" id="telefone" name="telefone" type="text" pattern="\(\d{2}\)\s\d{4,5}-\d{4}" maxlength="15" placeholder="(11) 12345-1234" required>
				<input value="<?= $id ?>" name="id" type="hidden">
				<div class="botoes">
					<button id="submit" class="botao botao-1" type="submit">Alterar</button>
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
