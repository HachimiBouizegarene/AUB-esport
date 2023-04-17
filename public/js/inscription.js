const input = document.querySelectorAll("input, select")
const form = document.querySelector("form")
const errorSpan = document.querySelector("#errorSpan")

console.log(form);
form.addEventListener("submit", (event)=>{
    event.preventDefault();
    let error = "";
    //verifier si tous les champs somt remplis
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

    //verifier que le mail est valide
    if(error == ""){
        const inputMail = document.querySelector("input#mail")
        if(!isEmailValid(inputMail.value)){
            setError (inputMail);
            error= "Le mail n'est pas valide";
        }
    }

    //verifier si les mot de pass sont pareils
    if(error == ""){
        const mdp = document.querySelector("input#mdp");
        const mdpConf = document.querySelector("input#mdpConf");
        if(mdp.value !== mdpConf.value){
            setError(mdp);
            setError(mdpConf);
            error = "Les mots de passe ne correspondent pas";
        }
    }
    //verifier si le mot de pass est trop court
    if(error == ""){
        const mdp = document.querySelector("input#mdp");
        if(mdp.value.length < 8){
            setError(mdp);
            setError(mdpConf);
            error = "Le mot de passe est trop court";
        }
    }
    if(error ==="") form.submit();
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

function isEmailValid(email) {
    const emailRegEx = /\S+@\S+\.\S+/;
    return emailRegEx.test(email);
  }


flatpickr("#dateNaiss", {
    "locale": "fr",
    "maxDate": "01.01.2020"
});