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

// $stmt = mysqli_prepare($dbc,'SELECT `em_em` FROM `EMAIL` WHERE `em_em` = ?;');
// mysqli_stmt_bind_param($stmt,"s",$eml);
// mysqli_stmt_execute($stmt);

// $resultData = mysqli_stmt_get_result($stmt);
// $result;
// while($row = mysqli_fetch_assoc($resultData)){
//     if($row['em_em'] == $eml){
//         $result = false;
//     }
// }
// if(!isset($result)){
//     $result = true;
// }
// mysqli_stmt_close($stmt);
// return $result;
}

function passValidation($pwd,$rpt){
    if($pwd == $rpt) $result = false;
    else $result = true;
    return $result;
}

function createUser($conn,$usr,$pwd,$eml){
  $hash = password_hash($pwd,PASSWORD_ARGON2I);
  $a = 2;
  $stmt = $conn->prepare('INSERT INTO `USERS` (`us_id`,`us_an`,`us_pw`,`us_al`)
                          VALUES("",:u,:p,:a);');
  $stmt->bindParam('u',$usr);
  $stmt->bindParam('p',$hash);
  $stmt->bindParam('a',$a);
  $stmt->execute();
  $stmt = $conn->prepare('INSERT INTO `EMAIL` (`em_id`,`em_us`,`em_em`)
                          VALUES("",:u,:e);');
  $stmt->bindParam('u',$usr);
  $stmt->bindParam('e',$eml);
  $stmt->execute();
}
?>