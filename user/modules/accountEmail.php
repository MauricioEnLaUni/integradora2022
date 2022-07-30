<?php
include_once "../../modules/session.php";
include_once "../../../../ssl/connector.php";
if(filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL)){
  $old = "";
  $new = "";
  $stmt = $conn->prepare("UPDATE `email`
  SET `em_em` = :n
  WHERE `em_em` = :o AND `em_us` = :u
  LIMIT 1;");
  $stmt->bindParam('n',$new);
  $stmt->bindParam('o',$old);
  $stmt->bindParam('u',$_SESSION['userId']);
  foreach($_POST['email'] as $em){
    $old = $em;
    next($em);
    $new = $em;
    $stmt->execute();
  }
}else{
  header("Location:/?e=email");
}

?>