<?php

require('../utils/getFormFields.php');
require('../utils/connection.php');

$email = getFormField('email');
$password = getFormField('password');



// validate email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $error = 'Invalid email';
  header('Location: ../../src/pages/login/index.html?error=' . $error);
  exit;
}

// find email
$sql = "SELECT * FROM user WHERE email = '$email'";
$result = $db->prepare($sql);
$result->execute();

if (!$result) {
  $error = 'Usuário ainda não cadastrado';
  header('Location: ../../src/pages/login/index.html?error=' . $error);
  exit;
}

// compare passwords
$resultArray = $result->fetchAll()[0];
$passwordUserDbHash = $resultArray['password'];
// $passwordUserDb = 
// decode password
$resultPassword = password_verify($password, $passwordUserDbHash);

if (!$resultPassword) {
  $error = 'Senha incorreta';
  header('Location: ../../src/pages/login/index.html?error=' . $error);
  exit;
}

session_start();
$arrayForSave = [
  'id' => $resultArray['id'],
  'name' => $resultArray['name'],
  'email' => $resultArray['email'],
  'roleId' => $resultArray['roleId'],
  'avatar' => $resultArray['avatar'],
  'CPF' => $resultArray['CPF'],
  'birthDate' => $resultArray['birthDate'],
  'created_at' => $resultArray['created_at'],
];

$_SESSION['user'] = $arrayForSave;

header('Location: ../../index.php');
