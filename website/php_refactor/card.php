<?php
require '..\..\..\..\ssl\connector.php';

if(!$dbc){
  echo 'Connection Error: ' . mysqli_connect_error();
}
$i = 17;
$stmt = $dbc->prepare('SELECT `it_id`,`it_nm`,`it_ot`,`it_ds` FROM `ITEM` WHERE `it_id` < ?;');
$stmt->bind_param("i",$i);
$stmt->execute();
$result = $stmt->get_result();
while($row = mysqli_fetch_assoc($result))
{
  $zapato = $row;
  echo "<script type='text/javascript'>
    drawer('$zapato[it_nm]',$zapato[it_ot],$zapato[it_ds],$zapato[it_id]);
  </script>";
}
?>