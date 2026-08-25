function validateform(p) {

    var item = p.item.value;
    var category = p.category.value;
    var location = p.location.value;
    var date = p.date.value;
    var info = p.info.value;

    var itemerr = document.getElementById("itemerr");
    var categoryerr = document.getElementById("categoryerr");
    var locationerr = document.getElementById("locationerr");
    var dateerr = document.getElementById("dateerr");
    var infoerr = document.getElementById("infoerr");

    var flag = true;

    if (item === "") {
        flag = false;
        itemerr.innerHTML = "Please enter item name properly";
    }
    else {
        itemerr.innerHTML = "";
    }

    if (category === "") {
        flag = false;
        categoryerr.innerHTML = "Please select a category";
    }
    else {
        categoryerr.innerHTML = "";
    }

    if (location === "") {
        flag = false;
        locationerr.innerHTML = "Please enter location properly";
    }
    else {
        locationerr.innerHTML = "";
    }

    if (date === "") {
        flag = false;
        dateerr.innerHTML = "Please select lost date";
    }
    else {
        dateerr.innerHTML = "";
    }

    if (info === "") {
        flag = false;
        infoerr.innerHTML = "Please enter additional information";
    }
    else {
        infoerr.innerHTML = "";
    }

    return flag;
}