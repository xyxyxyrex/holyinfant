<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="styles/sidenav.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<?php
echo "<body>
<nav class='navbar'>
<ul class='navbar-nav'>
    <li class='nav-item'><a href='admin_dashboard.php'><i class='fas fa-home'></i><span class='nav-label'>Dashboard</span></a></li>
    <li class='nav-item'><a href='admin_children.php'><i class='fas fa-chart-bar'></i><span class='nav-label'>Children</span></a></li>
    <li class='nav-item'><a href='admin_donation.php'><i class='fas fa-user-graduate'></i><span class='nav-label'>Donation</span></a></li>
    <li class='nav-item'><a href='admin_schedules.php'><i class='fas fa-user-tie'></i><span class='nav-label'>Schedules</span></a></li>
    <li class='nav-item'><a href='admin_admissions.php'><i class='fas fa-question-circle'></i><span class='nav-label'>Admissions</span></a></li>
    <li class='nav-item'><a href='admin_staff.php'><i class='fas fa-book'></i><span class='nav-label'>Staff</span></a></li>
    <li class='nav-item'><a href='admin_adoptions.php'><i class='fas fa-graduation-cap'></i><span class='nav-label'>Adoptions</span></a></li>
    <li class='nav-item'><a href='admin_settings.php'><i class='fas fa-sign-out-alt'></i><span class='nav-label'>Settings</span></a></li>
    <li id='logout' class='nav-item'><a href='dashboard.php?load=logout'><i class='fas fa-sign-out-alt'></i><span class='nav-label'>Logout</span></a></li>
</ul>
</nav>
<main>
</main>";
?>

</html>