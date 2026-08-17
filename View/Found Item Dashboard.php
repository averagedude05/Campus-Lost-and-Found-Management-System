<!DOCTYPE html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="Found Item Dashboard.css">
</head>

<body>
<form>
    <div class="header">
        <input type="button" id="backBtn" value="← Back">
        <h2>Dashboard</h2>
    </div>
    <div class="new_itm"><input type="button" name="new_itm" value="+ Report Item"></div>
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
                            <button class="edit-btn">Edit</button>
                            <button class="withdraw-btn">Withdraw</button>
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
                        <button class="view-btn">Edit</button>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</form>
</body>