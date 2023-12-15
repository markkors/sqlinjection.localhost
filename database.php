<?php
	$con = new PDO("mysql:host=localhost", "root", "");
	$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	try {
		$con->exec("USE sqlinjection");	
	}
	catch(Exception $e) {
		echo "Could not connect to database 'sqlinjection'";
	}

?>