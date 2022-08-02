<?php
  $stmt = $conn->prepare('SELECT `it_id`,`it_nm`,`it_ot`,`it_ds`
  FROM `item`
  WHERE `it_id` = ?;');
  if(str_contains($_SERVER['REQUEST_URI'],'?') && empty($end)){
    ?>
    <h1>No se encontraron resultados :c</h1>
  <?php
  } else if(str_contains($_SERVER['REQUEST_URI'],'?') && !empty($end)){
    $end = array_chunk($end,10);
    foreach($end[$_SESSION['sPage'] - 1] as $tmp){
      $stmt->execute([$tmp]);
      while($tmp = $stmt->fetch(PDO::FETCH_ASSOC)){
      ?>
    <article class="searchArticle">
      <div class="row">
        <div class="col-2">
          <img src="img/items/smol/<?php echo $tmp['it_id'] ?>.jpg" alt="" width="100vw" class="searchImg"/>
        </div>
        <div class="col-8">
          <h3 class="searchTitle"><?php echo $tmp['it_nm'] ?></h3>
          <h4 class="searchPrice"><?php echo $tmp['it_ot'] ?></h4>
        </div>
        <div class="col-2">
          <button class="searchButton">Carrito</button>
        </div>
        <div class="row">
          <h4 class="searchDesc"><?php echo $tmp['it_ds'] ?></h4>
          <p></p>
        </div>
    </article>
  <?php }}} else{ 
    $end = 0;?>
    <h1>Introduzca su consulta aquí:</h1>
    <?php }?>