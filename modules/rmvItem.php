<?php
include_once '../config.php';
include_once "session.php";
if(!isset($_POST['rmv'])){
  header("Location:" . ROOT . "/cart.php");
  exit();
}
$n = $_POST['rmv'];
unset($_SESSION['cart'][$n]);
header("Location:" . ROOT . "/cart.php;");
?> 