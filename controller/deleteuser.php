<?php
require('./utils/connection.php');

session_start();
$id = $_SESSION['user']['id'];

$sql = "DELETE FROM user WHERE id = $id";

$prep = $db->prepare($sql);
$res = $prep->execute();

if (!$res) {
  $error = 'Erro ao deletar usuário';
  header('Location: ../pages/profile/index.php?error=' . $error);
  exit;
}
require('./signout.php');

// header('Location: ../index.php');
// singnout();
