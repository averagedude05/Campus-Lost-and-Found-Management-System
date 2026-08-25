function validateform(p) {

    var email = p.email.value;
    var password = p.password.value;

    var emailerr = document.getElementById("emailerr");
    var passworderr = document.getElementById("passworderr");

    var flag = true;

    if (email === "") {
        flag = false;
        emailerr.innerHTML = "Please enter email properly";
    }
    else {
        emailerr.innerHTML = "";
    }

    if (password === "") {
        flag = false;
        passworderr.innerHTML = "Please enter password properly";
    }
    else {
        passworderr.innerHTML = "";
    }

    return flag;
}