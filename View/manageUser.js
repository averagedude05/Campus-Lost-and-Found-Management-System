function confirmDelete() {
    return confirm("Are you sure you want to delete this user?");
}

function searchUser() {

    // Get search value from input box
    var search = document.getElementById("userSearch").value;

    // Create AJAX object
    var xhr = new XMLHttpRequest();

    // Send GET request to Controller
    xhr.open(
        "GET",
        "../Controller/ManageUserController.php?userSearch=" +
        encodeURIComponent(search),
        true
    );

    // What to do when response comes from server
    xhr.onload = function () {

        // Check whether request was successful
        if (xhr.status == 200) {

            // Replace old table rows with new search results
            document.getElementById("usersTable").innerHTML =
                xhr.responseText;
        }
    };

    // Send request
    xhr.send();
}


// Search button click
document.getElementById("searchButton").onclick = searchUser;