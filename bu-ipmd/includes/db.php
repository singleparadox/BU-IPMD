<?php
if ((defined("DB_SERVER")) && (defined("DB_USER")) && (defined("DB_PASS")) && (defined("DB_NAME"))){
	//content
}
else{
	define("DB_SERVER", "localhost");	//host
	define("DB_USER", "root");			//user
	define("DB_PASS", "");		//pass
	define("DB_NAME", "ipmd_db");//name
}


$connect = new mysqli(DB_SERVER,DB_USER,DB_PASS,DB_NAME)
			or die('ERROR: '.mysqli_connect_error());

/*mysql_connect($dbhost,$dbuser,$dbpass) or die('cannot connect to the server'); 
mysql_select_db($dbname) or die('database selection problem');
*/

?>