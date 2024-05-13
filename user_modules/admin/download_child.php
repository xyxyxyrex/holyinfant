<?php
// Include FPDF library
require('../../scripts/fpdf/fpdf.php');

// Include database connection
include '../../dbconn.php';

// Check if child ID is provided in the URL
if (isset($_GET['id'])) {
    $childId = $_GET['id'];

    // Retrieve child information from the database
    $sql = "SELECT * FROM tbl_children WHERE child_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $childId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Assign child information to variables
        $firstName = $row['firstname'];
        $lastName = $row['lastname'];
        $birthdate = $row['birthdate'];
        $gender = $row['gender'];
        $status = $row['status'];
        $healthConditions = $row['health_conditions'];
        $allergies = $row['allergies'];
        $childDescription = $row['child_description'];
        $hobbies = $row['hobbies'];
        $parent1Name = $row['parent1_name'];
        $parent1ContactNumber = $row['parent1_contact_number'];
        $parent2Name = $row['parent2_name'];
        $parent2ContactNumber = $row['parent2_contact_number'];
        $profileImage = $row['profile_image'];

        // Initialize PDF
        $pdf = new FPDF();
        $pdf->AddPage();

        // Set font and size
        $pdf->SetFont('Arial', 'B', 12);

        $pdf->Image('../../assets/logo.png', 10, 10, 30);
        $pdf->Cell(0, 10, 'Holy Infant Foundation', 0, 1, 'C'); // Title
        $pdf->SetFont('Arial', 'B', 8);
        $pdf->Cell(0, 10, 'Child Information Sheet', 0, 1, 'C'); // Subtitle

        $pdf->SetFont('Arial', 'B', 12);

        // Add profile picture
        if ($profileImage) {
            $pdf->Cell(0, 10, '', 0, 1); // Add space
            $pdf->Cell(0, 10, 'Profile Picture:', 0, 1);
            $pdf->Image($profileImage, 150, $pdf->GetY(), 50);
        }

        // Add child information to the PDF
        $pdf->Cell(0, 10, '', 0, 1); // Add space
        $pdf->Cell(0, 10, 'Child Name: ' . $firstName . ' ' . $lastName, 0, 1);
        $pdf->Cell(0, 10, 'Birthdate: ' . $birthdate, 0, 1);
        $pdf->Cell(0, 10, 'Gender: ' . $gender, 0, 1);
        $pdf->Cell(0, 10, 'Status: ' . $status, 0, 1);
        $pdf->Cell(0, 10, 'Child Description: ' . $childDescription, 0, 1);
        $pdf->Cell(0, 10, 'Health Conditions: ' . $healthConditions, 0, 1);
        $pdf->Cell(0, 10, 'Allergies: ' . $allergies, 0, 1);
        $pdf->Cell(0, 10, 'Hobbies: ' . $hobbies, 0, 1);
        $pdf->Cell(0, 10, 'Parent 1 Name: ' . $parent1Name, 0, 1);
        $pdf->Cell(0, 10, 'Parent 1 Contact Number: ' . $parent1ContactNumber, 0, 1);
        $pdf->Cell(0, 10, 'Parent 2 Name: ' . $parent2Name, 0, 1);
        $pdf->Cell(0, 10, 'Parent 2 Contact Number: ' . $parent2ContactNumber, 0, 1);

        // Output PDF
        $pdfFileName = 'Child_' . $childId . '_Info.pdf';
        $pdf->Output('D', $pdfFileName); // 'D' parameter prompts the browser to download

        // Close database connection and exit
        $stmt->close();
        $conn->close();
        exit();
    } else {
        echo "Child not found.";
    }

    // Close statement and database connection
    $stmt->close();
    $conn->close();
} else {
    // Handle error if child ID is not provided
    echo "Child ID not provided.";
}
?>
