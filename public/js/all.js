const openBtn = document.querySelector("#openBtn");
openBtn.addEventListener("click", ()=>{
    for (let i = 0; i < btns.length; i++) {
        btns[i].classList.toggle("afficher"); // Changer la largeur de l'élément à 50%
    }
})
const btns = document.querySelectorAll("header nav ul")


const spinner = document.querySelector("#html-spinner");
const ecranNoir = document.querySelector("#ecran-noir");

window.addEventListener('load', function() {
    spinner.style.opacity = 0;
    ecranNoir.style.opacity = 0;
  });

setTimeout(() => {
    spinner.style.display = "block";
  }, 20); 