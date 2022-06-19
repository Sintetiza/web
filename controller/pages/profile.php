<?php

require('../utils/getFormFields.php');
require('../utils/connection.php');

session_start();
$user = $_SESSION['user'];
$email = $user['email'];

$name = getFormField('name');
$avatar = getFormField('avatar');

$newUser = [
  'name' => $name,
  'avatar' => $avatar,
  'updatedAt' => date("Y-m-d H:i:s"),
];

$sql = "UPDATE user set name = '$newUser[name]', avatar = '$newUser[avatar]', updatedAt='$newUser[updatedAt]'  where email = '$email'";

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
  ];
  $_SESSION['user'] = $arrayForSave;
  header('Location: ../../src/pages/profile/index.php');
  // print_r($sql);
} else {
  $error = 'Erro ao atualizar';
  header('Location: ../../src/pages/profile/index.php?error=' . $error);
}
