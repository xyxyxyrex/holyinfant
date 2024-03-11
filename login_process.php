<?php
session_start();
include 'dbconn.php';

// Unset all session variables to avoid conflicts
session_unset();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Check if the user is an admin
    if ($username === "admin" && $password === "admin") {
        // Set session variables for admin
        $_SESSION["admin_id"] = 1; // Assuming admin_id is 1
        $_SESSION["username"] = "admin";
        $_SESSION["access_level"] = 4; // Assuming admin has access level 4

        header("Location: user_modules/admin/admin_dashboard.php");
        exit();
    }

    // Attempt to get the user from different tables
    $user = getUserFromTable($conn, $username, $password, "tbl_director");
    if (!$user) {
        $user = getUserFromTable($conn, $username, $password, "tbl_bookkeeper");
        if (!$user) {
            $user = getUserFromTable($conn, $username, $password, "tbl_housekeeper");
        }
    }

    // Check if a valid user is found
    if ($user && $user["password"] == $password && $user["registered"]) {
        // Set session variables
        $_SESSION["user_id"] = $user["user_id"];
        $_SESSION["username"] = $user["username"];
        $_SESSION["access_level"] = $user["access_level"];

        // Redirect based on access level
        switch ($user["access_level"]) {
            case 1:
                header("Location: user_modules/housekeeper/housekeeper_dashboard.php");
                break;
            case 2:
                header("Location: user_modules/bookkeeper/bookkeeper_dashboard.php");
                break;
            case 3:
                header("Location: user_modules/director/director_dashboard.php");
                break;
            default:
                header("Location: index.php");
        }
        exit();
    } else {
        $_SESSION["login_error"] = "Invalid credentials or user not registered";
    }
}

// Redirect if not a POST request or if login fails
header("Location: index.php");
exit();

function getUserFromTable($conn, $username, $password, $table)
{
    $stmt = $conn->prepare("SELECT user_id, username, password, access_level, registered FROM $table WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $stmt->close();

    return $user;
}
