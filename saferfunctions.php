<?php
	require_once "database.php";
	
	function findPersons($aSearchString) {
		global $con;
		global $sql;

		$sql = "SELECT * FROM person WHERE name LIKE ?";
		$statement = $con->prepare($sql);
		$statement->bindValue(1, "%$aSearchString%");
		
		$statement->execute();
		
		return $statement->fetchAll(PDO::FETCH_OBJ);
	}

	function getPersonById($aId) {
		global $con;
		global $sql;

		$sql = "SELECT * FROM person WHERE id = ?";
		$statement = $con->prepare($sql);
		$statement->bindValue(1, $aId);
		$statement->execute();
		
		return $statement->fetchObject();
	}
	
?>