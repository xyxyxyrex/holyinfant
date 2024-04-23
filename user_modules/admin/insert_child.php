<?php
session_start();


include '../../dbconn.php';


$firstname = $conn->real_escape_string($_POST['firstName']);
$lastname = $conn->real_escape_string($_POST['lastName']);
$birthdate = $conn->real_escape_string($_POST['birthdate']);
$status = $conn->real_escape_string($_POST['status']);
$child_description = $conn->real_escape_string($_POST['childDescription']);
$gender = $conn->real_escape_string($_POST['gender']);
$health_conditions = $conn->real_escape_string($_POST['healthConditions']);
$allergies = $conn->real_escape_string($_POST['allergies']);
$hobbies = $conn->real_escape_string($_POST['hobbies']);
$parent1_name = $conn->real_escape_string($_POST['parent1Name']);
$parent1_contact_number = $conn->real_escape_string($_POST['parent1ContactNumber']);
$parent2_name = $conn->real_escape_string($_POST['parent2Name']);
$parent2_contact_number = $conn->real_escape_string($_POST['parent2ContactNumber']);


if (isset($_SESSION['user_id'])) {
    $added_by_admin = $_SESSION['user_id'];
    $added_by_director = $added_by_bookkeeper = null;
} elseif (isset($_SESSION['admin_id'])) {
    $added_by_admin = $_SESSION['admin_id'];
    $added_by_director = $added_by_bookkeeper = null;
} elseif (isset($_SESSION['bookkeeper_id'])) {
    $added_by_admin = $added_by_director = null;
    $added_by_bookkeeper = $_SESSION['bookkeeper_id'];
} else {

    echo "Error: User not authenticated.";
    exit();
}


$targetDirectory = "uploads/"; 


if (!empty($_FILES["profileImage"]["name"])) {
    $originalFileName = basename($_FILES["profileImage"]["name"]);
    $timestamp = time(); 
    $targetFile = $targetDirectory . $timestamp . '_' . $originalFileName;

    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));


    $check = getimagesize($_FILES["profileImage"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }


    if ($_FILES["profileImage"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }


    $allowedFormats = ["jpg", "jpeg", "png", "gif"];
    if (!in_array($imageFileType, $allowedFormats)) {
        echo "Sorry, only JPG, JPEG, PNG, and GIF files are allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["profileImage"]["tmp_name"], $targetFile)) {
            echo "The file " . $originalFileName . " has been uploaded.";

            $profileImagePath = $targetFile;
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
} else {

    $profileImagePath = null;
}


$sql = "INSERT INTO tbl_children (firstname, lastname, birthdate, status, child_description, gender, health_conditions, allergies, hobbies, parent1_name, parent1_contact_number, parent2_name, parent2_contact_number, added_by_admin, added_by_director, added_by_bookkeeper, profile_image)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";


$stmt = $conn->prepare($sql);


if ($stmt) {
    // Bind parameters
    $stmt->bind_param("ssssssssssssssiss", $firstname, $lastname, $birthdate, $status, $child_description, $gender, $health_conditions, $allergies, $hobbies, $parent1_name, $parent1_contact_number, $parent2_name, $parent2_contact_number, $added_by_admin, $added_by_director, $added_by_bookkeeper, $profileImagePath);


    if ($stmt->execute()) {
        echo "New child added successfully";
    } else {
        echo "Error: Unable to add child. Please try again later.";
    }

 
    $stmt->close();
} else {

    echo "Error: Unable to prepare SQL statement.";
}
header('Content-Type: application/json');

$conn->close();
