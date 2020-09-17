<?php
$idProd = $_POST["idProd"];
quiProd($idProd);
function quiProd($idProd){   //per acabar
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
  $sql = "SELECT persona FROM compres WHERE idProd=$idProd ORDER BY id DESC LIMIT 5;";
  $result=$conn->query($sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<li class=\"personProd\"><p>".$row["persona"]."</p></li>";
    }
  } else {
      echo "Ningú ha comprat això encara.";
  }
  $conn->close();
}
?>
