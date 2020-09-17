<?php
function opcionsCompra(){   //-----------------NO TOCAR
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
  $sqlProd = "SELECT * FROM productes;";
  $result=$conn->query($sqlProd);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<input type=\"radio\" name=\"prod\" value=\"".$row["id"]."\">".$row["producte"]."<br>";
    }
} else {
    echo "error, apanya't";
}
  $conn->close();
}
opcionsCompra();
?>
