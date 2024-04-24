
function verif_email(){
    var req = document.getElementById('email');
    req.setAttribute('required', true);
    var st = document.getElementById('email').value;
    var formule = /^[\w.-]+@[a-zA-Z\d.-]+.[a-zA-Z]{2,}$/;
    if(st.length<1){
    document.getElementById("email").style.borderColor = "red";
    document.getElementById("err_email").style.color = "red";
    document.getElementById("err_email").innerHTML = "Email must contain more than one character";
    }
    else if(!st.match(formule)){
    document.getElementById("email").style.borderColor = "red";
    document.getElementById("err_email").style.color = "red";
    document.getElementById("err_email").innerHTML = "Email must respect the format(user@gmail.com)";
    }
    else{
    document.getElementById("email").style.borderColor = "green";
    document.getElementById("err_email").style.color = "green";
    document.getElementById("err_email").innerHTML = "Correct";
    return true;
    }
    return false;
}
function verif_pwd(){
    var req = document.getElementById('pwd');
    req.setAttribute('required', true);
    var st = document.getElementById('pwd').value;
    var pwd = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{8,}$/;
    if(st.length<8){
    document.getElementById("pwd").style.borderColor = "red";
    document.getElementById("err_pwd").style.color = "red";
    document.getElementById("err_pwd").innerHTML = "Password must contain more than 8 characters";
    }
    else if(!st.match(pwd)){
    document.getElementById("pwd").style.borderColor = "red";
    document.getElementById("err_pwd").style.color = "red";
    document.getElementById("err_pwd").innerHTML = "Password must contain at least one upper caracter, one number and one lower caracter ";
    }
    else{
    document.getElementById("pwd").style.borderColor = "green";
    document.getElementById("err_pwd").style.color = "green";
    document.getElementById("err_pwd").innerHTML = "Correct";
    return true;
    }
    return false;
}
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('email').addEventListener('keyup', verif_email);
    document.getElementById('pwd').addEventListener('keyup', verif_pwd);
    var pwd = document.getElementById("pwd");
var checkbox = document.getElementById("checkbox");

    checkbox.onclick = function(){
        if (checkbox.checked) {
            pwd.type = "text";
        }else{
            pwd.type = "password";
        }
    }
    });