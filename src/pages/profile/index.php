<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="../../assets/icon.png" type="image/x-icon" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Source+Code+Pro:wght@300;400;500;700&display=swap" rel="stylesheet" />
  <title>User</title>
  <!-- <link rel="stylesheet" href="../../styles/form.css" /> -->
  <link rel="stylesheet" href="../../styles/header.css" />
  <link rel="stylesheet" href="../../../global.css" />
  <link rel="stylesheet" href="../../styles/footer.css" />
  <link rel="stylesheet" href="./style.css">
  <script src="https://kit.fontawesome.com/f18aeaea05.js" crossorigin="anonymous" defer></script>
  <script src="../../scripts/form/index.js" defer></script>
  <script src="../../scripts/home/index.js" defer></script>
</head>

<body>
  <?php include './header.php'; ?>
  <main id="profile">
    <div class="containerProfile">
      <section class="containerData">
        <div class="imageContainer">
          <img src="<?= $user['avatar'] ?>" alt="<?= $user['name'] ?>">
        </div>
        <div class="data">
          <div class="createDate">
            <b>Usuário</b>
            <span>Criado em
              <?php
              $date = new DateTime($user['created_at']);
              echo $date->format('d/m/Y');
              ?>
            </span>
          </div>
          <div class="userNameTitle">
            <h1>
              <?php echo $user['name']; ?>
            </h1>
          </div>
          <div class="contact">
            <a href="mailto:contato">
              <i class="fa-solid fa-envelope"></i>
              <span>
                <?php echo $user['email']; ?>
              </span>
            </a>
          </div>
        </div>
      </section>
      <div class="containerSections">
        <nav>
          <ul>
            <?php
            $section = isset($_GET['section']) ?  $_GET['section']  : 1;
            $active = 'active';
            ?>
            <li>
              <a href="<?= $section == 1 ? "#" : "./index.php?section=1" ?>">Dados Pessoais</a>
              <div class="lineGreen <?= ($section == 1 ? $active : "") ?>"></div>
            </li>
            <li>
              <a href="<?= $section == 2 ? "#" : "./index.php?section=2" ?>">Resumos Salvos</a>
              <div class="lineGreen <?= ($section == 2 ? $active : "") ?>"></div>

            </li>
            <li>
              <a href="<?= $section == 3 ? "#" : "./index.php?section=3" ?>">Mudar Senha</a>
              <div class="lineGreen <?= ($section == 3 ? $active : "") ?>"></div>
            </li>
          </ul>
        </nav>
        <div class="line"></div>
      </div>
      <div class="sectionData">
        <?php if ($section == 1) : ?>
          <?php include './components/profileData/index.php'; ?>
        <?php elseif ($section == 2) : ?>
          <?php include './components/postsSave/index.php'; ?>
        <?php elseif ($section == 3) : ?>
          <?php include './components/changePassword/index.php'; ?>
        <?php endif; ?>
      </div>
    </div>
  </main>
  <footer id="Contact">
    <div class="logo">
      <img src="../../assets/Logo.svg" alt="Logo" />
    </div>
    <div class="socialMedia">
      <div class="item">
        <i class="fa-brands fa-instagram"></i>
      </div>
      <div class="item">
        <i class="fa-brands fa-twitter"></i>
      </div>
      <div class="item">
        <i class="fa-regular fa-envelope"></i>
      </div>
    </div>
    <p class="description">Feito com 💚 por Luísa, Bhryan, Emilly e Caio</p>
  </footer>
</body>

</html>