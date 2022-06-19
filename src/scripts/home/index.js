const menu = document.querySelector(".bars");
menu.addEventListener("click", toggleMenu);

function toggleMenu() {
  const nav = document.querySelector(".links");
  nav.classList.toggle("active");
}

addEventListener("scroll", addClassInHeader);

function addClassInHeader(event) {
  const header = document.querySelector("header");
  const scroll = window.scrollY;
  if (scroll > 100) {
    header.classList.add("headerScroll");
  } else {
    header.classList.remove("headerScroll");
  }
}
