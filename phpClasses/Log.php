<?php

//used to handle IO of error/debug/log messages
//write error handling
class Log{
	
	private $date; // used to keep track of current date/folder
	
	function __construct(){
		$this->date = date("Y") . "_" . date("m") . "_" . date("d");
		
		//check if current days folder has been created and create one if not
		if(!file_exists("../logs/$this->date")){
				try{
					mkdir("../logs/$this->date");
					$filehandle = fopen("../logs/$this->date/debug.txt", "w");
					$filehandle = fopen("../logs/$this->date/log.txt", "w");
					$filehandle = fopen("../logs/$this->date/error.txt", "w");
					fclose($filehandle);
				}catch(Exception $e){
					echo $e;
				}
		}
	}
	
	function debug($debugData){
		try{
			$filehandle = fopen("../logs/$this->date/debug.txt", "a");
			fwrite($filehandle, date("r") . " " . $debugData . "\n");
			fclose($filehandle);
		}catch(Exception $e){
			echo $e;
		}
		
	}
	
	function log($logData){
	try{
			$filehandle = fopen("../logs/$this->date/log.txt", "a");
			fwrite($filehandle, date("r") . " " . $logData . "\n");
			fclose($filehandle);
		}catch(Exception $e){
			echo $e;
		}
	}
	
	function error($errorData){
	try{
			$filehandle = fopen("../logs/$this->date/error.txt", "a");
			fwrite($filehandle, date("r") . " " . $errorData . "\n");
			fclose($filehandle);
		}catch(Exception $e){
			echo $e;
		}
	}
	
	function __toString(){
		echo($this->date);
	}
}


?>