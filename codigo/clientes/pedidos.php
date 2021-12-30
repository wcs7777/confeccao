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
		<title>Pedidos do Cliente</title>
		<base href="<?= base() ?>">
		<link rel="icon" type="image/png" href="img/logo.png" sizes="16x16">
		<link rel="stylesheet" type="text/css" href="css/reset.css">
		<link rel="stylesheet" type="text/css" href="css/estilo.css">
		<link rel="stylesheet" type="text/css" href="css/clientes.css">
	</head>
	<body>
		<?php require_once realpath(__DIR__.'/../header.php'); ?>
		<main class="conteudo clientes">
			<div class="botoes-espacados">
				<a class="botao" href="clientes/mostrar.php">Voltar</a>
				<a class="botao" href="pedidos/fazer.php?idCliente=<?= $id ?>&voltePara=clientes/pedidos.php?id=<?= $id ?>">Novo Pedido</a>
			</div>
			<table class="tabela tabela-vertical">
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
			</table>
			<?php
			require_once realpath(__DIR__.'/../src/pedidos/banco.php');
			$pedidosCliente = pedidosCliente($id);
			if (!empty($pedidosCliente)):
			?>
			<table class="tabela">
				<thead>
					<tr>
						<th>ID</th>
						<th>Previsão de Entrega</th>
						<th class="centro">Entregue?</th>
						<th>Entrega</th>
						<th class="centro">Informações</th>
						<th class="centro">Alterar</th>
						<th class="centro">Cancelar</th>
					</tr>
				</thead>
				<tbody>
				<?php
				foreach ($pedidosCliente as $pedido):
				?>
					<tr>
						<td><?= $pedido['id'] ?></td>
						<td><?= formatoData($pedido['previsaoEntrega']) ?></td>
						<td class="centro"><?= formatoBooleano($pedido['foiEntregue']) ?></td>
						<td>
							<a href="pedidos/entrega.php?id=<?= $pedido['id'] ?>&voltePara=clientes/pedidos.php?id=<?= $id ?>" title="<?php echo (!$pedido['foiEntregue'])? 'Entregar Pedido' : 'Cancelar Entrega'; ?>">
								<?php echo (!$pedido['foiEntregue'])? 'Entregar' : 'Cancelar'; ?>
							</a>
						</td>
						<td class="centro"><a class="icone icone-informacoes" href="pedidos/informacoes.php?id=<?= $pedido['id'] ?>&voltePara=clientes/pedidos.php?id=<?= $id ?>" title="Informações sobre o pedido"></a></td>
						<td class="centro"><a class="icone icone-alterar" href="pedidos/alterar.php?id=<?= $pedido['id'] ?>&voltePara=clientes/pedidos.php?id=<?= $id ?>" title="Alterar o pedido"></a></td>
						<td class="centro"><a class="icone icone-cancelar" href="pedidos/cancelar.php?id=<?= $pedido['id'] ?>&voltePara=clientes/pedidos.php?id=<?= $id ?>" title="Cancelar o pedido"></a></td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		<?php else: ?>
		<span class="mensagem sem-pedido">Ainda não há nenhum pedido deste cliente!</span>
		<?php endif; ?>
		</main>
	</body>
</html>
