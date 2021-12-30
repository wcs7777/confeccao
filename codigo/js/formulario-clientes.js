document.addEventListener('DOMContentLoaded', function inicio() {
	let inputNome = document.getElementById('nome');
	let inputTelefone = document.getElementById('telefone');
	adicioneIrParaProximo(inputNome, inputTelefone);
	adicioneIrParaProximo(inputTelefone, document.getElementById('submit'));
	configureParaNome(inputNome);
	configureParaTelefone(inputTelefone);
});
