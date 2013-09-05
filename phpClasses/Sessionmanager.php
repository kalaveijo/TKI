<?php

/*
 * This class handles session variables created with session_start(); and keeps user "logged in" to system
 */

class Sessionmanager {
	
	private $userName;
	private $DBH;
	private $isLogged;
	
	function __construct($DBH, $userName, $isLogged = false){
		if(!$isLogged){
			//redirect user back to loginpage	
		}else{
			$this->DBH = $DBH;
			$this->isLogged = $isLogged;
			$this->userName = $userName;
		}
	}
	
	function clearLogin(){
		$this->isLogged = false;
		$_SESSION['isLogged'] = $this->isLogged;
		//redirect user back to loginpage
	}
	
	//stores javascript into session variable to be passed 
	function javascriptMover($script = '', $store = true){
		if($store){
			$_SESSION['javascript'] = $script;
			return true;
		}else{
			return json_encode($_SESSION['javascript']);
		}
	}
}








?>