const form = document.querySelector("form");
const input = document.querySelectorAll("input");
const errorJs = document.querySelector("#errorJs")
const errorPhp = document.querySelector("#errorPhp")


form.addEventListener("submit", (e)=>{
    errorPhp.innerHTML = "";
    let error= "";
    e.preventDefault();
    for(let i = 0; i< input.length; i++){
        if(input[i].value===""){
            setError(input[i]);
            error = "Veuillez remplir tous les champs";
        }else{
            cleanError(input[i]);
        }
    }
    if(error ==="") form.submit();
    errorJs.innerHTML = error;
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