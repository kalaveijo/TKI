<?php

function getTimestamp(){
	$time = date("Y") . "-" . date("m") . "-" . date("d") . " " . date("H"). ":" . date("i") . ":" . date("s");
	return $time;
}

//converts associative array to numbered one
function convertAssocToNum($array){
	$i = 0;
	$numberedArray = array();
	foreach($array as $num){
		$numberedArray[$i] = $num;
		$i++;
	}
	return $numberedArray;
}

//searches numerical array for X and returns key
function searchNumArray($needle, $haystack){
	for($i=0; $i < count($haystack); $i++){
		if($needle == $haystack[$i]){
			$e = $i;
		}
	}
	return $e;
}

/**
 * Better GI than print_r or var_dump -- but, unlike var_dump, you can only dump one variable.  
 * Added htmlentities on the var content before echo, so you see what is really there, and not the mark-up.
 * 
 * Also, now the output is encased within a div block that sets the background color, font style, and left-justifies it
 * so it is not at the mercy of ambient styles.
 *
 * Inspired from:     PHP.net Contributions
 * Stolen from:       [highstrike at gmail dot com]
 * Modified by:       stlawson *AT* JoyfulEarthTech *DOT* com 
 *
 * @param mixed $var  -- variable to dump
 * @param string $var_name  -- name of variable (optional) -- displayed in printout making it easier to sort out what variable is what in a complex output
 * @param string $indent -- used by internal recursive call (no known external value)
 * @param unknown_type $reference -- used by internal recursive call (no known external value)
 */
function do_dump(&$var, $var_name = NULL, $indent = NULL, $reference = NULL)
{
    $do_dump_indent = "<span style='color:#666666;'>|</span> &nbsp;&nbsp; ";
    $reference = $reference.$var_name;
    $keyvar = 'the_do_dump_recursion_protection_scheme'; $keyname = 'referenced_object_name';
    
    // So this is always visible and always left justified and readable
    echo "<div style='text-align:left; background-color:white; font: 100% monospace; color:black;'>";

    if (is_array($var) && isset($var[$keyvar]))
    {
        $real_var = &$var[$keyvar];
        $real_name = &$var[$keyname];
        $type = ucfirst(gettype($real_var));
        echo "$indent$var_name <span style='color:#666666'>$type</span> = <span style='color:#e87800;'>&amp;$real_name</span><br>";
    }
    else
    {
        $var = array($keyvar => $var, $keyname => $reference);
        $avar = &$var[$keyvar];

        $type = ucfirst(gettype($avar));
        if($type == "String") $type_color = "<span style='color:green'>";
        elseif($type == "Integer") $type_color = "<span style='color:red'>";
        elseif($type == "Double"){ $type_color = "<span style='color:#0099c5'>"; $type = "Float"; }
        elseif($type == "Boolean") $type_color = "<span style='color:#92008d'>";
        elseif($type == "NULL") $type_color = "<span style='color:black'>";

        if(is_array($avar))
        {
            $count = count($avar);
            echo "$indent" . ($var_name ? "$var_name => ":"") . "<span style='color:#666666'>$type ($count)</span><br>$indent(<br>";
            $keys = array_keys($avar);
            foreach($keys as $name)
            {
                $value = &$avar[$name];
                do_dump($value, "['$name']", $indent.$do_dump_indent, $reference);
            }
            echo "$indent)<br>";
        }
        elseif(is_object($avar))
        {
            echo "$indent$var_name <span style='color:#666666'>$type</span><br>$indent(<br>";
            foreach($avar as $name=>$value) do_dump($value, "$name", $indent.$do_dump_indent, $reference);
            echo "$indent)<br>";
        }
        elseif(is_int($avar)) echo "$indent$var_name = <span style='color:#666666'>$type(".strlen($avar).")</span> $type_color".htmlentities($avar)."</span><br>";
        elseif(is_string($avar)) echo "$indent$var_name = <span style='color:#666666'>$type(".strlen($avar).")</span> $type_color\"".htmlentities($avar)."\"</span><br>";
        elseif(is_float($avar)) echo "$indent$var_name = <span style='color:#666666'>$type(".strlen($avar).")</span> $type_color".htmlentities($avar)."</span><br>";
        elseif(is_bool($avar)) echo "$indent$var_name = <span style='color:#666666'>$type(".strlen($avar).")</span> $type_color".($avar == 1 ? "TRUE":"FALSE")."</span><br>";
        elseif(is_null($avar)) echo "$indent$var_name = <span style='color:#666666'>$type(".strlen($avar).")</span> {$type_color}NULL</span><br>";
        else echo "$indent$var_name = <span style='color:#666666'>$type(".strlen($avar).")</span> ".htmlentities($avar)."<br>";

        $var = $var[$keyvar];
    }
    
    echo "</div>";
}

