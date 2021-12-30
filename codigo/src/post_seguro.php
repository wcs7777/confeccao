<?php
function postSeguro($index) {
	if (isset($_POST[$index])) {
		return htmlspecialchars($_POST[$index], ENT_QUOTES);
	} else {
		return '';
	}
}
