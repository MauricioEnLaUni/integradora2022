<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manejo de Cuenta</title>
  <?php
  include_once 'config.php';
  include_once 'user/userStyle.php';
  ?>
</head>
<body>
  <header>
    <?php
      include_once 'modules/session.php';
      include_once 'modules/header.php';
    ?>
  </header>
  <main>
  <?php
  if($_SESSION['user'] == 4){
    header("Location:" . "index.php");
    exit();
  }else{
    if(!isset($_GET['page'])){
      include_once 'user/user.php';
    }else{
      switch($_GET['page']){
        case 'o':
          include_once 'user/orders.php';
          break;
        case 'a':
          include_once 'user/account.php';
          include_once 'user/accManager/addModal.php';
          include_once 'user/accManager/addPhone.php';
          break;
        case 'd':
          include_once 'user/address.php';
          break;
        case 'p':
          include_once 'user/pay.php';
          break;
        default:
          include_once 'user/user.php';
      }
    }
  }
  ?>
  </main>
  <footer>
    <?php
      include_once 'modules/footer.php';
    ?>
  </footer>
</body>
</html>
<?php
  include_once 'modules/meta/scripts.html';
?>