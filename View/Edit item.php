<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Update Found Item</title>
    <link rel="stylesheet" href="edit item.css">
</head>
<body>
    <form action="../Controller/Edit Item Controller.php" method="post" onsubmit="return validateform(this)" enctype="multipart/form-data">
        <h2>Update Found Item</h2>
        <div class="dashboard">
            <table>
                <tbody>
                    <tr>
                        <td>
                            <label for="item_name">Item Name:</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" id="item_name" name="item_name" class="input" value=<?php echo isset($_SESSION['item_name']) ? $_SESSION['item_name'] : "" ?> >
                           <span class="error" id="item_nameerr">  <!--<?php echo isset($_SESSION['item_nameErrMsg']) ? $_SESSION['item_nameErrMsg'] : ""; ?> --></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="date">Date Found:</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="date" id="date" name="date" class="input" value=<?php echo isset($_SESSION['date']) ? $_SESSION['date'] : "" ?>>
                            <span class="error" id="dateerr"><?php echo isset($_SESSION['dateErrMsg']) ? $_SESSION['dateErrMsg'] : ""; ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="location">Location:</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" id="location" name="location" class="input" value=<?php echo isset($_SESSION['location']) ? $_SESSION['location'] : "" ?>>
                            <span class="error" id="locationerr"><?php echo isset($_SESSION['locationErrMsg']) ? $_SESSION['locationErrMsg'] : ""; ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="description">Description:</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <textarea id="description" name="description"><?php echo isset($_SESSION['description']) ? $_SESSION['description'] : "" ?></textarea>
                            <span class="error" id="descriptionerr"><?php echo isset($_SESSION['descriptionErrMsg']) ? $_SESSION['descriptionErrMsg'] : ""; ?></span>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="image-section">
                <label>Current Image:</label>
                <div class="change-img">
                    <p>Uploaded Image</p>
                </div>
                <label for="image" id="replaceBtn">Replace Image</label>
                <input type="file" id="image" name="image">
                <br>
                <span class="error" id="imgemptyerr"><?php echo isset($_SESSION['imageErrMsg']) ? $_SESSION['imageErrMsg'] : ""; ?></span>
            </div>
        </div>
        <span class="error"><?php echo isset($_SESSION['globalErrMsg']) ? $_SESSION['globalErrMsg'] : ""; ?></span>
        <a href="Found Item Dashboard.php" id="cancelBtn">Cancel</a>
        <input type="submit" id="submitBtn" value="Submit">
    </form>
    <script src="Edit Item.js"></script>
</body>
</html>