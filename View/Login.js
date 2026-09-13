function validateLogin() {

    var uniEmail =
        document.getElementById("uniEmail").value.trim();

    var password =
        document.getElementById("password").value;


    var valid = true;


    // Clear previous errors

    document.getElementById("uniEmailErr").innerHTML = "";

    document.getElementById("passwordErr").innerHTML = "";


    // Check email

    if (uniEmail == "") {

        document.getElementById("uniEmailErr").innerHTML =
            "Uni email is required.";

        valid = false;

    }


    // Check password

    if (password == "") {

        document.getElementById("passwordErr").innerHTML =
            "Password is required.";

        valid = false;

    }

   // console.log(document.getElementsByName("remember").value);
    return valid;

}