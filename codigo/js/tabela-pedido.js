function adicioneRow() {
	let tabela = pegueTabela();
	const name = nameItem();
	tabela.insertRow(tabela.childElementCount).appendChild(
		crieFragmentCells([
			crieCellModelo(name),
			crieCellTamanho(name),
			crieCellQuantia(name),
			crieCellPrecoModelo(),
			crieCellSubtotal(),
			crieCellAdicionarItem()
		])
	);
}

function populeTabela(itens) {
	const ultimo = itens.pop(); /* Apenas o último é adicionar */
	let rows = document.createDocumentFragment();
	let name = '';
	for (const item of itens) {
		name = nameItem();
		rows.appendChild(
			crieRow([
				crieCellModelo(name, item.idModelo),
				crieCellTamanho(name, item.idTamanho),
				crieCellQuantia(name, item.quantia),
				crieCellPrecoModelo(formatoPreco(item.precoModelo)),
				crieCellSubtotal(formatoPreco(item.subtotal, 5)),
				crieCellRemoverItem()
			])
		);
	}
	name = nameItem();
	rows.appendChild(
		crieRow([
			crieCellModelo(name, ultimo.idModelo),
			crieCellTamanho(name, ultimo.idTamanho),
			crieCellQuantia(name, ultimo.quantia),
			crieCellPrecoModelo(formatoPreco(ultimo.precoModelo)),
			crieCellSubtotal(formatoPreco(ultimo.subtotal, 5)),
			crieCellAdicionarItem()
		])
	);
	pegueTabela().appendChild(rows);
}

function pegueTabela() {
	return document.getElementById('tabela-itens');
}

function nameItem() {
	nameItem.index = nameItem.index + 1 || 0;
	return 'itens[' + nameItem.index + ']';
}

function crieCellModelo(name, value='') {
	let select = crieSelect(name + '[idModelo]', 'Modelo');
	for (const modelo of modelos) {
		select.add(crieOption(modelo.id, modelo.tipo, modelo.id == value));
	}
	select.addEventListener('change', function mostrePreco() {
		peguePreco(pegueRow(this)).value = formatoPreco(
			precoModelo(this.value)
		);
	});
	select.addEventListener('change', atualizeSubtotal);
	select.addEventListener('change', atualizeTotal);
	select.addEventListener('change', removaRepetido);
	return crieCell([select], 'modelo');
}

function crieCellTamanho(name, value='') {
	let select = crieSelect(name + '[idTamanho]', 'Tamanho');
	for (const tamanho of tamanhos) {
		select.add(
			crieOption(tamanho.id, tamanho.valor, tamanho.id == value)
		);
	}
	select.addEventListener('change', removaRepetido);
	return crieCell([select], 'tamanho');
}

function crieCellQuantia(name, value='1') {
	let input = crieInput(name + '[quantia]', 'number');
	input.value = value;
	input.min = '1';
	input.required = true;
	input.title = 'Quantidade de camisetas';
	input.addEventListener('keypress', aceiteApenasInteiro);
	input.addEventListener('change', atualizeSubtotal);
	input.addEventListener('change', atualizeTotal);
	return crieCell([input], 'quantia');
}

function crieCellPrecoModelo(value='') {
	let input = crieInput('', 'text');
	input.value = value;
	input.readOnly = true;
	input.placeholder = 'Preço';
	input.title = 'Preço do modelo';
	return crieCell([input], 'preco-modelo');
}

function crieCellSubtotal(value='') {
	let input = crieInput('', 'text');
	input.value = value;
	input.readOnly = true;
	input.placeholder = 'Subtotal';
	input.title = 'Subtotal';
	return crieCell([input], 'subtotal');
}

function crieCellAdicionarItem() {
	return crieCellAdicionarRemoverItem(adicioneItem, 'icone-adicionar');
}

function crieCellRemoverItem() {
	return crieCellAdicionarRemoverItem(removaItem, 'icone-remover');
}

function crieCellAdicionarRemoverItem(listener, icone) {
	let adicionarRemover = crieButton(listener);
	adicionarRemover.classList.add('adicionar-remover');
	adicionarRemover.classList.add('icone');
	adicionarRemover.classList.add(icone);
	return crieCell([adicionarRemover], 'adicionar-remover');
}

function crieSelect(name, label) {
	let select = document.createElement('select');
	select.classList.add('entrada');
	select.name = name;
	select.required = true;
	select.add(crieLabelOption(label));
	return select;
}

