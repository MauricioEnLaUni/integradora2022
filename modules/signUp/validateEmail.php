<?php
include_once '../session.php';
include_once '../../config.php';
if(isset($_GET['key'])){
  $stmt = ('SELECT `us_id`
  FROM `USERS`
  WHERE `us_vf` = ? ;');
  $stmt->execute([$_GET['key']]);

  $stmt = ('UPDATE `USERS`
  SET `us_al` = 
  WHERE `us_vf` = ? ;');
  $stmt->execute([$_GET['key']]);
}
?>