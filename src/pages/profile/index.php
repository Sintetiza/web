<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="../../assets/icon.png" type="image/x-icon" />
  <title>User</title>
  <link rel="stylesheet" href="../../styles/form.css" />
  <link rel="stylesheet" href="../../../global.css" />
  <script src="https://kit.fontawesome.com/f18aeaea05.js" crossorigin="anonymous" defer></script>
  <script src="../../scripts/form/index.js" defer></script>
</head>

<body>
  <?php
  session_start();
  $user = $_SESSION['user'];
  if (!$user) {
    header('Location: ../../src/pages/login/index.html');
    exit;
  }
  $avatar = $user['avatar'];
  ?>
  <header>
    <a href="../../../index.php" class="seta">
      <i class="fa-solid fa-arrow-left-long"></i>
      <p>Voltar</p>
    </a>
    <div class="logo">
      <!-- <img src="<?php echo $avatar ?>" alt="Logo" /> -->
    </div>
  </header>
  <main>
    <div class="form-header">
      <h1>Editar perfil</h1>
    </div>
    <form class="form" action="../../../controller/pages/profile.php" method="post" onsubmit="submit()">
      <div class="Name inputContainer">
        <i class="fa-solid fa-user"></i>
        <input type="text" name="name" placeholder="Nome (Obrigatório)" required value="<?php echo $user['name'] ?>">
      </div>
      <div class="avatar inputContainer">
        <div class="avatar">
          <?php if ($avatar) : ?>
            <img src="<?php echo $avatar  ?>" alt="avatar" />
          <?php else : ?>
            <i class="fa-solid fa-user"></i>
          <?php endif; ?>
        </div>
        <input type="text" name="avatar" placeholder="avatar (Não obrigatório)" required value="<?php echo $avatar ?>">

      </div>
      <div class="button">
        <button type="submit">Confirmar alteração de dados</button>
      </div>
    </form>
  </main>
</body>

</html>