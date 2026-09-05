<?php
    session_start();
    $categories=$_SESSION['categories'];
?>
<!DOCTYPE html>
<head>
    <title>Campus Lost and Found</title>
    <link rel="stylesheet" href="found_item.css">

</head>
<body>
<form action="../Controller/Report Found Item Controller.php" method="post"  onsubmit="return validateform(this)"enctype="multipart/form-data">
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
                              <option value="lost" <?php echo (isset($_SESSION['itemtype']) && $_SESSION['itemtype'] == "lost") ? "selected" : ""; ?>>
                                    Lost Item
                               </option>
                            <option value="found" <?php echo (isset($_SESSION['itemtype']) && $_SESSION['itemtype'] == "found") ? "selected" : ""; ?>>
                                Found Item
                            </option>
                        </select>
                        <span class="error" id="typeerr"><?php echo isset($_SESSION['typeErrMsg']) ? $_SESSION['typeErrMsg'] : ""; ?></span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="itemnametxt" class="label">Item Name</label>
                    </td>
                </tr>
                <tr>
                    <td class="field">
                        <input type="text" name="itemnametxt" id="itemnametxt" class="input" 
                        value="<?php echo isset($_SESSION["itemnametxt"])?$_SESSION['itemnametxt']:""?>">
                        <span class="error" id="nameerr"><?php echo isset($_SESSION["nameErrMsg"])?$_SESSION["nameErrMsg"]:""?></span>
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
                            <?php
                                foreach($categories as $row){
                                    if($row['category_id'] == $_SESSION['itemcatagory']){
                                        echo "<option value='".$row['category_id']."' selected>".$row['category_name']."</option>";
                                    }
                                    else{
                                        echo "<option value='".$row['category_id']."'>".$row['category_name']."</option>";
                                        }
                                }
                            ?>
                        </select>
                        <span class="error" id="categoryerr"><?php echo isset($_SESSION["categoryErrMsg"])? $_SESSION["categoryErrMsg"]:"" ?></span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="founddate" class="label">Date</label>
                    </td>
                </tr>
                <tr>
                    <td class="field">
                        <input type="date" name="founddate" id="founddate" class="input" value="<?php 
                        echo isset($_SESSION['founddate'])?$_SESSION["founddate"]:""
                        ?>">
                        <span class="error" id="dateerr"><?php echo isset($_SESSION["dateErrMsg"])?$_SESSION["dateErrMsg"]:""?></span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="foundlocation" class="label">Location</label>
                    </td>
                </tr>
                <tr>
                    <td class="field">
                        <input type="text" name="foundlocation" id="foundlocation" class="input"value="<?php echo isset($_SESSION["foundlocation"])?$_SESSION['foundlocation']:"";?>">
                        <span class="error" id="locationerr"><?php echo isset($_SESSION["locationErrMsg"])?$_SESSION["locationErrMsg"]:""?></span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="description" class="label">Description</label>
                    </td>
                </tr>
                <tr>
                    <td class="field">
                        <textarea placeholder="Enter description of the item" id="description" name="description"><?php echo isset($_SESSION['description'])?$_SESSION['description']:"";?>
                        </textarea>
                        <span class="error" id="descriptionerr"><?php echo isset($_SESSION["descriptionErrMsg"]) ? $_SESSION["descriptionErrMsg"] : ""?></span>
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
                        <span class="error" id="imageerr"><?php echo isset($_SESSION['imageErrMsg'])?$_SESSION["imageErrMsg"]:""?></span>
                    </td>
                </tr>
            </table>
               <?php
            if (isset($_SESSION['globalErrMsg'])) {
                echo "<p style='color: red; font-weight: bold;'>" . $_SESSION['globalErrMsg'] . "</p>";
            }
            ?>
            <input type="submit" value="Submit" class="submit-btn">
            <a href="Found Item Dashboard.php" class="cancel-btn">Cancel</a>
        </div>
    </div>
</form>
<script src="Report found Item.js"></script>
</body>
</html>