function configureParaTelefone(input) {
	input.addEventListener('focus', abraParenteses);
	input.addEventListener('keydown', deixeFormatoTelefone);
	input.addEventListener('keypress', aceiteApenasTelefone);
	input.addEventListener('blur', retireAbraParenteses);
}

function aceiteApenasTelefone(event) {
	const estaNoFinal = (this.selectionStart == this.value.length);
	if (!isNaN(event.key)) {
		if (estaNoFinal) {
			if ([0, 3, 4, 9, 14].includes(this.selectionStart)) {
				event.preventDefault();
				if (this.selectionStart != 14) {
					this.value = coloqueFormatoTelefone(
						this.value,
						event.key,
						this.selectionStart
					);
				} else {
					this.value = ajusteTelefoneParaNoveDigitos(
						this.value,
						event.key
					);
				}
			}
		} else {
			event.preventDefault();
			coloqueNovoDigitoLugarCorretoTelefone(this, event.key);
		}
	} else if (event.key !== 'Enter') {
		event.preventDefault();
	}
}

function coloqueFormatoTelefone(atual, novoDigito, posicao) {
	return {
		0 : '(' + novoDigito,
		3 : atual + ') ' + novoDigito,
		4 : atual + ' ' + novoDigito,
		9 : atual + '-' + novoDigito
	}[posicao];
}

function ajusteTelefoneParaNoveDigitos(atual, novoDigito) {
	const segundaParte = atual.slice(10, 14);
	return [
		atual.slice(0, 9),
		segundaParte[0],
		'-',
		segundaParte.slice(1),
		novoDigito
	].join('');
}

function juntePartesTelefone(partes) {
	return [
		'(',
		partes.ddd,
		') ',
		partes.primeira,
		'-',
		partes.segunda
	].join('');
}

function ajustePartesTelefone(partes) {
	let sobra = partes.ddd.slice(2);
	partes.primeira = sobra + partes.primeira;
	sobra = partes.primeira.slice(5);
	partes.segunda = sobra + partes.segunda;
	return {
		'ddd' : partes.ddd.slice(0, 2),
		'primeira' : partes.primeira.slice(0, 5),
		'segunda' : partes.segunda.slice(0, 4)
	};
}

function partesDesajustadasTelefone(valor) {
	const partes = /\((\d*?)\)\s(\d*?)-(\d*)/.exec(valor);
	return {
		'ddd' : partes[1],
		'primeira' : partes[2],
		'segunda' : partes[3]
	};
}

function deixeFormatoTelefone(event) {
	const apagou = (event.key === 'Backspace' || event.key === 'Delete');
	const voltou = (this.selectionStart != this.value.length);
	const estaInicio = (this.selectionStart == 0);
	let valido = true;
	if (apagou && voltou && !estaInicio) {
		valido = ![')', '(', ' ', '-'].includes(
			this.value[this.selectionStart - 1]
		);
	}
	if (!valido) {
		event.preventDefault();
	}
}

function coloqueNovoDigitoLugarCorretoTelefone(input, novoDigito) {
	let posicao = input.selectionStart;
	if (posicao == 0 || posicao == 4) {
		posicao++;
	}
	const partes = ajustePartesTelefone(
		partesDesajustadasTelefone(
			[
				input.value.slice(0, posicao),
				novoDigito,
				input.value.slice(posicao)
			].join('')
		)
	);
	if (input.value[posicao] != ' ') {
		input.value = juntePartesTelefone(partes);
	}
	if (posicao == 3) {
		posicao += 2;
	} else if (posicao == 10 && partes.primeira.length == 5) {
		posicao++;
	}
	input.selectionStart = input.selectionEnd = posicao + 1;
}

function abraParenteses() {
	if (this.value == '') {
		this.value = '(';
	}
	this.selectionStart = this.selectionEnd = 1;
}

function retireAbraParenteses() {
	if (this.value == '(') {
		this.value = '';
	}
}
