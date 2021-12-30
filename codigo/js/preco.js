function configureParaMoeda(input) {
	input.addEventListener('focus', coloqueCifrao);
	input.addEventListener('keydown', deixeCifrao);
	input.addEventListener('keypress', aceiteApenasMoeda);
	input.addEventListener('blur', ajusteOuApagueMoeda);
}

function aceiteApenasMoeda(event) {
	const estaNoFinal = (this.selectionStart == this.value.length);
	const temVirgula = this.value.includes(',');
	if (!isNaN(event.key)) {
		if (estaNoFinal) {
			if (this.selectionStart == 5 && !temVirgula) {
				event.preventDefault();
				this.value = coloqueVirgula(this.value, event.key);
			} else if (this.selectionStart == 8 && temVirgula) {
				event.preventDefault();
				this.value = desloqueVirgula(this.value, event.key);
			}
		} else {
			event.preventDefault();
			coloqueNovoDigitoLugarCorretoMoeda(this, event.key);
		}
	} else if (event.key == ',' && !temVirgula) {
		const depoisVirgula = this.value.slice(this.selectionStart).length;
		const casasAtuais = this.value.split(' ')[1].length;
		let valido = false;
		if (!estaNoFinal && depoisVirgula == 2) {
			valido = true;
		} else if (estaNoFinal && 0 < casasAtuais && casasAtuais < 4) {
			valido = true;
		}
		if (!valido) {
			event.preventDefault();
		}
	} else if (event.key !== 'Enter') {
		event.preventDefault();
	}
}

function coloqueVirgula(atual, novoDigito) {
	return [atual, ',', novoDigito].join('');
}

function desloqueVirgula(atual, novoDigito) {
	const partes = atual.split(',');
	return [
		partes[0],
		partes[1][0],
		',',
		partes[1][1],
		novoDigito
	].join('');
}

function coloqueCifrao() {
	if (this.value == '') {
		this.value = 'R$ ';
	}
	this.selectionStart = this.selectionEnd = 3;
}

function juntePartesMoeda(partes) {
	return ['R$ ', partes.real, ',', partes.centavos].join('');
}

function ajustePartesMoeda(partes) {
	let sobra = partes.real.slice(3);
	partes.centavos = sobra + partes.centavos;
	const zeros = 2 - partes.centavos.length;
	if (zeros > 0) {
		partes.centavos += '0'.repeat(zeros);
	}
	if (partes.real.length == 0) {
		partes.real = '0';
	}
	return {
		'real' : partes.real.slice(0, 3),
		'centavos' : partes.centavos.slice(0, 2)
	}
}

function partesDesajustadasMoeda(valor) {
	const partes = /R\$\s(\d*),?(\d*)/.exec(valor);
	return {
		'real' : partes[1],
		'centavos' : partes[2]
	}
}

function ajusteOuApagueMoeda() {
	let partes = partesDesajustadasMoeda(this.value);
	if (partes.real != '' && partes.real > 0) {
		this.value = juntePartesMoeda(ajustePartesMoeda(partes));
	} else {
		this.value = '';
	}
}

function deixeCifrao(event) {
	const apagou = (event.key === 'Backspace' || event.key === 'Delete');
	if (apagou && this.selectionStart < 4) {
		event.preventDefault();
	}
}

function coloqueNovoDigitoLugarCorretoMoeda(input, novoDigito) {
	let posicao = input.selectionStart;
	if (posicao < 3) {
		posicao = 3;
	}
	const partes = ajustePartesMoeda(
		partesDesajustadasMoeda(
			[
				input.value.slice(0, posicao),
				novoDigito,
				input.value.slice(posicao)
			].join('')
		)
	);
	input.value = juntePartesMoeda(partes);
	if (input.value[posicao + 1] == ',') {
		posicao++;
	}
	input.selectionStart = input.selectionEnd = posicao + 1;
}
