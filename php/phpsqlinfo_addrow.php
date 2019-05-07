<?php

$evento = $_GET['evento'];
$periodo = $_GET['periodo'];
$data = $_GET['data'];
$lat = $_GET['lat'];
$lng = $_GET['lng'];

$conn = new mysqli("localhost", "root", "", "seguranca");

$sql =  "INSERT INTO marker (evento, periodo, data, lat, lng)" .
         " VALUES ('$evento','$periodo','$data', '$lat','$lng')";

$result = $conn->query($sql);

?>