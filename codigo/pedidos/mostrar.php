<?php require_once realpath(__DIR__.'/../src/locais.php'); ?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Pedidos</title>
		<base href="<?= base() ?>">
		<link rel="icon" type="image/png" href="img/logo.png" sizes="16x16">
		<link rel="stylesheet" type="text/css" href="css/reset.css">
		<link rel="stylesheet" type="text/css" href="css/estilo.css">
		<link rel="stylesheet" type="text/css" href="css/pedidos.css">
	</head>
	<body>
		<?php require_once realpath(__DIR__.'/../header.php'); ?>
		<main class="conteudo pedidos">
			<a class="botao" href="pedidos/fazer.php">Novo Pedido</a>
			<table class="tabela">
				<thead>
					<tr>
						<th>ID</th>
						<th>Cliente</th>
						<th>Previsão</th>
						<th class="centro">Entregue?</th>
						<th>Entrega</th>
						<th class="centro">Informações</th>
						<th class="centro">Alterar</th>
						<th class="centro">Cancelar</th>
					</tr>
				</thead>
				<tbody>
				<?php
				require_once realpath(__DIR__.'/../src/pedidos/banco.php');
				require_once realpath(__DIR__.'/../src/formatos.php');
				foreach (pedidos() as $pedido):
				?>
					<tr>
						<td><?= $pedido['id'] ?></td>
						<td><?= $pedido['cliente'] ?></td>
						<td><?= formatoData($pedido['previsaoEntrega']) ?></td>
						<td class="centro"><?= formatoBooleano($pedido['foiEntregue']) ?></td>
						<td>
							<a href="pedidos/entrega.php?id=<?= $pedido['id'] ?>" title="<?php echo (!$pedido['foiEntregue'])? 'Entregar Pedido' : 'Cancelar Entrega'; ?>">
								<?php echo (!$pedido['foiEntregue'])? 'Entregar' : 'Cancelar'; ?>
							</a>
						</td>
						<td class="centro"><a class="icone icone-informacoes" href="pedidos/informacoes.php?id=<?= $pedido['id'] ?>" title="Informações sobre o pedido"></a></td>
						<td class="centro"><a class="icone icone-alterar" href="pedidos/alterar.php?id=<?= $pedido['id'] ?>" title="Alterar o pedido"></a></td>
						<td class="centro"><a class="icone icone-cancelar" href="pedidos/cancelar.php?id=<?= $pedido['id'] ?>" title="Cancelar o pedido"></a></td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		</main>
	</body>
</html>
