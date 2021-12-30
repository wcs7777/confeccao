function configureParaNome(input) {
	input.addEventListener('keypress', aceiteApenasLetras);
	input.addEventListener('blur', formateNome);
}

function aceiteApenasLetras(event) {
	if (!eLetra(event.key) && event.key !== ' ') {
		event.preventDefault();
	}
}

function capitalizeString(string) {
	let resultado = [];
	let palavras = string.trim().split(/\s+/);
	/* if (!(palavras.length == 1 && palavras[0] == '')) { */
	if (palavras.length != 1 || palavras[0] != '') {
		for (let palavra of palavras) {
			palavra = palavra.toLocaleLowerCase();
			if (!ePreposicao(palavra)) {
				palavra = palavra[0].toLocaleUpperCase() + palavra.slice(1);
			}
			resultado.push(palavra);
		}
	}
	return resultado.join(' ');
}

function eLetra(char) {
	return (char.toLocaleLowerCase() != char.toLocaleUpperCase());
}

function ePreposicao(palavra) {
	return ['de', 'da', 'do', 'das', 'dos'].includes(palavra);
}

function formateNome() {
	if (this.value != '') {
		this.value = capitalizeString(this.value);
	}
}
