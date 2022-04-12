const menu = document.querySelector(".bars");
menu.addEventListener("click", toggleMenu);

function toggleMenu() {
  const nav = document.querySelector(".links");
  nav.classList.toggle("active");
}
