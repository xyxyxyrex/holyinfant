<?php
include '../../dbconn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $childId = $_POST['id'];
    $field = $_POST['field'];
    $value = $_POST['value'];

    $fieldMapping = [
        'childDescription' => 'child_description',
        'parent1Name' => 'parent1_name',
        'parent2Name' => 'parent2_name',
        'healthConditions' => 'health_conditions',
        'parent1ContactNumber' => 'parent1_contact_number',
        'parent2ContactNumber' => 'parent2_contact_number',
    ];

    if (array_key_exists($field, $fieldMapping)) {
        $field = $fieldMapping[$field];
    }

    $updateSql = "UPDATE tbl_children SET `$field` = ? WHERE child_id = ?";
    $updateStmt = $conn->prepare($updateSql);

    if ($updateStmt) {
        $updateStmt->bind_param('si', $value, $childId);
        $result = $updateStmt->execute();

        if ($result) {
            echo "success";
        } else {
            echo "Failed to update database: " . $conn->error;
        }

        $updateStmt->close();
    } else {
        echo "Failed to prepare statement: " . $conn->error;
    }

    $conn->close();
} else {
    echo "";
}
