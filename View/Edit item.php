<!DOCTYPE html>
<html>
    <head>
        <title>Update Found Item</title>
        <link rel="stylesheet" href="edit item.css">
        <script src="Edit Item.js"></script>
    </head>
    <body>
        <form onsubmit="return validateform(this)">
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
                                <input type="text" id="item_name" name="item_name" class="input">
                                <span class="error" id="nameerr"></span>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label for="date">Date Found:</label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="date" id="date" name="date" class="input">
                                <span class="error" id="dateaerr"></span>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label for="found_location">found_location:</label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" id="found_location" name="found_location" class="input">
                                <span class="error" id="found_locationerr"></span>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label for="description">Description:</label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <textarea id="description" name="description"></textarea>
                                <span class="error" id="descriptionerr"></span>
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
                    <span class="error" id="imgemptyerr"></span>
                </div>
            </div>

            <a href="Found Item Dashboard.php" id="cancelBtn">Cancel</a>
            <input type="submit" id="submitBtn" value="Submit">
        </form>
    </body>
</html>