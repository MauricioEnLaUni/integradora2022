<?php
// Defines brand array
if(isset($_GET['color'])){
  $stmt = $conn->prepare('SELECT `it_id`
  FROM `ITEM`
  WHERE `it_cl` = ?;');
  
  foreach($_GET['color'] as $cool){
    $cl[] = (isset($_GET['color'])) ? $cool : '';
  }
  
  if(in_array(!(''),$cl)){
    getTheFors($stmt,$cl,$colors);
  } else $colors = $full;
} else $colors = $full;
?>