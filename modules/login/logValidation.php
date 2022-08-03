<?php
require_once '../../config.php';
require_once "../session.php";
require_once "validation.php";
require_once CONN . "/connector.php";
if(submitError($_POST['submit'],$_POST['usuario'],$_POST['password'],$usr,$pwd) !== false){
  header("Location:../../index.php?error=submit");
  exit();
}elseif(emptyError($usr,$pwd) !== true){
  header("Location:../../index.php?error=input");
  exit();
}elseif(newUser($usr,$conn) !== false){
  header("Location:../../index.php?error=newUser");
  exit();
}elseif(passValidation($usr,$pwd,$conn)){
  header("Location:../../index.php?error=password");
  exit();
}elseif(mailValid($conn,$_POST['usuario'])!==false){
  header("Location:../../index.php?error=verify");
}else{
  setAccess($conn,$usr);
}
?>