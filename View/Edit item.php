<?php session_start(); 
$_SESSION['found_id'] = $_GET['id'];
$_SESSION['category_id'] = $_GET['category_id'];

require "../Model/queries.php";
$found_id = $_SESSION['found_id'];
$original_category_id = $_SESSION['category_id'];
$result = getDetails($found_id);?>
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
                            <input type="text" id="item_name" name="item_name" class="input" value="<?php echo $result['item_name']; ?>">

                            <span class="error" id="item_nameerr">
                                <?php echo isset($_SESSION['item_nameErrMsg']) ? $_SESSION['item_nameErrMsg'] : ""; ?>
                            </span>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="category">Category:</label>
                        </td>
                    </tr>

                    <tr>
                        <td>

                            <select id="category" name="category_id" class="input">

                                <?php

                                $rows = getAllCategories();

                                foreach($rows as $row){

                                    if($row['category_id'] == $original_category_id){

                                        echo "<option value='".$row['category_id']."' selected>".$row['category_name']."</option>";

                                    }
                                    else{

                                        echo "<option value='".$row['category_id']."'>".$row['category_name']."</option>";

                                        }

                                }

                                ?>

                            </select>

                            <span class="error" id="category_nameerr">
                                <?php echo isset($_SESSION['categoryErrMsg']) ? $_SESSION['categoryErrMsg'] : ""; ?>
                            </span>

                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="date">Date Found:</label>
                        </td>
                    </tr>

                    <tr>
                        <td>

                            <input type="date" id="date" name="date" class="input" value="<?php echo $result['date_found']; ?>">

                            <span class="error" id="dateerr">
                                <?php echo isset($_SESSION['dateErrMsg']) ? $_SESSION['dateErrMsg'] : ""; ?>
                            </span>

                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="location">Location:</label>
                        </td>
                    </tr>

                    <tr>
                        <td>

                            <input type="text" id="location" name="location" class="input" value="<?php echo $result['location']; ?>">

                            <span class="error" id="locationerr">
                                <?php echo isset($_SESSION['locationErrMsg']) ? $_SESSION['locationErrMsg'] : ""; ?>
                            </span>

                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="description">Description:</label>
                        </td>
                    </tr>

                    <tr>
                        <td>

                            <textarea id="description" name="description"><?php echo $result['description']; ?></textarea>

                            <span class="error" id="descriptionerr">
                                <?php echo isset($_SESSION['descriptionErrMsg']) ? $_SESSION['descriptionErrMsg'] : ""; ?>
                            </span>

                        </td>
                    </tr>

                </tbody>

            </table>

            <div class="image-section">

                <label>Current Image:</label>

                <div class="change-img">

                    <img src="../Controller/uploads/<?php echo basename($result['image_url']); ?>"
                         alt="Failed to load image"
                         style="width: 250px; height: 250px; object-fit: contain; border-radius: 7px;">

                </div>

                <br>
                <br>

                <label for="new_image" id="replaceBtn">Replace</label>

                <input type="file" name="new_image" id="new_image" style="display: none;">

                <br>

                <span class="error" id="imgemptyerr">
                    <?php echo isset($_SESSION['imageErrMsg']) ? $_SESSION['imageErrMsg'] : ""; ?>
                </span>

            </div>

        </div>

        <span class="error">
            <?php echo isset($_SESSION['globalErrMsg']) ? $_SESSION['globalErrMsg'] : ""; ?>
        </span>

        <a href="Found Item Dashboard.php" id="cancelBtn">Cancel</a>

        <input type="submit" id="submitBtn" value="Submit">

    </form>

    <script src="Edit Item.js"></script>

</body>

</html>