<?php 

session_start();

header('Content-Type: text/html; charset=utf-8');

require_once("page.php");

$requestURI = explode('/', $_SERVER['REQUEST_URI']);
$scriptName = explode('/',$_SERVER['SCRIPT_NAME']);

if(!function_exists("array_column"))
{

    function array_column($array,$column_name)
    {

        return array_map(function($element) use($column_name){return $element[$column_name];}, $array);

    }

}

for ($i= 0; $i < sizeof($scriptName); $i++)
{
	if ($requestURI[$i] == $scriptName[$i])
	{
		unset($requestURI[$i]);
	}
}

$command = array_values($requestURI);

if (count($command) > 0) {
	if ($command[0] != "") {
		if ($command[0] == "get") {
			get_calendar($command[1]);
		}
		get_day($command[0]); 
	} else {
		get_page();	
	}
} else {
	get_page();	
}



?>