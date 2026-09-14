
<?php 
session_start(); 

$categories = isset($_SESSION['categories']) ? $_SESSION['categories'] : [];
$foundItems = isset($_SESSION['foundItems']) ? $_SESSION['foundItems'] : [];
?> 

<!DOCTYPE html> 
<html> 
<head> 
    <title>Submit Claim</title> 
    <link rel="stylesheet" href="submit-claim.css"> 
</head> 

<body> 
 
<div class="page"> 
    <div class="top"> 
        <h1>Submit Claim</h1> 
    </div> 
 
    <?php if (isset($_SESSION['successMsg'])): ?> 
        <p class="success"><?php echo htmlspecialchars($_SESSION['successMsg']); ?></p> 
        <?php unset($_SESSION['successMsg']); ?> 
    <?php endif; ?> 
 
    <?php if (isset($_SESSION['generalErrMsg'])): ?> 
        <p class="error general-error"><?php echo htmlspecialchars($_SESSION['generalErrMsg']); ?></p> 
        <?php unset($_SESSION['generalErrMsg']); ?> 
    <?php endif; ?> 
 
    <div class="form-box"> 
        <form action="../Controller/Submit Claim Controller.php" 
              method="post" 
              onsubmit="return validateform(this)"> 
 
            <label for="item">Item Name</label> 
            <input type="text" id="item" name="item" 
                   value="<?php echo htmlspecialchars($_SESSION['item'] ?? ''); ?>"> 
            <span class="error" id="itemerr">
                <?php echo htmlspecialchars($_SESSION['itemErrMsg'] ?? ''); ?>
            </span> 
 
            <label for="location">Location</label> 
            <input type="text" id="location" name="location" 
                   value="<?php echo htmlspecialchars($_SESSION['location'] ?? ''); ?>"> 
            <span class="error" id="locationerr">
                <?php echo htmlspecialchars($_SESSION['locationErrMsg'] ?? ''); ?>
            </span> 
 
            <label for="date">Lost Date</label> 
            <input type="date" id="date" name="date" 
                   value="<?php echo htmlspecialchars($_SESSION['date'] ?? ''); ?>"> 
            <span class="error" id="dateerr">
                <?php echo htmlspecialchars($_SESSION['dateErrMsg'] ?? ''); ?>
            </span> 
 
            <label for="info">Additional Information</label> 
            <textarea id="info" name="info"><?php echo htmlspecialchars($_SESSION['info'] ?? ''); ?></textarea> 
            <span class="error" id="infoerr">
                <?php echo htmlspecialchars($_SESSION['infoErrMsg'] ?? ''); ?>
            </span> 
 
            <div class="buttons"> 
                <a href="Submit Claim dashboard.php" class="cancel">Cancel</a> 
                <button type="submit" class="submit">Submit Claim</button> 
            </div> 
        </form> 
    </div>
<?php 
unset( 
    $_SESSION['itemErrMsg'], 
    
    $_SESSION['locationErrMsg'], 
    $_SESSION['dateErrMsg'], 
    $_SESSION['infoErrMsg'] 
); 
?> 
 
<script src="Submit Claim.js"></script> 
</body> 
</html>

