<?php
$type = [];
// Declares style variables from the get
if(isset($_GET['style'])){
  $stmt = $conn->prepare('SELECT `it_id`
  FROM `ITEM`
  WHERE `it_tp` = ?;');
  
  foreach($_GET['style'] as $cool){
    $st[] = (isset($cool)) ? $cool : '';
  }
  if(in_array(!(''),$st)){
    getTheFors($stmt,$st,$type);
  } else $type = $full;
} else $type = $full;
?>