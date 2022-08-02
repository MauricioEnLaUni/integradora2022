<?php
// Creates whose array
$gn[] = (isset($_GET['dama'])) ? 'Mujr' : "";
$gn[] = (isset($_GET['cab'])) ? 'Homb' : "";
$gn[] = (isset($_GET['uni'])) ? 'Unsx' : "";
$gn[] = (isset($_GET['infa'])) ? 'Infa' : "";

// Prepares statement
$stmt = $conn->prepare('SELECT `it_id`
                        FROM `item`
                        WHERE `it_wh` = ?;');

// If any member isn't '' then query
if(in_array(!(''),$gn)){
  foreach($gn as $g){
    if($g != '') getTheFors($stmt,$g,$whose);
  }
}else $whose = $full;
?>