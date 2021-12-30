<?php require_once realpath(__DIR__.'/src/restrito.php'); ?>
<header>
	<nav class="menu">
		<ul class="opcoes-menu">
			<li><a class="opcao-menu clientes" href="clientes/mostrar.php">Clientes</a></li>
			<li><a class="opcao-menu pedidos" href="pedidos/mostrar.php">Pedidos</a></li>
			<li><a class="opcao-menu modelos" href="modelos/mostrar.php">Modelos</a></li>
			<li><a class="opcao-menu tamanhos" href="tamanhos/mostrar.php">Tamanhos</a></li>
			<?php if (eAdministrador()): ?>
			<li><a class="opcao-menu usuarios" href="usuarios/mostrar.php">Usuários</a></li>
			<?php endif; ?>
			<li><a class="opcao-menu sair" href="sair.php">Sair</a></li>
		</ul>
	</nav>
</header>
