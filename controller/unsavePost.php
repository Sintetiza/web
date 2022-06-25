<?php
require('./utils/connection.php');

session_start();
$postId = $_GET['id'];
$userId = $_SESSION['user']['id'];

$sql = "DELETE FROM savePost WHERE postId = $postId and userId = $userId";

$res = $db->query($sql);
if ($res) {

  header("Location: ../src/pages/profile/index.php?section=2");
}
