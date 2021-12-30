document.addEventListener('DOMContentLoaded', function inicio() {
	let inputValor = document.getElementById('valor');
	adicioneIrParaProximo(inputValor, document.getElementById('submit'));
	inputValor.addEventListener('keypress', naoAceiteEspaco);
	inputValor.addEventListener('blur', verifiqueTamanhoRepetido);
});

function verifiqueTamanhoRepetido() {
	this.value = this.value.toLocaleUpperCase();
	const alterandoMesmo = (atual != '' && valorTamanho(atual) == this.value);
	let avise = false;
	if (this.value != '' && !alterandoMesmo) {
		avise = valorExiste(tamanhos, 'valor', this.value);
	}
	if (avise) {
		aviseRepetido(this.value);
		this.value = '';
	} else {
		removaAvisoRepetido();
	}
}

function valorTamanho(id) {
	return tamanhos.find(t => t.id == id).valor;
}

function naoAceiteEspaco(event) {
	if (event.key === ' ') {
		event.preventDefault();
	}
}
