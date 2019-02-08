<?php 

function createUser($fname, $username, $password, $email) {
    include('connect.php');

    //TODO: Check if yser exists already
    //if yes, return a message right away
    //otherwise go with the following logics

    //TODO: The following query will create a new row in the tbl_user table
    //with user_fname = $fname
    //user_name = $username
    //user_pass = $password
    //user_email = $email

    

    $create_user_query = 'INSERT INTO tbl_user (user_fname, user_name, user_pass, user_email) VALUES (:fname, :username, :password, :email)';

    $create_user_set = $pdo->prepare($create_user_query);
            $create_user_set->execute(
                array(
                    ':fname'=>$fname,
                    ':username'=>$username,
                    ':password'=>$password,
                    ':email'=>$email
                )
            );

            
            //To Do: redirect user to index.php if success. Othewise, return a message
            if($create_user_set->rowCount()){
                redirect_to('index.php');
            }else{
                $message = 'Your hiring practices have failed you...';
                return $message;
            }
        }

