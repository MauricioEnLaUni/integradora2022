<?php
require_once "accounts.php";
function setAccess($dbc,$usr){
  $stmt = $dbc->prepare('SELECT `us_pr` FROM `USERS` WHERE `us_an` = ?;');
  $stmt->bind_param("s",$usr);
  $stmt->execute();
  $result = $stmt->get_result();
  $lvl = mysqli_fetch_assoc($result);
  switch($lvl){
    case 0:
      $_SESSION['user'] = 0;
      break;
    case 1:
      $_SESSION['user'] = 1;
      break;
    case 2:
      $_SESSION['user'] = 2;
      break;
    case 3:
      $_SESSION['user'] = 3;
      break;
    default:
      $_SESSION['user'] = 4;
      break;
  }
}
// $dbc = mysqli_connect($host,$usr,$pwd,$db);
try {
  $conn = new PDO("mysql:host=$host;dbname=$db", $usr, $pwd);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  die('Connection failed: ' . $e->getMessage() );
}