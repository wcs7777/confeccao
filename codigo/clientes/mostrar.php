<?php require_once realpath(__DIR__.'/../src/locais.php'); ?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Clientes</title>
		<base href="<?= base() ?>">
		<link rel="icon" type="image/png" href="img/logo.png" sizes="16x16">
		<link rel="stylesheet" type="text/css" href="css/reset.css">
		<link rel="stylesheet" type="text/css" href="css/estilo.css">
		<link rel="stylesheet" type="text/css" href="css/clientes.css">
	</head>
	<body>
		<?php require_once realpath(__DIR__.'/../header.php'); ?>
		<main class="conteudo clientes">
			<a class="botao" href="clientes/cadastrar.php">Novo Cliente</a>
			<table class="tabela">
				<thead>
					<tr>
						<th>ID</th>
						<th>Nome</th>
						<th>Telefone</th>
						<th>Alterar</th>
						<th class="centro">Novo Pedido</th>
						<th class="centro">Pedidos</th>
					</tr>
				</thead>
				<tbody>
				<?php
				require_once realpath(__DIR__.'/../src/clientes/banco.php');
				require_once realpath(__DIR__.'/../src/formatos.php');
				foreach (clientes() as $cliente):
				?>
					<tr>
						<td><?= $cliente['id'] ?></td>
						<td><?= $cliente['nome'] ?></td>
						<td><?= formatoTelefone($cliente['telefone']) ?></td>
						<td><a class="icone icone-alterar" href="clientes/alterar.php?id=<?= $cliente['id'] ?>"></a></td>
						<td class="centro"><a href="pedidos/fazer.php?idCliente=<?= $cliente['id'] ?>&voltePara=clientes/mostrar.php">Fazer</a></td>
						<td class="centro"><a href="clientes/pedidos.php?id=<?= $cliente['id'] ?>">Ver</a></td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		</main>
	</body>
</html>
