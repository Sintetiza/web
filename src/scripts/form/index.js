const seta = document.querySelector(".seta");

if (seta) seta.addEventListener("click", rediretToBackPage);

function rediretToBackPage() {
  window.history.back();
}
