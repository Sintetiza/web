<?php

require('../utils/getFormFields.php');
require('../utils/connection.php');

$email = getFormField('email');

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

header("Location: ../../src/pages/login/index.html?success=Email enviado com sucesso");
