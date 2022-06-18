<?php

require('../utils/getFormFields.php');
require('../utils/connection.php');

$email = getFormField('email');
$pedidoDeResumo = getFormField('pedidoDeResumo');

// validate email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $error = 'Invalid email';
  header('Location: ../../src/pages/resumo/pedir.html?error=' . $error);
  exit;
}
// `userId` INTEGER,
// `email` varchar(300) NOT NULL,
// `askPost` LONGTEXT,
session_start();
$user = $_SESSION['user'];
$userId = $user['id'];

$sql = "INSERT INTO aksPost (userId, email, askPost) VALUES ('$userId', '$email', '$pedidoDeResumo')";

$prep = $db->prepare($sql);
$res = $prep->execute();

if ($res) {
  $success = 'Pedido de resumo enviado com sucesso';
  header('Location: ../../src/pages/resumos/pedir.html?success=' . $success);
  exit;
} else {
  $error = 'Erro ao enviar pedido de resumo';
  header('Location: ../../src/pages/resumos/pedir.html?error=' . $error);
  exit;
}
