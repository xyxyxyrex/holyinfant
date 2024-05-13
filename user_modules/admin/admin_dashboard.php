<?php include 'admin_sidebar.php'; ?>
<?php require '../../scripts/fpdf/fpdf.php'; ?>

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
        <?php
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(40,10,'Hello World!');
        $pdf->Output();
        ?>
        
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
                                    <tr>
                                        <td><img src="placeholder.jpg" alt="Employee Picture"></td>
                                        <td>Name</td>
                                        <td>Admission</td>
                                        <td>March 3, 2024</td>
                                        <td>Done</td>
                                    </tr>
                                    <tr>
                                        <td><img src="placeholder.jpg" alt="Employee Picture"></td>
                                        <td>Name</td>
                                        <td>Admission</td>
                                        <td>March 3, 2024</td>
                                        <td>Done</td>
                                    </tr>
                                    <tr>
                                        <td><img src="placeholder.jpg" alt="Employee Picture"></td>
                                        <td>Name</td>
                                        <td>Admission</td>
                                        <td>March 3, 2024</td>
                                        <td>Done</td>
                                    </tr>
                                    <tr>
                                        <td><img src="placeholder.jpg" alt="Employee Picture"></td>
                                        <td>Name</td>
                                        <td>Admission</td>
                                        <td>March 3, 2024</td>
                                        <td>Done</td>
                                    </tr>
                                    <tr>
                                        <td><img src="placeholder.jpg" alt="Employee Picture"></td>
                                        <td>Name</td>
                                        <td>Admission</td>
                                        <td>March 3, 2024</td>
                                        <td>Done</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="div-2">
                        <div class="employee-day-container">
                            <p id="employee-day-header">Today's Shift</p>
                            <img class="employee-day-image" src="assets/employee_image/sample.jpg" alt="Employee of the Day">
                            <div class="employee-day-name">
                                <span id="employee-day-name">Gerard Ethan Francis Rivera</span>
                                <span id="employee-day-position">Housekeeper</span>
                            </div>
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