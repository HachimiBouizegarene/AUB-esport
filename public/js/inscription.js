const input = document.querySelectorAll("input, select")
const form = document.querySelector("form")
const errorSpan = document.querySelector("#errorSpan")

console.log(form);
form.addEventListener("submit", (event)=>{
    event.preventDefault();
    let error = "";
    for (let index = 0; index < input.length; index++) {
        const element = input[index];
        const label = document.querySelector("label[for="+element.id+"]");
        if(element.value==""){
            error = "Veuillez remplir tous les champs";
            setError(element);
        }else{
            cleanError(element)
        }
    }

    errorSpan.innerHTML = error;
})


function setError(input ){
    input.style.border = " 1px solid red";
    const label = document.querySelector("label[for="+input.id+"]");
    label.style.color="red";
}

function cleanError(input){
    input.style.border = "none";
    const label = document.querySelector("label[for="+input.id+"]");
    label.style.color="white";
}
