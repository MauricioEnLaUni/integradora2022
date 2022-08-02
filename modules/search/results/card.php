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
        <div class="col-2 mt-3">
          <form method="POST" action="confirm.php">
            <button class="searchButton btn btn-warning" type="submit" name="sale" value="<?php echo $tmp['it_id'] ;?>">
              <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="curr
              entColor" class="bi bi-cart-plus" viewBox="0 0 16 16">
                <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V
                8h1.5a.5.5 0 0 0 0-1H9V5.5z"/>
                <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12
                h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0
                  .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.
                915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7
                  0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
              </svg>
            </button>
          </form>
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