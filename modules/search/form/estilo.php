<?php
$style = [
  'Bota',
  'Bote',
  'Clogs',
  'Loafer',
  'Sandalia',
  'Slipper',
  'Atletico',
  'Trabajo'
  ];
?>
<fieldset id="estilo">
  <legend>Estilo</legend>
  <?php
  for($i = 0; $i < count($style); $i++){
  ?>
  <label>
    <input
    type="checkbox"
    form="searchBar"
    name="<?php echo $style[$i];?>"
    value="<?php echo $i;?>"
    />
    <span><?php echo $style[$i];?></span>
  </label>
  <?php }?>
</fieldset>