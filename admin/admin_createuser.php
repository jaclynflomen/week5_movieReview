<?php
require_once('scripts/config.php');

confirm_logged_in();

if(isset($_POST['submit'])){
    // var_dump($_POST);
    //do some preprocess for the data
    //trim would just be a starting point
    $fname = trim($_POST['fname']);
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $email = trim($_POST['email']);

    //Validation
    if(empty($username) || empty($password) || empty($email)){
        $message = 'Please fill the required fields.';
    }else{
        $result = createUser($fname, $username, $password, $email);
        $message = 'Data seems alright...';
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create User</title>
</head>
<body>
    <?php if(!empty($message)):?>
        <p><?php echo $message;?></p>
    <?php endif;?>

    <h2>Create User</h2>
    <form action="admin_createuser.php" method="POST">
        <label for="first_name">First Name</label>
        <input type="text" name="fname" id="first_name"> <br><br>

        <label for="user_name">User Name</label>
        <input type="text" name="username" id="user_name"> <br><br>

        <label for="email">Email</label>
        <input type="email" name="email" id="email"> <br><br>

        <label for="password">Password</label>
        <input type="text" name="password" id="password"> <br><br>

        <button type="submit" name="submit">Create User</button>
    </form>
</body>
</html>