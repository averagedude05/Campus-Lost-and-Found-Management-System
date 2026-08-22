<!DOCTYPE html>
<head>
    <title>Campus Lost and Found</title>
    <link rel="stylesheet" href="found_item.css">
    <script src="Report found Item.js"></script>
</head>
<body>
<form onsubmit="return validateform(this)">
    <h2>Report an Item</h2>
    <div class="container">
        <div class="image">
            <img src="found_item.jpg" alt="Found Item">
        </div>
        <div class="form">
            <table>
                <tr>
                    <td>
                        <label for="itemtype" class="label">I want to report an item:</label>
                    </td>
                </tr>
                <tr>
                    <td class="field">
                        <select name="itemtype" id="itemtype" class="input">
                            <option selected disabled hidden></option>
                            <option value="lost">Lost Item</option>
                            <option value="found">Found Item</option>
                        </select>
                        <span class="error" id="typeerr"></span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="itemnametxt" class="label">Item Name</label>
                    </td>
                </tr>
                <tr>
                    <td class="field">
                        <input type="text" name="itemnametxt" id="itemnametxt" class="input">
                        <span class="error" id="nameerr"></span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="itemcatagory" class="label">Category</label>
                    </td>
                </tr>
                <tr>
                    <td class="field">
                        <select name="itemcatagory" id="itemcatagory" class="input">
                            <option selected disabled hidden></option>
                            <option value="Id">ID Card</option>
                            <option value="electronics">Electronics</option>
                            <option value="bag">Bag</option>
                            <option value="others">Others</option>
                        </select>
                        <span class="error" id="categoryerr"></span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="founddate" class="label">Date</label>
                    </td>
                </tr>
                <tr>
                    <td class="field">
                        <input type="date" name="founddate" id="founddate" class="input">
                        <span class="error" id="dateerr"></span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="foundlocation" class="label">Location</label>
                    </td>
                </tr>
                <tr>
                    <td class="field">
                        <input type="text" name="foundlocation" id="foundlocation" class="input">
                        <span class="error" id="locationerr"></span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="description" class="label">Description</label>
                    </td>
                </tr>
                <tr>
                    <td class="field">
                        <textarea placeholder="Enter description of the item" id="description" id="description" name="description"></textarea>
                        <span class="error" id="descriptionerr"></span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="image" class="label" id="uploadimg">Upload Image</label>
                    </td>
                </tr>
                <tr>
                    <td class="field">
                        <input type="file" name="image" id="image" class="input">
                        <span class="error" id="imageerr"></span>
                    </td>
                </tr>
            </table>
            <input type="submit" value="Submit" class="submit-btn">
            <a href="Found Item Dashboard.php" class="cancel-btn">Cancel</a>
        </div>
    </div>
</form>
</body>
</html>