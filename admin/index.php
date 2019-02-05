<?php 

    require_once('scripts/config.php');
    confirm_logged_in();
    
    //To Do: Login Needed
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome to your admin panel</title>
</head>
<body>

    <h1>Admin Dashboard</h1>
    <h3>Welcome <?php echo $_SESSION['user_name'];?></h3>
    <p>This is the admin dashboard</p>

    <nav>
        <ul>
            <li><a href="#">Create User</a></li>
            <li><a href="#">Edit User</a></li>
            <li><a href="#">Delete User</a></li>
            <li><a href="scripts/caller.php?caller_id=logout">Sign Out</a></li>
        </ul>
    </nav>


    <?php
    echo 'Last Log In: '; //formatting
    $timezone = -5; //align with timezone

    $cookie = ($_COOKIE['user_date'] + $timezone);
    $cookie_value = "SELECT * FROM tbl_users WHERE user_date = ".$cookie;
    setcookie($cookie_value, time());
    
    if(!isset($_COOKIE[$cookie_value])) {
        echo gmdate("Y/m/j H:i", time() + 3600*$cookie); //this is for formatting
    }

    ?>


    <p><?php 
    $hour = date('H');
    $dayTime = ($hour > 17) ? "Evening" : ($hour > 12) ? "Afternoon" : "Morning"; //switches for each time of day
    echo "Good " . $dayTime; 
    ?></p>
</body>
</html>