<?php
$brand = [];
// Defines brand array
$br[] = (isset($_GET['Adidas'])) ? 'Adidas' : "";
$br[] = (isset($_GET['Caterpillar'])) ? 'Caterpillar' : "";
$br[] = (isset($_GET['Converse'])) ? 'Converse' : "";
$br[] = (isset($_GET['Crocs'])) ? 'Crocs' : "";
$br[] = (isset($_GET['ECCO'])) ? 'ECCO' : "";
$br[] = (isset($_GET['Hush'])) ? 'Hush Puppies' : "";
$br[] = (isset($_GET['Nike'])) ? 'Nike' : "";
$br[] = (isset($_GET['SAS'])) ? 'SAS' : "";

// Creates the query
$stmt = $conn->prepare('SELECT `it_id`
FROM `ITEM`
WHERE `it_br` = ?;');

// Checks if any member isn't ''
if(in_array(!(''),$br)){
  getTheFors($stmt,$br,$brand);
} else $brand = $full;
?>