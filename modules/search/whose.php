<?php
$whose = [];
// Creates whose array
$gn[] = (isset($_GET['dama'])) ? 'Mujr' : "";
$gn[] = (isset($_GET['cab'])) ? 'Homb' : "";
$gn[] = (isset($_GET['uni'])) ? 'Unsx' : "";
$gn[] = (isset($_GET['infa'])) ? 'Infa' : "";

// Prepares statement
$stmt = $conn->prepare('SELECT `it_id`
                        FROM `ITEM`
                        WHERE `it_wh` = ?;');

// If any member isn't '' then query
if(in_array(!(''),$gn)){
  getTheFors($stmt,$gn,$whose);
}else $whose = $full;
?>