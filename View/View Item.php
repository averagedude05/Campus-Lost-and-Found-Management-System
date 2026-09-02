<?php
session_start();
$details=$_SESSION['item_details'];
?>
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
                                <input type="text" id="item_name" name="item_name" class="input"
                                       value="<?php echo $details['item_name']; ?>" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="date">Claim Date:</label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="date" id="date" name="date" class="input"
                                       value="<?php echo $details['date_lost']; ?>" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="lost_location">Location:</label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" id="lost_location" name="lost_location" class="input" 
                                value="<?php echo $details['location']; ?>"readonly>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="description">Description:</label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                               <textarea id="description" name="description" readonly><?php echo $details['description']; ?></textarea>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="image-section">
                    <label>Current Image:</label>
                    <div class="change-img">
                        <img src="../Controller/uploads/<?php echo basename($details['image_url']); ?>"
                             alt="Failed to load image"
                             style="width: 250px; height: 250px; object-fit: contain; border-radius: 7px;">
                    </div>
                </div>
            </div>
            <a href="Found Item Dashboard.php" id="cancelBtn">Back</a>
        </form>

    </body>
</html>
