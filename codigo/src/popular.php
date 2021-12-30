<!-- Script apena para testes -->
<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
$_SESSION['usuario'] = 1;
require_once realpath(__DIR__.'/banco.php');
$link = bancoDeDados();
$resultado = mysqli_multi_query(
	$link,
	"SET foreign_key_checks = FALSE;
	TRUNCATE TABLE `cliente`;
	TRUNCATE TABLE `modelo`;
	TRUNCATE TABLE `tamanho`;
	TRUNCATE TABLE `pedido`;
	TRUNCATE TABLE `item`;
	TRUNCATE TABLE `usuario`;
	SET foreign_key_checks = TRUE;

	INSERT INTO
		`cliente` (`nome`, `telefone`)
	VALUES
		('Eduardo Pedro Antonio Barbosa', '83989607526'),
		('Adriana Elza Aparício', '83989395490'),
		('Raquel Isabelle Lívia Barbosa', '91983107964'),
		('Priscila Manuela Lima', '62993439537'),
		('Andreia Jéssica Carolina Drumond', '46987582006'),
		('Henry Thomas Drumond', '6137403015');

	INSERT INTO
		`modelo` (`tipo`, `preco`)
	VALUES
		('Manga Curta', 20.00),
		('Manga Longa', 30.00),
		('Polo', 25.00),
		('Regata', 15.00);

	INSERT INTO
		`tamanho` (`valor`)
	VALUES
		('P'),
		('M'),
		('G');

	INSERT INTO
		`pedido` (`idCliente`, `previsaoEntrega`, `foiEntregue`)
	VALUES
		(4, '2019-11-29', 1),
		(5, '2019-12-04', 1),
		(6, '2020-01-01', 0),
		(3, '2019-12-18', 0),
		(5, '2019-12-14', 1),
		(6, '2019-12-27', 1),
		(1, '2019-11-29', 1),
		(4, '2019-12-25', 0),
		(3, '2019-12-14', 1),
		(1, '2020-01-28', 0),
		(6, '2020-02-13', 0),
		(5, '2020-03-04', 0),
		(3, '2019-12-04', 0),
		(6, '2019-12-05', 0),
		(5, '2019-12-18', 0),
		(4, '2019-11-30', 0);

	INSERT INTO
		`item` (`idPedido`, `idModelo`, `idTamanho`, `quantia`)
	VALUES
		(1, 2, 3, 5),
		(1, 3, 2, 9),
		(1, 4, 1, 7),
		(2, 1, 2, 6),
		(2, 4, 1, 7),
		(3, 3, 1, 8),
		(3, 2, 2, 5),
		(3, 4, 3, 5),
		(3, 4, 2, 7),
		(3, 1, 2, 5),
		(4, 3, 2, 10),
		(4, 3, 1, 5),
		(4, 3, 3, 6),
		(5, 1, 2, 7),
		(5, 1, 3, 8),
		(5, 4, 3, 6),
		(6, 2, 1, 10),
		(6, 2, 2, 16),
		(6, 2, 3, 17),
		(9, 3, 2, 8),
		(9, 4, 2, 10),
		(9, 2, 3, 10),
		(10, 2, 2, 7),
		(10, 3, 3, 11),
		(10, 4, 1, 11),
		(10, 2, 3, 8),
		(11, 3, 2, 10),
		(11, 2, 3, 5),
		(12, 2, 3, 5),
		(12, 3, 1, 8),
		(12, 4, 1, 4),
		(13, 2, 2, 7),
		(13, 2, 3, 8),
		(15, 3, 2, 28),
		(15, 3, 1, 6),
		(16, 2, 2, 5),
		(16, 3, 3, 14),
		(7, 2, 2, 8),
		(7, 2, 1, 5),
		(7, 2, 3, 4),
		(8, 4, 2, 7),
		(8, 2, 2, 8),
		(14, 4, 2, 4);

	INSERT INTO
		`usuario` (`nomeUsuario`, `senha`)
	VALUES".sprintf("
		('admin', '%s'),
		('user1', '%s'),
		('user2', '%s')",
		password_hash('admin', PASSWORD_DEFAULT),
		password_hash('user1', PASSWORD_DEFAULT),
		password_hash('user2', PASSWORD_DEFAULT)
	)
);
if (!$resultado) {
	echo mysqli_error($link);
}
mysqli_close($link);
unset($_SESSION['usuario']);
session_destroy();
echo '<br>Populado com sucesso!';
exit();
