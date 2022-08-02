<fieldset id="marca" form="searchBar">
  <legend>
    Marca
  </legend>
  <?php
  $brand = [
    'Adidas',
    'Caterpillar',
    'Converse',
    'Crocs',
    'ECCO',
    'Hush',
    'Nike',
    'SAS'
  ];
  $i = 0;
  foreach($brand as $b){
  ?>
  <label>
    <input
    type="checkbox"
    form="searchBar"
    name="<?php echo $b;?>"
    value="<?php echo $i++;?>"
    />
    <span><?php echo $b;?></span>
  </label>
  <?php }?>
</fieldset>