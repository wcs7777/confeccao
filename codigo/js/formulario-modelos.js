document.addEventListener('DOMContentLoaded', function inicio() {
	let inputTipo = document.getElementById('tipo');
	let inputPreco = document.getElementById('preco');
	adicioneIrParaProximo(inputTipo, inputPreco);
	adicioneIrParaProximo(inputPreco, document.getElementById('submit'));
	configureParaMoeda(inputPreco);
	inputTipo.addEventListener('blur', verifiqueModeloRepetido);
});

function verifiqueModeloRepetido() {
	this.value = capitalizeString(this.value);
	const alterandoMesmo = (atual != '' && tipoModelo(atual) == this.value);
	let avise = false;
	if (this.value != '' && !alterandoMesmo) {
		avise = valorExiste(modelos, 'tipo', this.value);
	}
	if (avise) {
		aviseRepetido(this.value);
		this.value = '';
	} else {
		removaAvisoRepetido();
	}
}

function tipoModelo(id) {
	return modelos.find(m => m.id == id).tipo;
}
