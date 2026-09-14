<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

require_once "../Model/queries.php";

$users = getUsers("");
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Manage Users</title>

    <link rel="stylesheet" href="ManageUsers.css">

</head>

<body>

<header>
    <h2>Manage Users</h2>
</header>

<div class="container">

    <div class="box">

        <div class="topBar">

            <h3>All Users</h3>

            <a href="AdminDashboard.php">
                <button class="backButton">
                    Back to Dashboard
                </button>
            </a>

        </div>


        <?php if (isset($_SESSION['userMsg'])): ?>

            <p style="color: green; font-weight: bold;">
                <?php
                    echo $_SESSION['userMsg'];
                    unset($_SESSION['userMsg']);
                ?>
            </p>

        <?php endif; ?>




        <div class="searchArea">

            <input
                type="text"
                id="userSearch"
                class="search"
                placeholder="Search ID, name or email"
            >

            <button
                type="button"
                id="searchButton"
                class="searchButton"
            >
                Search
            </button>

        </div>



        <table>

            <thead>

                <tr>
                    <th>User ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>

            </thead>


            <tbody id="usersTable">

                <?php if (!empty($users)): ?>

                    <?php foreach ($users as $row): ?>

                        <tr>

                            <td>
                                <?php echo htmlspecialchars($row['user_id']); ?>
                            </td>

                            <td>
                                <?php echo htmlspecialchars($row['name']); ?>
                            </td>

                            <td>
                                <?php echo htmlspecialchars($row['email']); ?>
                            </td>

                            <td>
                                <?php echo htmlspecialchars($row['phone'] ?? ''); ?>
                            </td>

                            <td>
                                <?php echo htmlspecialchars($row['role']); ?>
                            </td>

                            <td>

                                <form
                                    action="../Controller/ManageUserController.php"
                                    method="post"
                                    onsubmit="return confirmDelete()"
                                >

                                    <input
                                        type="hidden"
                                        name="userId"
                                        value="<?php echo $row['user_id']; ?>"
                                    >

                                    <button
                                        type="submit"
                                        name="deleteUser"
                                        class="deleteButton"
                                    >
                                        Delete
                                    </button>

                                </form>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                <?php else: ?>

                    <tr>

                        <td colspan="6" style="text-align: center;">
                            No users found
                        </td>

                    </tr>

                <?php endif; ?>

            </tbody>

        </table>

    </div>

</div>




<script src="manageUser.js"></script>

</body>
</html>