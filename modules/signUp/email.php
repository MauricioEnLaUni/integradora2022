<?php
if(isset($_GET['vkey'])){
  $vkey = $_GET['vkey'];
  $stmt = $conn->prepare("SELECT `us_vf`,`us_cs`
                          FROM `USERS`
                          WHERE `us_vf` = NULL AND `us_cs` = ?
                          LIMIT 1;");
  $result = $stmt->execute([$vkey]);
  if($result->num_rows == 1){
    $stmt = $conn->prepare("UPDATE `USERS`
                            SET `us_vf` = 1,`us_al` = 4
                            WHERE `vkey` = ?
                            LIMIT 1;");
    $stmt->execute([$vkey]);
  }
}else{
  die("Something went wrong.");
}
?>