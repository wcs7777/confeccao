<?php require_once realpath(__DIR__.'/../src/locais.php'); ?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Tamanhos</title>
		<base href="<?= base() ?>">
		<link rel="icon" type="image/png" href="img/logo.png" sizes="16x16">
		<link rel="stylesheet" type="text/css" href="css/reset.css">
		<link rel="stylesheet" type="text/css" href="css/estilo.css">
		<link rel="stylesheet" type="text/css" href="css/tamanhos.css">
	</head>
	<body>
		<?php require_once realpath(__DIR__.'/../header.php'); ?>
		<main class="conteudo tamanhos">
			<a class="botao" href="tamanhos/cadastrar.php">Novo Tamanho</a>
			<table class="tabela">
				<thead>
					<tr>
						<th>ID</th>
						<th class="centro">Tamanho</th>
						<th class="centro">Alterar</th>
					</tr>
				</thead>
				<tbody>
				<?php
				require_once realpath(__DIR__.'/../src/tamanhos/banco.php');
				foreach (tamanhos() as $tamanho):
				?>
					<tr>
						<td><?= $tamanho['id'] ?></td>
						<td class="centro"><?= $tamanho['valor'] ?></td>
						<td class="centro"><a class="icone icone-alterar" href="tamanhos/alterar.php?id=<?= $tamanho['id'] ?>"></a></td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		</main>
	</body>
</html>
