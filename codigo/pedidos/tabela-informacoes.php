<?php
require_once realpath(__DIR__.'/../src/locais.php');
require_once realpath(__DIR__.'/../src/pedidos/banco.php');
require_once realpath(__DIR__.'/../src/formatos.php');
require_once realpath(__DIR__.'/../src/get_seguro.php');
$id = getSeguro('id');
if (!empty($id) && existe('pedido', 'id', $id)) {
	list('pedido' => $pedido, 'itens' => $itens) = dadosPedido($id);
} else {
	vaPara('pedidos/mostrar.php');
}
?>
<table class="tabela tabela-vertical">
	<tbody>
		<tr>
			<th>ID</th>
			<td><?= $id ?></td>
		</tr>
		<tr>
			<th>Cliente</th>
			<td><?= $pedido['nomeCliente'] ?></td>
		</tr>
		<tr>
			<th>Telefone</th>
			<td><?= formatoTelefone($pedido['telefoneCliente']) ?></td>
		</tr>
		<tr>
			<th>Previsão de Entrega</th>
			<td><?= formatoData($pedido['previsaoEntrega']) ?></td>
		</tr>
			<th>Foi Entregue?</th>
			<td><?= formatoBooleano($pedido['foiEntregue']) ?></td>
		</tr>
		</tr>
			<th>Total</th>
			<td><?= formatoPreco($pedido['total']) ?></td>
		</tr>
	</tbody>
</table>
<table class="tabela">
	<thead>
		<tr>
			<th>Modelo</td>
			<th class="centro">Tamanho</td>
			<th>Preço</td>
			<th class="centro">Quantidade</td>
			<th>Subtotal</td>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($itens as $item): ?>
		<tr>
			<td><?= $item['tipoModelo'] ?></td>
			<td class="centro"><?= $item['valorTamanho'] ?></td>
			<td><?= formatoPreco($item['precoModelo'], 2) ?></td>
			<td class="centro"><?= $item['quantia'] ?></td>
			<td><?= formatoPreco($item['subtotal'], 3) ?></td>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>
