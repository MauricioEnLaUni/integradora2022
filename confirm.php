<?php
  include_once "modules/session.php";
  if(isset($_POST['sale'])){
    $_SESSION['cart'][] = $_POST['sale'];
    header("Location:" . $_SESSION['back']);
  }else header("Location:" . $_SESSION['back']);
?>