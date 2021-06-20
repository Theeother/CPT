<?php

$serverName= "localhost";
$dBUsername= "root";
$dBPassword= "";
$dBrName= "loginsys";

$conn = mysqli_connect($serverName,$dBUsername,$dBPassword,$dBrName);

if (! $conn){
    die(" ".mysqli_connect_error());
}
