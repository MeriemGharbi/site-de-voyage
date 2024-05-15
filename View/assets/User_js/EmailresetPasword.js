
function verif_email_conf(){
    var req = document.getElementById('email_conf');
    req.setAttribute('required', true);
    var st = document.getElementById('email_conf').value;
    var formule = /^[\w.-]+@[a-zA-Z\d.-]+.[a-zA-Z]{2,}$/;
    var email = new RegExp(".+@gmail.com");
    if(st.length<1 || st==""){
    document.getElementById("email_conf").style.borderColor = "red";
    document.getElementById("err_email").style.color = "red";
    document.getElementById("err_email").innerHTML = "Email must contain more than one character";
    }
    else if(!st.match(formule)){
    document.getElementById("email_conf").style.borderColor = "red";
    document.getElementById("err_email").style.color = "red";
    document.getElementById("err_email").innerHTML = "Email must respect the format(user@gmail.com)";
    }
    else if(!st.match(email)){
        document.getElementById("email_conf").style.borderColor = "red";
        document.getElementById("err_email").style.color = "red";
        document.getElementById("err_email").innerHTML = "Email must respect the format(user@gmail.com)";
        }
    else{
    document.getElementById("email_conf").style.borderColor = "green";
    document.getElementById("err_email").style.color = "green";
    document.getElementById("err_email").innerHTML = "Correct";
    return true;
    }
    return false;
}

document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('email_conf').addEventListener('keyup', verif_email_conf);
    });
