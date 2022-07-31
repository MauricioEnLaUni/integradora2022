<?php
include_once "config.php";
require_once ROOT . '/modules/session.php';
include_once CONN . '/connector.php';
if(isset($_POST['sale'])){
  $stmt = $conn->prepare('SELECT `it_nm`
  FROM `item`
  WHERE `it_id` = ?');
  $stmt->execute([$_POST['sale']]);
  if($row = $stmt->fetch()){
  $_SESSION['cart'][$row['it_nm']] += 1;
  }
  header("Location:" . ROOT . "index.php");
}else header("Location:index.php");
?>