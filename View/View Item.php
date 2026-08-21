
<!DOCTYPE html>
<html>
    <head>
        <title>View Item</title>
        <link rel="stylesheet" href="view item.css">
    </head>
    <body>
        <form>
            <h2>View Item</h2>
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
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="date">Claim Date:</label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="date" id="date" name="date" class="input">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="found_location">Location:</label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" id="lost_location" name="lost_location" class="input">
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
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="image-section">
                    <label>Current Image:</label>
                    <div class="change-img">
                        <p>Uploaded Image</p>
                    </div>
                </div>
            </div>
            <a href="Found Item Dashboard.php" id="cancelBtn">Cancel</a>
        </form>
    </body>
</html>

