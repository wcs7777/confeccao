<?php
require_once realpath(__DIR__.'/../src/locais.php');
require_once realpath(__DIR__.'/../src/volte_para.php');
$voltePara = voltePara('pedidos/mostrar.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Fazer Pedido</title>
		<base href="<?= base() ?>">
		<link rel="icon" type="image/png" href="img/logo.png" sizes="16x16">
		<link rel="stylesheet" type="text/css" href="css/reset.css">
		<link rel="stylesheet" type="text/css" href="css/estilo.css">
		<link rel="stylesheet" type="text/css" href="css/pedidos.css">
	</head>
	<body>
		<?php require_once realpath(__DIR__.'/../header.php'); ?>
		<main class="conteudo pedidos">
			<form class="formulario" method="post" action="src/pedidos/fazer.php">
				<label for="cliente">Cliente</label>
				<div class="entrada-cliente">
					<input class="entrada" id="idCliente" name="idCliente" type="number" placeholder="ID" min="1" required>
					<input class="entrada" id="nomeCliente" type="text" placeholder="Nome do cliente" list="clientes" required>
					<datalist id="clientes"></datalist>
				</div>
				<label for="previsaoEntrega">Previsão de Entrega</label>
				<input class="entrada" id="previsaoEntrega" name="previsaoEntrega" type="date" required>
				<label>Itens</label>
				<table class="tabela-itens">
					<tbody id="tabela-itens">
					</tbody>
					<tfoot>
						<tr>
							<th colspan="4">Total</th>
							<td class="total">
								<input id="total" class="entrada" type="text" placeholder="Total" title="Total do pedido" readonly>
							</td>
						</tr>
					</tfoot>
				</table>
				<input value="<?= $voltePara ?>" name="voltePara" type="hidden">
				<div class="botoes">
					<button id="buttonSubmit" class="botao botao-1" type="submit">Confirmar</button>
					<a class="botao botao-2" href="<?= $voltePara ?>">Cancelar</a>
				</div>
			</form>
		</main>
		<?php
		require_once realpath(__DIR__.'/../src/clientes/banco.php');
		require_once realpath(__DIR__.'/../src/modelos/banco.php');
		require_once realpath(__DIR__.'/../src/tamanhos/banco.php');
		require_once realpath(__DIR__.'/../src/get_seguro.php');
		$idCliente = getSeguro('idCliente');
		$nomeCliente = '';
		$clientes = [];
		if (!empty($idCliente) && existe('cliente', 'id', $idCliente)) {
			$nomeCliente = cliente($idCliente)['nome'];
		} else {
			$idCliente = '';
			$clientes = clientes();
		}
		?>
		<script type="text/javascript">
			const idCliente = <?= json_encode($idCliente) ?>;
			const nomeCliente = <?= json_encode($nomeCliente) ?>;
			const clientes = <?= json_encode($clientes) ?>;
			const modelos = <?= json_encode(modelos()) ?>;
			const tamanhos = <?= json_encode(tamanhos()) ?>;
			const pedido = '';
		</script>
		<script type="text/javascript" src="js/nome.js"></script>
		<script type="text/javascript" src="js/tabela-pedido.js"></script>
		<script type="text/javascript" src="js/formulario-pedidos.js"></script>
	</body>
</html>
