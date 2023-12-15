<?php
	//require_once "saferfunctions.php";
	require_once "unsafefunctions.php";
	
	$sql = "";
	$error = "";
	
	try {
		$person = getPersonById($_GET["id"]);	
	}
	catch(Exception $e) {
		$error = $e;
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
			<h2>Persoon</h2>
			<div id="person_container">
				<div class="caption_wrapper">Id</div>
				<div class="input_wrapper"><input type="text" readonly value="<?php echo $person->id; ?>" /></div>			
			
				<div class="caption_wrapper">Naam</div>
				<div class="input_wrapper"><input type="text" readonly value="<?php echo $person->name; ?>" /></div>			
				
				<div class="caption_wrapper">Adres</div>
				<div class="input_wrapper"><input type="text" readonly value="<?php echo $person->address; ?>" /></div>			
				
				<div class="caption_wrapper">E-mail</div>
				<div class="input_wrapper"><input type="text" readonly value="<?php echo $person->email; ?>" /></div>			
			</div>
			<br/><br/>
			<a href="index.php">Terug</a>		
		</div>
	</body>
</html>