function valorExiste(array, chave, valor) {
	return array.some(a => a[chave] == valor);
}

function aviseRepetido(valor) {
	let erro = document.getElementById('aviso-repetido');
	let repetido = document.getElementById('repetido');
	erro.classList.remove('invisivel');
	repetido.textContent = valor;
}

function removaAvisoRepetido() {
	let erro = document.getElementById('aviso-repetido');
	erro.classList.add('invisivel');
}
