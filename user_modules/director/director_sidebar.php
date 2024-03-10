<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="styles/nav.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../../assets/logo.png">
</head>
<?php echo "<body>
  <nav class='navbar'>
    <img class='navlogo' src='../../assets/logo.png' alt=''>
    <ul class='navbar-nav'>
      <li class='nav-item'><a href='director_dashboard.php'><i class='fas fa-home'></i><span class='nav-label'>Dashboard</span></a></li>
      <li class='nav-item'><a href='director_children.php'><i class='fas fa-child'></i><span class='nav-label'>Children</span></a></li>
      <li class='nav-item'><a href='director_donation.php'><i class='fas fa-money-bill-wave'></i><span class='nav-label'>Donation</span></a></li>
      <li class='nav-item'><a href='director_schedules.php'><i class='fas fa-calendar-alt'></i><span class='nav-label'>Schedules</span></a></li>
      <li class='nav-item'><a href='director_admissions.php'><i class='fas fa-file-alt'></i><span class='nav-label'>Admissions</span></a></li>
      <li class='nav-item'><a href='director_staff.php'><i class='fas fa-users'></i><span class='nav-label'>Staff</span></a></li>
      <li class='nav-item'><a href='director_adoptions.php'><i class='fas fa-handshake'></i><span class='nav-label'>Adoptions</span></a></li>
      <li class='nav-item'><a href='director_settings.php'><i class='fas fa-cog'></i><span class='nav-label'>Settings</span></a></li>
      <li id='logout' class='nav-item'><a href='../../logout.php'><i class='fas fa-sign-out-alt'></i><span class='nav-label'>Logout</span></a></li>
    </ul>
  </nav>
</body>"; ?>

</html>