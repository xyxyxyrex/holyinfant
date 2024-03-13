<?php
include 'admin_sidebar.php';
include '../../dbconn.php';

if (isset($_GET['id'])) {
    $childId = $_GET['id'];

    $sql = "SELECT * FROM tbl_children WHERE child_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $childId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();

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

        // Convert and display the birthdate in "Month Name DD, YYYY" format
        if (!empty($birthdate)) {
            $birthdateDateTime = new DateTime($birthdate);
            $formattedBirthdate = $birthdateDateTime->format('F d, Y'); // Format to "Month Name DD, YYYY"
        } else {
            $formattedBirthdate = "Not available";
        }
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
            <link rel="stylesheet" href="styles/admin_view_child.css">
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>View Child</title>
        </head>

        <body>
            <main>
                <h1>Child Information</h1>
                <div class="personal-information">

                    <div>
                        <?php if ($profileImage) : ?>
                            <img src="<?php echo $profileImage; ?>" alt="Child Profile Image" style="width: 200px; height: 200px;">
                        <?php else : ?>
                            <p>No profile image available.</p>
                        <?php endif; ?>
                    </div>

                    <div class="personal-details">
                        <h2><?php echo ucwords($firstName . ' ' . $lastName); ?></h2>
                        <p><strong>Birthdate:</strong> <span id="birthdate"><?php echo $birthdate; ?></span> <button onclick="openModal('birthdate')"><i class="fa-regular fa-pen-to-square"></i></button></p>
                        <p><strong>Gender:</strong> <span id="gender"><?php echo ucwords($gender); ?></span> <button onclick="openModal('gender')"><i class="fa-regular fa-pen-to-square"></i></button></p>
                        <p><strong>Status:</strong> <span id="status"><?php echo ucwords($status); ?></span> <button onclick="openModal('status')"><i class="fa-regular fa-pen-to-square"></i></button></p>
                        <p><strong>Child Description:</strong> <span id="childDescription"><?php echo $childDescription; ?></span> <button onclick="openModal('childDescription')"><i class="fa-regular fa-pen-to-square"></i></button></p>
                        <p><strong>Health Conditions:</strong> <span id="healthConditions"><?php echo $healthConditions; ?></span> <button onclick="openModal('healthConditions')"><i class="fa-regular fa-pen-to-square"></i></button></p>
                        <p><strong>Allergies:</strong> <span id="allergies"><?php echo $allergies; ?></span> <button onclick="openModal('allergies')"><i class="fa-regular fa-pen-to-square"></i></button></p>
                        <p><strong>Hobbies:</strong> <span id="hobbies"><?php echo $hobbies; ?></span> <button onclick="openModal('hobbies')"><i class="fa-regular fa-pen-to-square"></i></button></p>
                        <p><strong>Parent 1 Name:</strong> <span id="parent1Name"><?php echo ucwords($parent1Name); ?></span> <button onclick="openModal('parent1Name')"><i class="fa-regular fa-pen-to-square"></i></button></p>
                        <p><strong>Parent 1 Contact Number:</strong> <span id="parent1ContactNumber"><?php echo $parent1ContactNumber; ?></span> <button onclick="openModal('parent1ContactNumber')"><i class="fa-regular fa-pen-to-square"></i></button>
                        </p>
                        <p><strong>Parent 2 Name:</strong> <span id="parent2Name"><?php echo ucwords($parent2Name); ?></span> <button onclick="openModal('parent2Name')"><i class="fa-regular fa-pen-to-square"></i></button></p>
                        <p><strong>Parent 2 Contact Number:</strong> <span id="parent2ContactNumber"><?php echo $parent2ContactNumber; ?></span> <button onclick="openModal('parent2ContactNumber')"><i class="fa-regular fa-pen-to-square"></i></button>
                        </p>
                    </div>
                </div>

                <div id="editModal" class="modal">
                    <div class="modal-content">
                        <h2>Edit Field</h2>
                        <label for="editValue">New Value:</label>
                        <input type="text" id="editValue">
                        <button onclick="saveEdit('<?php echo $childId; ?>')">Save</button>
                        <button onclick="closeModal()">Cancel</button>
                    </div>
                </div>
            </main>

            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
            <script>
                var currentField;

                function openModal(field) {
                    currentField = field;
                    var fieldValue = $('#' + field).text();
                    var inputField = $('#editValue');

                    if (field === 'birthdate') {
                        inputField.attr('type', 'date');
                        var formattedDate = fieldValue.split('/').reverse().join('-'); // Adjust this if your date format is different
                        inputField.val(formattedDate);
                    } else {
                        inputField.attr('type', 'text');
                        inputField.val(fieldValue);
                    }

                    $('#editModal').show();
                }

                function saveEdit(childId) {
                    var editedValue = $('#editValue').val();
                    console.log("Debug: Field - " + currentField + ", Value - " + editedValue);
                    $.ajax({
                        type: "POST",
                        url: "save_edit.php",
                        data: {
                            id: childId,
                            field: currentField,
                            value: editedValue
                        },
                        success: function(response) {
                            if (response.trim() == "success") {
                                if (currentField === 'birthdate') {
                                    var date = new Date(editedValue);
                                    var options = {
                                        year: 'numeric',
                                        month: 'long',
                                        day: 'numeric'
                                    };
                                    var formattedDate = date.toLocaleDateString('en-US', options);
                                    $('#' + currentField).text(formattedDate);
                                } else {
                                    $('#' + currentField).text(editedValue);
                                }
                                closeModal();
                            } else {
                                alert("Failed to save edit.");
                            }
                        },
                        error: function() {
                            alert("Failed to save edit. Please try again.");
                        }
                    });
                }

                function closeModal() {
                    $('#editModal').hide();
                }
            </script>
        </body>$field

        </html>

<?php
    } else {
        echo "Child not found.";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Child ID not provided.";
}
?>

<?php
include '../../dbconn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $childId = $_POST['id'];
    $field = $_POST['field'];
    $value = $_POST['value'];

    $updateSql = "UPDATE tbl_children SET $field = ? WHERE child_id = ?";
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
