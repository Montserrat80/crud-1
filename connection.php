<?php

$mysql_host = "localhost";
$mysql_user = "root";
$mysql_pwd  = "";
$mysql_bd   = "personen";

$con = mysqli_connect($mysql_host,$mysql_user,$mysql_pwd,$mysql_bd);

if(mysqli_connect_errno()){
  echo "Failed to connect ot MariaDB: " . mysqli_connect_error();
}

?>