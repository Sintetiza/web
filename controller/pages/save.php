<?php
require('../utils/connection.php');

session_start();

$postId = $_GET['id'];
$userId = $_SESSION['user']['id'];

$sql = "insert into savepost(userId, postId) values($userId, $postId)";

$prep = $db->prepare($sql);
$res = $prep->execute();

$arr = array(
  'success' => $res,
  'message' => "Resumo salvo com sucesso!"
);



if (!$res) {
  $arr = array(
    'success' => false,
    'message' => "Erro ao salvar resumo!"
  );
}

$arrayToJson = json_encode($arr);
echo $arrayToJson;
