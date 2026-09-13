function validateLogin() {
    var email = document.getElementById("email").value.trim();
    var password = document.getElementById("password").value;
    var valid = true;

    // Clear previous errors
    document.getElementById("emailErr").innerHTML = "";
    document.getElementById("passwordErr").innerHTML = "";

    // Validate Email
    if (email === "") {
        document.getElementById("emailErr").innerHTML = "Email is required.";
        valid = false;
    }

    // Validate Password
    if (password === "") {
        document.getElementById("passwordErr").innerHTML = "Password is required.";
        valid = false;
    }

    return valid;
}