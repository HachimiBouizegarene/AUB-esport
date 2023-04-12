
// //changer la taille de .page
const nav = document.querySelector("header");
const pageHeight = screen.height-nav.offsetHeight;
const page =document.querySelector(".page");
page.maxHeight = screen.height + "px";
page.style.maxWidth = screen.width + "px";


