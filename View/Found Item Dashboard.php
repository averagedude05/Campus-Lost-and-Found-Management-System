<!DOCTYPE html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="Found Item Dashboard.css">
</head>

<body>
<form action="save_item.php" method="POST" onsubmit="return validateForm()">
    <div class="header">
        <h2>Dashboard</h2>
    </div>
    <div class="new_itm"><a href="Report Found Item.php" id="reportBtn">+Report New Item</a></div>
    <div class="dashboard">

        <div class="section">
            <h3>My Reports</h3>

            <table>
                <tr class="itemRow">
                    <th>Item</th>
                    <th>Category</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                <tr>
                    <td>Black Wallet</td>
                    <td>Others</td>
                    <td>Aug 10, 2026</td>
                    <td>Pending</td>
                    <td>
                            <a href="Edit item.php" class="edit-btn">Edit</a>
                            <input type="button" class="withdraw-btn" value="Withdraw"></input>
                    </td>
                </tr>
            </table>
        </div>

        <div class="section">
            <h3>My Claims</h3>
            <table>
                <tr class="claimsHead">
                    <th>Item</th>
                    <th>Claim Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                <tr>
                    <td>Black Wallet</td>
                    <td>Aug 11, 2026</td>
                    <td>Pending</td>
                    <td>
                        <a href="View Item.php" class="view-btn">View</a>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</form>
</body>