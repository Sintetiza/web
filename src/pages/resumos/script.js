const constainers = document.querySelectorAll(".container");
constainers.forEach((container) => {
  container.addEventListener("click", addClassListShow);
});

function addClassListShow(h1) {
  const father = h1.target.parentNode;
  if (father.classList.contains("show")) {
    father.classList.remove("show");
    return;
  }

  removeClassListShow();
  addClassInContainer(h1.target.parentNode);
}

function removeClassListShow() {
  const containers = document.querySelectorAll(".container");
  containers.forEach((container) => {
    container.classList.remove("show");
  });
}

function addClassInContainer(container) {
  container.classList.add("show");
}
