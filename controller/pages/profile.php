<?php

require('../utils/getFormFields.php');
require('../utils/connection.php');
require('../utils/validates/cpf.php');

session_start();
$user = $_SESSION['user'];
$email = $user['email'];

$name = getFormField('name');
$CPF = getFormField('CPF');
$birthDate = getFormField('birthDate');
$avatar = getFormField('avatar');

$isValid = validateCPF($CPF);
if (!$isValid) {
  $error = 'CPF inválido';
  header('Location: ../../src/pages/profile/index.php?error=' . $error);
  exit();
}

$newUser = [
  'name' => $name,
  'avatar' => $avatar,
  'CPF' => $CPF,
  'birthDate' => $birthDate,
  'updatedAt' => date("Y-m-d H:i:s"),
];

$sql = "UPDATE user set name = '$newUser[name]', avatar = '$newUser[avatar]', updatedAt='$newUser[updatedAt]', birthDate='$newUser[birthDate]', CPF='$newUser[CPF]'  where email = '$email'";

// print_r($sql);
$result = $db->prepare($sql);

// $result->execute();

$res = $result->execute();

if ($res) {

  $arrayForSave = [

    'id' => $user['id'],
    'name' => $name,
    'email' => $user['email'],
    'roleId' => $user['roleId'],
    'avatar' => $avatar,
    'CPF' => $CPF,
    'birthDate' => $birthDate,
    'created_at' => $user['created_at'],
  ];
  $_SESSION['user'] = $arrayForSave;
  header('Location: ../../src/pages/profile/index.php');
  // print_r($sql);
} else {
  $error = 'Erro ao atualizar';
  header('Location: ../../src/pages/profile/index.php?error=' . $error);
}
