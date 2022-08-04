<?php
require('../utils/connection.php');
$postId = $_GET['id'];
$sql = "SELECT * FROM post WHERE id = $postId";

$prep = $db->prepare($sql);
$res = $prep->execute();

print_r($res);
