<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="./src/assets/icon.png" type="image/x-icon" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Source+Code+Pro:wght@300;400;500;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="./src/styles/global.css" />
  <link rel="stylesheet" href="./src/styles/header.css" />
  <link rel="stylesheet" href="./src/styles/home.css" />
  <link rel="stylesheet" href="./src/styles/responsive.css" />
  <link rel="stylesheet" href="./src/styles/footer.css">
  <script src="https://kit.fontawesome.com/f18aeaea05.js" crossorigin="anonymous" defer></script>
  <script src="./src/scripts/home/index.js" defer></script>
  <title>Sintetiza</title>
</head>

<body>
  <header>
    <div class="container">
      <div class="logo">
        <img src="./src/assets/Logo.svg" alt="Logo" />
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
      session_start();
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
  </header>
  <main>
    <section class="mainContent" id="Home">
      <div class="ilustration">
        <img src="./src/assets/Ilustration1.svg" alt="Ilustration" />
      </div>
      <div class="text">
        <h1>
          <span class="highlight">Sintetiza:</span> o resumo da matéria na sua
          mão.🤟​
        </h1>
        <p class="description">
          Aqui tem resumo de matéria escolar de graça, pra todo mundo. :)
        </p>
      </div>
      <div class="buttonContainer">
        <a href="./src/pages/register/index.html" class="btn btnOutline">
          Vem estudar👉
        </a>
      </div>
    </section>
    <section id="Course">
      <h1 class="title">
        Que <span class="highlight">resumos</span> oferecemos?🤔
      </h1>
      <div class="cardContainer">
        <a href="./src/pages/resumos/Humanas.html" class="card borderGreen">
          <img src="./src/assets/Humanas.svg" alt="" />
          <p>Ciências Humanas</p>
          <i class="fa-solid fa-arrow-right"></i>
        </a>
        <a href="./src/pages/resumos/Exatas.html" class="card borderWhite">
          <img src="./src/assets/Exatas.svg" alt="" />
          <p>Ciências Exatas</p>
          <i class="fa-solid fa-arrow-right"></i>
        </a>
        <a href="./src/pages/resumos/Biologica.html" class="card borderGreen">
          <img src="./src/assets/Biologica.svg" alt="" />
          <p>Ciências Biológicas</p>
          <i class="fa-solid fa-arrow-right"></i>
        </a>
      </div>
    </section>
    <section id="About">
      <h1 class="title">Quem <span class="highlight">somos</span> nós?🤔</h1>
      <div class="content">
        <div class="ilustration">
          <img src="./src/assets/BoyHighFive.svg" alt="" />
        </div>
        <div class="text">
          <div class="lineBG"></div>
          <div class="textItem">
            <h1>A gente</h1>
            <p>
              Somos gente que nem você: estudantes passando por perrengue e
              querendo resumo da matéria pronto! Nascemos no Instituto Federal
              de Muzambinho, na disciplina de Projeto de Software.
            </p>
          </div>
        </div>
      </div>
    </section>
  </main>
  <aside class="preFooter">
    <img src="./src/assets/GirlIlustration.svg" alt="" />
    <div class="text">
      <h1 class="title highlight">tá esperando o quê pra estudar?🤪</h1>
      <p class="description">
        Você pode explorar milhares de resumos, e também enviar por e-mail o
        seu para postarmos aqui. Tudo em um lugar só!
      </p>
    </div>
    <a href="./src/pages/login/index.html" class="btn btnOutline">
      Vem sintetizar👉
    </a>
  </aside>
  <div class="line"></div>
  <footer id="Contact">
    <div class="logo">
      <img src="./src/assets/Logo.svg" alt="Logo" />
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