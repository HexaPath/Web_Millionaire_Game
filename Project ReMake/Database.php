<?php

$server = 'localhost';
$user = 'Millionaire_v1';
$pass = 'Millionaire_v1';
$db_name = 'Millionaire_v1';

$link = mysqli_connect($server, $user, $pass, $db_name);

if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
}

mysqli_query($link, "SET NAMES 'utf8'");

$salt = '(JuSt>To!Make%Brute=Force?Living*HeLl)';
?>