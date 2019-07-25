<?php
require("db-info.php");

// Initialise XML document
$dom = new DOMDocument("1.0", "utf-8");
$dom->formatOutput = true;
header("Content-type: text/xml; charset=utf-8");

// Create root element
$root = $dom->createElement("markers");
$dom->appendChild($root);

// Open a connection to the MySQL server
$mysqli = new mysqli('localhost', USER, PASSWORD);
if ($mysqli->connect_error) {
  die('Not connected : ' . $mysqli->connect_error);
}

// Set the active MySQL database
$mysqli->select_db("sys");

// Define the query
$query = "SELECT * FROM australasia_count";

// Iterate over rows and add XML nodes for each
if ($result = $mysqli->query($query)) {
  while ($row = $result->fetch_assoc()) {
	  $marker = $dom->createElement("marker");
    $marker->setAttribute("country",$row['COUNTRY_NAME']);
    $marker->setAttribute("count", $row['ALUMNI_COUNT']);
    $root->appendChild($marker);
  }
}

echo $dom->saveXML();
?>
