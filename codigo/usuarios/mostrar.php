<?php
require_once realpath(__DIR__.'/../src/locais.php');
require_once realpath(__DIR__.'/../src/restrito_administrador.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Usuários</title>
		<base href="<?= base() ?>">
		<link rel="icon" type="image/png" href="img/logo.png" sizes="16x16">
		<link rel="stylesheet" type="text/css" href="css/reset.css">
		<link rel="stylesheet" type="text/css" href="css/estilo.css">
		<link rel="stylesheet" type="text/css" href="css/usuarios.css">
	</head>
	<body>
		<?php require_once realpath(__DIR__.'/../header.php'); ?>
		<main class="conteudo usuarios">
			<a class="botao" href="usuarios/cadastrar.php">Novo Usuário</a>
			<table class="tabela">
				<thead>
					<tr>
						<th>ID</th>
						<th>Usuário</th>
						<th class="centro">Alterar</th>
						<th class="centro">Deletar</th>
					</tr>
				</thead>
				<tbody>
				<?php
				require_once realpath(__DIR__.'/../src/usuarios/banco.php');
				$usuarios = usuarios();
				if (!empty($usuarios)):
					$admin = $usuarios[0];
					unset($usuarios[0]);
				?>
					<tr>
						<td><?= $admin['id'] ?></td>
						<td><?= $admin['nomeUsuario'] ?></td>
						<td class="centro"><a class="icone icone-alterar" href="usuarios/alterar.php?id=<?= $admin['id'] ?>"></a></td>
						<td></td>
					</tr>
				<?php
				endif;
				foreach ($usuarios as $usuario):
				?>
					<tr>
						<td><?= $usuario['id'] ?></td>
						<td><?= $usuario['nomeUsuario'] ?></td>
						<td class="centro"><a class="icone icone-alterar" href="usuarios/alterar.php?id=<?= $usuario['id'] ?>"></a></td>
						<td class="centro"><a class="icone icone-cancelar" href="usuarios/deletar.php?id=<?= $usuario['id'] ?>"></a></td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		</main>
	</body>
</html>
