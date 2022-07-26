<?php
include_once "session.php";
if(isset($_POST['logOut'])){
  session_unset();
  session_destroy();
  header("Location:http://localhost/Integradora/index.php");
  exit();
}elseif($_POST['signUp']){
  header("Location:http://localhost/Integradora/index.php");
  exit();
}elseif($_POST['logIn']){
  header("Location:http://localhost/Integradora/index.php");
  exit();
}
?>