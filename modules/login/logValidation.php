<?php
require_once "../session.php";
require_once "validation.php";
require_once "../../../../ssl/connector.php";
if(submitError($_POST['submit'],$_POST['usuario'],$_POST['password'],$usr,$pwd) !== false){
  header("Location: http://localhost/Integradora/index.php?error=submit");
  exit();
}elseif(emptyError($usr,$pwd) !== true){
  header("Location: http://localhost/Integradora/index.php?error=input");
  exit();
}elseif(newUser($usr,$conn) !== false){
  header("Location: http://localhost/Integradora/index.php?error=newUser");
  exit();
}elseif(passValidation($usr,$pwd,$conn)){
  header("Location: http://localhost/Integradora/index.php?error=password");
  exit();
}else{
  setAccess($conn,$usr);
}
header("Location:/Integradora/index.php");
?>