//does not generate readable words, only appends random letters
function generateRandomWord(){
	$word = '';
	$letters = array ('a', 'b', 'c', 'd', 'e', 'f', 'g',
						'h', 'i', 'j', 'k', 'l', 'm', 'n',
						'o', 'p', 'q', 'r', 's', 't', 'u',
						'v', 'w', 'x', 'y', 'z');
	for($i = 0; $i < rand(1,100); $i++){
		$word .= $letters[rand(0, (count($letters)-1))];
	}
	return $word;
}

function generateRandomDate(){
	$randomYear = rand(1001, 9000);
	$randomMonth = rand(1, 12);
	if($randomMonth < 10){
		$randomMonth = "0" . $randomMonth;
	}
	$randomDay = rand(1,27);
	if($randomDay < 10){
		$randomDay = "0" . $randomDay;
	}
	return "$randomYear" . "-" . "$randomMonth" . "-" . "$randomDay"; 
}

//==== Redirect... Try PHP header redirect, then Java redirect, then try http redirect.:
function redirect($url){
	if (!headers_sent()){    //If headers not sent yet... then do php redirect
		header('Location: '.$url); exit;
	}else{                    //If headers are sent... do java redirect... if java disabled, do html redirect.
		echo '<script type="text/javascript">';
		echo 'window.location.href="'.$url.'";';
		echo '</script>';
		echo '<noscript>';
		echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
		echo '</noscript>'; exit;
	}
}//==== End -- Redirect

/*
 * parses tables that need to be updated
 * this has been HAXORED to work, refactor proper solution later
 * currently only handles project tables properly based on jquery response
 */
function parseUpdateData($projectData, $table ){
	$i = 0;
	$returnArray = array();
	
	foreach($projectData as $projectKey => $singleData){
		foreach($table as $tableKey => $element){
			if($projectKey == $element){
				$returnArray[$projectKey][$i] = $singleData[0];
				$i++; 
			}
		}
	}
	
	return $returnArray;
}


//prepares data for database functions, removes unneeded columns (id, vst)
// returns formated data
function prepareDataForDatabase($data, $table){
	
	$returnArray = array();
	$i = 0;
	
	// datatypes, false == entry will not be inserted into db
	$typeData['project'] = array(
	"id"=> "int",
	"identifier" => "varchar",
	"diary_number" => "varchar",
	"projectcode" => "varchar",
	"project_name" => "varchar",
	"acronym" => "varchar",
	"focuse_areas" => "varchar",
	"metropolia_coordinator" => "varchar",
	"degree_program_related" => "varchar",
	"start_day" => "DATE",
	"end_day" => "DATE",
	"inspector" => "varchar",
	"inspected_day" => "DATE",
	"funding_application" => "varchar",
	"funding_application_signed_day" => "DATE",
	"deniend_application" => "varchar",
	"targeted_budget" => "varchar",
	"offer" => "varchar",
	"invitation_to_tender" => "varchar",
	"invention_announcement" => "varchar",
	"ethical_estimates_on" => "varchar",
	"general_project_information" => "varchar",
	"valid_starttime" => "DATETIME",
	"valid_endtime" => "DATETIME",
	"user_id" => "INT",
	"user_vst" => "DATETIME");
	
	foreach($data[$table][0] as $key => $element){
		if($typeData[$table][$key] != false){
			$returnArray[0][$i] = $key;
			$returnArray[1][$i] = $element;
			$returnArray[2][$i] = $typeData[$table][$key];
			$i++;
		}
		
	}
	return $returnArray;
}

?>