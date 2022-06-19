<?php

require('../utils/getFormFields.php');
require('../utils/connection.php');
require('../utils/validates/password.php');

$email = getFormField('email');
$password = getFormField('password');

$name = getFormField('name');

print_r($email);

// validate email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $error = 'Email inválido';
  header('Location: ../../src/pages/register/index.html?error=' . $error);
  exit;
}

$select = "SELECT * FROM user WHERE email = '$email'";
$result = $db->prepare($select);
$result->execute();

if ($result->fetchColumn() > 0) {
  $error = 'Email já cadastrado';
  header('Location: ../../src/pages/register/index.html?error=' . $error);
}

if (!$name) {
  $error = 'Nome inválido';
  header('Location: ../../src/pages/register/index.html?error=' . $error);
  exit;
}

$validatePassword = validatePassword($password);

if (strlen($validatePassword)) {
  $error = $validatePassword;
  header('Location: ../../src/pages/register/index.html?error=' . $error);
  exit;
}

$passwordSecure = password_hash($password, PASSWORD_DEFAULT);
$table = "user";
$fields = [
  "name" => $name,
  "email" => $email,
  "password" => $passwordSecure,
  "createdAt" => date("Y-m-d H:i:s"),
  "updatedAt" => date("Y-m-d H:i:s"),
  "roleId" => 2,
];


$insertResult = "INSERT INTO $table (" . implode(', ', array_keys($fields)) . ") VALUES (" . implode(', ', array_values($fields)) . ")";


// insert in database
$result = $db->prepare("INSERT INTO user (name, email, password, createdAt, updatedAt, roleId) 
VALUES ('$fields[name]', '$fields[email]', '$fields[password]', '$fields[createdAt]', '$fields[updatedAt]', '$fields[roleId]')");
$result->execute();
// $sth = $dbh->prepare('SELECT name, colour, calories FROM fruit WHERE calories < ?');

if (!$result) {
  $error = 'Não foi possível cadastrar o usuário';
  header('Location: ../../src/pages/register/index.html?error=' . $error);
  exit;
}

header('Location: ../../src/pages/login/index.html?success=Cadastro realizado com sucesso, faça o login');
