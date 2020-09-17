<?php

$arrProd=fileToArray("codi/productes.txt");
$arrPers=fileToArray("codi/persones.txt");
$conn=connectaDB();
foreach($arrProd as $prod){
  $prod="\"$prod\"";
  $sql="INSERT INTO productes VALUES (NULL, $prod)";
  if ($conn->query($sql) === TRUE) {
  } else {
      echo "Error: ".$conn->error;
  }
}
foreach($arrPers as $pers){
  $pers="\"$pers\"";
  $sql="INSERT INTO persones VALUES (NULL, $pers)";
  if ($conn->query($sql) === TRUE) {
  } else {
      echo "Error: ".$conn->error;
  }
}


function fileToArray($file){
  $ofile = fopen($file, "r");
  $str=fgets($ofile);
  $str=str_replace("\n", '', $str);
  $arr=explode(',', $str);
  fclose($ofile);
  return $arr;
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
    echo "Connected successfully";
    return $conn;
  }
}
?>
