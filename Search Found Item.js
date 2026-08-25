function validateform(p) {

    var search = p.search.value;

    var searcherr = document.getElementById("searcherr");

    var flag = true;

    if (search === "") {
        flag = false;
        searcherr.innerHTML = "Please enter something to search";
    }
    else {
        searcherr.innerHTML = "";
    }

    return flag;
}