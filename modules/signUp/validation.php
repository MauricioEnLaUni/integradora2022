<?php
// Validates that inputs come from the Submit button
function submitError($sbm,$u,$p,$r,$e,&$usr,&$pwd,&$rpt,&$eml){
  $result;
  if(isset($sbm)){
    $usr = $u;
    $pwd = $p;
    $rpt = $r;
    $eml = $e;
    $result = false;
  }else{
    $result = true;
  }
  return $result;
}

function emptyError($usr,$pwd,$rpt,$eml){
  $result;
  if(empty($usr) || empty($pwd) || empty($rpt) || empty($eml) ){
    $result = false;
  }else{
    $result = true;
  }
  return $result;
}

function userValidation($usr){
  if(!preg_match("/^[a-zA-Z0-9]*$/",$usr)){
    $result = false;
  }else{
    $result = true;
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

function emailValidation($eml){
  $result;
  if(!filter_var($eml,FILTER_VALIDATE_EMAIL)) $result = false;
  else $result = true;
  return $result;
}

function newEmail($eml,$conn){
  $result;
  $stmt = $conn->prepare('SELECT `em_em` FROM `EMAIL` WHERE `em_em` = :n;');
  $stmt->bindParam('n',$eml);
  $stmt->execute();
  while($row = $stmt->fetch()){
    if($row['em_em'] == $eml) $result = false;
  }
  if(!isset($result)) $result = true;
  return $result;
}

function passValidation($pwd,$rpt){
    if($pwd == $rpt) $result = false;
    else $result = true;
    return $result;
}

function createUser($conn,$usr,$pwd,$eml){
  $hash = password_hash($pwd,PASSWORD_ARGON2I);
  $vkey = md5(time() . $eml);
  $stmt = $conn->prepare('INSERT INTO `USERS` VALUES(NULL,?,NULL,NULL,NULL,?,?,NULL,NULL,3);');
  $stmt->execute([$usr,$hash,$vkey]);

  $stmt = $conn->prepare('SELECT `us_id`
  FROM `USERS`
  WHERE `us_an` = ?
  LIMIT 1;');
  $stmt->execute([$usr]);
  $id = $stmt->fetch(PDO::FETCH_NUM);
  $stmt = $conn->prepare('INSERT INTO `EMAIL` (`em_us`,`em_em`)
    VALUES(?,?);');
  $stmt->execute([$id[0],$eml]);
  $to = $eml;
  $subject = "Email Verification";
  $message = '<a href="/Integradora/registration?vkey=' . $vkey . '>Register Account</a>';
  $headers = "From: admin@fictichos.com \r\n";
  $headers .= "MIME-Version: 1.0" . "\r\n";
  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
  mail($to,$subject,$message,$headers);
}
?>