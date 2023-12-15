function confirmReset(event) {
	if(confirm("Weet je zeker dat je de database wilt resetten?")) {
		document.location.href = "index.php?resetdb=true";
	}
}

function displayDatabaseDialog() {
	$("#databasedialog").dialog({
		resizable: false,
		height: "auto",
		width: "auto",
		modal: true
	});
}

function displayTipsDialog() {
	$("#tipsdialog").dialog({
		resizable: false,
		height: "auto",
		width: "auto",
		modal: true
	});
}