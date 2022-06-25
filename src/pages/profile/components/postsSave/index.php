<div>
  <div class="controllers">
    <div class="prev">
      <i class="fa-solid fa-arrow-left"></i>
    </div>
    <div class="next">
      <i class="fa-solid fa-arrow-right"></i>
    </div>
  </div>
  <div class="cardsContainers carrossel">

    <?php

    require("../../../controller/utils/connection.php");
    $connection = $db;
    $user_id = $user['id'];
    $sql = "SELECT savePost.postId, savePost.userId, post.createdAt,post.title,post.content,user.name, user.avatar FROM savePost inner join post on savePost.postId = post.id inner join user on savePost.userId = user.id WHERE userId = $user_id";
    $result = $connection->query($sql);
    // $posts = 
    $savedPosts = $result->fetchAll(PDO::FETCH_ASSOC);

    $posts = $savedPosts;
    // print_r($posts);

    ?>
    <?php foreach ($posts as $post) : ?>
      <div class="card" onclick="redirectToPost(<?= $post['postId'] ?>)">
        <div class="cardBody">
          <div class="createDate">
            <b>Publicado</b>
            <span>Criado em <?= date_format(date_create($post['createdAt']), 'd/m/Y'); ?></span>
          </div>
          <div class="cardTitle">
            <h1><?= $post['title'] ?></h1>
          </div>
          <div class="preText"><?= $post['content'] ?></div>
          <div class="cardProfile">
            <div class="cardProfileImage">
              <img src="<?= $post['avatar'] ?>" alt="<?= $post['name'] ?>">
            </div>
            <div class="cardProfileUserName">
              <h4><?= $post['name'] ?></h4>
            </div>
          </div>
          <a href="../../../controller/unsavePost.php?id=<?= $post['postId'] ?>" class="delete">
            <i class="fa-solid fa-trash"></i>
          </a>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<script>
  const allPreTexts = document.querySelectorAll(".preText");
  allPreTexts.forEach(e => {
    const value = String(e.innerHTML);
    if (value.length > 150) {
      e.innerText = value.slice(0, 150);
      e.innerText += '...';
    }
  })

  function redirectToPost(id) {
    const url = `../resumos/index.php?id=${id}`
    window.location.href = url;
  }

  function main() {
    const carrossel = document.querySelector(".carrossel");
    const prev = document.querySelector(".prev");
    const next = document.querySelector(".next");
    const cards = document.querySelectorAll(".card");
    if (cards.length <= 0) return;
    let currentCard = 0;
    let maxCard = cards.length - 1;
    let minCard = 0;
    const cardWidth = cards[0].offsetWidth

    cards.forEach((e, index) => {
      e.setAttribute("data-index", index);
    })


    prev.addEventListener("click", () => {
      if (currentCard > minCard) {
        currentCard--;
        scrollCarrosel(-cardWidth)
        cardsUpdate();
      }
    });

    next.addEventListener("click", () => {
      if (currentCard < maxCard) {
        currentCard++;
        scrollCarrosel(cardWidth)
        cardsUpdate();
      }
    });

    carrossel.addEventListener("whell", (e) => {
      if (e.deltaY > 0) {
        if (currentCard > minCard) {
          currentCard--;
          scrollCarrosel(-cardWidth)
        }
      } else {
        if (currentCard < maxCard) {
          currentCard++;
          scrollCarrosel(cardWidth)
        }
      }
    });

    function scrollCarrosel(width) {

      carrossel.scrollBy({
        left: width,
        behavior: 'smooth'
      });
    }

    function cardsUpdate() {
      const cardsArray = Array.from(cards);
      const activeCards = cardsArray.splice(currentCard, 3);
      cards.forEach((e) => {
        e.classList.add("hidden");
      })
      activeCards.forEach((e) => {
        e.classList.remove("hidden");
      })
    }

    cardsUpdate();
    // carrossel.style.width = `${cardWidth * cards.length}px`;
  }

  main()
</script>