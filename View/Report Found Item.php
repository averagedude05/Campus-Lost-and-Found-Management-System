<!DOCTYPE html>
<head>
    <title>Campus Lost and Found</title>
    <link rel="stylesheet" href="found_item.css">
</head>

<body>
<form>
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
                    <td>
                        <select name="itemtype" id="itemtype" class="input">
                            <option selected disabled hidden></option>
                            <option value="lost">Lost Item</option>
                            <option value="found">Found Item</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="itemnametxt" class="label">Item Name</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="itemnametxt" id="itemnametxt" class="input">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="itemcatagory" class="label">Category</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <select name="itemcatagory" id="itemcatagory" class="input">
                            <option selected disabled hidden></option>
                            <option value="Id">ID Card</option>
                            <option value="electronics">Electronics</option>
                            <option value="bag">Bag</option>
                            <option value="others">Others</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="founddate" class="label">Date</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="date" name="founddate" id="founddate" class="input">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="foundlocation" class="label">Location</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="foundlocation" id="foundlocation" class="input">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="description" class="label">Description</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <textarea placeholder="Enter description of the item"id="description"></textarea>
                    </td>
                </tr>
            <tr>
                <td>
                    <label for="image" class="label">Upload Image</label>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="file" name="image" id="image" class="input">
                </td>
            </tr>
            </table>
            <button type="submit" class="submit-btn">Submit</button>
            <a href="Found Item Dashboard.php" class="cancel-btn"> Cancel</a>
        </div>
    </div>
</form>
</body>