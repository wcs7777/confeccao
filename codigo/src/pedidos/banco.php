<?php
require_once realpath(__DIR__.'/../banco.php');

function insiraPedido($idCliente, $previsaoEntrega, $itens) {
	$link = bancoDeDados();
	mysqli_query(
		$link,
		sprintf(
			"INSERT INTO
				`pedido` (`idCliente`, `previsaoEntrega`)
			VALUES
				(%d, '%s')",
			filtreValor($link, $idCliente),
			filtreValor($link, $previsaoEntrega)
		)
	);
	$id = mysqli_insert_id($link);
	insiraItens($link, $id, $itens);
	mysqli_close($link);
	return $id;
}

function insiraItens($link, $idPedido, $itens) {
	$values = [];
	foreach ($itens as $item) {
		$values[] .= sprintf(
			"(%d, %d, %d, %d)",
			$idPedido,
			filtreValor($link, $item['idModelo']),
			filtreValor($link, $item['idTamanho']),
			filtreValor($link, $item['quantia'])
		);
	}
	mysqli_query(
		$link,
		sprintf(
			"INSERT INTO
				`item` (`idPedido`, `idModelo`, `idTamanho`, `quantia`)
			VALUES
				%s",
			implode(',', $values)
		)
	);
}

function alterePedido($idPedido, $idCliente, $previsaoEntrega, $itens) {
	$link = bancoDeDados();
	$idPedido = filtreValor($link, $idPedido);
	mysqli_query(
		$link,
		sprintf(
			"UPDATE
				`pedido`
			SET
				`idCliente` = %d,
				`previsaoEntrega` = '%s',
				`foiEntregue` = FALSE
			WHERE
				`id` = %d",
			filtreValor($link, $idCliente),
			filtreValor($link, $previsaoEntrega),
			$idPedido
		)
	);
	mysqli_query($link, "DELETE FROM `item` WHERE `idPedido` = $idPedido");
	insiraItens($link, $idPedido, $itens);
	mysqli_close($link);
}

function cancelePedido($idPedido) {
	executeQuery("DELETE FROM `item` WHERE idPedido = %d", [$idPedido]);
	executeQuery("DELETE FROM `pedido` WHERE id = %d", [$idPedido]);
}

function entregaPedido($idPedido, $entregar) {
	executeQuery(
		"UPDATE
			`pedido`
		SET
			`foiEntregue` = %d
		WHERE
			`id` = %d",
		[$entregar, $idPedido]
	);
}

function foiEntregue($idPedido) {
	return primeiroResultado(
		"SELECT `foiEntregue` FROM `pedido` WHERE `id` = %d", [$idPedido]
	)['foiEntregue'];
}

function dadosPedido($idPedido) {
	return array(
		'pedido' => primeiroResultado(
			"SELECT
				`p`.`idCliente`                  AS `idCliente`,
				`c`.`nome`                       AS `nomeCliente`,
				`c`.`telefone`                   AS `telefoneCliente`,
				`p`.`previsaoEntrega`            AS `previsaoEntrega`,
				`p`.`foiEntregue`                AS `foiEntregue`,
				sum(`i`.`quantia` * `m`.`preco`) AS `total`
			FROM
				`pedido`  AS `p`
			INNER JOIN
				`cliente` AS `c`
			ON
				`p`.`idCliente` = `c`.`id`
			INNER JOIN
				`item`    AS `i`
			ON
				`p`.`id` = `i`.`idPedido`
			INNER JOIN
				`modelo`  AS `m`
			ON
				`i`.`idModelo` = `m`.`id`
			WHERE
				`p`.`id` = %d
			LIMIT
				1",
			[$idPedido]
		),
		'itens' => itens($idPedido)
	);
}

function itens($idPedido) {
	return selecioneDados(
		"SELECT
				`i`.`idModelo`                   AS `idModelo`,
				`m`.`tipo`                       AS `tipoModelo`,
				`i`.`idTamanho`                  AS `idTamanho`,
				`t`.`valor`                      AS `valorTamanho`,
				`i`.`quantia`                    AS `quantia`,
				`m`.`preco`                      AS `precoModelo`,
				`i`.`quantia` * `m`.`preco`      AS `subtotal`
		FROM
				`item`    AS `i`
		INNER JOIN
				`modelo`  AS `m`
		ON
				`i`.`idModelo` = `m`.`id`
		INNER JOIN
				`tamanho` AS `t`
		ON
				`i`.`idTamanho` = `t`.`id`
		WHERE
				`i`.`idPedido` = %d",
		[$idPedido]
	);
}

function pedidos() {
	return selecioneDados(
		"SELECT
			`p`.`id`              AS `id`,
			`c`.`nome`            AS `cliente`,
			`p`.`previsaoEntrega` AS `previsaoEntrega`,
			`p`.`foiEntregue`     AS `foiEntregue`
		FROM
			`pedido`  AS `p`
		INNER JOIN
			`cliente` AS `c`
		ON
			`p`.`idCliente` = `c`.`id`
		ORDER BY
			`p`.`id`
		"
	);
}

function pedidosCliente($idCliente) {
	return selecioneDados(
		"SELECT
			`p`.`id`              AS `id`,
			`p`.`previsaoEntrega` AS `previsaoEntrega`,
			`p`.`foiEntregue`     AS `foiEntregue`
		FROM
			`cliente` AS `c`
		INNER JOIN
			`pedido`  AS `p`
		ON
			`p`.`idCliente` = `c`.`id`
		WHERE
			`c`.`id` = %d
		ORDER BY
			`p`.`id`",
		[$idCliente]
	);
}
