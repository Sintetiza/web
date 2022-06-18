<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="../../assets/icon.png" type="image/x-icon" />
  <title>User</title>
  <link rel="stylesheet" href="../../styles/form.css" />
  <link rel="stylesheet" href="../../styles/header.css" />
  <link rel="stylesheet" href="../../../global.css" />
  <script src="https://kit.fontawesome.com/f18aeaea05.js" crossorigin="anonymous" defer></script>
  <script src="../../scripts/form/index.js" defer></script>
  <script src="../../scripts/home/index.js" defer></script>
</head>

<body>
  <header>
    <div class="container">
      <div class="logo">
        <img src="../../assets/Logo.svg" alt="Logo" />
      </div>
      <div class="bars">
        <i class="fa-solid fa-bars"></i>
      </div>
      <nav class="links">
        <ul>
          <li>
            <a href="../../../index.php#Home">Home</a>
          </li>
          <li class="dropDown">
            <a href="../../../index.php#Course">Resumos</a>
            <i class="fa-solid fa-angle-down"></i>
            <div class="dropdownItem">
              <a href="../../../index.php#Course">Matemática</a>
              <a href="../../../index.php#Course">Português</a>
              <a href="../../../index.php#Course">Ciência</a>
            </div>
          </li>
          <li>
            <a href="../../../index.php#About">Quem somos</a>
          </li>
          <li>
            <a href="../../../index.php#Contact">Contato</a>
          </li>
        </ul>
      </nav>
      <?php
      session_start();
      $isUser = isset($_SESSION['user']);
      ?>
      <?php if ($isUser) : ?>
        <?php
        $user = $_SESSION['user'];
        $avatar = $user['avatar'];
        ?>
        <ul class="pedirResumo">
          <li class="textUpperCase">
            <a href="./src/pages/resumos/pedir.html" class="btn btnOutline">
              Pedir Resumo
            </a>
          </li>

          <li class="dropDown">
            <div class="userContainer">
              <div class="userImage">
                <?php if (empty($avatar)) : ?>
                  <i class="fa-regular fa-user"></i>
                <?php else : ?>
                  <img src="<?php echo $avatar ?>" alt="user image">
                <?php endif; ?>
              </div>
              <p>
                <?php echo explode(' ',  $user['name'])[0]; ?>
              </p>
            </div>
            <div class="dropdownItem">
              <a href="#">Perfil</a>
              <a href="../../../controller/signout.php">Sair</a>
            </div>
          </li>
        </ul>
      <?php else :
        header('Location: ../../../index.php');
      ?>
      <?php endif; ?>
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
        <input type="text" name="avatar" placeholder="avatar (Não obrigatório)" value="<?php echo $avatar ?>">

      </div>
      <div class="button">
        <button type="submit">Confirmar alteração de dados</button>
      </div>
      <a href="../../../controller/deleteuser.php">DELETAR CONTA</a>
    </form>
  </main>
</body>

</html>