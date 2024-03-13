<?php
include '../../dbconn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $childId = $_POST['childId'];

    // Perform deletion query
    $deleteQuery = "DELETE FROM tbl_children WHERE child_id = $childId";

    $response = ['success' => false]; // Initialize the response

    if ($conn->query($deleteQuery) === TRUE) {
        $response['success'] = true;
    }

    // Send the JSON response
    header('admin_children.php');
    echo json_encode($response);

    $conn->close();
}
