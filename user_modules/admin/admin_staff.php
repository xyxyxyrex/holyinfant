<?php
include 'admin_sidebar.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="styles/admin_staff.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff</title>
</head>

<body>
    <main>
        <span style="font-size: 2em; font-weight: bold;" ;>Staff List</span>
        <hr>
        <?php
        // Include your database connection file
        include '../../dbconn.php';


        // Start session
        session_start();

        // Function to get access level description
        function getAccessLevelDescription($accessLevel)
        {
            switch ($accessLevel) {
                case 1:
                    return 'Housekeeper';
                case 2:
                    return 'Bookkeeper';
                case 3:
                    return 'Director';
                default:
                    return 'Unknown';
            }
        }

        // Check if the form is submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Check if the accept button is clicked
            if (isset($_POST['accept_user'])) {
                $userId = $_POST['user_id'];
                $accessLevel = $_POST['access_level'];

                $tableName = '';
                $validAccessLevels = [1, 2, 3];

                // Validate access level
                if (in_array($accessLevel, $validAccessLevels)) {
                    switch ($accessLevel) {
                        case 1:
                            $tableName = 'tbl_housekeeper';
                            break;
                        case 2:
                            $tableName = 'tbl_bookkeeper';
                            break;
                        case 3:
                            $tableName = 'tbl_director';
                            break;
                    }

                    $checkQuery = "SELECT registered FROM $tableName WHERE user_id = ?";
                    $stmtCheck = mysqli_prepare($conn, $checkQuery);
                    mysqli_stmt_bind_param($stmtCheck, 'i', $userId);
                    mysqli_stmt_execute($stmtCheck);
                    mysqli_stmt_bind_result($stmtCheck, $registeredStatus);
                    mysqli_stmt_fetch($stmtCheck);
                    mysqli_stmt_close($stmtCheck);

                    if ($registeredStatus == 0) {
                        // Update the registered status in the database using prepared statement
                        $updateQuery = "UPDATE $tableName SET registered = 1 WHERE user_id = ?";
                        $stmt = mysqli_prepare($conn, $updateQuery);
                        mysqli_stmt_bind_param($stmt, 'i', $userId);

                        if (mysqli_stmt_execute($stmt)) {
                            echo 'User with ID ' . $userId . ' has been accepted.';
                        } else {
                            echo 'Error updating the database: ' . mysqli_error($conn);
                        }

                        mysqli_stmt_close($stmt);
                    } else {
                        echo 'User with ID ' . $userId . ' is already registered.';
                    }
                } else {
                    echo 'Invalid access level.';
                }
            }

            // Check if the delete button is clicked
            if (isset($_POST['delete_user'])) {
                $userIdToDelete = $_POST['user_id'];

                // Specify the table name based on the access level
                $tableNameToDelete = '';
                $accessLevelToDelete = $_POST['access_level'];

                switch ($accessLevelToDelete) {
                    case 1:
                        $tableNameToDelete = 'tbl_housekeeper';
                        break;
                    case 2:
                        $tableNameToDelete = 'tbl_bookkeeper';
                        break;
                    case 3:
                        $tableNameToDelete = 'tbl_director';
                        break;
                }

                // Delete the user from the database using prepared statement
                $deleteQuery = "DELETE FROM $tableNameToDelete WHERE user_id = ?";
                $stmtDelete = mysqli_prepare($conn, $deleteQuery);
                mysqli_stmt_bind_param($stmtDelete, 'i', $userIdToDelete);

                if (mysqli_stmt_execute($stmtDelete)) {
                    echo 'User with ID ' . $userIdToDelete . ' has been deleted.';
                } else {
                    echo 'Error deleting the user: ' . mysqli_error($conn);
                }

                mysqli_stmt_close($stmtDelete);
            }
        }

        // Fetch staff details from the database
        $query = "SELECT * FROM tbl_director
          UNION
          SELECT * FROM tbl_bookkeeper
          UNION
          SELECT * FROM tbl_housekeeper";
        $result = mysqli_query($conn, $query);

        if ($result) {
            echo '<table border="1">
            <tr>
                <th>User ID</th>
                <th>Username</th>
                <th>Password</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Birthdate</th>
                <th>Email</th>
                <th>Contact Number</th>
                <th>Address</th>
                <th>Access Level</th>
                <th>Profile Picture</th>
                <th>Date Created</th>
                <th>Registered</th>
                <th>Gender</th>
                <th>Register?</th>
                <th>Action</th>
            </tr>';

            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>
                <td>' . $row['user_id'] . '</td>
                <td>' . $row['username'] . '</td>
                <td>' . $row['password'] . '</td>
                <td>' . $row['firstname'] . '</td>
                <td>' . $row['lastname'] . '</td>
                <td>' . $row['birthdate'] . '</td>
                <td>' . $row['email'] . '</td>
                <td>' . $row['contact_number'] . '</td>
                <td>' . $row['address'] . '</td>
                <td>' . getAccessLevelDescription($row['access_level']) . '</td>
                <td>' . $row['profile_picture'] . '</td>
                <td>' . $row['date_created'] . '</td>
                <td>' . ($row['registered'] ? 'Yes' : 'No') . '</td>
                <td>' . $row['gender'] . '</td>
                <td>
                    <form method="POST">
                        <input type="hidden" name="user_id" value="' . $row['user_id'] . '">
                        <input type="hidden" name="access_level" value="' . $row['access_level'] . '">
                        <button type="submit" name="accept_user">Accept</button>
                    </form>
                    <button onclick="denyUser(' . $row['user_id'] . ')">Deny</button>
                </td>
                <td>
                    <form method="POST" onsubmit="return confirm(\'Are you sure you want to delete this user?\');">
                        <input type="hidden" name="user_id" value="' . $row['user_id'] . '">
                        <input type="hidden" name="access_level" value="' . $row['access_level'] . '">
                        <button type="submit" name="delete_user">Delete</button>
                    </form>
                </td>
            </tr>';
            }

            echo '</table>';
        } else {
            echo 'Error fetching data from the database: ' . mysqli_error($conn);
        }

        // Close the database connection
        mysqli_close($conn);
        ?>
    </main>

</body>

</html>