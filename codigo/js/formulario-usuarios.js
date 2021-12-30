document.addEventListener('DOMContentLoaded', function inicio() {
	let inputNomeUsuario = document.getElementById('nomeUsuario');
	let inputSenha = document.getElementById('senha');
	adicioneIrParaProximo(inputNomeUsuario, inputSenha);
	adicioneIrParaProximo(inputSenha, document.getElementById('submit'));
	inputNomeUsuario.addEventListener('keypress', caracteresValidos);
	inputNomeUsuario.addEventListener('blur', verifiqueUsuarioRepetido);
	inputSenha.addEventListener('keypress', caracteresValidos);
});

function verifiqueUsuarioRepetido() {
	const alterandoMesmo = (
		atual != '' && nomeDoUsuario(atual) == this.value
	);
	let avise = false;
	if (this.value != '' && !alterandoMesmo) {
		avise = valorExiste(usuarios, 'nomeUsuario', this.value);
	}
	if (avise) {
		aviseRepetido(this.value);
		this.value = '';
	} else {
		removaAvisoRepetido();
	}
}

function nomeDoUsuario(id) {
	return usuarios.find(u => u.id == id).nomeUsuario;
}

function caracteresValidos(event) {
	if (event.key === ' ' || !eAscii(event.key)) {
		event.preventDefault();
	}
}

function eAscii(c) {
	return /^[\x00-\x7F]*$/.test(c);
}
