<div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/showdown/1.9.0/showdown.min.js"></script>
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

      <script>
        function createElements() {
          const toHtml = new showdown.Converter();

          function converterFn(text) {
            return toHtml.makeHtml(text);
          }
          const cardBody = document.createElement('div');
          cardBody.classList.add('cardBody');
          const createDate = document.createElement('div');
          createDate.classList.add('createDate');
          const createDateBold = document.createElement('b');
          createDateBold.innerText = 'Publicado';
          const createDateSpan = document.createElement('span');
          createDateSpan.innerText = `Criado em <?= date_format(date_create($post['createdAt']), 'd/m/Y'); ?>`;
          createDate.appendChild(createDateBold);
          createDate.appendChild(createDateSpan);
          const cardTitle = document.createElement('div');
          cardTitle.classList.add('cardTitle');
          const cardTitleH1 = document.createElement('h1');

          cardTitleH1.innerHTML = converterFn(`<?= $post['title'] ?>`);

          cardTitle.appendChild(cardTitleH1);
          const preText = document.createElement('div');
          preText.classList.add('preText');
          preText.innerHTML = converterFn(`<?= $post['content'] ?>`);
          const cardProfile = document.createElement('div');
          cardProfile.classList.add('cardProfile');
          const cardProfileImage = document.createElement('div');
          cardProfileImage.classList.add('cardProfileImage');
          const cardProfileImageImg = document.createElement('img');
          cardProfileImageImg.src = `<?= $post['avatar'] ?>`;
          cardProfileImageImg.alt = converterFn(`<?= $post['name'] ?>`);
          cardProfileImage.appendChild(cardProfileImageImg);
          const cardProfileUserName = document.createElement('div');
          cardProfileUserName.classList.add('cardProfileUserName');
          const cardProfileUserNameH4 = document.createElement('h4');
          cardProfileUserNameH4.innerHTML = converterFn(`<?= $post['name'] ?>`);
          cardProfileUserName.appendChild(cardProfileUserNameH4);
          const deleteButton = document.createElement('a');
          deleteButton.classList.add('delete');
          deleteButton.href = `../../../controller/unsavePost.php?id=<?= $post['postId'] ?>`;
          const deleteButtonI = document.createElement('i');
          deleteButtonI.classList.add('fa-solid');
          deleteButtonI.classList.add('fa-trash');
          deleteButton.appendChild(deleteButtonI);
          cardBody.appendChild(createDate);
          cardBody.appendChild(cardTitle);
          cardBody.appendChild(preText);
          cardBody.appendChild(cardProfile);
          cardProfile.appendChild(cardProfileImage);
          cardProfile.appendChild(cardProfileUserName);
          cardBody.appendChild(deleteButton);

          const card = document.createElement('div');
          card.classList.add('card');
          card.setAttribute('onclick', `redirectToPost(<?= $post['postId'] ?>)`);
          card.appendChild(cardBody);

          document.querySelector('.cardsContainers').appendChild(card);
        }
        createElements();
      </script>
    <?php endforeach; ?>
  </div>
</div>

<script>
  const allPreTexts = document.querySelectorAll(".preText");
  allPreTexts.forEach(e => {
    const value = String(e.innerText);
    if (value.length > 50) {
      e.innerText = value.slice(0, 50);
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