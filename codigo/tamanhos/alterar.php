<?php
require_once realpath(__DIR__.'/../src/locais.php');
require_once realpath(__DIR__.'/../src/tamanhos/banco.php');
require_once realpath(__DIR__.'/../src/get_seguro.php');
$id = getSeguro('id');
if (!empty($id) && existe('tamanho', 'id', $id)) {
	$valor = valorTamanho($id);
} else {
	vaPara('tamanhos/mostrar.php');
}
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Alterar Tamanho</title>
		<base href="<?= base() ?>">
		<link rel="icon" type="image/png" href="img/logo.png" sizes="16x16">
		<link rel="stylesheet" type="text/css" href="css/reset.css">
		<link rel="stylesheet" type="text/css" href="css/estilo.css">
		<link rel="stylesheet" type="text/css" href="css/tamanhos.css">
	</head>
	<body>
		<?php require_once realpath(__DIR__.'/../header.php'); ?>
		<main class="conteudo conteudo-menor tamanhos">
			<form class="formulario" method="post" action="src/tamanhos/alterar.php">
				<label for="valor">Valor</label>
				<input value="<?= $valor ?>" class="entrada" id="valor" name="valor" type="text" maxlength="5" required>
				<span class="erro invisivel" id="aviso-repetido"><span id="repetido"></span> já está cadastrado!</span>
				<input value="<?= $id ?>" name="id" type="hidden">
				<div class="botoes">
					<button id="submit" class="botao botao-1" type="submit">Alterar</button>
					<a class="botao botao-2" href="tamanhos/mostrar.php">Cancelar</a>
				</div>
			</form>
		</main>
		<script type="text/javascript">
			const atual = <?= $id ?>;
			const tamanhos = <?= json_encode(tamanhos()) ?>;
		</script>
		<script type="text/javascript" src="js/existe.js"></script>
		<script type="text/javascript" src="js/proximo.js"></script>
		<script type="text/javascript" src="js/formulario-tamanhos.js"></script>
	</body>
</html>
