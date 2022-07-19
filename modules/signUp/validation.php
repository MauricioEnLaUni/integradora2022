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

function newUser($usr,$dbc){
    $stmt = mysqli_prepare($dbc,'SELECT `us_an` FROM `USERS` WHERE `us_an` = ?;');
    mysqli_stmt_bind_param($stmt,"s",$usr);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    $result;
    while($row = mysqli_fetch_assoc($resultData)){
        if($row['us_an'] == $usr){
            $result = false;
        }
    }
    if(!isset($result)){
        $result = true;
    }
    mysqli_stmt_close($stmt);
    return $result;
}

function emailValidation($eml){
    $result;
    if(!filter_var($eml,FILTER_VALIDATE_EMAIL))
    {
        $result = false;
    }else{
        $result = true;
    }
    return $result;
}

function newEmail($eml,$dbc){
    $stmt = mysqli_prepare($dbc,'SELECT `em_em` FROM `EMAIL` WHERE `em_em` = ?;');
    mysqli_stmt_bind_param($stmt,"s",$eml);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    $result;
    while($row = mysqli_fetch_assoc($resultData)){
        if($row['em_em'] == $eml){
            $result = false;
        }
    }
    if(!isset($result)){
        $result = true;
    }
    mysqli_stmt_close($stmt);
    return $result;
}

function passValidation($pwd,$rpt){
    if($pwd == $rpt){
        $result = false;
    }else{
        $result = true;
    }
    return $result;
}

function createUser($dbc,$usr,$pwd,$eml){
    $hash = password_hash($pwd,PASSWORD_ARGON2I);
    $stmt = mysqli_prepare($dbc,'INSERT INTO `USERS` (`us_id`,`us_an`,`us_pw`) VALUES("",?,?,2);');
    mysqli_stmt_bind_param($stmt,"ss",$usr,$hash);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);

    $stmt = mysqli_prepare($dbc,'INSERT INTO `EMAIL` (`id`,`em_us`,`em_em`) VALUES("",?,?);');
    mysqli_stmt_bind_param($stmt,"ss",$usr,$eml);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);
}
?>