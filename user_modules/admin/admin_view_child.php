<?php
include 'admin_sidebar.php';
// Connect to the database
include '../../dbconn.php';

// Check if the child ID is provided in the URL
if (isset($_GET['id'])) {
    $childId = $_GET['id'];

    // Fetch child data from the database
    $sql = "SELECT * FROM tbl_children WHERE child_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $childId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Display child information
        $profileImage = $row['profile_image'];
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

        // Display child information in HTML
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <link rel="stylesheet" href="styles/admin_view_child.css">
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>View Child</title>
        </head>

        <body>
            <main>
                <h1>Child Information</h1>
                <div>
                    <?php if ($profileImage) : ?>
                        <img src="<?php echo $profileImage; ?>" alt="Child Profile Image" style="width: 200px; height: 200px;">
                    <?php else : ?>
                        <p>No profile image available.</p>
                    <?php endif; ?>
                </div>
                <div>
                    <h2><?php echo $firstName . ' ' . $lastName; ?></h2>
                    <p><strong>Birthdate:</strong> <?php echo $birthdate; ?></p>
                    <p><strong>Gender:</strong> <?php echo $gender; ?></p>
                    <p><strong>Status:</strong> <?php echo $status; ?></p>
                    <p><strong>Child Description:</strong> <?php echo $childDescription; ?></p>
                    <p><strong>Health Conditions:</strong> <?php echo $healthConditions; ?></p>
                    <p><strong>Allergies:</strong> <?php echo $allergies; ?></p>
                    <p><strong>Hobbies:</strong> <?php echo $hobbies; ?></p>
                    <p><strong>Parent 1 Name:</strong> <?php echo $parent1Name; ?></p>
                    <p><strong>Parent 1 Contact Number:</strong> <?php echo $parent1ContactNumber; ?></p>
                    <p><strong>Parent 2 Name:</strong> <?php echo $parent2Name; ?></p>
                    <p><strong>Parent 2 Contact Number:</strong> <?php echo $parent2ContactNumber; ?></p>
                </div>
            </main>
        </body>

        </html>
<?php
    } else {
        echo "Child not found.";
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
} else {
    echo "Child ID not provided.";
}
?>