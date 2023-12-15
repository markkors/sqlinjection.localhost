<?php
	require_once "database.php";
	
	function findPersons($searchString) {
		global $con;
		global $sql;

		$sql = "SELECT * FROM person WHERE name LIKE '%" . $searchString . "%'";
		$statement = $con->prepare($sql);
		
		$statement->execute();
		
		return $statement->fetchAll(PDO::FETCH_OBJ);
	}

	function getPersonById($id) {
		global $con;
		global $sql;

		$sql = "SELECT * FROM person WHERE id = $id";
		$statement = $con->prepare($sql);
		$statement->execute();
		
		return $statement->fetchObject();
	}
	
?>