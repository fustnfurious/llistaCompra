<?php
//funciona
$idProd = $_POST["prod"];
$persona = $_POST["nom"];
$nouProd = $_POST["nouProd"];

//echo $idProd;
if ($nouProd!=""){
  enviaCompraNova($nouProd, $persona);
} else {
  enviaCompra($idProd, $persona);
}
header('Location: http://192.168.0.17');
die();

function enviaCompraNova($nouProd, $persona){
  $personaId = substr($persona, 0, 1);
  $personaNom = idToNom($personaId);
  $personaNom="\"$personaNom\"";
  $nouProd = "\"$nouProd\"";
  $conn = connectaDB();
  $sql4 = "INSERT INTO productes VALUES (NULL, $nouProd);";
  if ($conn->query($sql4) === TRUE) {
      echo "Has afegit un producte";
  } else {
      echo "Error: ".$sql4."<br>".$conn->error;
  }
  $sql5= "SELECT id FROM productes WHERE producte=$nouProd";
  $result1 = $conn->query($sql5);
  $row = $result1->fetch_assoc();
  $idNouProd = $row["id"];
  $sql3 = "INSERT INTO compres VALUES (NULL, $nouProd, $personaNom, NOW(), $idNouProd);";
  if ($conn->query($sql3) === TRUE) {
      echo "Has afegit la compra correctament";
  } else {
      echo "Error: ".$sql."<br>".$conn->error;
  }
  $conn->close();
}

function enviaCompra($idProd, $persona){ //
  $personaId = substr($persona, 0, 1);
  $personaNom = idToNom($personaId);
  $personaNom="\"$personaNom\"";
  $sql1 = "SELECT producte FROM productes WHERE id=$idProd";
  $conn = connectaDB();
  $result1 = $conn->query($sql1);
  $row = $result1->fetch_assoc();
  $nomProd = "\"".$row["producte"]."\"";
  $sql2 = "INSERT INTO compres VALUES (NULL, $nomProd, $personaNom, NOW(), $idProd);";
  if ($conn->query($sql2) === TRUE) {
      echo "Has afegit la compra correctament";
  } else {
      echo "Error";
  }
  $conn->close();
}

function idToNom($id){
  $conn=connectaDB();
  $sqlIdToNom = "SELECT persona FROM persones WHERE id=$id";
  $resultIdToNom = $conn->query($sqlIdToNom);
  $rowNom = $resultIdToNom->fetch_assoc();
  $nom=$rowNom["persona"];
  $conn->close();
  return $nom;
}

function connectaDB(){
  $servername = "localhost";
  $username = "compres";
  $password = "compres";
  $db = "llistaCompra";
  $conn = new mysqli($servername, $username, $password, $db);
  if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
  } else {
  //echo "Connected successfully   ";
  return $conn;
  }
}
?>
