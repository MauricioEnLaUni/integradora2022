<?php
  require_once "../session.php";
  require_once "validation.php";
  require_once "../../../../ssl/connector.php";
  $usr;
  $pwd;
  $rpt;
  $eml;
  if(submitError($_POST['submit'],
  $_POST['usuario'],
  $_POST['password'],
  $_POST['repeat'],
  $_POST['email'],
  $usr,$pwd,$rpt,$eml) !== false){
    header("Location: http://localhost/Integradora/index.php?error=submit");
    exit();
  }elseif(emptyError($usr,$pwd,$rpt,$eml) !== true){
    header("Location: http://localhost/Integradora/index.php?error=input");
    exit();
  }elseif(userValidation($usr) !== true){
    header("Location: http://localhost/Integradora/index.php?error=usr");
    exit();
  }elseif(newUser($usr,$dbc) !== true){
    header("Location: http://localhost/Integradora/index.php?error=newUser");
    exit();
  }elseif(emailValidation($eml) !== true){
    header("Location: http://localhost/Integradora/index.php?error=email");
    exit();
  }elseif(newEmail($eml,$dbc) !== true){
    header("Location: http://localhost/Integradora/index.php?error=newEmail");
    exit();
  }elseif(passValidation($pwd,$rpt) !== false){
    header("Location: http://localhost/Integradora/index.php?error=password");
    exit();
  }else{
    createUser($dbc,$usr,$pwd,$eml);
  }
  echo "Log In succesful" . $_SESSION['user'];
?>