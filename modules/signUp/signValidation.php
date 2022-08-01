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
    header("refresh:3;Location:../../index.php?error=submit");
    exit();
  }elseif(emptyError($usr,$pwd,$rpt,$eml) !== true){
    header("Location:../../index.php?error=input");
    exit();
  }elseif(userValidation($usr) !== true){
    header("Location:../../index.php?error=usr");
    exit();
  }elseif(newUser($usr,$conn) !== true){
    header("Location:../../index.php?error=newUser");
    exit();
  }elseif(emailValidation($eml) !== true){
    header("Location:../../index.php?error=email");
    exit();
  }elseif(newEmail($eml,$conn) !== true){
    header("Location:../../index.php?error=newEmail");
    exit();
  }elseif(passValidation($pwd,$rpt) !== false){
    header("Location:../../index.php?error=password");
    exit();
  }else{
    createUser($conn,$usr,$pwd,$eml);
  }
  header("Location:../../index.php");
?>