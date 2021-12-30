document.addEventListener('DOMContentLoaded', function inicio() {
	let inputNomeUsuario = document.getElementById('nomeUsuario');
	let inputSenha = document.getElementById('senha');
	adicioneIrParaProximo(inputNomeUsuario, inputSenha);
	adicioneIrParaProximo(inputSenha, document.getElementById('submit'));
	inputNomeUsuario.addEventListener('focus', function () {
		this.selectionStart = this.selectionEnd = this.value.length;
	});
	inputNomeUsuario.focus();
});
