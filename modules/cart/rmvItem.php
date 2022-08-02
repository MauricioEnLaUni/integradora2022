<?php
include_once '../../config.php';
include_once "../session.php";
if(!isset($_POST['rmv'])){
  header("Location:../../cart.php?e=none");
  exit();
}
$n = $_POST['rmv'];
unset($_SESSION['cart'][$n]);
header("Location:../../cart.php");
?> 