function crieLabelOption(label) {
	let option = crieOption('', label);
	option.selected = true;
	option.disabled = true;
	option.hidden = true;
	return option;
}

function crieOption(value, textNode, selected=false) {
	let option = document.createElement('option');
	option.value = value;
	option.selected = selected;
	option.appendChild(document.createTextNode(textNode));
	return option;
}

function crieInput(name, type) {
	let input = document.createElement('input');
	if (name != '') {
		input.name = name;
	}
	input.type = type;
	input.classList.add('entrada');
	return input;
}

function crieButton(listener) {
	let button = document.createElement('button');
	button.type = 'button';
	button.addEventListener('click', listener);
	return button;
}

function crieRow(cells=[]) {
	let row = document.createElement('tr');
	for (let cell of cells) {
		row.appendChild(cell);
	}
	return row;
}

function crieFragmentCells(cells=[]) {
	let fragment = document.createDocumentFragment();
	for (let cell of cells) {
		fragment.appendChild(cell);
	}
	return fragment;
}

function crieCell(children=[], valorClass='') {
	let cell = document.createElement('td');
	for (let child of children) {
		cell.appendChild(child);
	}
	if (valorClass !== '') {
		cell.classList.add(valorClass);
	}
	return cell;
}

function adicioneItem() {
	adicioneRow();
	mudeAdicionarItemParaRemover(this);
}

function removaItem() {
	removaRow(pegueRow(this));
}

function removaRow(row) {
	pegueTabela().removeChild(row);
	atualizeTotal();
}

function mudeAdicionarItemParaRemover(item) {
	item.classList.remove('icone-adicionar');
	item.classList.add('icone-remover');
	item.removeEventListener('click', adicioneItem);
	item.addEventListener('click', removaItem);
}

function precoModelo(id) {
	return modelos.find(m => m.id == id).preco;
}

function pegueModelo(row) {
	return row.children[0].firstChild;
}

function pegueTamanho(row) {
	return row.children[1].firstChild;
}

function pegueQuantia(row) {
	return row.children[2].firstChild;
}

function peguePreco(row) {
	return row.children[3].firstChild;
}

function pegueSubtotal(row) {
	return row.children[4].firstChild;
}

function pegueTotal() {
	return document.getElementById('total');
}

function pegueRow(element) {
	return element.parentNode.parentNode;
}

function atualizeSubtotal() {
	let row = pegueRow(this);
	const total = subtotalRow(row);
	pegueSubtotal(row).value = (total > 0)? formatoPreco(total, 5) : '';
}

function atualizeTotal() {
	let total = 0;
	for (let row of pegueTabela().rows) {
		total += subtotalRow(row);
	}
	pegueTotal().value = (total > 0)? formatoPreco(total, 5) : '';
}

function subtotalRow(row) {
	const id = pegueModelo(row).value;
	const quantia = pegueQuantia(row).value;
	return (id != '' && quantia != '')? precoModelo(id) * quantia : 0;
}

function removaRepetido() {
	const rowAtual = pegueRow(this);
	const modeloAtual = pegueModelo(rowAtual).value;
	const tamanhoAtual = pegueTamanho(rowAtual).value;
	for (let row of pegueTabela().rows) {
		const igual = rowAtual !== row &&
					  modeloAtual == pegueModelo(row).value &&
					  tamanhoAtual == pegueTamanho(row).value;
		if (igual) {
			const quantiaAtual = parseInt(pegueQuantia(rowAtual).value);
			const quantiaRow = parseInt(pegueQuantia(row).value);
			pegueQuantia(rowAtual).value = quantiaAtual + quantiaRow;
			pegueSubtotal(rowAtual).value = formatoPreco(
				subtotalRow(rowAtual), 5
			);
			removaRow(row);
			break;
		}
	}
}

function aceiteApenasInteiro(event) {
	if ((isNaN(event.key) || event.key === ' ') && event.key !== 'Enter') {
		event.preventDefault();
	}
}

function formatoPreco(valor, casasReal=0) {
	const array = String(valor).split('.');
	let real = array[0];
	let centavo = (array.length > 1)? array[1] : '00';
	if (centavo.length > 2) {
		centavo = centavo.slice(0, 2);
	} else if (centavo.length == 1) {
		centavo = centavo + '0';
	}
	if (casasReal > 0) {
		casasReal -= real.length;
	}
	casasReal = (casasReal < 1)? '' : '\xA0'.repeat(casasReal + 1);
	return 'R$ ' + casasReal + real + ',' + centavo;
}
