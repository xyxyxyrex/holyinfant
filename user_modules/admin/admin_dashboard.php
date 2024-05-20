<?php include 'admin_sidebar.php'; ?>
<?php include '../../dbconn.php'; ?>

<?php

$dataPoints = array(
    array("label" => "Donations", "y" => 64.02),
    array("label" => "Adoptions", "y" => 12.55),
    array("label" => "Admissions", "y" => 8.47),
)

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="styles/admindashboard.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <script>
        window.onload = function() {

            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                title: {
                    text: "Activity for Today"
                },
                subtitles: [{
                    text: "Holy Infant Nursery"
                }],
                data: [{
                    type: "pie",
                    yValueFormatString: "#,##0.00\"%\"",
                    indexLabel: "{label} ({y})",
                    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart.render();

        }
    </script>
</head>

<body>
    <main>

        <div class="main-wrapper">
            <div class="header">
                <h1>Dashboard</h1>
                <div class="header-icons">
                    <i class="fa-solid fa-bell"></i>
                    <i class="fa-solid fa-calendar"></i>
                    <i class="fa-solid fa-bars"></i>
                </div>
            </div>
            <hr>
            <div class="overview-wrapper">
                <div class="cards-wrapper">
                    <div class="div-1">
                        <div class="div-1-header">
                            <span class="recent-header">Recent Activity</span>
                            <br>
                            <span class="recent-subheader">Recent Activity by People</span>
                        </div>
                        <hr>
                        <div class="recent-table-wrapper">
                            <table class="recent-table">
                                <thead>
                                    <tr>
                                        <th><i class="fa-solid fa-user"></i></th>
                                        <th>Name</th>
                                        <th>Activity</th>
                                        <th>Date Performed</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><img src="placeholder.jpg" alt="Employee Picture"></td>
                                        <td>Name</td>
                                        <td>Admission</td>
                                        <td>March 3, 2024</td>
                                        <td>Done</td>
                                    </tr>
                                    <!-- Add more rows as needed -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="div-2">
                        <?php
                        // Get the current day of the week (0 for Sunday, 1 for Monday, etc.)
                        $currentDay = date("w");

                        // Adjust current day to match schedule_id (1 for Sunday, 2 for Monday, etc.)
                        $todayScheduleId = ($currentDay == 0) ? 7 : $currentDay;
                        $tomorrowScheduleId = ($todayScheduleId % 7) + 1; // Get tomorrow's schedule id

                        // Query to get the housekeeper for today
                        $sqlToday = "SELECT * FROM tbl_housekeeper WHERE schedule_id = $todayScheduleId LIMIT 1";
                        $resultToday = $conn->query($sqlToday);

                        if ($resultToday->num_rows > 0) {
                            $rowToday = $resultToday->fetch_assoc();
                            $employeeNameToday = $rowToday['firstname'] . ' ' . $rowToday['lastname'];
                            $employeePositionToday = 'Housekeeper'; // Assuming the position is always Housekeeper
                            $employeeImageToday = $rowToday['profile_picture'];
                            echo '
                            <div class="employee-day-container" id="employee-day-container">
                                <p id="employee-day-header">Today\'s Shift</p>
                                <img class="employee-day-image" id="employee-day-image" src="assets/employee_image/' . $employeeImageToday . '" alt="Employee of the Day">
                                <div class="employee-day-name">
                                    <span id="employee-day-name">' . $employeeNameToday . '</span>
                                    <span id="employee-day-position">' . $employeePositionToday . '</span>
                                </div>
                            </div>';
                        } else {
                            echo "No housekeeper scheduled for tomorrow.";
                        }

                        // Query to get the housekeeper for tomorrow
                        $sqlTomorrow = "SELECT * FROM tbl_housekeeper WHERE schedule_id = $tomorrowScheduleId LIMIT 1";
                        $resultTomorrow = $conn->query($sqlTomorrow);

                        if ($resultTomorrow->num_rows > 0) {
                            $rowTomorrow = $resultTomorrow->fetch_assoc();
                            $employeeNameTomorrow = $rowTomorrow['firstname'] . ' ' . $rowTomorrow['lastname'];
                            $employeePositionTomorrow = 'Housekeeper'; // Assuming the position is always Housekeeper
                            $employeeImageTomorrow = $rowTomorrow['profile_picture'];
                            echo '
                            <div class="employee-day-container" id="employee-day-container">
                                <p id="employee-day-header">Today\'s Shift</p>
                                <img class="employee-day-image" id="employee-day-image" src="assets/employee_image/' . $employeeImageTomorrow . '" alt="Employee of the Day">
                                <div class="employee-day-name">
                                    <span id="employee-day-name">' . $employeeNameTomorrow . '</span>
                                    <span id="employee-day-position">' . $employeePositionTomorrow . '</span>
                                </div>
                            </div>';
                        } else {
                            echo "No housekeeper scheduled for tomorrow.";
                        }

                        // Close the database connection
                        $conn->close();
                        ?>
                   
                   </div>
                    <div id="chartContainer"></div>
                    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
                </div>
            </div>
        </div>
        <hr>
    </div>
</main>
</body>

</html>
