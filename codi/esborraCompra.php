<?php

function esborraCompra(){   //-----------------NO TOCAR
  $servername = "localhost";
  $username = "compres";
  $password = "compres";
  $db = "llistaCompra";
  $conn = new mysqli($servername, $username, $password, $db);
  if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
  } else {
  //echo "Connected successfully";
  }
  $sql = "DELETE FROM compres ORDER BY id DESC LIMIT 1";
  if ($conn->query($sql) === TRUE) {
      echo "Has esborrat l'última compra correctament";
      header('Location: http://192.168.0.17');
      die();
  } else {
      echo "Error";
  }
  $conn->close();
}
esborraCompra();

 ?>
