<?php
require_once realpath(__DIR__.'/../src/locais.php');
require_once realpath(__DIR__.'/../src/modelos/banco.php');
require_once realpath(__DIR__.'/../src/formatos.php');
require_once realpath(__DIR__.'/../src/get_seguro.php');
$id = getSeguro('id');
if (!empty($id) && existe('modelo', 'id', $id)) {
	$modelo = modelo($id);
} else {
	vaPara('modelos/mostrar.php');
}
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Alterar Modelo</title>
		<base href="<?= base() ?>">
		<link rel="icon" type="image/png" href="img/logo.png" sizes="16x16">
		<link rel="stylesheet" type="text/css" href="css/reset.css">
		<link rel="stylesheet" type="text/css" href="css/estilo.css">
		<link rel="stylesheet" type="text/css" href="css/modelos.css">
	</head>
	<body>
		<?php require_once realpath(__DIR__.'/../header.php'); ?>
		<main class="conteudo conteudo-menor modelos">
			<form class="formulario" method="post" action="src/modelos/alterar.php">
				<label for="tipo">Tipo</label>
				<input value="<?= $modelo['tipo'] ?>" class="entrada" id="tipo" name="tipo" type="text" maxlength="20" required>
				<span class="erro invisivel" id="aviso-repetido"><span id="repetido"></span> já está cadastrado!</span>
				<label for="preco">Preço</label>
				<input value="<?= formatoPreco($modelo['preco']) ?>"  class="entrada" id="preco" name="preco" type="text" pattern="R\$\s\d{1,3},\d{2}" maxlength="9" placeholder="R$ 00,00" required>
				<input value="<?= $id ?>" name="id" type="hidden">
				<div class="botoes">
					<button id="submit" class="botao botao-1" type="submit">Alterar</button>
					<a class="botao botao-2" href="modelos/mostrar.php">Cancelar</a>
				</div>
			</form>
		</main>
		<script type="text/javascript">
			const atual = <?= $id ?>;
			const modelos = <?= json_encode(modelos()) ?>;
		</script>
		<script type="text/javascript" src="js/existe.js"></script>
		<script type="text/javascript" src="js/proximo.js"></script>
		<script type="text/javascript" src="js/nome.js"></script>
		<script type="text/javascript" src="js/preco.js"></script>
		<script type="text/javascript" src="js/formulario-modelos.js"></script>
	</body>
</html>
