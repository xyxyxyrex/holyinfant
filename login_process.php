<?php
session_start();
include 'dbconn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];


    if ($username === "admin" && $password === "admin") {

        header("Location: user_modules/admin/admin_dashboard.php");
        exit();
    }


    $user = getUserFromTable($conn, $username, $password, "tbl_director");
    if (!$user) {
        $user = getUserFromTable($conn, $username, $password, "tbl_bookkeeper");
        if (!$user) {
            $user = getUserFromTable($conn, $username, $password, "tbl_housekeeper");
        }
    }


    if ($user) {

        if ($password === $user["password"] && $user["registered"]) {

            $_SESSION["user_id"] = $user["user_id"];
            $_SESSION["username"] = $user["username"];
            $_SESSION["access_level"] = $user["access_level"];

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
        }
    }


    $_SESSION["login_error"] = "Invalid credentials or user not registered";

    // Debugging info
    $_SESSION["debug_info"] = $user;

    header("Location: index.php");
    exit();
} else {

    header("Location: index.php");
    exit();
}

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
