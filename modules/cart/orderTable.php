<div class="row">
  <table class="table table-dark table-stripped">
    <thead>
      <tr>
        <th scope="col" class="text-center">No.</th>
        <th scope="col" class="text-center">Producto</th>
        <th scope="col" class="text-center">Precio Unidad</th>
        <th scope="col" class="text-center">Impuesto</th>
        <th scope="col" class="text-center">Descuento</th>
        <th scope="col" class="text-center">Precio Final</th>
        <th scope="col" class="text-center">Cantidad</th>
        <th scope="col" class="text-center">Quitar</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $i = 1;
      $stmt = $conn->prepare('SELECT `i`.`it_nm`,`i`.`it_in`,`i`.`it_id`,`i`.`it_tx`,`o`.`of_am`
                              FROM `ITEM` AS `i`
                              LEFT JOIN `OFFERS` AS `o` ON `i`.`it_of` = `o`.`of_id`
                              WHERE `it_nm` = :n');
      $stmt->bindParam('n',$j);
      foreach($_SESSION['cart'] as $j=>$v){
        $stmt->execute();
        if($row = $stmt->fetch(PDO::FETCH_ASSOC)){
          echo '<input name="item[' . $i . '][id]" form="go" value="' . $row['it_id'] . '" type="number" hidden />';
          $price = $row['it_in'];
          $minus = (isset($row['of_am'])) ? $row['of_am'] : 1;
        ?>
      <tr>
        <th scope="row"><?php echo $i;?></th>
        <td><?php echo ucwords($row['it_nm']);?></td>
        <td class="text-center"><?php echo "$" . number_format((float)$price,2,'.','') . ' MXN';?></td>
        <td class="text-center"><?php echo ($row['it_tx'] - 1) * 100 . "%";?></td>
        <td class="text-center"><?php echo ($minus - 1) * 100 . "%";?></td>
        <td class="text-center"><?php echo "$" . number_format((float)($price * $minus * $row['it_tx']),2,'.','') . ' MXN';?></td>
        <td class="text-center"><input form="go" type="number" min="0" value="<?php echo $v;?>" name="item[<?php echo $i;?>][amount]"/></td>
        <form action="modules/cart/rmvItem.php" method="POST">
          <td class="d-flex justify-content-center"><button type="submit" class="btn btn-info" name="rmv" value="<?php echo $row['it_nm']?>">Quitar</button></td>
        </form>
      </tr>
      <?php $i++;}}?>
    </tbody>
  </table>
</div>