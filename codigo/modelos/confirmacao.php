<?php
require_once realpath(__DIR__.'/../src/locais.php');
require_once realpath(__DIR__.'/../src/modelos/banco.php');
require_once realpath(__DIR__.'/../src/formatos.php');
require_once realpath(__DIR__.'/../src/get_seguro.php');
$id = getSeguro('id');
$alterado = getSeguro('alterado');
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
		<title>Confirmação do Cadastro do Modelo</title>
		<base href="<?= base() ?>">
		<link rel="icon" type="image/png" href="img/logo.png" sizes="16x16">
		<link rel="stylesheet" type="text/css" href="css/reset.css">
		<link rel="stylesheet" type="text/css" href="css/estilo.css">
		<link rel="stylesheet" type="text/css" href="css/modelos.css">
	</head>
	<body>
		<?php require_once realpath(__DIR__.'/../header.php'); ?>
		<main class="conteudo conteudo-menor modelos">
			<span class="mensagem">
				<?php if (empty($alterado)): ?>
				Modelo cadastrado com sucesso!
				<?php else: ?>
				Modelo alterado com sucesso!
				<?php endif; ?>
			</span>
			<table class="tabela tabela-vertical">
				<tbody>
					<tr>
						<th>ID</th>
						<td><?= $id ?></td>
					</tr>
					<tr>
						<th>Tipo</th>
						<td><?= $modelo['tipo'] ?></td>
					</tr>
					<tr>
						<th>Preço</th>
						<td><?= formatoPreco($modelo['preco']) ?></td>
					</tr>
				</tbody>
			</table>
			<div class="botoes">
				<a class="botao botao-1" href="modelos/mostrar.php">Listar Modelos</a>
				<a class="botao botao-2" href="modelos/cadastrar.php">Cadastrar Outro</a>
			</div>
		</main>
	</body>
</html>
