<?php
/*
 * Keeps track of all files stored into server and handles storage/retrieval operations
 */

class Filehandler extends Log{
	
	function __construct(){
		parent::__construct(); //initialize error logging
		//check if current days folder has been created and create one if not
		if(!file_exists("../files")){
				try{
					mkdir("../files");
				}catch(Exception $e){
					 $this->error($e);
				}
		}
	}
	
	//stores file into files folder
	//is tied to documentId
	function storeFile($documentId, $fileTempName, $fileName){
		if(!file_exists("../files/$documentId")){
				try{
					if(file_exists("../files/$documentId/" . $fileName)){
						throw new Exception("File $fileName already exists");
					}else{
					mkdir("../files/$documentId");
					move_uploaded_file($fileTempName, "../files/$documentId/" . $fileName);
					$this->Log("Uploaded File: $fileName");
					}
				}catch(Exception $e){
					$this->error($e);
				}
		}
	}
	
	//returns link to specified file
	// prolly not needed because js should already have file directory from db
	function retrieveFile($documentId, $fileName){
		return("../files/$documentId/$fileName");
	}
	
}







?>