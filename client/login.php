<?php 

	require 'vendor/autoload.php';

	$user = $_POST['user'];
	$pass = $_POST['pass'];

	$auth = new Client\Login();

	if (!$auth->checkLogin($user, $pass)) {
		$_COOKIE['auth']=true;
		
	}
