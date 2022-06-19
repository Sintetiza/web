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