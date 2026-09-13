function validateform(p) {

    var jsname = p.name.value;
    var jsemail = p.email.value;
    var jspassword = p.password.value;
    var jsconfirmPassword = p.confirmPassword.value;
    var jsphone = p.phone.value;

    var flag = true;

    // Clear previous messages
    document.getElementById("nameerr").innerHTML = "";
    document.getElementById("emailerr").innerHTML = "";
    document.getElementById("passworderr").innerHTML = "";
    document.getElementById("confirmPassworderr").innerHTML = "";
    document.getElementById("phoneerr").innerHTML = "";
    document.getElementById("msg").innerHTML = "";

    if (jsname.trim() === "") {
        flag = false;
        document.getElementById("nameerr").innerHTML = "Please enter your full name";
    }

    if (jsemail.trim() === "") {
        flag = false;
        document.getElementById("emailerr").innerHTML = "Please enter your email";
    }

    if (jspassword === "") {
        flag = false;
        document.getElementById("passworderr").innerHTML = "Please enter a password";
    }
    else if (jspassword.length < 3) {
        flag = false;
        document.getElementById("passworderr").innerHTML = "Password must be at least 6 characters";
    }

    if (jsconfirmPassword === "") {
        flag = false;
        document.getElementById("confirmPassworderr").innerHTML = "Please confirm your password";
    }
    else if (jspassword !== jsconfirmPassword) {
        flag = false;
        document.getElementById("confirmPassworderr").innerHTML = "Passwords do not match";
    }

    if (jsphone.trim() === "") {
        flag = false;
        document.getElementById("phoneerr").innerHTML = "Please enter your phone number";
    }

    // AJAX Submission
    if (flag) {

        const xhr = new XMLHttpRequest();

        xhr.onload = function() {
            console.log(xhr.responseText);
            document.getElementById("msg").innerHTML = xhr.responseText;
        };

        xhr.open("POST", "../Controller/registrationController.php", true);

        xhr.setRequestHeader(
            'Content-type',
            'application/x-www-form-urlencoded'
        );

        xhr.send(
            "name=" + encodeURIComponent(jsname) +
            "&email=" + encodeURIComponent(jsemail) +
            "&password=" + encodeURIComponent(jspassword) +
            "&confirmPassword=" + encodeURIComponent(jsconfirmPassword) +
            "&phone=" + encodeURIComponent(jsphone)
        );
    }

    return false; // Prevents default browser form action
}