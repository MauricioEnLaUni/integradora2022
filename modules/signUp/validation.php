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
  $a = 2;
  $vkey = md5(time() . $eml);
  $stmt = $conn->prepare('INSERT INTO `USERS` (`us_an`,`us_pw`,`us_al`)
  VALUES(?,?,?);');
  $stmt->execute([$usr,$hash,$a]);
  $stmt = $conn->prepare('INSERT INTO `us_id`
  FROM `USERS`
  WHERE `us_an` = :a
  LIMIT 1;');
  $stmt->execute([$usr]);
  $id = $stmt->fetch();
  $stmt = $conn->prepare('INSERT INTO `EMAIL` (`em_us`,`em_em`,`em_key`)
    VALUES(?,?,?);');
  $stmt->execute([$id,$eml,$vkey]);
}
?>