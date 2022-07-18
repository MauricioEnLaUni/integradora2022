<?php
$texto = (isset($_GET['searchText'])) ? $_GET['searchText'] : "";
$estilo = (isset($_GET['estilos'])) ? 'it_tp = ' . $estilo = $_GET['estilos'] : "";
$offer = (isset($_GET['offer'])) ? 'it_of' . $_GET['offer'] : "";
$cal = (isset($_GET['inCal'])) ? $_GET['inCal'] : "";
$min = (isset($_GET['minNumber'])) ? $_GET['minNumber'] : "";
$max = (isset($_GET['maxNumber'])) ? $_GET['maxNumber'] : "";
$gen = (isset($_GET['genSearch'])) ?  'it_wh = ' . $_GET['genSearch'] : "";
$marca = (isset($_GET['marca'])) ? 'it_br' . $_GET['marca'] : "";

require_once "connector.php";
if(!$dbc){
  echo 'Connection Error: ' . mysqli_connect_error();
}

  $stmt = $dbc->prepare('SELECT `it_id`,`it_nm`,`it_ot`,`it_ds` FROM `ITEM` WHERE `it_id` < ?;');
  $stmt->bind_param("i",$i);
  $stmt->execute();
  $result = $stmt->get_result();
  while($row = mysqli_fetch_assoc($result))
  {
    $zapato = $row;
    echo "<script type='text/javascript'>
      drawer('$zapato[it_nm]',$zapato[it_ot],$zapato[it_ds],$zapato[it_id]);
    </script>";
  }
?>