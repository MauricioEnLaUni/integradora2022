<?php
include_once '../session.php';
include_once '../../config.php';
include_once CONN . '/connector.php';
if(isset($_GET['key'])){
  $stmt = $conn->prepare('SELECT `us_nm`,`us_al`,`us_vf`
  FROM `USERS`
  WHERE `us_cs` = ? ;');
  $stmt->execute([$_GET['key']]);
  $res = $stmt->fetch(PDO::FETCH_ASSOC);
  $nm = $row['us_nm'];
  if($res['us_al'] != 3 && $res['us_vf'] !== NULL) header("Location:../../index.php?error=valid");
  else{
    $stmt = $conn->prepare('UPDATE `USERS`
    SET `us_al` = 4,`us_vf` = 1
    WHERE `us_cs` = ? ;');
    $stmt->execute([$_GET['key']]);
    setAccess($conn,$res['us_nm']);
    header("Location:../../index.php");
  }
}
?>