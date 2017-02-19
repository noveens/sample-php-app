<?php

session_start();

$CONFIG = array(

	'proxy' => 'proxy.iiit.ac.in',
	'proxy_port' => '8080'

);

$_SESSION['conf'] = $CONFIG;

?>