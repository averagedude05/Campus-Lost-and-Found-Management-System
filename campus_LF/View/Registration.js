function validateform(p) {

    var fullName = p.fullName.value;
    var studentId = p.studentId.value;
    var uniEmail = p.uniEmail.value;
    var password = p.password.value;
    var confirmPassword = p.confirmPassword.value;
    var phone = p.phone.value;


    var fullNameerr =
        document.getElementById("fullNameerr");

    var studentIderr =
        document.getElementById("studentIderr");

    var uniEmailerr =
        document.getElementById("uniEmailerr");

    var passworderr =
        document.getElementById("passworderr");

    var confirmPassworderr =
        document.getElementById("confirmPassworderr");

    var phoneerr =
        document.getElementById("phoneerr");


    var flag = true;


    if (fullName === "") {

        flag = false;

        fullNameerr.innerHTML =
            "Please enter your full name properly";

    }
    else {

        fullNameerr.innerHTML = "";

    }


    if (studentId === "") {

        flag = false;

        studentIderr.innerHTML =
            "Please enter your student ID properly";

    }
    else {

        studentIderr.innerHTML = "";

    }


    if (uniEmail === "") {

        flag = false;

        uniEmailerr.innerHTML =
            "Please enter your university email";

    }
    else {

        uniEmailerr.innerHTML = "";

    }


    if (password === "") {

        flag = false;

        passworderr.innerHTML =
            "Please enter a password";

    }
    else {

        passworderr.innerHTML = "";

    }


    if (confirmPassword === "") {

        flag = false;

        confirmPassworderr.innerHTML =
            "Please confirm your password";

    }
    else if (password !== confirmPassword) {

        flag = false;

        confirmPassworderr.innerHTML =
            "Passwords do not match";

    }
    else {

        confirmPassworderr.innerHTML = "";

    }


    if (phone === "") {

        flag = false;

        phoneerr.innerHTML =
            "Please enter your phone number";

    }
    else {

        phoneerr.innerHTML = "";

    }


    return flag;
}