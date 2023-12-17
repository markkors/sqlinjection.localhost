<?php
	try {
		$con = new PDO("mysql:host=localhost;port=3307", "root", "");
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$con->exec("USE sqlinjection");	
	}
	catch(Exception $e) {
		echo "Could not connect to database 'sqlinjection'";
	}

?>