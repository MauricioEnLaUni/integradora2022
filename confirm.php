<?php
require_once "modules/session.php";
include_once '../../ssl/connector.php';
if(isset($_POST['sale'])){
  $stmt = $conn->prepare('SELECT `it_nm`
  FROM `item`
  WHERE `it_id` = ?');
  $stmt->execute([$_POST['sale']]);
  if($row = $stmt->fetch()){
  $_SESSION['cart'][$row['it_nm']] += 1;
  }
  header("Location:index.php" . $_SESSION['back']);
}else header("Location:index.php");
?>