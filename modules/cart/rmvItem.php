<?php
include_once '../../config.php';
include_once "../session.php";
if(!isset($_POST['rmv'])){
  header("Location:index.php");
  exit();
}
$n = $_POST['rmv'];
$_SESSION['cart'][$n];
unset($_SESSION['cart'][$n]);
header("Location:../../cart.php");
?> 