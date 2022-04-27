const seta = document.querySelector(".seta");

seta.addEventListener("click", rediretToBackPage);

function rediretToBackPage() {
  window.history.back();
}
