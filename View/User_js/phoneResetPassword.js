
function verif_phone_conf(){
    var req = document.getElementById('phone_conf');
    req.setAttribute('required', true);
    var st = document.getElementById('phone_conf').value;
    var phoneRegex = new RegExp("[0-9]{8}");
    if(st.length<1 || st.length !== 8){
    document.getElementById("phone_conf").style.borderColor = "red";
    document.getElementById("err_phone").style.color = "red";
    document.getElementById("err_phone").innerHTML = "Veuillez entrer un numéro de téléphone valide (8 chiffres)";
    }
    else if(!st.match(phoneRegex )){
    document.getElementById("phone_conf").style.borderColor = "red";
    document.getElementById("err_phone").style.color = "red";
    document.getElementById("err_phone").innerHTML = "Veuillez entrer un numéro de téléphone valide (8 chiffres)";
    }
    else{
    document.getElementById("phone_conf").style.borderColor = "green";
    document.getElementById("err_phone").style.color = "green";
    document.getElementById("err_phone").innerHTML = "Correct";
    return true;
    }
    return false;
}

document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('phone_conf').addEventListener('keyup', verif_phone_conf);
    });
