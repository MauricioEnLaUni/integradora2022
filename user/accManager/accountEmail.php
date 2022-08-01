<?php
include_once "../../modules/session.php";
include_once "../../../../ssl/connector.php";
// Builds the query and binds parameters
$old = "";
$new = "";
$stmt = $conn->prepare("UPDATE `email`
SET `em_em` = :n
WHERE `em_em` = :o AND `em_us` = :u
LIMIT 1;");
$stmt->bindParam('n',$new);
$stmt->bindParam('o',$old);
$stmt->bindParam('u',$_SESSION['userId']);

// Validates the inputs as emails
for($i = 1; $i < count($_POST['email']); $i+=2){
  $old = $_POST['email'][$i - 1];
  if(filter_var($_POST['email'][$i],FILTER_VALIDATE_EMAIL)){
    $new = $_POST['email'][$i];
    $stmt->execute();
  }
}
header("Location:../../user.php?page=a");
?>