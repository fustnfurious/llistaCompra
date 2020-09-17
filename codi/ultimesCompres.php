<?php

//NO TOCAR!!!

function ultimesCompres(){   //-----------------OK
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
  $sql = "SELECT producte, persona, data FROM compres ORDER BY id DESC LIMIT 25;";
  $result=$conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<div class=\"compra\"><div class=\"detallCompra\">".$row["data"]."</div><div class=\"detallCompra\">".$row["persona"]."</div><div class=\"detallCompra\">".$row["producte"]."</div></div>";
    }
} else {
    echo "  No heu comprat res encara";
}
  $conn->close();
}
ultimesCompres();
?>
