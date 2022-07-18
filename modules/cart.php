<?php
require '..\..\ssl\connector.php';

if(!$dbc){
  echo 'Connection Error: ' . mysqli_connect_error();
}
$stmt = $dbc->prepare('CALL SALE("?");');
$usr = $_SESSION['userName'];
$stmt->bind_param("i",$usr);
$stmt->execute();
$result = $stmt->get_result();
while($row = mysqli_fetch_assoc($result))
{
  $order = $row;
  echo "<script type='text/javascript'>
    drawer('$zapato[it_nm]',$zapato[it_ot],$zapato[it_ds],$zapato[it_id]);
  </script>";
}
?>