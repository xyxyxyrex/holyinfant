<?php
include '../../dbconn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['user_id'], $_POST['access_level'])) {
        $userId = $_POST['user_id'];
        $accessLevel = $_POST['access_level'];

        $tableName = '';
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
            default:
                echo 'Invalid access level.';
                exit;
        }

        $deleteQuery = "DELETE FROM $tableName WHERE user_id = ?";
        $stmt = mysqli_prepare($conn, $deleteQuery);
        mysqli_stmt_bind_param($stmt, 'i', $userId);

        if (mysqli_stmt_execute($stmt)) {
            echo 'User with ID ' . $userId . ' has been deleted.';
        } else {
            echo 'Error deleting user: ' . mysqli_error($conn);
        }

        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    } else {
        echo 'Invalid request. Missing user_id or access_level parameter.';
    }
} else {
    echo 'Invalid request method.';
}
