<?php
require_once realpath(__DIR__.'/../src/locais.php');
require_once realpath(__DIR__.'/../src/clientes/banco.php');
require_once realpath(__DIR__.'/../src/formatos.php');
require_once realpath(__DIR__.'/../src/get_seguro.php');
$id = getSeguro('id');
$alterado = getSeguro('alterado');
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
		<title>Confirmação do Cadastro do Cliente</title>
		<base href="<?= base() ?>">
		<link rel="icon" type="image/png" href="img/logo.png" sizes="16x16">
		<link rel="stylesheet" type="text/css" href="css/reset.css">
		<link rel="stylesheet" type="text/css" href="css/estilo.css">
		<link rel="stylesheet" type="text/css" href="css/clientes.css">
	</head>
	<body>
		<?php require_once realpath(__DIR__.'/../header.php'); ?>
		<main class="conteudo conteudo-menor clientes">
			<span class="mensagem">
				<?php if (empty($alterado)): ?>
				Cliente cadastrado com sucesso!
				<?php else: ?>
				Cliente alterado com sucesso!
				<?php endif; ?>
			</span>
			<table class="tabela tabela-vertical">
				<tbody>
					<tr>
						<th>ID</th>
						<td><?= $id ?></td>
					</tr>
					<tr>
						<th>Nome</th>
						<td><?= $cliente['nome'] ?></td>
					</tr>
					<tr>
						<th>Telefone</th>
						<td><?= formatoTelefone($cliente['telefone']) ?></td>
					</tr>
				</tbody>
			</table>
			<div class="botoes">
				<a class="botao botao-1" href="pedidos/fazer.php?idCliente=<?= $id ?>&voltePara=clientes/mostrar.php">Fazer Pedido</a>
				<a class="botao botao-2" href="clientes/mostrar.php">Listar Clientes</a>
			</div>
		</main>
	</body>
</html>
