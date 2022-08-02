<?php
$sql = 'SELECT `it_id`
FROM `item`;';
foreach($conn->query($sql) as $row){
  $full[] = $row['it_id'];
}
?>