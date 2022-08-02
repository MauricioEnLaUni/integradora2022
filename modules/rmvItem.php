<?php
include_once '../config.php';
include_once "session.php";
if(!isset($_POST['rmv'])){
  header("Location:index.php");
  exit();
}
if(isset($_POST['dont'])){
  unset($_SESSION['wish'][$_POST['rmv']]);
  header("Location:wish.php");
  exit();
}
$n = $_POST['rmv'];
unset($_SESSION['cart'][$n]);
header("Location:cart.php");
?> 