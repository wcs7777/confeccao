<?php
require_once realpath(__DIR__.'/../src/locais.php');
require_once realpath(__DIR__.'/../src/tamanhos/banco.php');
require_once realpath(__DIR__.'/../src/get_seguro.php');
$id = getSeguro('id');
$alterado = getSeguro('alterado');
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
		<title>Confirmação do Cadastro do Tamanho</title>
		<base href="<?= base() ?>">
		<link rel="icon" type="image/png" href="img/logo.png" sizes="16x16">
		<link rel="stylesheet" type="text/css" href="css/reset.css">
		<link rel="stylesheet" type="text/css" href="css/estilo.css">
		<link rel="stylesheet" type="text/css" href="css/tamanhos.css">
	</head>
	<body>
		<?php require_once realpath(__DIR__.'/../header.php'); ?>
		<main class="conteudo conteudo-menor tamanhos">
			<span class="mensagem">
				<?php if (empty($alterado)): ?>
				Tamanho cadastrado com sucesso!
				<?php else: ?>
				Tamanho alterado com sucesso!
				<?php endif; ?>
			</span>
			<table class="tabela tabela-vertical">
				<tbody>
					<tr>
						<th>ID</th>
						<td><?= $id ?></td>
					</tr>
					<tr>
						<th>Valor</th>
						<td><?= $valor ?></td>
					</tr>
				</tbody>
			</table>
			<div class="botoes">
				<a class="botao botao-1" href="tamanhos/mostrar.php">Listar Tamanhos</a>
				<a class="botao botao-2" href="tamanhos/cadastrar.php">Cadastrar Outro</a>
			</div>
		</main>
	</body>
</html>
