<?php require_once realpath(__DIR__.'/../src/locais.php'); ?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Modelos</title>
		<base href="<?= base() ?>">
		<link rel="icon" type="image/png" href="img/logo.png" sizes="16x16">
		<link rel="stylesheet" type="text/css" href="css/reset.css">
		<link rel="stylesheet" type="text/css" href="css/estilo.css">
		<link rel="stylesheet" type="text/css" href="css/modelos.css">
	</head>
	<body>
		<?php require_once realpath(__DIR__.'/../header.php'); ?>
		<main class="conteudo modelos">
			<a class="botao" href="modelos/cadastrar.php">Novo Modelo</a>
			<table class="tabela">
				<thead>
					<tr>
						<th>ID</th>
						<th>Tipo</th>
						<th>Preço</th>
						<th class="centro">Alterar</th>
					</tr>
				</thead>
				<tbody>
				<?php
				require_once realpath(__DIR__.'/../src/modelos/banco.php');
				require_once realpath(__DIR__.'/../src/formatos.php');
				foreach (modelos() as $modelo):
				?>
					<tr>
						<td><?= $modelo['id'] ?></td>
						<td><?= $modelo['tipo'] ?></td>
						<td><?= formatoPreco($modelo['preco'], 2) ?></td>
						<td class="centro"><a class="icone icone-alterar" href="modelos/alterar.php?id=<?= $modelo['id'] ?>"></a></td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		</main>
	</body>
</html>
