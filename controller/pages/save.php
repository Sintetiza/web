<?php
require('../utils/connection.php');

session_start();

$postId = $_GET['id'];
$userId = $_SESSION['user']['id'];

$sql = "insert into savepost(userId, postId) values($userId, $postId)";


$prep = $db->prepare($sql);
$res = $prep->execute();

?>

<div>
  <?php if ($res) : ?>
    <p>Salvo com sucesso!</p>
    <script>
      setTimeout(function() {
        window.location.href = "../../src/pages/resumos/index.php?id=<?php echo $postId; ?>";
      }, 2000);
    </script>
  <?php else : ?>
    <p>Erro ao salvar!</p>
    <a href="../../index.php">Voltar a Home</a>
  <?php endif; ?>
</div>