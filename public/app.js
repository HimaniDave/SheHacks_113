const texts = ["Qwerty", "Incorrect", "Abc123", "123456"];
let count = 0;
let index = 0;
let currentText = "";
let letter = "";

(function type() {
  if (count === texts.length) {
    count = 0;
  }
  currentText = texts[count];
  letter = currentText.slice(0, ++index);
  document.querySelector(".typing").textContent = letter;
  if (letter.length === currentText.length) {
    count++;
    index = 0;
  }
  setTimeout(type, 300);
})();

const date = document.getElementById("head");
date.innerHTML = new Date().getFullYear();

const collapse = document.querySelector(".navbar-collapse");

const navLink = document.querySelectorAll(".nav-link");
console.log(navLink);

const toggleButton = document.getElementById("togglerBtn");
console.log(toggleButton);

navLink.forEach(function (e) {
  e.addEventListener("click", function () {
    collapse.classList.toggle("show");
  });
});
