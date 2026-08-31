function validateLogin(p) {

    var email = p.email.value;
    var password = p.password.value;

    var emailerr =
        document.getElementById("emailerr");

    var passworderr =
        document.getElementById("passworderr");

    var flag = true;


    if (email === "") {

        emailerr.innerHTML =
            "Please enter your email";

        flag = false;

    }
    else {

        emailerr.innerHTML = "";

    }


    if (password === "") {

        passworderr.innerHTML =
            "Please enter your password";

        flag = false;

    }
    else {

        passworderr.innerHTML = "";

    }


    return flag;
}