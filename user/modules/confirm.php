<?php
include_once "../../modules/session.php";
include_once "../../../../ssl/connector.php";
switch($_POST['wh']){
  case 1:
  case 4:
    if(isset($_POST['us_dn'])){
      $stmt = $conn->prepare('UPDATE `users`
                            SET `us_dn` = ?
                            WHERE `us_id` = ? ;');
      $result = $stmt->execute([$_POST['us_dn'],$_SESSION['userId']]);
    }
    if(isset($_POST['us_nm'])){
      $stmt = $conn->prepare('UPDATE `users`
                            SET `us_nm` = ?
                            WHERE `us_id` = ? ;');
      $result = $stmt->execute([$_POST['us_nm'],$_SESSION['userId']]);
    }
    if(isset($_POST['us_ln'])){
      $stmt = $conn->prepare('UPDATE `users`
                            SET `us_ln` = ?
                            WHERE `us_id` = ? ;');
      $result = $stmt->execute([$_POST['us_ln'],$_SESSION['userId']]);
    }
    if(isset($_POST['us_pw'])){
      $value = password_hash($_POST['us_pw'],PASSWORD_ARGON2I);
      $stmt = $conn->prepare('UPDATE `users`
                            SET `us_pw` = ?
                            WHERE `us_id` = ? ;');
      $result = $stmt->execute([$value,$_SESSION['userId']]);
    }
    $stmt = $conn->prepare('SELECT `us_nm`,`us_ln`,`us_al`
            FROM `USERS`
            WHERE `us_id` = ?;');
    $stmt->execute([$_SESSION['userId']]);
    while($row = $stmt->fetch()){
      $_SESSION['display'] = is_null($row['us_dn']) ? $row['us_an'] : $row['us_dn'];
      $_SESSION['first'] = is_null($row['us_nm']) ? "" : $row['us_nm'];
      $_SESSION['last'] = is_null($row['us_ln']) ? "" : $row['us_ln'];
    }
    break;
  case 2:
    $stmt = $conn->prepare('UPDATE `email`
                            SET `em_em` = ?
                            WHERE `em_id` = ? ;');
    $result = $stmt->execute([$_POST['em_em'],$_SESSION['userId']]);
    $stmt = $conn->prepare('SELECT `em_em`
                            FROM `email`
                            WHERE `em_us` = ?;');
    $stmt->execute([$_SESSION['userId']]);
    while($row = $stmt->fetch()){
      $_SESSION['email'] = is_null($row['em_em']) ? "" : $row['em_em'];
    }
    break;
  case 3:
    $stmt = $conn->prepare('UPDATE `phone`
                            SET `ph_nm` = ?
                            WHERE `ph_id` = ? ;');
    $result = $stmt->execute([$_POST['ph_nm'],$_SESSION['userId']]);
    $stmt = $conn->prepare('SELECT `ph_nm`
                            FROM `phone`
                            WHERE `ph_us` = ?;');
    $stmt->execute([$_SESSION['userId']]);
    while($row = $stmt->fetch()){
      $_SESSION['phone'] = is_null($row['ph_nm']) ? "" : $row['ph_nm'];
    }
    break;
  default:
    header("Location:account.php?e=badInput");
    break;
}
header("Location:/Integradora/user/account.php");
exit();
?>