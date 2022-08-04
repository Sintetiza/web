<?php
$logo = file(__DIR__ . './Logo.svg');
?>
<div class="container">
  <div class="logo">
    <?= implode('', $logo) ?>
  </div>
  <div class="bars">
    <i class="fa-solid fa-bars"></i>
  </div>
  <nav class="links">
    <ul>
      <li>
        <a href="#Home">Home</a>
      </li>
      <li class="dropDown">
        <a href="#Course">Resumos</a>
        <i class="fa-solid fa-angle-down"></i>
        <div class="dropdownItem">
          <a href="#Course">Matemática</a>
          <a href="#Course">Português</a>
          <a href="#Course">Ciência</a>
        </div>
      </li>
      <li>
        <a href="#About">Quem somos</a>
      </li>
      <li>
        <a href="#Contact">Contato</a>
      </li>
    </ul>
  </nav>
  <?php
  // session_start();
  $isUser = isset($_SESSION['user']);

  ?>
  <?php if ($isUser) : ?>
    <?php
    $user = $_SESSION['user'];
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
            <?php if (empty($user['avatar'])) : ?>
              <i class="fa-regular fa-user"></i>
            <?php else : ?>
              <img src="<?php echo $user['avatar'] ?>" alt="user image">
            <?php endif; ?>
          </div>
          <p>
            <?php echo explode(' ',  $user['name'])[0]; ?>
          </p>
        </div>
        <div class="dropdownItem">
          <a href="./src/pages/profile/index.php">Perfil</a>
          <a href="./controller/signout.php">Sair</a>
        </div>
      </li>
    </ul>
  <?php else : ?>

    <div class="buttons">
      <a href="./src/pages/login/index.html">
        <button class="login">
          <i class="fa-regular fa-user"></i> ENTRAR
        </button>
      </a>
      <a href="./src/pages/register/index.html">
        <button class="register">ESTUDAR AGORA👉</button>
      </a>
    </div>
</div>
<?php endif; ?>