const form = document.querySelector("form");
const codeInput = document.querySelector("#codeConf");
const errorPhp = document.querySelector("#errorPhp")
const errorJs = document.querySelector("#errorJs")
console.log(codeInput);

form.addEventListener("submit", (event)=>{
    errorPhp.innerHTML = "";
    let error = "";
    event.preventDefault();
    if(codeInput.value===""){
        error = "Veuillez remplir tous les champs";
        setError(codeInput);
    }
    //verifier qu'il ne contient que des chiffres
    if(error === ""){
        if(!estChiffres(codeInput.value)){
            error = "Le code ne doit contenir que des chiffres";
            setError(codeInput);
        }
    }

    if(error === ""){
        if(codeInput.value.length < 7){
            error = "Le code contient 7 chiffres";
            setError(codeInput);
        }
    }
    if(error ==="") form.submit();
    errorJs.innerHTML = error;
});


function setError(input){
    input.style.border = " 1px solid red";
    const label = document.querySelector("label[for="+input.id+"]");
    label.style.color="red";
}

function estChiffres(texte) {
    return /^\d+$/.test(texte);
  }