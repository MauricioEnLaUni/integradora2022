<?php
// Validates that inputs come from the Submit button
function submitError($sbm,$user,$pass,&$usr,&$pwd){
  $result;
  if(isset($sbm)){
    $usr = $user;
    $pwd = $pass;
    $result = false;
  }else{
    $result = true;
  }
  return $result;
}

function emptyError($usr,$pwd){
  $result;
  if(empty($usr) || empty($pwd)){
    $result = false;
  }else{
    $result = true;
  }
  return $result;
}

function userValidation($usr){
  if(!preg_match("/^[a-zA-Z0-9]*$/",$usr)){
    $result = true;
  }else{
    $result = false;
  }
  return $result;
}

function newUser($usr,$conn){
  $stmt = $conn->prepare('SELECT `us_an` FROM `USERS` WHERE `us_an` = :n;');
  $stmt->bindParam('n',$usr);
  $stmt->execute();
  $result;
  while($row = $stmt->fetch()){
    if($row['us_an'] == $usr) $result = false;
  }
  if(!isset($result)) $result = true;
  return $result;
}

function passValidation($usr,$pwd,$conn){
  $result;
  $stmt = $conn->prepare('SELECT `us_pw` FROM `USERS` WHERE `us_an` = :n;');
  $stmt->bindParam('n',$usr);
  $stmt->execute();
  while($row = $stmt->fetch()){
    if(password_verify($pwd,$row['us_pw']) !== false) $result = false;
    else $result = true;
  }
  return $result;
}

function mailValid($conn,$usr){
  $result;
  $stmt = $conn->prepare('SELECT `us_al` FROM `USERS` WHERE `us_an` = ? ;');
  $stmt->execute([$usr]);
  if($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    if($row['us_al'] == 3) $result = true;
    else $result = false;
  }
  return $result;
}
?>