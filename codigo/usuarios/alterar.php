<?php
require_once realpath(__DIR__.'/../src/locais.php');
require_once realpath(__DIR__.'/../src/usuarios/banco.php');
require_once realpath(__DIR__.'/../src/get_seguro.php');
$id = getSeguro('id');
if (!empty($id) && existe('usuario', 'id', $id)) {
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
		<title>Alterar Usuário</title>
		<base href="<?= base() ?>">
		<link rel="icon" type="image/png" href="img/logo.png" sizes="16x16">
		<link rel="stylesheet" type="text/css" href="css/reset.css">
		<link rel="stylesheet" type="text/css" href="css/estilo.css">
		<link rel="stylesheet" type="text/css" href="css/usuarios.css">
	</head>
	<body>
		<?php require_once realpath(__DIR__.'/../header.php'); ?>
		<main class="conteudo conteudo-menor usuarios">
			<form class="formulario" method="post" action="src/usuarios/alterar.php">
				<label for="nomeUsuario">Usuário</label>
				<input value="<?= $nomeUsuario ?>" class="entrada" id="nomeUsuario" name="nomeUsuario" type="text" maxlength="50" required>
				<span class="erro invisivel" id="aviso-repetido"><span id="repetido"></span> já está cadastrado!</span>
				<label for="senha">Senha</label>
				<input class="entrada" id="senha" name="senha" type="password" maxlength="30" required>
				<input value="<?= $id ?>" name="id" type="hidden">
				<div class="botoes">
					<button id="submit" class="botao botao-1" type="submit">Alterar</button>
					<a class="botao botao-2" href="usuarios/mostrar.php">Cancelar</a>
				</div>
			</form>
		</main>
		<script type="text/javascript">
			const atual = <?= $id ?>;
			const usuarios = <?= json_encode(usuarios()) ?>;
		</script>
		<script type="text/javascript" src="js/existe.js"></script>
		<script type="text/javascript" src="js/proximo.js"></script>
		<script type="text/javascript" src="js/formulario-usuarios.js"></script>
	</body>
</html>
