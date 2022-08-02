<?php
include_once "../../modules/session.php";
include_once "../../../../ssl/connector.php";
// Builds the query and binds parameters
$old = "";
$new = "";
$stmt = $conn->prepare("UPDATE `PHONE`
SET `ph_nm` = :n
WHERE `ph_nm` = :o AND `ph_us` = :u
LIMIT 1;");
$stmt->bindParam('n',$new);
$stmt->bindParam('o',$old);
$stmt->bindParam('u',$_SESSION['userId']);

for($i = 1; $i < count($_POST['phone']); $i+=2){
  $old = $_POST['phone'][$i - 1];
  $new = $_POST['phone'][$i];
  $stmt->execute();
}
header("Location:../../user.php?page=a");
?>