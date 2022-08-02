<?php

$sql = 'SELECT `it_id`,`it_nm`,`it_ot`,`it_ds`
        FROM `ITEM`
        WHERE `it_ft`
        LIMIT 12';
$i = 1;
$u = $_SESSION['user'];
foreach($conn->query($sql) as $row){
  if($i < 9){
    echo "<script type='text/javascript'>
      drawer('$row[it_nm]',$row[it_ot],$row[it_ds],$i,'card1',$u);
    </script>";
  }else{
    echo "<script type='text/javascript'>
      drawer('$row[it_nm]',$row[it_ot],$row[it_ds],$i,'card2',$u);
    </script>";
  }
  $i++;
}
?>