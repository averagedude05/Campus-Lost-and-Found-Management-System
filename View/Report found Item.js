function validateform(p) {
    var type = p.itemtype.value;
    var name = p.itemnametxt.value;
    var category = p.itemcatagory.value;
    var date = p.founddate.value;
    var location = p.foundlocation.value;
    var description = p.description.value;
    var image = p.image.value;
    var typeerr = document.getElementById("typeerr");
    var nameerr = document.getElementById("nameerr");
    var categoryerr = document.getElementById("categoryerr");
    var dateerr = document.getElementById("dateerr");
    var locationerr = document.getElementById("locationerr");
    var descriptionerr = document.getElementById("descriptionerr");
    var imageerr = document.getElementById("imageerr");
    var flag = true;
    
    if (type === "") {
        flag = false;
        typeerr.innerHTML = "Please select an item type";
    }
    if (name === "") {
        flag = false;
        nameerr.innerHTML = "Please fill up the name properly";
    }
    if (category === "") {
        flag = false;
        categoryerr.innerHTML = "Please select a category";
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