<?php
include 'dbconn.php';

function logMessage($message)
{
    // Use var_dump to get a string representation of the variable
    ob_start(); // Start output buffering
    var_dump($message);
    $vardump = ob_get_clean(); // Get the buffer contents and clean the buffer

    // Specify the log file
    $logFile = 'debug_log.txt';

    // Append the message and var_dump result to the log file
    file_put_contents($logFile, $message . PHP_EOL . $vardump . PHP_EOL, FILE_APPEND);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Log that a POST request was received
    logMessage("Received a POST request with the following data:");
    logMessage(print_r($_POST, true));  // Log POST data
    logMessage(print_r($_FILES, true)); // Log FILES data

    // Basic validation, you may need to enhance this based on your requirements
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $user_role = $_POST["user_role"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $contact_number = $_POST["contact_number"];
    $birthdate = $_POST["birthdate"];
    $gender = $_POST["gender"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Check if a file was uploaded
    if (!empty($_FILES["profile_picture"]["name"]) && $_FILES["profile_picture"]["error"] == 0) {

        // Set the target directory
        $targetDir = "profile_picture/";

        // Get the filename and path
        $fileName = basename($_FILES["profile_picture"]["name"]);
        $targetFilePath = $targetDir . $fileName;

        // Check if file type is allowed
        $allowedTypes = array('jpg', 'jpeg', 'png', 'gif');
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        if (in_array($fileType, $allowedTypes)) {
            // Upload file to server
            if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $targetFilePath)) {
                // File uploaded successfully
                logMessage("File uploaded successfully.");

                // Insert data into the appropriate table based on user role
                switch ($user_role) {
                    case 'director':
                        $table_name = "tbl_director";
                        break;
                    case 'bookkeeper':
                        $table_name = "tbl_bookkeeper";
                        break;
                    case 'housekeeper':
                        $table_name = "tbl_housekeeper";
                        break;
                    default:
                        // Handle default case or display an error
                        logMessage("Invalid user role.");
                        exit;
                }

                // Prepare the SQL statement
                $stmt = $conn->prepare("INSERT INTO $table_name (username, password, firstname, lastname, birthdate, email, contact_number, address, gender, profile_picture) 
                                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

                // Bind parameters
                $stmt->bind_param("ssssssssss", $username, $password, $firstname, $lastname, $birthdate, $email, $contact_number, $address, $gender, $targetFilePath);

                // Execute the statement
                if ($stmt->execute()) {
                    logMessage("User registered successfully");
                } else {
                    logMessage("SQL Error: " . $stmt->error);
                    // Add more detailed error handling if needed
                }

                // Close the statement
                $stmt->close();
            } else {
                logMessage("Error uploading file.");
            }
        } else {
            logMessage("Invalid file type. Allowed types are jpg, jpeg, png, gif.");
        }
    } else {
        logMessage("No file uploaded.");
    }

    // Close the connection
    $conn->close();

    header('index.php');
}
