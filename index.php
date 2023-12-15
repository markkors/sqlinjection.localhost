<?php
	if(isset($_GET["resetdb"]) && $_GET["resetdb"]) {
		require_once "resetdatabase.php";
		resetDatabase();
		header("location: index.php");
	}
	
	$persons = array();
	$searchString = "";
	$sql = "";
	$error = "";
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		//require_once "saferfunctions.php";	
		require_once "unsafefunctions.php";	
	
		$searchString = $_POST["search"];
		try {
			$persons = findPersons($searchString);
		}
		catch(Exception $e) {
			$error = $e;
		}
	}
	
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	
		<link href="css/style.css" rel="stylesheet" type="text/css" />
		<script src="js/scripts.js"></script>
	</head>
	<body>
		<div id="tipsdialog" title="SQL Tips" style="display:none;">
			<span class="tips1">;</span><span class="tips2">sluit een SQL statement af, om eventueel een extra statement uit te voeren</span><br/><br/>
			<span class="tips1">#</span><span class="tips2">zet alle sql code achter de hashtag in commentaar</span><br/><br/>
			<span class="tips1">UNION SELECT</span><span class="tips2">Voeg meerdere query resultaten samen</span><br/><br/>
			<span class="tips1">DROP TABLE 'tabelnaam'</span><span class="tips2">verwijder een tabel</span><br/><br/>
			<span class="tips1">DROP DATABASE 'databasenaam'</span><span class="tips2">verwijder een complete database</span><br/>
		</div>
		<div id="databasedialog" title="Database" style="display:none;">
			<p>Structuur:</p>
			<img src="img/database.png" />
		</div>
	
		<div id="actionbar">
			<span style="float:left;">SQL INJECTION PLAYGROUND</span>
			<a href="#" onclick="displayTipsDialog();">MySql tips en trucs</a>
			<a href="#" onclick="displayDatabaseDialog();">Database structuur</a>
			<a href="#" onclick="confirmReset(event);">Reset database</a>
		</div>
			<?php if($sql != "") {?>
				<div id="sqlbar">
					Gebruikte SQL:
					<p class="source_code"><?php echo $sql; ?><p>
				</div>
			<?php } ?>
			<?php if($error != "") {?>
				<div id="errorbar">
					Foutmelding:
					<p class="source_code"><?php echo $error; ?><p>
				</div>
			<?php } ?>
		
		<div id="container">
			<br/>
			<form method="post">
				Zoek op naam: 
				<input type="text" name="search" maxlength="300" value="<?php echo $searchString;?>" />
				<input type="submit" value="Zoeken" /> 
			</form>
			
			<h3>Zoekresultaat:</h3>
			<div id="search_container">
				<div class="cell_header">Naam</div>
				<div class="cell_header">Adres</div>
				<div class="cell_header" style="width: 100px;">&nbsp;</div>
				
				<?php
					foreach($persons as $person) {
						echo "<div class=\"cell\">$person->name</div>";
						echo "<div class=\"cell\">$person->address</div>";
						echo "<div style=\"width: 100px;text-align:center;\" class=\"cell\"><a href=\"person.php?id=$person->id\">Bekijken</a></div>";
					}
				?>
			</div>
		</div>
	</body>
</html>