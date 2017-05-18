<?php
//reemplazar host, user password y nombre de la base de datos por la propia
$dbhost = '127.0.0.1';
$dbuser = 'root';
$dbpass = 'admin';
$dbname = 'dbboot';
$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
