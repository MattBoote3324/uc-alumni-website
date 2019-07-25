<?php
// require("db-info.php");

function generateCountries() {
    // Initialise XML document
    $dom = new DOMDocument("1.0", "utf-8");
    $dom->formatOutput = true;
    //header("Content-type: text/xml; charset=utf-8");

    // Create root element
    $root = $dom->createElement("datalist");
    $root->setAttribute("id", "countries");
    $dom->appendChild($root);

    // Open a connection to the MySQL server
    $mysqli = new mysqli('localhost', USER, PASSWORD);
    if ($mysqli->connect_error) {
      die('Not connected : ' . $mysqli->connect_error);
    }

    // Set the active MySQL database
    $mysqli->select_db("sys");

    // Define the query
    $query = "SELECT COUNTRY_NAME FROM country";

    // Iterate over rows and add XML nodes for each
    if ($result = $mysqli->query($query)) {
      while ($row = $result->fetch_assoc()) {
    	  $marker = $dom->createElement("option");
        $marker->setAttribute("value",$row['COUNTRY_NAME']);
        $root->appendChild($marker);
      }
    }

    echo $dom->saveXML();
}
?>
