<div>
  <div class="controllers">
    <div class="prev">
      <i class="fa-solid fa-arrow-left"></i>
    </div>
    <div class="next">
      <i class="fa-solid fa-arrow-right"></i>
    </div>
  </div>
  <div class="cardsContainers">
    <div class="card">
      <div class="cardBody">
        <div class="createDate">
          <b>Publicado</b>
          <span>Criado em 07/06/2022</span>
        </div>
        <div class="cardTitle">
          <h1>Introdução à Trigonometria:</h1>
        </div>
        <div class="preText">
          Lorem, ipsum dolor sit amet consectetur adipisicing elit. Temporibus dicta, asperiores quibusdam, sed fugiat culpa facilis labore itaque pariatur dolores fugit ad quae quidem voluptates maxime eum libero! Eius, recusandae.
        </div>
        <div class="cardProfile">
          <div class="cardProfileImage">
            <img src="https://github.com/birobirobiro.png" alt="">
          </div>
          <div class="cardProfileUserName">
            <h4>birobirobiro</h4>
          </div>
        </div>
        <a href="#" class="delete">
          <i class="fa-solid fa-trash"></i>
        </a>
      </div>
    </div>
    <div class="card">
      <div class="cardBody">
        <div class="createDate">
          <b>Publicado</b>
          <span>Criado em 07/06/2022</span>
        </div>
        <div class="cardTitle">
          <h1>Introdução à Trigonometria:</h1>
        </div>
        <div class="preText">
          Lorem, ipsum dolor sit amet consectetur adipisicing elit. Temporibus dicta, asperiores quibusdam, sed fugiat culpa facilis labore itaque pariatur dolores fugit ad quae quidem voluptates maxime eum libero! Eius, recusandae.
        </div>
        <div class="cardProfile">
          <div class="cardProfileImage">
            <img src="https://github.com/birobirobiro.png" alt="">
          </div>
          <div class="cardProfileUserName">
            <h4>birobirobiro</h4>
          </div>
        </div>
        <a href="#" class="delete">
          <i class="fa-solid fa-trash"></i>
        </a>
      </div>
    </div>
    <div class="card">
      <div class="cardBody">
        <div class="createDate">
          <b>Publicado</b>
          <span>Criado em 07/06/2022</span>
        </div>
        <div class="cardTitle">
          <h1>Introdução à Trigonometria:</h1>
        </div>
        <div class="preText">
          Lorem, ipsum dolor sit amet consectetur adipisicing elit. Temporibus dicta, asperiores quibusdam, sed fugiat culpa facilis labore itaque pariatur dolores fugit ad quae quidem voluptates maxime eum libero! Eius, recusandae.
        </div>
        <div class="cardProfile">
          <div class="cardProfileImage">
            <img src="https://github.com/birobirobiro.png" alt="">
          </div>
          <div class="cardProfileUserName">
            <h4>birobirobiro</h4>
          </div>
        </div>
        <a href="#" class="delete">
          <i class="fa-solid fa-trash"></i>
        </a>
      </div>
    </div>
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
</script>