<?php
$sql = 'SELECT `it_id`
FROM `ITEM`;';
foreach($conn->query($sql) as $row){
  $full[] = $row['it_id'];
}
?>