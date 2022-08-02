<?php
$colors = [
  0 => ['WHITE','#ffffff'],
  1 => ['BLACK','#000000'],
  2 => ['RED','#FF0000'],
  3 => ['BLUE','#0000FF'],
  4 => ['GREEN','#008000'],
  5 => ['YELLW','#ffff00'],
  6 => ['ORANG','#ffa500'],
  7 => ['BROWN','#a52a2a']
];
?>
<fieldset id="colorFlex" form="searchBar">
  <legend>
    Color
  </legend>
  <div class="flexbox" id="color">
    <?php
    $i = 0;
    foreach($colors as $c){
    ?>
    <label>
      <span style="background:<?php echo $c[1] ;?>">
      <input
      type="checkbox"
      form="searchBar"
      name="color[]"
      value="<?php echo $c[0] ;?>"
      />
      <img class="colorImg" src="img/svg/check-circle-fill.svg" />
      </span>
    </label>
    <?php }?>
  </div>
</fieldset>