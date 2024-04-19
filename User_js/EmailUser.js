function validerEmail(){  
    x=document.forms["inscription"]["email_welcome"].value
    error=document.getElementById("email_welcome")
    var letters = new RegExp(".+@gmail.com");
        if (!letters.test(x) ||  x=="") 
        {
            error.innerText="veuillez entrer une adresse mail valide"
            error.style.color="red"
        }
        /*else
        {
            error.innerText="correct"
            error.style.color="green"
        }*/
}
var form=document.getElementById("formulaire")
form.addEventListener('submit',function(event){
    event.preventDefault()
    validerEmail()   
});