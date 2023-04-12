const openBtn = document.querySelector("#openBtn");
openBtn.addEventListener("click", ()=>{
    for (let i = 0; i < btns.length; i++) {
        btns[i].classList.toggle("afficher"); // Changer la largeur de l'élément à 50%
    }
})
const btns = document.querySelectorAll("header nav ul")
console.log(btns);

