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
    name="style[]"
    value="<?php echo $style[$i];?>"
    />
    <span><?php echo $style[$i];?></span>
  </label>
  <?php }?>
</fieldset>