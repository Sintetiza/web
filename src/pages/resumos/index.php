<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="../../assets/icon.png" type="image/x-icon" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Source+Code+Pro:wght@300;400;500;700&display=swap" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/f18aeaea05.js" crossorigin="anonymous" defer></script>
  <script src="./script.js" defer></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/showdown/2.1.0/showdown.min.js" async></script>

  <link rel="stylesheet" href="../../styles/global.css" />
  <link rel="stylesheet" href="../../styles/header.css">
  <link rel="stylesheet" href="../../styles/footer.css">
  <!-- <link rel="stylesheet" href="./style.css" /> -->
  <link rel="stylesheet" href="./resumo.css">
  <title>Sintetiza | Resumos</title>
</head>

<body>
  <header>
    <a href="../../../index.php" class="seta">
      <i class="fa-solid fa-arrow-left-long"></i>
      <p>Voltar</p>
    </a>

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
        ?>
        <ul class="pedirResumo">
          <li class="textUpperCase">
            <a href="../resumos/pedir.html" class="btn btnOutline">
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
              <a href="../profile/index.php">Perfil</a>
              <a href="../../../controller/signout.php">Sair</a>
            </div>
          </li>
        </ul>
      <?php else : ?>

        <div class="buttons">
          <a href="../login/index.html">
            <button class="login">
              <i class="fa-regular fa-user"></i> ENTRAR
            </button>
          </a>
          <a href="../register/index.html">
            <button class="register">ESTUDAR AGORA👉</button>
          </a>
        </div>
    </div>
  <?php endif; ?>
  </header>
  <main>
    <?php
    $idResumo = $_GET['id'];
    if (!$idResumo) {
      header("Location: ../../../index.php");
    }
    require('../../../controller/utils/connection.php');
    $sql = "SELECT * FROM post WHERE id = $idResumo";

    $prep = $db->prepare($sql);
    $res = $prep->execute();
    $resumo = $prep->fetch(PDO::FETCH_ASSOC);
    $resumoJSON = json_encode($resumo);
    echo "<script> 
      const resumo = " . $resumoJSON . ";
      const title = resumo.title;
      const content = resumo.content;
    </script>";
    $Author = $resumo['authorId'];
    $publishDate = $resumo['createdAt'];

    $sql = "SELECT * FROM user WHERE id = $Author";
    $prep = $db->prepare($sql);
    $res = $prep->execute();
    $author = $prep->fetch(PDO::FETCH_ASSOC);


    ?>
    <div class="resumo">
    </div>
    <?php
    $isUser = isset($_SESSION['user'])
    ?>


    <div class="authorProfile">
      <div class="authorProfile__content">
        <img src=<?= $author['avatar'] ?> alt="user image" class="authorProfile__image">
        <div class="authorProfile__info">
          <p class="authorProfile__publish">
            <b>Publicado em</b>
            <span class="authorProfile__publish--date">
              <?php
              $fomatedDate = date('d/m/Y', strtotime($publishDate));
              echo $fomatedDate;
              ?>
            </span>
          </p>
          <p class="authorProfile__name">
            <?php echo explode(' ',  $author['name'])[0]; ?>
          </p>

        </div>
      </div>


      <?php if ($isUser) : ?>
        <form class="authorProfile__form" onsubmit="savePost">
          <button class="authorProfile__form__button authorProfile__form--buttonSave" type="submit">
            Salvar
          </button>
          <a href="" class="authorProfile__form__button authorProfile__form--buttonShare">
            Compartilhar
          </a>
        </form>
      <?php endif; ?>
    </div>
  </main>
  <?php include '../../components/footer.php'; ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/showdown/1.9.0/showdown.min.js"></script>
  <script>
    const converter = new showdown.Converter();
    const html = converter.makeHtml(content);
    const titleConvert = converter.makeHtml(title);
    const resumoElement = document.querySelector('.resumo');
    resumoElement.innerHTML = titleConvert;
    resumoElement.innerHTML += html;

    addEventListener('submit', savePost)

    async function savePost(event) {
      event.preventDefault();
      const url = "../../../controller/pages/save.php?id=<?= $resumo['id'] ?>"
      console.log(url);
      const response = await fetch(url);
      const data = await response.json();
      console.log(data);
      const form = document.querySelector('.authorProfile__form');
      form.action = '../../../controller/pages/save.php?id=' + id;
      console.log(form.action);
    }
  </script>
</body>

</html>