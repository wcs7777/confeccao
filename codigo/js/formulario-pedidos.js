document.addEventListener('DOMContentLoaded', function inicio() {
	let inputIdCliente = document.getElementById('idCliente');
	let inputNomeCliente = document.getElementById('nomeCliente');
	let inputPrevisaoEntrega = document.getElementById('previsaoEntrega');
	let inputTotal = document.getElementById('total');
	configureParaNome(inputNomeCliente);
	inputPrevisaoEntrega.min = hoje();
	inputPrevisaoEntrega.max = anoQueVem();
	/* Travar em um cliente ou não */
	if (idCliente == '') {
		configureEntradaCliente(clientes);
	} else {
		configureEntradaClientePreDefido(idCliente, nomeCliente);
	}
	/* Continuar pedido ou não */
	if (pedido == '') {
		adicioneRow();
	} else {
		populeTabela(pedido.itens);
		inputPrevisaoEntrega.value = pedido.previsaoEntrega;
		inputTotal.value = formatoPreco(pedido.total, 5);
		if (idCliente == '') {
			inputIdCliente.value = pedido.idCliente;
			inputNomeCliente.value = pedido.nomeCliente;
		}
	}
});

function configureEntradaCliente(clientes) {
	const nomes = clientes.map(c => c.nome).sort();
	populeDataList(nomes);
	const nomeMaisCurto = nomes.reduce(function menor(menor, atual) {
		return (menor.length <= atual.length)? menor : atual;
	});
	let inputNomeCliente = document.getElementById('nomeCliente');
	let inputIdCliente = document.getElementById('idCliente');
	inputNomeCliente.addEventListener('input', function mostreId() {
		this.value = this.value.trimLeft();
		let id = '';
		const checar = (this.value.length >= nomeMaisCurto.length);
		if (checar && nomes.includes(this.value)) {
			id = clientes.find(c => c.nome == this.value).id;
		}
		inputIdCliente.value = id;
	});
	inputIdCliente.addEventListener('keypress', aceiteApenasInteiro);
	inputIdCliente.addEventListener('input', function mostreNome() {
		let nome = '';
		if (this.value != '') {
			const cliente = clientes.find(c => c.id == this.value);
			if (cliente) {
				nome = cliente.nome;
			}
		}
		inputNomeCliente.value = nome;
	});
	inputIdCliente.addEventListener('blur', function apagueSeInvalido() {
		if (inputNomeCliente.value == '') {
			this.value = '';
		}
	});
}

function configureEntradaClientePreDefido(idCliente, nomeCliente) {
	let inputIdCliente = document.getElementById('idCliente');
	inputIdCliente.value = idCliente;
	inputIdCliente.readOnly = true;
	let inputNomeCliente = document.getElementById('nomeCliente');
	inputNomeCliente.value = nomeCliente;
	inputNomeCliente.readOnly = true;
}

function populeDataList(nomes) {
	let fragment = document.createDocumentFragment();
	for (const nome of nomes) {
		let option = document.createElement('option');
		option.value = nome;
		option.textContent = nome;
		fragment.appendChild(option);
	}
	document.getElementById('clientes').appendChild(fragment);
}

function hoje() {
	const date = new Date();
	return date.getFullYear() + '-' + (date.getMonth() + 1) + '-' + date.getDate();
}

function anoQueVem() {
	const date = new Date();
	/* Dia 28 para caso seja ano bissexto não precisar validar a data */
	return (date.getFullYear() + 1) + '-' + (date.getMonth() + 1) + '-' + '28';
}
