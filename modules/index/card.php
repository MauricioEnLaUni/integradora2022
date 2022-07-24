<?php
require_once '..\..\ssl\connector.php';
$sql = 'SELECT `it_id`,`it_nm`,`it_ot`,`it_ds`
        FROM `ITEM`
        WHERE `it_ft`
        LIMIT 16;';
$i = 1;
foreach($conn->query($sql) as $row){
  if($i < 9){
    echo "<script type='text/javascript'>
      drawer('$row[it_nm]',$row[it_ot],$row[it_ds],$i,'card1');
    </script>";
  }else{
    echo "<script type='text/javascript'>
      drawer('$row[it_nm]',$row[it_ot],$row[it_ds],$i,'card2');
    </script>";
  }
    $i++;
}
?>