function validateform(p) {
    var name = p.item_name.value;
    var date = p.date.value;
    var location = p.found_location.value;
    var description = p.description.value;
    var image = p.image.value;

    var nameerr = document.getElementById("nameerr");
    var dateerr = document.getElementById("dateaerr");
    var locationerr = document.getElementById("found_locationerr");
    var descriptionerr = document.getElementById("descriptionerr");
    var imageerr = document.getElementById("imgemptyerr");

    var flag = true;

    if (name === "") {
        flag = false;
        nameerr.innerHTML = "Please fill up the name properly";
    }

    if (date === "") {
        flag = false;
        dateerr.innerHTML = "Please fill up the date";
    }

    if (location === "") {
        flag = false;
        locationerr.innerHTML = "Please fill up the location properly";
    }

    if (description === "") {
        flag = false;
        descriptionerr.innerHTML = "Please fill up the description properly";
    }

    if (image === "") {
        flag = false;
        imageerr.innerHTML = "Please upload an image";
    }
    return flag;
}