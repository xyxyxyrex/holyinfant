<?php include 'admin_sidebar.php'; ?>
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
                                <tr>
                                    <th>Header 1</th>
                                    <th>Header 2</th>
                                    <th>Header 3</th>
                                    <th>Header 4</th>
                                </tr>
                                <tr>
                                    <th>Content 1</th>
                                    <th>Content 2</th>
                                    <th>Content 3</th>
                                    <th>Content 4</th>
                                </tr>
                                <tr>
                                    <th>Content 1</th>
                                    <th>Content 2</th>
                                    <th>Content 3</th>
                                    <th>Content 4</th>
                                </tr>
                                <tr>
                                    <th>Content 1</th>
                                    <th>Content 2</th>
                                    <th>Content 3</th>
                                    <th>Content 4</th>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class=" div-2">
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