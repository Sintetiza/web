<div class="line"></div>
<footer id="Contact">
  <div class="logo">
    <?php
    $logo = file(__DIR__ . '/Logo.svg');
    echo implode("", $logo);
    ?>
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
  <div class="goTop">
    <i class="fa-solid fa-chevron-up"></i>
  </div>
</footer>
<script lang="js">
  const goTop = document.querySelector(".goTop");
  goTop.addEventListener("click", () => {
    window.scrollTo({
      top: 0,
      behavior: "smooth"
    });
  });
  window.addEventListener("scroll", () => {
    if (window.scrollY > 100) {
      goTop.classList.add("active");
    } else {
      goTop.classList.remove("active");
    }
  });
</script>