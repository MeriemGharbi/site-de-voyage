
function verif_code_conf(){
    var req = document.getElementById('code_conf');
    req.setAttribute('required', true);
    var st = document.getElementById('code_conf').value;
    var phoneRegex = new RegExp("[0-9]{6}");
    if(st.length<1 || st.length !== 6){
    document.getElementById("code_conf").style.borderColor = "red";
    document.getElementById("err_code_conf").style.color = "red";
    document.getElementById("err_code_conf").innerHTML = "Veuillez entrer un code valide (6 chiffres)";
    }
    else if(!st.match(phoneRegex )){
    document.getElementById("code_conf").style.borderColor = "red";
    document.getElementById("err_code_conf").style.color = "red";
    document.getElementById("err_code_conf").innerHTML = "Veuillez entrer un code valide (6 chiffres)";
    }
    else{
    document.getElementById("code_conf").style.borderColor = "green";
    document.getElementById("err_code_conf").style.color = "green";
    document.getElementById("err_code_conf").innerHTML = "Correct";
    return true;
    }
    return false;
}

document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('code_conf').addEventListener('keyup', verif_code_conf);
    });
