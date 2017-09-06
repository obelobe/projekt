<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Untitled Document</title>
    </head>
    
    <body>
    	<?php
if(isset($_POST['btn']))
{


	// vi skapar $filtered för att spara efter varje filter
	$filtered = filter_input(INPUT_POST, "projektnamn", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	$filtered = trim($filtered);

	// databas
	$mysqli = new mysqli("localhost", "root", "", "oskar");
	/* check connection */
	if ($mysqli->connect_error) {
	    die('Connect Error (' . $mysqli->connect_errno . ') '
	            . $mysqli->connect_error);
	}

	/* change character set to utf8 */
	if (!$mysqli->set_charset("utf8")) {
	    echo "Error loading character set utf8: " . $mysqli->error;
	    exit();
	}

	// spara i databas med prep statements
	if (!($stmt = $mysqli->prepare("INSERT into forslag(namn) values (?)"))) {
		echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
	}

	if (!$stmt->bind_param("s", $filtered)) {
		echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
	}

	if (!$stmt->execute()) {
	    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
	}

	$filtered = $mysqli->real_escape_string($filtered);	
}

header('location: index.php');
?>
        
    </body>
</html>