<?php
include_once "../../modules/session.php";
include_once "../../../../ssl/connector.php";
$stmt = $conn->prepare('SELECT `ph_nm` FROM `phone` WHERE `ph_us` = :u;');
$stmt->bindParam('u',$_SESSION['userId']);
$stmt->execute();
if($row = $stmt->fetch()){
  $_SESSION['phone'] = $row['phone'];
}else{
  $_SESSION['phone'] = '';
}
print_r($_SESSION);
?>