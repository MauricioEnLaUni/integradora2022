<?php
require_once '..\..\ssl\connector.php';
// Limit should be a variable
$sql = 'SELECT `it_id`,`it_nm`,`it_ot`,`it_ds`
        FROM `ITEM`
        WHERE `it_ft`
        LIMIT 16;';
// $i is temporary until I have full images
$i = 1;
foreach($conn->query($sql) as $row){
    echo "<script type='text/javascript'>
      drawer('$row[it_nm]',$row[it_ot],$row[it_ds],$i);
    </script>";
    $i++;
}
// if(!$dbc){
//   echo 'Connection Error: ' . mysqli_connect_error();
// }
// $stmt = $dbc->prepare('SELECT `it_id`,`it_nm`,`it_ot`,`it_ds`
//                        FROM `ITEM`
//                        WHERE `it_ft` = TRUE;');
// $stmt->bind_param("i");
// $stmt->execute();
// $result = $stmt->get_result();
// while($row = mysqli_fetch_assoc($result))
// {
//   $zapato = $row;
//   echo "<script type='text/javascript'>
//     drawer('$zapato[it_nm]',$zapato[it_ot],$zapato[it_ds],$zapato[it_id]);
//   </script>";
// }
?>