<div class="row">
  <table class="table table-dark table-stripped">
    <thead>
      <tr>
        <th scope="col">No.</th>
        <th scope="col">Producto</th>
        <th scope="col">Precio Unidad</th>
        <th scope="col">Cantidad</th>
        <th scope="col">Quitar</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $i = 1;
      $stmt = $conn->prepare('SELECT `it_nm`,`it_in`,`it_id`
                              FROM `ITEM`
                              WHERE `it_nm` = :n');
      $stmt->bindParam('n',$j);
      foreach($_SESSION['cart'] as $j=>$v){
        $stmt->execute();
        if($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        ?>
      <tr>
        <th scope="row"><?php echo $i++;?></th>
        <td><?php echo $row['it_nm'];?></td>
        <td><?php echo $row['it_in'];?></td>
        <td><input type="number" min="0" value="<?php echo $v;?>" /></td>
        <form action="modules/rmvItem.php" method="POST">
          <td><button type="submit" name="rmv" value="<?php echo $row['it_nm']?>">Quitar</button></td>
        </form>
      </tr>
      <?php }}?>
    </tbody>
  </table>
</div>