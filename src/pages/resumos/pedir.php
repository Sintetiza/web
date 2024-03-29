<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="../../assets/icon.png" type="image/x-icon" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:wght@300;500;700&display=swap" rel="stylesheet" />
  <title>Pedir Resumo</title>
  <link rel="stylesheet" href="../../styles/global.css" />
  <!-- <link rel="stylesheet" href="./style.css" /> -->
  <link rel="stylesheet" href="../../styles/form.css" />

  <script src="https://kit.fontawesome.com/f18aeaea05.js" crossorigin="anonymous" defer></script>
  <script src="../../scripts/form/index.js" defer></script>
</head>

<body>
  <?php
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }

  $isUser = isset($_SESSION['user']);
  if (!$isUser) {
    header('Location: ../../index.php');
  }

  ?>
  <main class="pageForm">
    <div class="seta">
      <i class="fa-solid fa-arrow-left-long"></i>
      <p>Voltar</p>
    </div>
    <div class="box-login">
      <div class="logo">
        <img src="../../assets/Logo.svg" alt="" />
      </div>
      <div class="content">
        <h1>E ai, <span class="hightlight">estudante</span>?!👋</h1>
        <p>Peça seu resumo aí embaixo:</p>
      </div>
      <div class="message"></div>
      <form class="form" action="../../../controller/pages/resumo.php" method="post" onsubmit="submit()">
        <div class="email inputContainer">
          <i class="fa-solid fa-lock"></i>
          <input type="email" name="email" placeholder="E-mail" value="<?= $_SESSION['user']['email'] ?>" />
        </div>

        <div class="textarea inputContainer">
          <textarea name="pedidoDeResumo" cols="30" rows="10" placeholder="Faça seu pedido aqui..."></textarea>
        </div>

        <div class="button">
          <button type="submit">Pedir 👉</button>
        </div>
      </form>
    </div>
  </main>

  <script>
    function submit(event) {
      event.preventDefault();
      const form = event.target;
      const data = form.elements;
      const objData = {};
      data.reduce((acc, curr) => {
        acc[curr.name] = curr.value;
        return acc;
      }, objData);
      const url = form.action;
      const method = form.method;
      const response = fetch(url, {
        method: "POST",
        body: JSON.stringify(objData),
      });
    }
  </script>
  <script type="module">
    import {
      formUrl
    } from "../../utils/formURL.js";
  </script>
</body>

</html>