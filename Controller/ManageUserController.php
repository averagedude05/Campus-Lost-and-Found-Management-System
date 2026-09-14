<?php

session_start();

require_once "../Model/queries.php";


// Admin Check

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    exit();
}



if (
    $_SERVER['REQUEST_METHOD'] === 'POST'
    && isset($_POST['deleteUser'])
) {

    $userId = $_POST['userId'] ?? 0;

    if ($userId > 0) {

        if (deleteUser($userId)) {

            $_SESSION['userMsg'] =
                "User deleted successfully!";

        } else {

            $_SESSION['userMsg'] =
                "Failed to delete user.";
        }
    }


    header("Location: ../View/manageUser.php");
    exit();
}


// ================================
// AJAX Search User
// ================================

if (
    $_SERVER['REQUEST_METHOD'] === 'GET'
    && isset($_GET['userSearch'])
) {

    $search = trim($_GET['userSearch']);

    // Get matching users from Model
    $users = getUsers($search);


    // If users found
    if (!empty($users)) {

        foreach ($users as $row) {

            echo "<tr>";

            echo "<td>"
                . htmlspecialchars($row['user_id'])
                . "</td>";

            echo "<td>"
                . htmlspecialchars($row['name'])
                . "</td>";

            echo "<td>"
                . htmlspecialchars($row['email'])
                . "</td>";

            echo "<td>"
                . htmlspecialchars($row['phone'] ?? '')
                . "</td>";

            echo "<td>"
                . htmlspecialchars($row['role'])
                . "</td>";

            echo "<td>";

            echo "<form
                    action='../Controller/ManageUserController.php'
                    method='post'
                    onsubmit='return confirmDelete()'
                  >";

            echo "<input
                    type='hidden'
                    name='userId'
                    value='" . $row['user_id'] . "'
                  >";

            echo "<button
                    type='submit'
                    name='deleteUser'
                    class='deleteButton'
                  >
                    Delete
                  </button>";

            echo "</form>";

            echo "</td>";

            echo "</tr>";
        }

    } else {

        echo "
            <tr>
                <td colspan='6' style='text-align: center;'>
                    No users found
                </td>
            </tr>
        ";
    }


    
    exit();
}

?>
