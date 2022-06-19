<?php
// get url, if it's localhost, change isDevelopment to true
$isDevelopment = strpos($_SERVER['HTTP_HOST'], 'localhost') !== false;
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'sintetiza';

if (!$isDevelopment) {
  $server = 'sql102.epizy.com';
  $username = 'epiz_31747922';
  $password = '8CYrxS1t6Q';
  $database = 'epiz_31747922_sintetiza';
}



$db = new PDO("mysql:host=$server;dbname=$database;charset=utf8", $username, $password);
