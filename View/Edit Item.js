      var replaceImage=false;
      document.getElementById("replaceBtn").onclick = function() {
        replaceImage = true;
    };
function validateform(p) {
    var name = p.item_name.value;
    var date = p.date.value;
    var location = p.location.value;
    var description = p.description.value;
    var image = p.image.value;

    var nameerr = document.getElementById("item_nameerr");
    var dateerr = document.getElementById("dateerr");
    var locationerr = document.getElementById("locationerr");
    var descriptionerr = document.getElementById("descriptionerr");
    var imageerr = document.getElementById("imgemptyerr");
  
    var flag = true;

    if (name === "") {
        flag = false;
        nameerr.innerHTML = "Please enter item name properly";
    }
    else {
    nameerr.innerHTML = "";
    }
    if (date === "") {
        flag = false;
        dateerr.innerHTML = "Please fill up the date properly";
    }
    else {
    dateerr.innerHTML = "";
    }
    if (location === "") {
        flag = false;
        locationerr.innerHTML = "Please fill up the location properly";
    }
    else{
        locationerr.innerHTML="";
    }
    if (description === "") {
        flag = false;
        descriptionerr.innerHTML = "Please fill up the description properly";
    }
    else{
       descriptionerr.innerHTML=""; 
    }
    if (image === "") {
        flag = false;
        imageerr.innerHTML = "Please upload an image";
    }
    else{
        imageerr.innerHTML="";
    }

    if (replaceImage && image === "") {
    flag = false;
    imageerr.innerHTML = "Please select an image";
    }
    else {
        imageerr.innerHTML = "";
    }
    return flag;
}