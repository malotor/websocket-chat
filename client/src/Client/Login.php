<?php

namespace Client;

class Login {
	
	function checkLogin($user, $pass) {

		if (($user == 'foo') && ($pass == 'bar') ) {
			return true;
		}

		return false;
	}

}