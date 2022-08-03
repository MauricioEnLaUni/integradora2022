<?php
include_once CONN . "/connector.php";
?>
<div class="container pt-4 pb-5">
<div class="row">
  <p><a href="user.php">Mi Cuenta</a> > Órdenes</p>
</div>

<div class="row text-center">
  <p class="h1">Órdenes</p>
</div>

<div class="row">
<table class="table table-primary table-stripped">
  <thead>
    <tr>
      <th scope="col" class="text-center">Clave</th>
      <th scope="col" class="text-center">Fecha</th>
      <th scope="col" class="text-center">Moneda</th>
      <th scope="col" class="text-center">Precio Total</th>
      <th scope="col" class="text-center">Pagado</th>
      <th scope="col" class="text-center">Entregado</th>
      <th scope="col" class="text-center">Envio</th>
      <th scope="col" class="text-center">Dirección</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $stmt = $conn->prepare('SELECT `or_id`,`or_in`,`or_cu`,`or_py`,`or_pd`,`or_fl`,`or_sp`,`or_dv`
    FROM `ORDERS`
    WHERE `or_us` = ?;');
    $stmt->execute([$_SESSION['userId']]);
    $result = $stmt->fetchAll(PDO::FETCH_NUM);
    foreach($result as $row){ ?>
  <tr>
    <th scope="row"><?php echo $row['or_id'];?></th>
      <td><?php echo $row['or_in'];?></td>
      <td><?php echo $row['or_cu'];?></td>
      <td><?php echo "$ " . $row['or_py'];?></td>
      <td><?php echo $row['or_pd'];?></td>
      <td><?php echo $row['or_fl'];?></td>
      <td><?php echo $row['or_sp'];?></td>
      <td><?php echo $row['or_dv'];?></td>
    </tr>
    <?php }?>
  </tbody>
</table>
</div>