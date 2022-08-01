<?php
// Declares style variables from the get
$st[] = (isset($_GET['Bota'])) ? 'Bota' : "";
$st[] = (isset($_GET['Bote'])) ? 'Bote' : "";
$st[] = (isset($_GET['Clogs'])) ? 'Clogs' : "";
$st[] = (isset($_GET['Loafers'])) ? 'Loafr' : "";
$st[] = (isset($_GET['Sandalia'])) ? 'Sanda' : "";
$st[] = (isset($_GET['Slipper'])) ? 'Slipp' : "";
$st[] = (isset($_GET['Atletico'])) ? 'Atlet' : "";
$st[] = (isset($_GET['Trabajo'])) ? 'Work' : "";

// Creates the query
$stmt = $conn->prepare('SELECT `it_id`
FROM `item`
WHERE `it_tp` = ?;');

// Checks if any member isn't '' then does query
if(in_array(!(''),$st)){
  foreach($st as $i){
    if($i != '') getTheFors($stmt,$i,$type);
  }
}else $type = $full;
var_dump($type);
?>