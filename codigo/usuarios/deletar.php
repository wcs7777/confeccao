<?php
require_once realpath(__DIR__.'/../src/locais.php');
require_once realpath(__DIR__.'/../src/usuarios/banco.php');
require_once realpath(__DIR__.'/../src/get_seguro.php');
$id = getSeguro('id');
if (!empty($id) && $id != 1 && existe('usuario', 'id', $id)) {
	$nomeUsuario = nomeUsuario($id);
} else {
	vaPara('usuarios/mostrar.php');
}
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Deletar Usuário</title>
		<base href="<?= base() ?>">
		<link rel="icon" type="image/png" href="img/logo.png" sizes="16x16">
		<link rel="stylesheet" type="text/css" href="css/reset.css">
		<link rel="stylesheet" type="text/css" href="css/estilo.css">
		<link rel="stylesheet" type="text/css" href="css/usuarios.css">
	</head>
	<body>
		<?php require_once realpath(__DIR__.'/../header.php'); ?>
		<main class="conteudo conteudo-menor usuarios">
			<span class="mensagem">Deseja realmente deletar este usuário?</span>
			<table class="tabela tabela-vertical">
				<tbody>
					<tr>
						<th>ID</th>
						<td><?= $id ?></td>
					</tr>
					<tr>
						<th>Usuário</th>
						<td><?= $nomeUsuario ?></td>
					</tr>
				</tbody>
			</table>
			<form class="formulario" method="post" action="src/usuarios/deletar.php">
				<input value="<?= $id ?>" name="id" type="hidden">
				<div class="botoes">
					<button class="botao botao-1" type="submit">Sim</button>
					<a class="botao botao-2" href="usuarios/mostrar.php">Não</a>
				</div>
			</form>
		</main>
	</body>
</html>
