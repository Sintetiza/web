<?php
// get url, if it's localhost, change isDevelopment to true
$isDevelopment = strpos($_SERVER['HTTP_HOST'], 'localhost') !== false;
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'sintetiza';

if (!$isDevelopment) {
  $server = 'sql104.epizy.com';
  $username = 'epiz_32031535';
  $password = 'ooZciOuBwuv9';
  $database = 'epiz_32031535_sintetiza';
}



$db = new PDO("mysql:host=$server;dbname=$database;charset=utf8", $username, $password);
