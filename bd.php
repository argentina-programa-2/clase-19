<?php
//local
$server = "localhost";
$user = "root";
$password = "";
$db = "clase19";

//server
// $server = "localhost";
// $user = "c1582153_ap";
// $password = "33seGOvose";
// $db = "c1582153_ap";

$conn = new mysqli($server, $user, $password, $db);

if ($conn->connect_error) {
    die("Conexion fallida: " . $conn->connect_error);
}
