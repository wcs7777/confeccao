<?php
function base() {
	return 'http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].'/';
}

function vaPara($relativo) {
	return exit(header('location: '.base().$relativo));
}
