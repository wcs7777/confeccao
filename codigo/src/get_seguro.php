<?php
function getSeguro($index) {
	if (isset($_GET[$index])) {
		return htmlspecialchars($_GET[$index], ENT_QUOTES);
	} else {
		return '';
	}
}
