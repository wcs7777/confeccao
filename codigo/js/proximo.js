function adicioneIrParaProximo(atual, proximo) {
	atual.addEventListener('keydown', function vaPraProximo() {
		if (event.key === 'Tab' || event.key === 'Enter') {
			event.preventDefault();
			proximo.focus();
		}
	});
}
