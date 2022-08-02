<?php
include_once "session.php";
if(isset($_POST['logOut'])){
  session_unset();
  session_destroy();
  header("Location:../index.php");
  exit();
}elseif($_POST['signUp']){
  header("Location:../index.php");
  exit();
}elseif($_POST['logIn']){
  header("Location:../index.php");
  exit();
}
?>