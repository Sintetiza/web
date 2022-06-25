<?php

require('../utils/getFormFields.php');
require('../utils/connection.php');

$password = getFormField('password');
$passwordConfirm = getFormField('passwordConfirm');

if ($password != $passwordConfirm) {
  $error = 'As senhas não conferem.';
  header('Location: ../../src/pages/profile/index.php?error=' . $error);
  exit;
}

$passwordEncode = password_hash($password, PASSWORD_DEFAULT);

session_start();
$userId = $_SESSION['user']['id'];

// find email
$sql = "SELECT * FROM user WHERE id = '$userId'";
$result = $db->prepare($sql);
$result->execute();

if (!$result) {
  $error = 'Usuário ainda não cadastrado';
  header('Location: ../../src/pages/login/index.html?error=' . $error);
  exit;
}

$sqlUpdatePassword = "UPDATE user SET password = '$passwordEncode' WHERE id = '$userId'";
$resultUpdatePassword = $db->prepare($sqlUpdatePassword);
$resultUpdatePassword->execute();

if (!$resultUpdatePassword) {
  $error = 'Erro ao atualizar senha';
  header('Location: ../../src/pages/profile/index.php?error=' . $error);
  exit;
}

header('Location: ../../src/pages/profile/index.php?success=Senha atualizada com sucesso');
