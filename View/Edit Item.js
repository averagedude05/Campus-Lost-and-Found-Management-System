function validateform(p) {
    var name = p.item_name.value;
    var date = p.date.value;
    var location = p.location.value;
    var category = p.category_id.value;

    var nameerr = document.getElementById("item_nameerr");
    var dateerr = document.getElementById("dateerr");
    var locationerr = document.getElementById("locationerr");
    var categoryerr = document.getElementById("categoryerr");
    var imageerr = document.getElementById("imgemptyerr");
    var flag = true;

    if (name === "") {
        flag = false;
        nameerr.innerHTML = "Please enter item name properly";
    } else {
        nameerr.innerHTML = "";
    }

    if (date === "") {
        flag = false;
        dateerr.innerHTML = "Please fill up the date properly";
    } else {
        dateerr.innerHTML = "";
    }

    if (location === "") {
        flag = false;
        locationerr.innerHTML = "Please fill up the location properly";
    } else {
        locationerr.innerHTML = "";
    }

    return flag;
}