<?php

function login($username, $password){
    require_once('connect.php');
    //check if username exists

    //To Do: finish the following query
    //that counts how many entries from tbl_user
    //that has user_name match $username

    $check_exist_query = 'SELECT COUNT(*) FROM tbl_user WHERE user_name = :username';

    // echo $check_exist_query;
    $user_set = $pdo->prepare($check_exist_query);
    $user_set->execute(
        array(
            ':username'=>$username
        )
    );

    //TODO: fill the following lines with the proper SQL query so that it can get all rows where 
    //user_name = $username and user_pass = $password
    if($user_set->fetchColumn()>0){
        $get_user_query = 'SELECT * FROM tbl_user WHERE user_name = :username AND user_pass = :password';

        $get_user_set = $pdo->prepare($get_user_query);

        $get_user_set->execute(
            array(
                ':username'=>$username,
                ':password'=>$password
            )
        );

        while($found_user = $get_user_set->fetch(PDO::FETCH_ASSOC)){
            $id = $found_user['user_id'];
            $_SESSION['user_id'] = $id;
            $_SESSION['user_name'] = $found_user['user_name'];


            //To Do: use the right SQL query to update the user_ip column to $ip within tbl_user table
            //Dont forget to bind it
            $update_ip_query = 'UPDATE tbl_user SET user_ip=:ip WHERE user_id=:id';
            $update_ip_set = $pdo->prepare($update_ip_query);
            $update_ip_set->execute(
                array(
                    ':id'=>$id,
                    ':ip'=>$ip
                )
            );
        }

        if(empty($id)) {
            $message = 'Login Failed!';
            return $message;
        }

        redirect_to('index.php');
    }else{
        $message = 'Login Failed!';
        return $message;
    }

}

?>