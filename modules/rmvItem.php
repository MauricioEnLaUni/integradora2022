<?php
include_once "session.php";
if(!isset($_POST['rmv'])){
  header("Location:cart.php");
  exit();
}
$n = $_POST['rmv'];
unset($_SESSION['cart'][$n]);
header("Location:cart.php");
?> 