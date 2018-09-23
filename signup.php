<?php
    require 'core.php';
    require 'connect.php';

    if(isset($_POST['username']) &&isset($_POST['userid']) && isset($_POST['pass'])) {
        $name = testInputData($_POST['username']);
        $userid = testInputData($_POST['userid']);
        $pass = testInputData($_POST['pass']);   

        if(!empty($username) && !empty($userid) && !empty($pass)){
            $reg_query = "INSERT INTO Registered VALUES('$name', '$userid', '$pass');";
                
            if($query_run = mysqli_query($conn, $reg_query)){
                echo 'Congratulations, you have been registered!';
                $user_query = "INSERT INTO Users VALUES('$userid', '$pass');";
                mysqli_query($conn, $user_query);
            }
            else{
                echo 'Unable to register, try again!';
            }
            header('Location: main.php');
        }
    }
?>