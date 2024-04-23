<?php include 'admin_sidebar.php';
include '../../dbconn.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
<script
  src="https://code.jquery.com/jquery-3.7.1.min.js"
  integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
  crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="styles/adminchildren.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>

<body>
    <main>
        <div class="main-wrapper">
            <div class="top-header">
                <div class="header-title">
                    <h1 class="children-title">Children</h1>
                </div>
            </div>
            <hr>

            <div class="container">
                <div class="view-toggle">
                <input type="text" id="searchInput" placeholder="Search...">
                    <button id="addChildBtn">+ | Add Child</button>
                    <button id="listView" class="active"><i class="fas fa-th-list"></i></button>
                    <button id="cardView"><i class="fas fa-th-large"></i></button>
                </div>
                <div class="item-container">
                    <?php
                    $sql = "SELECT profile_image, firstname, lastname, child_id, child_description FROM tbl_children";
                    $result = $conn->query($sql);

                    if ($result && $result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $profileImage = $row['profile_image'];
                            $firstName = $row['firstname'];
                            $lastName = $row['lastname'];
                            $childId = $row['child_id'];
                            $childDescription = $row['child_description'];

                            echo "<div class='item' id='child_$childId'>";
                            echo "<button class='delete-btn' onclick='deleteChild($childId)'>X</button>";
                            echo "<img src='$profileImage' alt='Profile Picture' style='object-fit: cover; border-radius: 100px; width: 100px; height: 100px;'>";
                            echo "<h3>$firstName $lastName</h3>";
                            echo "<p>$childDescription</p>";

                            echo "<a href='admin_view_child.php?id=$childId' class='cssbuttons-io-button'>
                            View
                            <div class='icon'>
                                <svg
                                height='24'
                                width='24'
                                viewBox='0 0 24 24'
                                xmlns='http://www.w3.org/2000/svg'
                                >
                                <path d='M0 0h24v24H0z' fill='none'></path>
                                <path
                                    d='M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z'
                                    fill='currentColor'
                                ></path>
                                </svg>
                            </div>
                            </a>";

                            echo "</div>";
                        }
                    } else {
                        echo "<p>No child data available</p>";
                    }

                    $result->close();
                    ?>
                </div>
            </div>
        </div>

    </main>
    <div id="addChildModal" class="modal">
        <div class="modal-content">
            <div class="left-section">
                <span class="close">&times;</span>
                <img id="childPicture"  src="#" alt="Selected Image" style="object-fit:cover; border-radius:100px; width: 200px; height: 200px;">
            </div>
            <div class="right-section">
                <form id="addChildForm">
                    <h2>Add Child</h2>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="firstName">First Name:</label>
                            <input type="text" id="firstName" name="firstName" required>
                        </div>
                        <div class="form-group">
                            <label for="lastName">Last Name:</label>
                            <input type="text" id="lastName" name="lastName" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="birthdate">Birthdate:</label>
                            <input type="date" id="birthdate" name="birthdate" required>
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender:</label>
                            <select id="gender" name="gender" required>
                                <option value="">Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="status">Status:</label>
                        <input type="text" id="status" name="status" required>
                    </div>
                    <div class="form-group">
                        <label for="childDescription">Child Description:</label>
                        <textarea id="childDescription" name="childDescription" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="healthConditions">Health Conditions:</label>
                        <input type="text" id="healthConditions" name="healthConditions" required>
                    </div>
                    <div class="form-group">
                        <label for="allergies">Allergies:</label>
                        <input type="text" id="allergies" name="allergies" required>
                    </div>
                    <div class="form-group">
                        <label for="hobbies">Hobbies:</label>
                        <input type="text" id="hobbies" name="hobbies" required>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="parent1Name">Parent 1 Name:</label>
                            <input type="text" id="parent1Name" name="parent1Name">
                        </div>
                        <div class="form-group">
                            <label for="parent1ContactNumber">Parent 1 Contact Number:</label>
                            <input type="tel" id="parent1ContactNumber" name="parent1ContactNumber">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="parent2Name">Parent 2 Name:</label>
                            <input type="text" id="parent2Name" name="parent2Name">
                        </div>
                        <div class="form-group">
                            <label for="parent2ContactNumber">Parent 2 Contact Number:</label>
                            <input type="tel" id="parent2ContactNumber" name="parent2ContactNumber">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="profileImage">Picture:</label>
                        <input type="file" id="profileImage" name="profileImage" accept="image/*">
                    </div>
                    <button type="submit">Add Child</button>
                </form>
            </div>
        </div>
    </div>

    <script src="scripts/addChildModal.js"></script>
    <script>
$(document).ready(function() {

    $('#searchInput').on('input', function() {
        var searchText = $(this).val().toLowerCase(); 
        $('.item').each(function() {
            var childName = $(this).find('h3').text().toLowerCase();
            if (childName.includes(searchText)) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    });
});
</script>
    <script>
        const listViewBtn = document.getElementById('listView');
        const cardViewBtn = document.getElementById('cardView');
        const itemContainer = document.querySelector('.item-container');

        listViewBtn.addEventListener('click', showListView);
        cardViewBtn.addEventListener('click', showCardView);

        function showListView() {
            listViewBtn.classList.add('active');
            cardViewBtn.classList.remove('active');
            itemContainer.classList.remove('card-view');
        }

        function showCardView() {
            cardViewBtn.classList.add('active');
            listViewBtn.classList.remove('active');
            itemContainer.classList.add('card-view');
        }

        showListView();
    </script>
    <script>
        function deleteChild(childId) {
            if (confirm('Are you sure you want to delete this child?')) {
                const xhr = new XMLHttpRequest();
                xhr.open('POST', 'delete_child.php', true);
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4) {
                        if (xhr.status == 200) {
                            try {
                                const response = JSON.parse(xhr.responseText);
                                if (response.success) {
                                    const childElement = document.getElementById('child_' + childId);
                                    if (childElement) {
                                        childElement.parentNode.removeChild(childElement);
                                        alert('Child record deleted successfully.');
                                    } else {
                                        console.error('Error: Child element not found for ID ' + childId);
                                        console.log('Response:', response);
                                        console.log('HTML:', document.body.innerHTML);
                                    }
                                } else {
                                    alert('Error deleting child record.');
                                }
                            } catch (error) {
                                console.error('Error parsing JSON response:', error);
                            }
                        } else {
                            alert('Error deleting child record. HTTP status: ' + xhr.status);
                        }
                    }
                };
                xhr.send('childId=' + childId);
            }
        }
    </script>
</body>
<script src="scripts/previewImage.js">
    </script>
</html>